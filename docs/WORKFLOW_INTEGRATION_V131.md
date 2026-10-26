# Areeka CRM v1.3.1 — CRM Workflow Integration

Baseline: v1.3.0.1 with the shared record-list Blade fix.

## Release files

- aaPanel patch: `Areeka-Workflow-Integration-aaPanel-v1.3.1.zip`
  - SHA-256: `97f5e68c9929e6814b04d0ee2ee96e678fd0a0826c26ceede1ace0d535a890a8`
- Complete source: `Areeka-CRM-v0.0.1-Workflow-Integration-v1.3.1-Source.zip`
  - SHA-256: `5b3c672b0748fdf00290e44ee31a9f9609dce9d2472202ec65f4c664d4e18fa1`

## Functional changes

1. Projects link to Customers-module CRM customer records using `areeka_records.data.customer_record_id`.
2. Tasks and Quotes link to Projects using `areeka_records.data.project_id`.
3. If a linked project/customer CRM record references an existing customer **user account**, the account is inherited. Conflicting customer user selections are rejected.
4. Tables display linked project/CRM customer names and existing task-assignee names.
5. A project with linked Tasks or Quotes cannot change its customer user account or be deleted until the links are cleared.
6. Standard create/edit web endpoints apply explicit status-transition policy to Projects, Tasks, Quotes and Expenses. Other modules keep legacy transitions. The existing expense pending-to-paid shortcut stays supported.
7. Form/list validation errors are visible to staff.

No schema migrations, automatic legacy data rewrites, or background notifications. A Customers-module record and a customer login/user account are separate entities.

## QA and deployment gate

Upload the aaPanel ZIP under `/root`, verify its SHA-256 and internal `SHA256SUMS.txt`, then execute:

```sh
python3 -B tests/test_source.py
python3 -B tests/test_deploy.py
python3 -B scripts/manage.py --qa-run
python3 -B scripts/manage.py --check
python3 -B scripts/manage.py --deploy --confirm INSTALL_AREEKA_WORKFLOW_INTEGRATION_V131
python3 -B scripts/manage.py --check
```

`--qa-run` operates only on the preexisting isolated workspace `/root/areeka-qa-130/Areeka-CRM-v0.0.1` with PHP 8.4 and SQLite :memory:. Both original nine-test QA suite and new seven-test integration suite must pass to create the proof required by production deployment.

The patch changes three existing files and adds two new PHP files. The deployer requires the real installed lock, source SHA-256 parity, private backup and existing QA proof. It never runs Artisan or touches production DB, licensing, vendor, .env, installer or compiled frontend assets.

Status: **local static/contract/deployment simulations passed; real Laravel SQLite integration QA and production deploy pending**.

GitHub currently contains only a partial Laravel tree. Use the complete versioned source ZIP as the release authority until the repository synchronization is validated.
