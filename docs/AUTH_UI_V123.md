# Areeka Auth UI v1.2.3

The first auth UI update is prepared for the existing installed Laravel application.

Changes:
- Four auth pages use a shared `<x-auth-field>` Blade component with in-field label, SVG icon and text input.
- Compact default button sizing with intentional full-width opt-in.
- Focus states, light/dark theme compatibility, reduced-motion support.
- aaPanel guarded deploy patches five source files, creates a component, fingerprints the compiled CSS and updates Vite manifest; license, DB, .env, Nginx unchanged.

## Files and deployment
The versioned aaPanel ZIP is provided in the related ChatGPT delivery. Run checks before deployment:

```bash
sha256sum -c SHA256SUMS.txt
python3 -B tests/test_source.py
python3 -B tests/test_deploy.py
python3 -B scripts/deploy.py --check
python3 -B scripts/deploy.py --deploy --confirm INSTALL_AREEKA_PREMIUM_AUTH_COMPACT_V123
python3 -B scripts/deploy.py --check
```

Important: repository initialization does not imply the full Laravel source is present on GitHub. Do not run this README as a fresh installation.
