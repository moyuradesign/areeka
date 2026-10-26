# Areeka CRM v1.3.6 — Follow-up Notifications & Staff Workload Dashboard

Baseline: **v1.3.5.1 deployed**. The v1.3.6 release is ready for isolated server QA, **not yet installed in production**.

## Release artifacts

- Guarded aaPanel ZIP: `Areeka-FollowUp-Notifications-Workload-aaPanel-v1.3.6.zip`
  SHA-256 `d8746c88a4681c8cca7fc0744e0b9b15c955477cb38078aebb17667c4e1d9a11`.
- Complete Laravel source ZIP: `Areeka-CRM-v0.0.1-FollowUp-Notifications-v1.3.6-Source.zip`
  SHA-256 `1a8755c9a33a9b6538b98a571be4f75611963793c32b622f2066d2150fd1309a`.

## Functions

- Personal notification inbox at `/{locale}/dashboard/follow-ups/notifications`, showing only live, open customer reminders assigned to the current staff user. Reminders qualify when overdue, due today, or due within three days.
- Notification bell in the admin header shows unread total for authorized staff. Mark-as-read appends a per-user, per-reminder, per-due-phase audit entry; no generated duplicate alert rows on repeated page views, idempotent under serialized customer-row writes. Completed reminders and deleted customers disappear automatically.
- Manager, admin, superadmin team workload dashboard at `/{locale}/dashboard/follow-ups/workload`; regular staff see only their own counts. Open, overdue, due today, upcoming (three days) and high-priority totals.
- Existing Follow-up Center receives shortcuts to notifications, workload and the high-priority filtered queue.
- Notification pagination: ten per page, Previous/Next, Go To. Filters: unread, read, all.
- The existing customer view permission and active staff checks are required. A read-only staff member may acknowledge their own alert but cannot complete the underlying follow-up.
- This is **on-demand in-app functionality**. No SMTP, SMS, push, cron, background delivery, or migration is included.

## QA and safe deployment

- Local package SHA, PHP syntax, source-contract, path safety, rollback simulation and baseline source hashes: **PASS**.
- Required isolated server QA: existing 49 PHPUnit tests + 12 new notification/privacy/workload tests = **61 minimum**, with SQLite `:memory:`.
- The guarded deployer enforces the known v1.3.5.1 source hashes, private backup and release-specific proof `/root/areeka-qa-130/followup-notifications-v136-qa-pass.json`.
- QA success marker: `AREEKA_V136_SQLITE_NOTIFICATIONS_QA=PASS`. Production confirmation token: `INSTALL_AREEKA_FOLLOWUP_NOTIFICATIONS_V136`.
- Server QA **pending**; production deploy **not performed**.

Run after SHA/internal file checks:
```sh
python3 -B tests/test_source.py
python3 -B tests/test_deploy.py
python3 -B scripts/manage.py --qa-run
python3 -B scripts/manage.py --check
```
Only after passing server QA:
```sh
python3 -B scripts/manage.py --deploy --confirm INSTALL_AREEKA_FOLLOWUP_NOTIFICATIONS_V136
python3 -B scripts/manage.py --check
```

GitHub currently has a partially synchronized Laravel tree. Use the complete versioned source ZIP as the release authority until full sync is validated.
