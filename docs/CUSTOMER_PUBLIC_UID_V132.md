# Areeka CRM v1.3.2 — Eight-digit public UID, customer table and anchored row actions

Release package: `Areeka-Customer-PublicUID-Table-Menu-aaPanel-v1.3.2.zip`
SHA-256: `16a94da8fad205839010b8feaee5e58749c7f1ad699b98125534a9b1ef28c262`

Complete Laravel source: `Areeka-CRM-v0.0.1-Customer-PublicUID-v1.3.2-Source.zip`
SHA-256: `0adf237efa28a459c052eea274a2a704f6116879f7bd7ad29e9133997c905ce4`

- Genuine random 8-digit public UID in `users.public_uid` and `areeka_records.public_uid`, DB-enforced unique per table and checked across tables in allocator. UID is not an authentication token. Internal numeric PK and foreign keys remain untouched.
- Public user profile `/{locale}/u/{uid}` shows active user's name and UID only; no email. Admin user manager URLs use UID; My Profile and User Manager display profile UID.
- Customers table columns: No, UID, Full Name, Email, Customer, Owner, Updated, Status, Actions. The displayed UID is a **CRM customer record UID**, not a linked login user's UID.
- Reusable 10-row admin pagination with page links/Go To retained. Light/dark responsive CSS.
- Three-dot menus are portaled under `document.body`, anchored to the trigger and collision-aware on viewport edges, while preserving CSRF/confirm actions.
- New DB migration adds/backfills the columns, including soft-deleted CRM records; forward-only migration. Run it **only after a verified full production DB backup**.
- Guarded aaPanel deploy stages schema helper and migration, explicitly migrates after verifying root-owned private SQL backup, then applies the app code only after schema verification and isolated QA proof.
- QA: original 9 workflow tests, 7 integration tests, and 6 new UID/customer UI tests = 22 tests required for proof. Local syntax, source integrity, JavaScript syntax, rollback/drift/symlink simulations passed. **Actual server Laravel feature tests, DB migration and production deployment pending.**

See the shipped `README.md` for command sequence. GitHub remains partially synchronized; use the complete source archive as the release artifact until a full-source import is completed.
