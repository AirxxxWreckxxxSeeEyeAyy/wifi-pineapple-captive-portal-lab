# Captive portal lab — scope, evidence, and consulting guidance

Prepared October 18, 2026. Jurisdiction supplied by user: United States, Florida.

## Current owned-device exercise

Target: one owned iPhone and the WiFi Pineapple Mark VII. SSID: Pine-Lab-Only. Page: original Retro Lab Search. The phone was initially rejected because its current Wi-Fi address differed from the earlier allow-list entry. Replacing the stale entry with the address shown in the new screenshot resolved the join problem, according to the user. The user then confirmed reaching the page. Automatic captive-portal redirection has not been independently demonstrated. Do not count a manually opened page as evidence of automatic redirection.

The previous practice search ran entirely in the browser and did not produce a server-side event report. Planned beta reporting must distinguish page reach, practice interaction, authorization request, and confirmed authorization. A request must never be labeled successful authorization until the module confirms it. Browser automation checks must be identified as operator tests, not iPhone observations.

## Florida deployment review

This is a planning aid, not a legal opinion or a finding that a particular deployment is lawful. No Westlaw or LexisNexis subscription research or citator review has been performed. Those services are legal research databases, not penetration-testing protocols. A Florida attorney should review the final scope, authorities, applicable cases, privacy/consent arrangements, recording, and use of third-party names/logos before client deployment.

- Obtain signed authority from someone entitled to authorize the test, naming the systems, devices or participants, SSIDs, locations, dates, permitted social-engineering methods, prohibited actions, stop conditions, and emergency contacts. Florida §815.06 covers specified acts performed without or beyond authorization: https://www.leg.state.fl.us/statutes/index.cfm?App_mode=Display_Statute&URL=0800-0899/0815/Sections/0815.06.html
- Treat interception and recording as a separate legal question. Florida §934.03 regulates interception and disclosure of wire, oral, and electronic communications; its subsection (2)(d) consent exception refers to prior consent from all parties. Applicability and other exceptions depend on facts. Network-owner approval should not be assumed to resolve employee, guest, bystander, or third-party-service communications: https://www.leg.state.fl.us/statutes/index.cfm?App_mode=Display_Statute&URL=0900-0999/0934/Sections/0934.03.html
- DOJ's federal good-faith research charging policy is not a blanket license to test and does not resolve Florida law, civil claims, privacy, contracts, or trademark issues: https://www.justice.gov/jm/jm-9-48000-computer-fraud
- A source-code license does not itself grant permission to impersonate a brand or authority over people or networks. Use original or client-approved designs, record no real passwords, authentication tokens, or unrelated browsing content, and define retention, access, deletion, and debrief procedures.

## Training and assessment practice

NIST SP 800-115 provides assessment planning, rules of engagement, execution, data handling, and reporting guidance. Appendix B includes a rules-of-engagement template: https://csrc.nist.gov/pubs/sp/800/115/final

Microsoft's Attack Simulation Training FAQ provides a useful data-minimization example: its credential-harvest simulation discards entered details and records the interaction rather than retaining credentials. Our exercise uses buttons and dummy search interactions without credential fields: https://learn.microsoft.com/en-us/defender-office-365/attack-simulation-training-faq

NCSC cautions that phishing simulations can undermine trust and that click counts alone are incomplete. Include reporting behavior, debriefing, and control improvements rather than using a click as proof someone is careless: https://www.ncsc.gov.uk/guidance/phishing

## Repository review

- https://github.com/kleo/evilportals — GPL-3.0 collection. README says tested on Nano MK VI only, so Mark VII compatibility is not established by that claim. Includes credential-collection designs; treat as reference material and review each file rather than installing wholesale.
- https://github.com/CodyTolene/Red-Portals — repository lists MIT licensing and Google/Starbucks examples. It documents forms submitting username/password query parameters. Those forms are unsuitable for this no-credential exercise without replacement. Preserve applicable notices and inspect per-file provenance before reuse.
- https://github.com/frozenjava/EvilPortal — old Mk5 module. Its own README redirects Nano/Tetra users elsewhere. It is not the appropriate module source for a Mark VII deployment.

Google and Starbucks examples were verified in Red-Portals. A Bing or hotel template was not verified in the reviewed portal lists. No branded template was copied or deployed in this task.

## Report interpretation

Report only the evidence actually collected, with UTC timestamps and a random run identifier. Keep operator verification separate from the phone's run. Do not infer internet connectivity, HTTPS interception, endpoint compromise, credential exposure, or employee susceptibility from this local page demonstration. A familiar page alone does not make a deployment authorized or lawful.
