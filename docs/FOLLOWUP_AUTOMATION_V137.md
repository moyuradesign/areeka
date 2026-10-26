# Areeka CRM v1.3.7 — Follow-up Automation & Notification Preferences

Prepared on 2026-10-26 from verified live v1.3.6 source.

- Guarded aaPanel package: `Areeka-FollowUp-Automation-Preferences-aaPanel-v1.3.7.zip`
  SHA-256: `f25a90f04386403b00f2c529fea6be524b2d15312a5182dcca7ad42b918d47bf`
- Complete source: `Areeka-CRM-v0.0.1-FollowUp-Automation-v1.3.7-Source.zip`
  SHA-256: `253a9732300e5f1a81bdd0f31dc03bbe92151bd39bf12386a2baba2544f9dc52`

## New functions

- Self-managed notification preferences at `/en/dashboard/follow-ups/preferences`: email opt-in, in-app opt-in, advance notice at 0/1/3/7/14 days, due today and overdue switches.
- Scheduler hook for guarded Artisan command `areeka:followups:process` every five minutes; disabled at runtime unless the operator explicitly sets `AREEKA_FOLLOWUP_AUTOMATION_ENABLED=true` **after** SMTP and cron acceptance.
- Dedicated migration creates `areeka_followup_preferences`, `areeka_followup_deliveries`, and `areeka_followup_runs`.
- DB-unique delivery keys on (follow_up_id, recipient_id, phase, channel); row-locked claim tokens, 15-minute stale lease, up to four attempts with 5/30/120/720 minute backoff, staff permission/active customer/completed reminder revalidation, scan cursor, and manager-only execution logs with 10-row pagination at `/en/dashboard/follow-ups/automation-runs`.
- SMTP delivery is at-least-once on crash recovery; queue uniqueness prevents normal duplicate alerts, but exactly-once message acceptance by an external SMTP server cannot be guaranteed after mid-send crashes.
- No email is sent with Laravel's `log` or `array` mail transports. Email content includes a link requiring authenticated CRM access. The application code never modifies SMTP secrets.

## Rollout status and safety

Local package integrity, source/PHP syntax, rollback and path-drift contract checks: **PASS**.

**Not yet performed:** 74 isolated Laravel feature tests (61 previously passing + 13 new), staging/migrating the live schema, deploying the live app files, enabling cron email delivery or testing authenticated live browser functionality.

Steps and commands are in the package README.

1. Run isolated `python3 -B scripts/manage.py --qa-run`; required marker `AREEKA_V137_SQLITE_AUTOMATION_QA=PASS`.
2. Stage migration only with `--stage-schema --confirm STAGE_AREEKA_FOLLOWUP_SCHEMA_V137`.
3. Run shipped `scripts/create-backup.sh` and `scripts/verify-restore.sh` to create a fresh private SQL archive, restore into a disposable database and create a hash-bound root-only proof.
4. Run `--migrate-schema --backup /root/areeka-v137-full-backup.sql.gz --confirm MIGRATE_AREEKA_FOLLOWUP_SCHEMA_V137`; verify schema.
5. Deploy the app with `--deploy --confirm INSTALL_AREEKA_FOLLOWUP_AUTOMATION_V137`, check hashes again.
6. Separately confirm real SMTP delivery, schedule cron availability, then opt-in and enable service with operational approval.

The GitHub Laravel source tree remains only partially synchronized; use the versioned full source ZIP as the application source of truth until full repository synchronization is finished.
