# Areeka Dashboard SVG Icons & Profile Dropdown v1.2.6

This release replaces repeated text symbols across the admin header, sidebar, dashboard KPI cards, and quick actions with distinct SVG icons. The header shows only an icon-only user trigger, opening a dropdown with the signed-in user's name, email, role, My profile, and Sign out last.

**Profile** is a staff-only authenticated route (`/en/dashboard/profile`) with an edit-display-name form (email and role are not changed). The sign-out menu action retains POST and CSRF protection.

The guarded aaPanel package is `Areeka-Dashboard-SVG-Profile-aaPanel-v1.2.6.zip`, supplied in ChatGPT. It verifies SHA-256 of known v1.2.5 files, adds the component, view, and controller, updates the relevant Blade templates, routes, and CSS, and fingerprints a new CSS asset while preserving the compiled JavaScript and license/installer/database.

The current GitHub repository is **not** a complete synchronized Laravel application. Use the complete source ZIP delivered with the aaPanel package until the full repository import and CI gate are complete. Do not commit `.env`, secret licenses, customer data, or `storage` contents.
