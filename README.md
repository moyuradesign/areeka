# Areeka CRM

Laravel CRM by Ton Samith — https://tonsamith.com

**Version:** 0.0.1 (pre-release)

## Repository status

This repository contains the initial auth UI upgrade source and deployment instructions. It is **not yet a complete Laravel installation**; use the versioned source ZIP for the complete project, and do not treat this GitHub snapshot as a production package.

## UI v1.2.3

Sign In, Sign Up, Forgot Password, and Reset Password use reusable inside-field labels and SVG icons. Global `.button` elements are compact by default, with `.button.block` for intentional full-width layouts. Deploy with the verified aaPanel patch package, which updates compiled CSS safely and preserves licensing and database state.

The complete Laravel source should be imported after the verified production snapshot is prepared. Never commit `.env`, licensing tokens, `storage`, or credentials.
