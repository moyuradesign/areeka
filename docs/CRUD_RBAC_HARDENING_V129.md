# Areeka CRM v1.2.9 — CRUD Reliability & Role Boundaries

**Baseline:** Deployed v1.2.8.1. **Package:** `Areeka-CRUD-RBAC-Guard-aaPanel-v1.2.9.zip`.
**Package SHA-256:** `d202b8c3b3a7c217bafffafc66b537a22bf309bd26633cd7221ed08bed96c276`.

## Improvements
- Module CRUD routes now distinguish `view`, `create`, `update`, and `delete` permissions instead of sharing one module grant for all actions.
- Backwards compatibility: existing module grants remain fully functional until granular actions are configured. A sticky restricted marker is stored on first use, preventing a role from accidentally regaining full CRUD when the last granular action is unchecked. The base module permission is always required.
- UI hides unauthorized create/edit/delete actions; server-side controller enforcement remains authoritative.
- Dashboard/search/calendar/financial reports and CSV export respect view permissions. CSV import respects create permissions.
- User Manager enforces strict role hierarchy: except for super administrators, users with user-management permission can only manage and assign **strictly lower** roles. Mutations and audit events are in one DB transaction.
- Laravel feature test file exercises legacy permissions, read-only granular roles, create-only roles, peer-account denial, and customer isolation using in-memory SQLite configured in `phpunit.xml`.

## Guarded deployment
The aaPanel ZIP compares each changed source file with verified v1.2.8.1 hashes, verifies the real `storage/app/private/areeka-installed.lock`, preserves owners/modes, creates private backups, and refuses source drift or unexpected new files. No database migrations, role data changes, Laravel artisan execution, license changes, or frontend asset rebuilds.

## QA
Only the package/source contract, PHP syntax, simulated deployment, rollback prerequisites, and checksums have passed locally. Real Laravel feature tests and authenticated browser CRUD acceptance remain pending. Run integration tests in a separate SQLite test environment, never against live MySQL.

## Source-of-truth warning
This GitHub repository is still only partially populated. The accompanying `Areeka-CRM-v0.0.1-CRUD-RBAC-v1.2.9-Source.zip` contains the complete current source snapshot for the release, but without installed vendor packages or secrets.
