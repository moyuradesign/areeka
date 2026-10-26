# Areeka CRM v1.3.3 — Customer Detail & Profile Workspace

**Release baseline:** Production v1.3.2 with eight-digit public customer UIDs and integrated CRM workflows.

**aaPanel package:** `Areeka-Customer-Detail-Workspace-aaPanel-v1.3.3.zip`
SHA-256 `07572e60ebdfe850fc46dd9b9bc34f7b407a244b02b30a41ba4712eae1fcfa69`

**Complete source:** `Areeka-CRM-v0.0.1-Customer-Detail-v1.3.3-Source.zip`
SHA-256 `7596e74f1a2a1f2ede40ebc4119f3201b3e0fd2033e8a39cf61898eea9639605`

The new authenticated staff-only route `/{locale}/dashboard/customers/{uid}` uses a CRM *record* UID (not login-account UID). The Customers grid title and a new **View details** action open it. The workspace shows contact fields, account/owner information, explicitly linked projects (`data.customer_record_id`), project-linked tasks and quotes (`data.project_id`), and up to 12 recent activity entries, filtered by granted module view permissions. It deliberately does not conflate records just because they share a customer login account.

The UI uses standalone `public/assets/areeka-customer-workspace-v133.css`, new view/controller/test, and additive icon definitions. Existing data and 8-digit UID schema are retained. **No database migration** or production database change. Existing permissions and relationships are not rewritten.

**Safety gate:** archive checksum; internal SHA256SUMS; offline source and deploy-simulation tests; isolated Laravel SQLite :memory: suites CrmPublicUidCustomerUiTest (6), CrmWorkflowIntegrationTest (7), CrmWorkflowQaTest (9), and CrmCustomerWorkspaceTest (7), total **29 tests required**. Production deployment is blocked until all four isolated suites produce a valid release-bound private QA proof. The guarded deploy checks known source hashes, installation lock, and backup/rollback copies.

**Status:** Locally packaged and source/deploy-guard tests passed. Server PHPUnit QA and production deployment **not yet performed**.

See package README for commands; maintain full-source ZIP as release authority because the GitHub repository is not yet fully synchronized.
