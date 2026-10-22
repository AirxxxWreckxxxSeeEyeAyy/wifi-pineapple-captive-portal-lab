# SQL injection and parameterized queries

[Back to the lab](../../README.md)

## What SQL injection means

SQL injection happens when an application builds a database command by mixing SQL syntax with untrusted input. An attacker-controlled value can then change what the command does. Depending on the query and database permissions, this can expose records, change data, or bypass a query used for an access decision.

The fix is to keep the SQL structure separate from input values through parameter binding. Input validation is useful for application rules, but does not replace parameterized queries.

This lesson uses fictional users and an in-memory database. It needs no Pineapple hardware or network target. It is a supplemental application-security lesson, not evidence that the captive portal or SHIFT has a SQL injection vulnerability.

## The unsafe pattern

The following is deliberately vulnerable teaching code:

```python
# UNSAFE: input becomes part of the SQL command.
query = f"SELECT * FROM users WHERE username = '{username}'"
```

For a normal input, `john.doe`, the query appears to work. For the input `' OR 1=1 -- `, it becomes:

```sql
SELECT * FROM users WHERE username = '' OR 1=1 -- '
```

In this SQLite example, `OR 1=1` makes the condition true for every row, and `-- ` comments out the trailing quote. The application returns all fictional users instead of one. Other databases and query contexts can behave differently.

## Your SQLAlchemy example

Your proposed pattern binds the value separately:

```python
from sqlalchemy import create_engine, text

engine = create_engine("your_database_connection_string")

with engine.connect() as connection:
    result = connection.execute(
        text("SELECT * FROM users WHERE username = :username"),
        {"username": "john.doe"},
    )
    users = result.mappings().all()
    # Process users here.
```

- `create_engine(...)` configures database access. Create and reuse an engine for the application's lifetime rather than for each request.
- `text(...)` represents the SQL statement. It does not make interpolated SQL safe on its own.
- `:username` is a placeholder for a value.
- The dictionary supplies that value separately, so SQL-looking input is treated as data.
- The context manager releases the connection when the block finishes.

The connection string above is a placeholder, not a runnable database URL. In a real service, load credentials from server-side configuration or secrets, and select only needed columns instead of `SELECT *`. This example assumes an existing `users` table. For writes, use an explicit transaction such as `with engine.begin() as connection:` so successful changes commit.

## Run a self-contained demonstration

The same principle can be demonstrated with Python's built-in SQLite driver; no third-party package or database server is required. Save this block as `sql_injection_demo.py` and run `python3 sql_injection_demo.py`.

```python
import sqlite3

connection = sqlite3.connect(":memory:")
try:
    connection.execute(
        "CREATE TABLE users (id INTEGER PRIMARY KEY, username TEXT UNIQUE)"
    )
    connection.executemany(
        "INSERT INTO users (username) VALUES (?)",
        [("john.doe",), ("jane.doe",)],
    )

    def unsafe_lookup(username):
        # Deliberately vulnerable; only for this in-memory lesson.
        return connection.execute(
            f"SELECT id, username FROM users WHERE username = '{username}'"
        ).fetchall()

    def safe_lookup(username):
        return connection.execute(
            "SELECT id, username FROM users WHERE username = ?",
            (username,),
        ).fetchall()

    for label, value in [
        ("Normal input", "john.doe"),
        ("Quote in input", "o'connor"),
        ("SQL-looking input", "' OR 1=1 -- "),
    ]:
        print(label)
        try:
            print("  unsafe:", unsafe_lookup(value))
        except sqlite3.Error:
            print("  unsafe: SQL error")
        print("  safe:  ", safe_lookup(value))
finally:
    connection.close()
```

Expected output:

```text
Normal input
  unsafe: [(1, 'john.doe')]
  safe:   [(1, 'john.doe')]
Quote in input
  unsafe: SQL error
  safe:   []
SQL-looking input
  unsafe: [(1, 'john.doe'), (2, 'jane.doe')]
  safe:   []
```

The safe query returns no rows for the last two inputs because neither exact username exists. It does not strip quotes or detect an attack; it binds the entire input as one value. The database disappears when the connection closes.

SQLite's driver uses `?` placeholders here; SQLAlchemy's `text()` uses named placeholders such as `:username`. Use the conventions of the database library you are actually calling.

## Applying the lesson to SHIFT

The SHIFT source inspected for this discussion uses TypeScript and includes Drizzle. Apply parameter binding through that existing database layer rather than adding Python and SQLAlchemy solely for this protection. This lesson does not modify SHIFT or establish that every current database call has been audited.

For implementation reviews:

- Bind untrusted values in reads and writes. Do not concatenate or interpolate input into SQL, even inside `text()` or a raw-query helper.
- Use fixed or allowlisted table names, column names, and sort directions. Value placeholders generally cannot substitute SQL identifiers or keywords.
- Enforce user and organization authorization on the server. A safely parameterized query can still return another user's records if its access conditions are wrong.
- Grant the application's database account only the permissions it needs.
- Check normal input, quotes, SQL-looking strings, and unauthorized cross-user access. Each checks a different behavior.

## Validation and limits

The built-in SQLite demonstration was executed locally during preparation on October 22, 2026, and its output matched the example above. The SQLAlchemy snippet is an explanatory pattern checked against its documentation; it was not executed because SQLAlchemy was not installed in the preparation environment. No live application, portal, network, or production database was tested.

## References

- [SQLAlchemy: working with transactions and the DBAPI](https://docs.sqlalchemy.org/en/20/tutorial/dbapi_transactions.html) — textual SQL, bound parameters, and transactions.
- [Python sqlite3: using placeholders to bind values](https://docs.python.org/3/library/sqlite3.html#how-to-use-placeholders-to-bind-values-in-sql-queries) — built-in driver conventions.
- [OWASP SQL Injection Prevention Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html) — prepared statements, allowlists, and least privilege.
