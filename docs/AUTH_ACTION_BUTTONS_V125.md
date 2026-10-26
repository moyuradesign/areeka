# Areeka Auth Action Buttons v1.2.5

Source updates for the compact premium auth forms: Sign In (log-in SVG), Sign Up (user-plus SVG), Forgot Password (mail SVG), Reset Password (key SVG). Each button places the icon before its text. The Forgot Password return link also uses a back SVG.

Button CSS is scoped to `.auth-form-actions .button.auth-submit`: subtle purple gradient, compact sizing, accessible focus outlines, hover/pressed states, disabled feedback, dark-theme tokens and reduced-motion support.

Deployment to aaPanel is through the verified **Areeka-Auth-Action-Buttons-aaPanel-v1.2.5.zip** package. The package also updates source `resources/css/app.css`, adds a fingerprinted CSS asset and updates the Vite manifest, guarded by strict source hashes and a private backup.

This GitHub repository is still only partially synchronized with the complete Laravel project: use the full source ZIP supplied with the release until a verified complete repository import is completed. Never commit `.env`, license secrets, customer data or storage.
