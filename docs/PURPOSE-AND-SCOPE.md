# Authorized commercial security assessment and educational use only

This package is intended solely for authorized commercial security assessment and educational purposes. It grants no permission to access systems, intercept communications, collect credentials, impersonate third parties, or interfere with radio communications. Written authority and a reviewed scope must exist before deployment. No claim of legal compliance, attorney approval, or Westlaw/LexisNexis citator validation is made.

## Federal statutes to review against the actual scope

- **18 U.S.C. §1030 (CFAA):** unauthorized access, exceeding authorized access, and specified damage-related conduct. Define exactly which systems and activities the client may authorize. [Official code](https://uscode.house.gov/view.xhtml?req=granuleid:USC-prelim-title18-section1030&num=0&edition=prelim).
- **18 U.S.C. §2511 (Wiretap Act):** interception, use, and disclosure of communications and its fact-specific exceptions. Federal consent provisions do not displace stricter applicable state law. [Official code](https://uscode.house.gov/us/usc/119-118/t18/s2511/).
- **18 U.S.C. §2701 (Stored Communications Act):** unauthorized access to covered communications in electronic storage; do not treat permission to operate a client network as permission to access third-party accounts. [Official code](https://uscode.house.gov/us/usc/119-118/t18/s2701/).
- **47 U.S.C. §333:** willful or malicious interference with covered radio communications. This project does not require jamming or forced disconnection. [Statutory text](https://www.law.cornell.edu/uscode/text/47/333).

This is an issue list, not an exhaustive statement of applicable laws. Florida §§815.06 and 934.03, contracts, privacy duties, trademark rights, recording consent, and other state/federal provisions may also matter. See ENGAGEMENT-GUIDANCE.md.

## Supreme Court decisions and their limits

- **Van Buren v. United States, 593 U.S. 374 (2021)** is statutory CFAA interpretation, not a constitutional penetration-testing exemption. It addresses obtaining information from computer areas a person is entitled to access despite an improper purpose; it does not authorize entry into restricted systems. [Opinion](https://www.law.cornell.edu/supremecourt/text/19-783).
- **United States v. Jacobsen, 466 U.S. 109 (1984)** explains that the Fourth Amendment governs government action, including a private party acting as a government agent, rather than purely private conduct. This does not make private interception or access lawful under other laws. [Official U.S. Reports opinion](https://www.govinfo.gov/content/pkg/USREPORTS-466/pdf/USREPORTS-466-109.pdf).
- **Carpenter v. United States, 585 U.S. 296 (2018)** concerns governmental acquisition of historical cell-site location records. It illustrates digital privacy limits in government investigations; it does not grant a private consultant authority to monitor Wi-Fi users. [Court opinion](https://www.supremecourt.gov/opinions/17pdf/16-402_h315.pdf).

Before a real engagement, Florida counsel should verify current treatment and relevant Eleventh Circuit/Florida authority using appropriate citators, and review consent, scope, participant/bystander exposure, and retention. Constitutional decisions alone do not establish private commercial test legality.

## Source watermark

The HTML comment below is intended to remain visible in View Source and developer tools while taking no visible space on the rendered page. It is an informational marker, not cryptographic proof, an access control, or legal consent. Do not put a secret, customer identity, or personal information in it.

```html
<!-- SECURITY-SIMULATION | artifact: CAPTIVE-LAB-0.1.0-alpha.1
Purpose: authorized commercial security assessment and educational use only.
Requires written scope and authorization. No real credentials collected.
This marker does not establish consent or legal compliance. -->
```

Use a nonsecret engagement identifier in place of the generic artifact ID when authorized. Keep the corresponding signed scope and version manifest on the operator side. Do not represent a self-written comment as a trusted vendor signature.
