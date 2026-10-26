# Areeka Dashboard Collapsible Sidebar and Centered Search v1.2.7

Changes implemented in the versioned source ZIP and guarded aaPanel patch:

- Desktop sidebar toggle switches between full (248px) navigation and a compact (72px) icon rail. Active navigation stays highlighted; menu labels appear on mouse hover and keyboard focus.
- Browser-local preference persisted under `areeka-admin-sidebar-mode`. Existing mobile drawer remains independent.
- Topbar search sits in a centered responsive header slot, retaining the existing Laravel `dashboard.search` form action and keyboard shortcuts.
- Search receives polished focus/border styles. On small screens it occupies a second header row rather than disappearing.
- Two sidebar-state SVG icons were added to the existing `ui-icon` Blade component.

The verified distribution is **Areeka-Dashboard-Collapse-Centered-Search-aaPanel-v1.2.7.zip**. Preflight checks compare the known v1.2.6 source SHA-256 values and refuse unexpected changes. Deployment updates two Blade files, source CSS, a fingerprinted compiled CSS asset, and `public/build/manifest.json`. Laravel license, database, installer, PHP-FPM, Nginx and compiled JS are not modified.

The complete updated Laravel source is supplied as **Areeka-CRM-v0.0.1-Dashboard-Collapse-Search-v1.2.7-Source.zip**. This repository is still *partially synchronized* and should not be treated as the authoritative full installation source until a verified repository import is completed.

## Deployment

Upload the ZIP to `/root`, verify its package SHA-256 (supplied with the download) and internal `SHA256SUMS.txt`, run the contract/deploy tests, then:

```bash
python3 -B scripts/deploy.py --check
python3 -B scripts/deploy.py --deploy --confirm INSTALL_AREEKA_SIDEBAR_SEARCH_V127
python3 -B scripts/deploy.py --check
```

Do not force deployment on `BLOCKED_SOURCE_DRIFT`.
