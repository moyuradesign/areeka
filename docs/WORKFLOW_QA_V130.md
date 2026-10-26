# Areeka CRM v1.3.0 — Workflow QA & Customer Isolation

**Based on:** deployed v1.2.9. **Release:** Areeka-Workflow-QA-Guard-aaPanel-v1.3.0.zip.

- ZIP SHA-256: `4eb5e3d6ffd246cc5c718b8bc2ab66f8b8c1de2e4bd62171241930f70d05b604`
- Complete source ZIP: `Areeka-CRM-v0.0.1-Workflow-QA-v1.3.0-Source.zip`
- Source SHA-256: `bec95b1899aaaccb3a3e18503fb8a772a9988f322975e00dc91a6b9c28585f4f`

## Changes
- Tasks: active staff assignee can be selected in the existing form; assignment stored in `areeka_records.data.assignee_id` without a migration. Task lists display assigned staff. Assignment to customers or inactive staff is rejected.
- Customer portal: require active, verified customer accounts for portal overview, record lists, quote/ticket creation and submission. Preserve `customer_id` scoping.
- New PHPUnit test suite `tests/Feature/CrmWorkflowQaTest.php` exercises project creation with customer association, quote status updates and account isolation, expense status/amount validation, task assignment and status updates, unauthorized portal requests, wrong-module record mutations, and filtered pagination.
- Production smoke script checks unauthenticated access controls without credentials or mutations.
- Guarded aaPanel deployer checks the real installation lock, exact v1.2.9 source hashes, creates a root-private backup, and modifies only the workflow PHP/Blade files plus the test file.

## Important testing limitation
The package's static syntax and guarded-deploy simulation pass. Full Laravel HTTP/DB tests have **not** been executed and must be run in an isolated checkout using SQLite `:memory:` with development dependencies. Do not run PHPUnit or `migrate:fresh` in the production Laravel directory. Review the bundled `docs/QA_MATRIX.md` for case-by-case acceptance and unimplemented business functionality.

The customer relationship verified here is `areeka_records.customer_id` referring to a *customer user account*, not the separate Customers-module CRM record. Task assignment does not yet notify staff. Quote status changes are not equivalent to invoicing/accounting completion.

## Repository status
The GitHub repository remains only partially synchronized. The complete versioned source ZIP is the release reference until the full Laravel tree is imported and validated.
