# Areeka CRM v1.3.5.1 — Follow-up Center QA packaging repair

The initial v1.3.5 aaPanel release was blocked during isolated QA: `BLOCKED_MISSING_FILE: .../src/tests/Feature/CrmCustomerRelationshipTest.php`. The production deployment was then correctly rejected because `followup-center-v135-qa-pass.json` did not exist. **No production application files were changed.**

The complete v1.3.5 source already included the omitted v1.3.4 regression test, SHA-256 `df85bfbf2959c88ce8f49728a0b953a08c8c93c7425d4a77fc414daebe4143f3`.

## Corrected release
- `Areeka-FollowUp-Center-Engagement-aaPanel-v1.3.5.1.zip`, SHA-256 `6691d58b5e8be0da8e7dbfd3d12d8512e97d5671f90e6eec47cfecdce158d2c8`.
- The full Laravel application payload and target file hashes are **unchanged** from v1.3.5; existing complete source ZIP SHA-256 `b45d76cd11ad098b2062f79a594f12114a2f9e351d103872ad52ca9aed3f00a2` remains valid.
- Adds the regression file into the aaPanel package and integrity-checks it. Restores to the isolated QA workspace only if absent; rejects unexpected drift. It is *not* a production deployment target.
- Binds new QA proof `/root/areeka-qa-130/followup-center-v1351-qa-pass.json` to release version `1.3.5.1` and requires all six isolated suites: 49 tests minimum.
- Local PHP syntax, source hashes and guarded deployment simulations: **PASS**. Server PHPUnit QA and production install: **PENDING**.

## aaPanel workflow
Verify outer ZIP SHA and internal `SHA256SUMS.txt`. Run `python3 -B tests/test_source.py`, `python3 -B tests/test_deploy.py`, `python3 -B scripts/manage.py --qa-run`, `python3 -B scripts/manage.py --check`. Do not deploy unless `AREEKA_V1351_SQLITE_FOLLOWUP_CENTER_QA=PASS` appears.

Only after passing, execute `python3 -B scripts/manage.py --deploy --confirm INSTALL_AREEKA_FOLLOWUP_CENTER_V1351` followed by `--check`.

The release is migration-free, uses known baseline checksums and a private production rollback backup.