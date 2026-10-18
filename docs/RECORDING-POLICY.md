# Recording and tutorial publication

Publish source and the written walkthrough first. A short edited demo can follow after review; raw Record & Replay events are not a tutorial artifact and must remain private.

Review every frame, audio track, caption, and thumbnail for passwords, account identifiers, emails, device names, MAC/IP addresses, nearby SSIDs, notifications, management terminals, command history, tokens, QR codes, and private files. Prefer a staged demo with dummy labels and dedicated devices. An HTML comment or educational label does not grant permission to publish someone's information.

For redaction, use an opaque overlay or recreated screen where possible. Check the exported video at normal speed and frame by frame around transitions; masking the player view does not remove data from the exported file. Consider removing unnecessary audio. Keep original recordings outside the repository and check relevant consent requirements before recording or sharing.

Obtain the required participant/client publication permission. Do not upload device backups, raw event streams, unreviewed logs, or screen recordings to issues, releases, or Git history. Adding a file to `.gitignore` does not remove it from prior commits.

No recording has been included in this alpha. Record & Replay's stop request returned `isRecording: false`; that does not establish the state of an unrelated macOS screen recorder.
