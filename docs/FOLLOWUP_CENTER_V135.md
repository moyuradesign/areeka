# Areeka CRM v1.3.5 — Follow-up Center & Customer Engagement Dashboard

**Baseline:** Areeka v1.3.4, with customer communication and follow-up activities.

**Release archives**
- Guarded aaPanel ZIP: `Areeka-FollowUp-Center-Engagement-aaPanel-v1.3.5.zip`
  SHA-256: `8bbdb696ed150d453a6595d782e19d35f41c82f9181d1ed78ba2118c65496b58`
- Complete source ZIP: `Areeka-CRM-v0.0.1-FollowUp-Center-v1.3.5-Source.zip`
  SHA-256: `b45d76cd11ad098b2062f79a594f12114a2f9e351d103872ad52ca9aed3f00a2`

## Scope
A permission-controlled staff dashboard at `/{locale}/dashboard/follow-ups` provides overdue, due-today, upcoming, and completed counts; status/priority/assignee/customer-name/customer UID/subject filtering; 10 rows per page with numbered pagination and Go To; links to exact customer workspaces; row-level manual completion via the existing customer-specific, transaction-safe audit-event action.

Customer workspace follow-up creation now supports `priority` (low/normal/high) and `assignee_id` of an existing active staff user. Legacy scheduled events without these fields default to normal priority and the original event actor. The scheduler rejects non-staff or inactive assignees.

All customer details respect existing eight-digit UID relationships and `customers.view`/`customers.update` permissions; soft-deleted customer records are excluded. No migration and no changes to preexisting customer data. No background delivery, outbound email, SMS or push alerts; due-date categories are evaluated at page load.

## QA and deployment safety
- Local source checksum, PHP lint, SQLite JSON matching contract and guarded deployment simulation: **PASS**.
- **Server Laravel QA is pending**: five existing suites (38 tests) plus `CrmFollowUpCenterTest` (11), total **49 required**.
- Production deploy is blocked without new `/root/areeka-qa-130/followup-center-v135-qa-pass.json` proof.
- File-only guarded deployment validates known v1.3.4 hashes, installation lock, release proof, rollback backup, and path safety.
- No database migrations, Composer installs or production data writes at deploy time.

## aaPanel sequence
Upload the aaPanel ZIP to `/root`; verify archive SHA and internal `SHA256SUMS.txt`, then:
```bash
python3 -B tests/test_source.py
python3 -B tests/test_deploy.py
python3 -B scripts/manage.py --qa-run
python3 -B scripts/manage.py --check
```
Only after `AREEKA_V135_SQLITE_FOLLOWUP_CENTER_QA=PASS`, deploy:
```bash
python3 -B scripts/manage.py --deploy --confirm INSTALL_AREEKA_FOLLOWUP_CENTER_V135
python3 -B scripts/manage.py --check
```

**Status:** archives verified and local tests passing; real 49-test isolated Laravel run and production install not yet performed. Full source synchronization into GitHub remains separate; the source ZIP is the full release artifact.
