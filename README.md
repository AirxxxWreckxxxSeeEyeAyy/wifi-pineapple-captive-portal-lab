# Wi-Fi Pineapple Captive Portal Lab

**Step-by-step setup for authorized assessments and education · v0.1.0-alpha.1**

An original, offline, retro search-style captive portal for learning how a Wi-Fi client joins an access point, reaches a locally hosted page, and requests portal authorization. This alpha contains a small HTML/PHP page and a documented owned-device exercise. It is a learning example, not a complete penetration-testing framework or a production guest Wi-Fi service.

**Intended solely for authorized commercial security assessment and educational purposes.** Obtain written scope and authorization before testing. A purpose label or hidden comment is not consent, legal clearance, or a substitute for reviewing applicable laws. The standard MIT license is in [LICENSE](LICENSE); the intended-use statement does not add a field-of-use restriction to that license.

## Alpha status

| Capability | Status |
|---|---|
| Local page served by a WiFi Pineapple Mark VII, firmware 2.1.3 | Observed in this lesson |
| Original retro layout and local practice interaction | Observed with operator browser controls |
| Owned iPhone joins the scoped lab AP | User reported success after correcting the client allow list |
| Owned iPhone opens the page manually | User reported success |
| Source watermark and fixed local authorization return URL | Added for this alpha; packaged revision needs device retest |
| Automatic captive-popup/redirection behavior | Not established |
| Successful authorization of this particular iPhone | Not independently established |
| Server-side event report / phone results panel | Planned beta; not shipped in this alpha |
| Branded login pages, credentials, interception, or jamming | Not included |

The existing page on the device predates this package's watermark and fixed-return-URL change. Do not describe those changes as deployed. No full vulnerability assessment, endpoint compromise, or internet access has been demonstrated.

## Contents

```text
portal/index.html                 Static browser preview
portal/index.php                  Evil Portal entry page
portal/MyPortal.php               Basic authorization callback class
docs/LESSON-REPORT.md              Sanitized observations and limitations
docs/ENGAGEMENT-GUIDANCE.md        Training practices and repository review
docs/PURPOSE-AND-SCOPE.md          Federal/Florida law and case references
docs/RECORDING-POLICY.md           Tutorial publication and redaction guidance
docs/BETA-ROADMAP.md               Unimplemented reporting work
CHANGELOG.md
LICENSE
```

## Prerequisites

- Your own WiFi Pineapple Mark VII and management access.
- A working Evil Portal module obtained through the device's module manager. This repository does not bundle that module or its `helper.php`.
- One owned test phone, one management computer, and an isolated test location.
- A written scope for client work covering people/devices, SSIDs, location, dates, methods, data handling, stop conditions, and contacts.

The lesson used firmware 2.1.3. Other firmware/module combinations and platforms have not been validated. The old Mk5 EvilPortal repository is not an installation guide for this Mark VII example.

## Step 1 — Establish the lab boundary

1. Connect the management computer to the Pineapple management network and open `http://172.16.42.1:1471/`.
2. Sign in privately. Never put the management password in this repository, screenshots, issue reports, or recordings.
3. For the offline exercise, disconnect router/client-mode uplinks and ensure the Mac's Internet Sharing is off. Check the current state rather than relying on a previous session.
4. Use the fictional SSID `Pine-Lab-Only`. Keep management access distinct from the test AP.

An offline network can still serve a local page. It does not provide internet access merely because the portal authorizes a client.

## Step 2 — Limit phone connections

1. In PineAP → Filtering, select a **Client Allow List** and enter only the current test phone's address for this network.
2. Prefer allowing the phone's per-network private address. If using its hardware address instead, turn Private Wi-Fi Address off **only for this lab network** and restore the preferred privacy setting after the exercise.
3. Use an **SSID Allow List** containing only the intended test SSID for this exercise.
4. Leave impersonate-all and pool advertising off. Disable unrelated WPA/enterprise impersonation networks and handshake capture.
5. Reopen the settings after saving and verify the loaded values. This device sometimes showed temporary default values while loading.

**Lesson finding:** the first join failed because the saved allow-list entry belonged to an earlier device address. Updating it to the address shown on the current phone resolved the user's join failure. Turning off a private address on a different SSID does not establish the setting for this SSID.

Do not fix a mismatch by broadly allowing nearby devices.

## Step 3 — Create a Basic portal

1. Open Modules → Evil Portal.
2. Create a new **Basic Portal** named `RetroLabAlpha` so you can preserve an earlier working example.
3. In its Work Bench, replace `index.php` with [portal/index.php](portal/index.php).
4. Replace `MyPortal.php` with [portal/MyPortal.php](portal/MyPortal.php), or retain a verified equivalent default Basic handler. Back up any existing customization first.
5. Keep the module-generated support files. Do not replace the Pineapple management web root.
6. Check that the fixed return URL in `index.php` matches your authorized local portal. The default is `http://172.16.42.1/`.
7. Save and reopen both edited files to verify persistence.

The source watermark is an HTML comment visible through View Source/developer tools. It takes no rendered page space and contains no secrets. It is an informational identifier, not cryptographic proof or a consent mechanism.

## Step 4 — Preview and start

1. Select the new portal in the library.
2. Start the web server and use Preview to verify the page. Start the captive-portal module for the authorization exercise.
3. Open `portal/index.html` locally if you only want the static layout. The HTML preview has no working Pineapple authorization callback.
4. Do not enable broad impersonation or advertise unrelated network names to make this page work.

Changing the active portal while clients are using it can interrupt the test. Use a scheduled lab window and a documented rollback.

## Step 5 — Connect the owned phone

1. Join `Pine-Lab-Only` in the phone's Wi-Fi settings.
2. If it says “Unable to join,” compare the phone's current per-network Wi-Fi address against the client allow list before investigating the webpage.
3. After joining, open **`http://172.16.42.1/`** manually in Safari. Use the local HTTP address for this isolated exercise.
4. Select **Try an example**, then **Retro Lab Search**. Expect “Practice complete. Nothing was sent or saved.”
5. Select **Continue to lab Wi-Fi** only when ready to exercise the module's default authorization flow.
6. Check the management module's allowed-client list and time-correlated notification for that test phone. A button click alone is not proof of authorization.

The practice search stays in the browser. The authorization form posts its fixed return destination to the local module. The module itself can keep operational logs and device information; this alpha does not claim that the entire Pineapple collects no data.

## Step 6 — Record an honest result

Use [docs/LESSON-REPORT.md](docs/LESSON-REPORT.md) as an example. Distinguish:

- A user statement from an operator-observed event.
- Manual page navigation from automatic captive redirection.
- A request to authorize from confirmed authorization.
- A local webpage demonstration from internet connectivity or a security compromise.

No passwords, authentication tokens, or personal details are needed. Do not publish screenshots or device identifiers as evidence without a privacy review. Reporting automation belongs to the beta roadmap and is not an alpha feature.

## Step 7 — End the lab

1. Disconnect the phone from the test SSID.
2. Stop the captive portal and web server in Evil Portal.
3. Disable test access points as appropriate without disrupting required management access.
4. Restore the phone's preferred privacy settings and normal network connection.
5. Retain only the sanitized report under the agreed retention rules.

## Troubleshooting

| Symptom | First check |
|---|---|
| Unable to join | Current per-network phone address, allow-list mode, intended SSID, and AP configuration |
| Joined, but page does not open | Phone has a local IP, web server is running, active portal is correct, URL uses HTTP |
| No automatic popup | Test that behavior separately; manually opening the local URL does not prove interception/redirect |
| Authorized but no internet | An isolated lab intentionally has no router uplink |
| UI shows empty/default values | Wait for loaded state; reopen before claiming a save succeeded |
| `php: command not found` in web shell | The device may serve PHP via another binary/service; that output is not a PHP syntax check |

## Legal and training references

See [purpose and scope](docs/PURPOSE-AND-SCOPE.md) and [engagement guidance](docs/ENGAGEMENT-GUIDANCE.md). References include NIST SP 800-115, federal computer-access/interception laws, Florida statutes, and Supreme Court decisions with their limitations. They are a planning aid, not legal clearance. No Westlaw/LexisNexis subscription or citator review was performed.

The code is original; no Google, Bing, hotel, or Starbucks template or branding is bundled. Third-party template licenses do not by themselves authorize brand impersonation or network testing.

## Contributing and beta

Contributions should document prerequisites, actual validation, limitations, and rollback. Do not include captured credentials, recordings, real target lists, or device identifiers. Review [CONTRIBUTING.md](CONTRIBUTING.md), [SECURITY.md](SECURITY.md), and [beta roadmap](docs/BETA-ROADMAP.md).
