# Areeka CRM v1.3.8 — Appearance > Home Premium Page Builder

Based on the successfully deployed v1.3.7 code baseline. **This is a source and guarded-package handoff; production deployment and isolated Laravel QA are not yet performed.**

## Artifacts
- Guarded aaPanel ZIP: `Areeka-Home-Appearance-Builder-aaPanel-v1.3.8.zip`
  SHA256: `bb21f299d9983cc8419e1a2fd747ac95728114637956168861341441681f6a4f`
- Complete source: `Areeka-CRM-v0.0.1-HomeBuilder-v1.3.8-Source.zip`
  SHA256: `401fa46a2a7982bc8034d99a0805e6f9f3fbb7039d85a7b09b6d859477f47f92`

## Features
Replaces only Appearance → Home with premium page-building UI. Preserves the existing hero title/subtitle/CTA in `appearance.home` (no migration).

- Hero eyebrow, headline, description, primary and secondary CTA labels and *restricted internal* destinations (signup/signin/projects/contact); split vs. centered layout; optional MIME-validated JPG/PNG/WEBP hero image up to 3 MB.
- Fixed section components (features, published featured projects, closing CTA) can be enabled/disabled and reordered. Four editable feature cards. Up to three explicitly published projects; unpublished/deleted projects cannot render publicly.
- SEO title, meta description, optional social preview image; escaped text in public meta and page output.
- In-browser unsaved draft preview with desktop/mobile switch. It is a **visual approximation**, and the "View live website" link opens exact saved rendering.
- New uploads go under `public/uploads/areeka/home/`. They are user data and require ongoing media backup independent of the guarded source rollback.
- Existing other Appearance pages, CRM modules, follow-up automation, scheduler, SMTP untouched.

## Rollout safety
Local PHP, JS syntax, source integrity, drift and symlink denial, atomic update / rollback simulation: **PASS**.
Run isolated SQLite :memory: QA with eight prior suites (74 tests) and new CrmHomeAppearanceTest (11 tests): **85 tests required** before deploy.
Release bound QA proof: `/root/areeka-qa-130/home-appearance-v138-qa-pass.json`.
Deploy confirmation: `INSTALL_AREEKA_HOME_BUILDER_V138`.

Upload ZIP to /root, verify SHA and SHA256SUMS, then:
```sh
python3 -B tests/test_source.py
python3 -B tests/test_deploy.py
python3 -B scripts/manage.py --qa-run
python3 -B scripts/manage.py --check
```
After `AREEKA_V138_SQLITE_HOME_APPEARANCE_QA=PASS`, deploy:
```sh
python3 -B scripts/manage.py --deploy --confirm INSTALL_AREEKA_HOME_BUILDER_V138
python3 -B scripts/manage.py --check
```

The main GitHub source tree remains only partially synchronized; the full source ZIP is the authoritative release source until repository reconciliation.
