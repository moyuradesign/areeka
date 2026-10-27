# Areeka v1.3.8.1 — Appearance Home Builder CSS Hotfix

The v1.3.8 admin Home Appearance Builder was rendered essentially without page-specific styling in user browser screenshots (fields and labels overlapping, sections flattened, editor preview plain text). Inspection confirms original `areeka-home-builder-v138.css` parses correctly (120 CSS rules), but the authenticated server's live CSS HTTP response was inaccessible; the underlying cause of the missed stylesheet remains unverified.

## Release files

- aaPanel patch: `Areeka-Home-Appearance-Styles-Hotfix-aaPanel-v1.3.8.1.zip` SHA256 `18d822e15235f85da17ee68dbccefb280dfbf459f6018cca7e234115372574a8`.
- Complete source: `Areeka-CRM-v0.0.1-HomeBuilder-v1.3.8.1-Source.zip` SHA256 `f3f421b2b04d5fe6f3f11cd3520bd0dd295ac3278e539efbddf71017514edc94`.

## Technical changes

Targets are scoped to:
- `resources/views/layouts/app.blade.php`: retain versioned external Home Builder CSS, add admin-route-scoped trusted inline CSS fallback under `<head>`.
- `resources/views/settings/home-builder-critical.blade.php`: exact unchanged v1.3.8 CSS in Blade `@verbatim` block, no dynamic user HTML.
- `tests/Feature/CrmHomeAppearanceStylesTest.php`: render-level test of CSS in the head, negative test for public-home leakage.

No database migration, upload rewrite, SMTP setting, or other CRM feature change.

## QA and deployment

Local PHP lint, CSS syntax parsing, SHA-256 integrity, known-source drift and symlink blocking, simulated guarded atomic file deployment: PASS. Real isolated Laravel QA: **pending**, requires 87 tests (previous 85 + 2 stylesheet tests), marker `AREEKA_V1381_SQLITE_HOME_STYLE_QA=PASS` and proof `/root/areeka-qa-130/home-appearance-style-v1381-qa-pass.json`.

On server, verify ZIP SHA and `SHA256SUMS.txt`, then run:

```bash
python3 -B tests/test_source.py
python3 -B tests/test_deploy.py
python3 -B scripts/manage.py --qa-run
python3 -B scripts/manage.py --check
```

Only if QA passes:
```bash
python3 -B scripts/manage.py --deploy --confirm INSTALL_AREEKA_HOME_STYLE_FIX_V1381
python3 -B scripts/manage.py --check
```

The patch enforces deployed v1.3.8 layout source hash, release-bound QA proof, protected install lock, private rollback backup, and exact target hashes. Keep original v1.3.8 application backup and the new patch rollback until browser confirmation. Check editor styling and public homepage after a forced reload.

**GitHub complete Laravel source tree remains only partially synchronized; use the versioned source ZIP for full source release.**