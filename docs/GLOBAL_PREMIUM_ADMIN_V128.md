# Areeka CRM Global Premium Admin UI v1.2.8

**Target:** Areeka CRM v0.0.1 running Dashboard UI v1.2.7.

This release introduces a reusable admin UI system:

- Compact, premium buttons and input/focus styling scoped to admin.
- Improved management tables with consistent headers, row density and hover.
- Per-record three-dot row dropdown for edit/delete, with accessible labels.
- A native modal confirmation dialog for existing destructive forms, retaining CSRF and Laravel routes. The legacy browser confirmation remains the fallback in browsers without the dialog API.
- A reusable, responsive pagination component with existing controller pagination (10 rows), nearby page links, Prev/Next and Go To, preserving supported query-string filters.
- Improved empty records states, SVG icons, responsive behavior, and light/dark theme support.

**Updated scopes:** shared records index/forms, users, media, activity logs, reports, admin search, shared layout/icons/CSS, and two reusable components.

**Explicitly preserved:** license, installer, .env, storage, database, roles/permissions, routes, controllers, Nginx, PHP-FPM, compiled JavaScript.

The **Areeka-Global-Premium-Admin-aaPanel-v1.2.8.zip** contains a checksum-verified guarded deployer (private backup and rollback; exact source-hash comparison against v1.2.7). The **Areeka-CRM-v0.0.1-Global-Premium-Admin-v1.2.8-Source.zip** contains the complete updated Laravel source.

```sh
sha256sum -c SHA256SUMS.txt
python3 -B tests/test_source.py
python3 -B tests/test_deploy.py
python3 -B scripts/deploy.py --check
python3 -B scripts/deploy.py --deploy --confirm INSTALL_AREEKA_PREMIUM_ADMIN_UI_V128
python3 -B scripts/deploy.py --check
```

Do not deploy when `BLOCKED_SOURCE_DRIFT` appears. Ensure the installed.lock file exists. Test populated record menus, confirmation Cancel/Confirm, filter persistence, and pagination before customer release.

**GitHub scope:** This repository is not yet a complete synchronized Laravel source. The full source ZIP is the release artifact for v1.2.8; additional source paths should only be synchronized after verifying the repository state.
