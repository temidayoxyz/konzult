# Elementor starter template

`templates/home.json` is a page template (not a full kit) that recreates the Konzult homepage inside Elementor.

## Import

1. WordPress admin → **Templates → Saved Templates**
2. Click **Import Templates**
3. Upload `home.json`
4. Create a page, click **Edit with Elementor**
5. Folder icon → **My Templates** → insert **Konzult — Home**
6. Publish, then set the page as your static homepage under **Settings → Reading**

## Why a page template instead of a kit

Kits bundle site settings, headers, footers and global styles, and their schema is tightly coupled to the Elementor version that exported them. A page template imports reliably across Elementor 3.x and free Elementor, and leaves the theme's PHP header and footer in place — which is what free Elementor users need.

## Editing notes

- The template is typographic by design. It imports with **no external images**, so nothing appears broken and you can add your own photography.
- Fonts are set to Instrument Serif and Inter. If Elementor cannot reach Google Fonts, the theme's self-hosted versions still style headings and body copy.
- Spacing values mirror the theme tokens (`96px` section rhythm, `1240px` content width).
- The closing button uses `mailto:hello@konzult.studio` — replace it with your booking link.

## Elementor Pro

Pro users can additionally build header, footer, single and archive templates in **Theme Builder**. The theme registers all core locations when Pro is active. Nothing in the free workflow depends on Pro.
