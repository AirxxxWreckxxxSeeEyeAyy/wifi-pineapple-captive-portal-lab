# Captive portal lesson report — alpha

Date: October 18, 2026. Classification: sanitized educational summary. Scope: owned WiFi Pineapple Mark VII, management computer, and one owned iPhone. This is not a full penetration-test report.

| Observation | Evidence and status |
|---|---|
| Local portal reachable from management browser | Operator observed Retro Lab Search at the local portal address |
| Local practice search works | Operator clicked the example/search controls and observed the expected confirmation |
| Initial phone join fails | User supplied screenshots showing “Unable to join” |
| Address mismatch identified | Current phone screenshot differed from the existing client allow-list entry; identifiers omitted here |
| Corrected entry persisted | Operator removed the stale entry, added the current address, and verified it after reload |
| Phone joins after correction | User reported “it worked” |
| Phone reaches page manually | User reported “I'm on the page” |
| Automatic captive redirection | Not established |
| This phone's authorization succeeds | Not independently verified; earlier generic dashboard notifications are not sufficient attribution |
| Passwords or account compromise demonstrated | No |
| Source watermark and fixed return URL deployed | No; these alpha package changes need device retest |
| Automated reporting deployed | No; deferred to beta |

## Finding

The concrete failure observed was an allow-list/device-address mismatch. This demonstrates the operational importance of matching the current per-network device identity. It does not establish a vulnerability in the iPhone, the router, or a third-party service.

## Limits

No packet capture, HTTPS interception, stolen credentials, endpoint compromise, comprehensive network assessment, employee susceptibility test, or independently verified automatic captive popup is established by this lesson. Client and module configuration can change between sessions; restart from a current-state check.

## Next validation

Retest the packaged alpha on a separate Basic portal, confirm default authorization for the owned phone, then add and verify beta events without recording search text or credentials. Keep operator verification separate from phone observations. Do not invent timestamps or mark unobserved stages passed.
