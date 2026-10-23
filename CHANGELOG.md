# Changelog

All notable changes to Konzult are documented here. The format follows
[Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and releases use
[Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.1] - 2026-10-23

### Fixed

- Removed the sticky-header height change that caused scroll-anchoring feedback
  and made the header oscillate near the top of the page.
- Added hysteresis to the header's stuck state so it cannot flicker around the
  scroll threshold.
- Disabled entrance reveals, parallax, marquee motion, header blur, and smooth
  scrolling inside the Elementor editor preview. The editing canvas now stays
  still, and all content is visible while editing.

## [1.0.0] - 2026-10-23

### Added

- Native nine-section consulting homepage with a self-hosted type system.
- Full inner-page set: page, single, archive, search, 404, comments, and a
  full-width template.
- Free-Elementor integration and the `elementor/templates/home.json` starter.
- Customizer options for brand colour, header CTA, phone number, and footer.
- Dependency-free motion layer: sticky header, scroll reveals, stat counters,
  native mobile drawer, and gentle hero parallax.
- Translation template, block-editor theme.json, and theme documentation.
