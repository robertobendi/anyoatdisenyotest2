# Staged brand assets

Bismuth already copied the source site's REAL brand assets into
`uploads/` at the paths below. Reference them by the **URL** column
exactly — root-relative, e.g. `/uploads/logo.png`. The static export
rewrites these to the GitHub Pages project path automatically, so
do NOT hardcode the repo name and do NOT move or rename these files.

## Logo (use in the header AND footer)

- **logo** → `/uploads/logo.jpg` (500×500) — near-square → ideal header logo

Place the REAL file: `<img src="/uploads/logo.jpg" alt="…">`. Do NOT redraw it as an SVG or substitute a text/SVG
wordmark unless BRIEF.md § 3 explicitly says the bitmap is unusable.

## Favicon

- **favicon** → `/uploads/favicon.ico` (?) — set as <link rel="icon"> in <head>

## Photos

No in-page photos were pulled from the source (common for
social/SPA sources). Fetch hero + section imagery with
`./scripts/bismuth-tool fetch-image "…" 3 uploads/`.
