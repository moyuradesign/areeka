# Areeka CRM v1.3.4 — Customer Activity & Relationship Management

Baseline: verified v1.3.3.1 production.

## Artifacts
- aaPanel patch `Areeka-Customer-Relationship-Activity-aaPanel-v1.3.4.zip` — SHA-256 `91176e735f2d98ee771b3b5f8247e899e01556dae9bdd95bc8a8181e3582a18f`.
- Full source `Areeka-CRM-v0.0.1-Customer-Relationship-v1.3.4-Source.zip` — SHA-256 `2d07e6db4379b27737024c79421e5304c04f79da289a1d0458db761a6068d1ba`.

## Functional scope
- Customer workspace manually logs call/email/meeting/message/other correspondence and internal notes, with subjects, text and optional contact date.
- Follow-ups are scheduled with subject, optional notes and due date; completion appends an audit event, and repeat completion is idempotent.
- Relationship history is scoped to the **exact CRM customer record UID**, not inferred from a shared login account.
- Existing customer/project/task/quote audit log remains visible according to module view permissions.
- Quick-create Project links prefill the CRM customer record. Quick-create Task and Quote require selecting an explicitly linked project, which prepopulates the new record form. POST retains the v1.3.1 server-side validation.
- All writes require `customers.update` and staff authorization; view-only staff can see permitted history but cannot write.
- **No actual outgoing messages, external notifications or automatic reminders.** All items are staff-entered CRM log events.
- Existing `areeka_activity_logs` append-only JSON details are used: **no database migration or rewrite**.

## Safeguards and rollout
1. Verify the ZIP checksum and internal `SHA256SUMS.txt`.
2. Run `python3 -B tests/test_source.py`, `python3 -B tests/test_deploy.py`.
3. Run `python3 -B scripts/manage.py --qa-run` in the isolated `/root/areeka-qa-130/Areeka-CRM-v0.0.1` workspace with SQLite `:memory:`. The runner requires all original 29 tests and nine new relationship tests (38 total minimum) to pass before writing a release-specific proof.
4. Run `python3 -B scripts/manage.py --check` for read-only production preflight.
5. Only after `AREEKA_V134_SQLITE_CUSTOMER_RELATIONSHIPS_QA=PASS`, deploy with `python3 -B scripts/manage.py --deploy --confirm INSTALL_AREEKA_CUSTOMER_RELATIONSHIPS_V134` and post-deploy `--check`.

The deployer enforces expected v1.3.3.1 source hashes, real installation lock, path safety, private rollback backup, and release-specific isolated QA proof. It does not migrate production data.

**Current state: packages and offline tests verified, server Laravel QA and production deployment pending.** GitHub code tree remains partially synchronized; the full source ZIP is the release authority.
