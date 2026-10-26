# Areeka CRM v1.3.3.1 — Customer Workspace HTML Entity QA Correction

Previous `v1.3.3` isolated server QA: 28/29 passed. `CrmCustomerWorkspaceTest::test_customer_uid_route_has_contact_details_owner_and_linked_account` failed because the view contained a raw literal `<h2>Account & owner</h2>` while Laravel's `assertSee('Account & owner')` expects the entity-encoded `Account &amp; owner`. The server rendered the page successfully (HTTP 200). The former production deployment was correctly denied, with missing release-bound QA proof.

## Corrected release

- aaPanel ZIP `Areeka-Customer-Detail-Workspace-aaPanel-v1.3.3.1.zip`, SHA-256 `86f99083687d3d999dc715cb31f686b64aa64d552c2dadb462b57091c76b474b`
- Complete source ZIP `Areeka-CRM-v0.0.1-Customer-Detail-v1.3.3.1-Source.zip`, SHA-256 `3c11db275ecbe7e4d7d47e9e534e91c0a7faa82df9abbf3d905c383241bd73e0`

Only functional source change from v1.3.3: the heading is now encoded `Account &amp; owner` in `resources/views/records/customer-workspace.blade.php`. The PHPUnit expectation remains unchanged. Package proof/version and safety checks are independently bound to v1.3.3.1; known intermediate v1.3.3 exact hashes are accepted during isolated QA, as well as the exact v1.3.2 production baseline. Unrecognized hashes and symlinks remain blocked. No database migration.

Local PHP syntax, 8-file source contract, path-safety and rollback deployment simulation pass. **Server SQLite PHPUnit 29-test QA and production deployment still pending.**

## aaPanel commands after uploading the ZIP into /root

```sh
cd /root/Areeka-Customer-Detail-Workspace-aaPanel-v1.3.3.1
sha256sum -c SHA256SUMS.txt
python3 -B tests/test_source.py
python3 -B tests/test_deploy.py
python3 -B scripts/manage.py --qa-run
python3 -B scripts/manage.py --check
```

Only after `AREEKA_V1331_SQLITE_CUSTOMER_WORKSPACE_QA=PASS`, run:

```sh
python3 -B scripts/manage.py --deploy --confirm INSTALL_AREEKA_CUSTOMER_WORKSPACE_V1331
python3 -B scripts/manage.py --check
```

Release-bound QA proof: `/root/areeka-qa-130/customer-workspace-v1331-qa-pass.json`. Keep the live DB backup and rollback backups. GitHub full source tree is not yet synchronized; the source ZIP is the full release artifact.