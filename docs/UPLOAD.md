# Publish the alpha on GitHub

Suggested repository name: `wifi-pineapple-captive-portal-lab`.

Suggested description: `Step-by-step captive portal lab for WiFi Pineapple Mark VII, for authorized assessments and education. Alpha example with documented validation limits.`

1. Read the README's alpha-status table. This package has no beta event-report feature.
2. Confirm the folder contains only the listed source/documents and no recordings, credentials, client identifiers, raw logs, or private evidence.
3. Sign in to the intended GitHub account and create an empty repository. Choose the intended visibility; public is appropriate only after the content review. Do not upload the ZIP as the only source file.
4. Upload the contents of this project folder so `README.md` is at the repository root. Preserve `portal/` and `docs/` directories.
5. Use the commit message `Add v0.1.0-alpha.1 captive portal lab`.
6. Verify the rendered README, relative links, source watermark, LICENSE, and alpha-status table online.
7. Optionally create a prerelease tag `v0.1.0-alpha.1`; label it explicitly as an alpha. Do not describe untested code as production ready.
8. Review the completed repository for accidental private files. Do not invite contributors or notify anyone unless intended.

A ZIP bundle is a backup/convenience download; GitHub's browser source upload expects the extracted files. Keep the local reporting prototype and unreviewed recordings outside the public repository.

## Local Git initialization

The delivered folder can be used directly as a Git working tree. If it has no `.git` directory, initialize a local repository with your preferred tool, choose `main`, and commit the reviewed files. Use your own configured GitHub identity; no account identity or remote URL is hardcoded here. Upload/push only after choosing the actual destination account and repository.
