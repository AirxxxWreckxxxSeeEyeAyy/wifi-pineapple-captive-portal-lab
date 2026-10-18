# Beta roadmap — not alpha functionality

- [ ] Retest the packaged watermark and fixed-return-URL change on Mark VII.
- [ ] Verify the installed PHP runtime and exact Evil Portal version/callback behavior.
- [ ] Add separate page-reached, practice-completed, authorization-requested, and server-confirmed authorization events.
- [ ] Show truthful pending/failed states; never treat submission as confirmed authorization.
- [ ] Give the phone a results panel and a per-run JSON/CSV report.
- [ ] Store event names and timestamps only under a random run identifier, outside the public web root.
- [ ] Verify request validation, file permissions, retention, export access, and storage failures.
- [ ] Test operator and owned-phone runs separately; verify no search text, credentials, MAC addresses, or IP addresses appear in the custom report.
- [ ] Demonstrate automatic captive redirection separately from manual page access.
- [ ] Review applicable scope, consent, laws, and brand rights for any client-specific design.
- [ ] Add a short, edited and reviewed demonstration video if useful.

A reporting prototype exists in the operator's local working folder, outside this alpha package. It has not been deployed, linted against the installed runtime, or verified. It is not a supported beta release.
