# GRAPHIC DESIGNER REVIEW

## What I saw

Four desktop/mobile screenshots opened cleanly. The **home hero** (`screenshot-home-desktop.png`) lands the signature: a full-bleed warm timber interior — beamed ceiling, dark door, warm floor, vertical slat panel on the right — with a tight-tracked condensed all-caps knockout headline "WE SHAPE THE HOME YOU'LL LIVE IN" pinned bottom-left in paper-white across three lines (cap height reads ≈110–120px at 1440px, i.e. the `clamp(3.25rem, 9vw, 7.5rem)` actually rendered at scale, weight reads ≈700 — it did NOT collapse to a polite 3rem), a small taupe eyebrow "ARCHITECTURAL SERVICES — BATANGAS CITY" above it, Inter subhead and a moss pill "Get Your Brief" beneath. The eye lands on the headline first — clean focal hierarchy. The **proof row** below it on warm beige is genuinely poster-scale: "12 / 80+ / PRC" tower over the H2 (confirmed `.num { font-size: clamp(4rem,10vw,9rem); line-height:.85 }`, `docs/index.html:110`), and the espresso callout card does break the grid (`#index.html:401` `transform: translateX(-44px); margin-top:-72px`). Type pairing reads with real contrast across the site: Anton condensed display, Inter body, and a visible Fraunces serif manifesto on About ("anyo at disenyo — form and design"). Five hierarchy levels are present (eyebrow → H1 → numerals → H2/H3 → body).

Where it wobbles is **the heroes on the inner pages**. `screenshot-about-desktop.png` opens on a fussy styled twin-bed *bedroom* (two beds, patterned spreads, a centered framed picture on the shelf, lamp) — decor, not architecture — with "FORM, THEN DESIGN" small and bottom-left; the centered framed artwork and bright windows form a second focal magnet at similar weight, so the eye splits. `screenshot-contact-desktop.png` opens on a cool blue-hour exterior whose top ~60% is dominated by blue sky and blue-lit gables — tonally the odd one out against the warm photo-poster system. The home desktop capture is truncated after the proof row, so home sections 3–6 (Fraunces manifesto block, services row, mid-page full-bleed band, closing spec table) are NOT verifiable from pixels.

## Findings

### Ship blockers (must fix before publish)

- **About hero composition** — `screenshot-about-desktop.png`, hero region — the page's signature element (fingerprint #1, the full-bleed knockout hero) fails its job here: the image is an off-category styled bedroom (brief imagery plan asked for "architecture studio interior warm wood"), and a centered framed artwork + bright window create a focal point that competes with the bottom-left "FORM, THEN DESIGN" headline at roughly equal weight, so there is no clear first-read. → Swap to a warm, architectural full-bleed image with a quiet, off-center field (a timber detail, vault, or worksite) and add/strengthen the bottom-left scrim so the headline is the unambiguous focal point.

### Important (should fix this revision pass)

- **Contact hero tonality** — `screenshot-contact-desktop.png`, hero region — the cool blue-hour field breaks the warm photo-poster layout signature the rest of the site commits to (§2 "warm, low-lit, full-bleed"; imagery plan: "house construction nearly complete warm evening"); against the warm-beige section directly below it the hero reads as a different site. *(Composition/signature consistency — exact colour science is the colour reviewer's call.)* → Replace with a warm golden-hour exterior/interior so all four heroes share one tonal family.
- **About hero headline scale** — `screenshot-about-desktop.png` vs `screenshot-home-desktop.png` — "FORM, THEN DESIGN" reads visibly smaller/less commanding than the home H1 despite the same `clamp()`; combined with the busy backdrop it loses poster authority. → Confirm the About hero uses the same display clamp and push the headline weight against a cleaner image so the knockout reads as boldly as on home.
- **Stat caption rhythm** — `screenshot-home-desktop.png`, proof row; `docs/index.html:351-352` `.stat-cap { font-size:.95rem }` — the towering numerals are excellent, but the full-sentence captions ("Years turning ideas into buildable plans across Batangas.") at near-body size hang heavy under each numeral and dilute the graphic-numeral effect, pulling the eye back to prose. → Tighten captions to 2–4 word labels ("YEARS / PROJECTS / LICENSED") so the numerals stay the graphic element, per §5 "used as graphic elements not just data."

### Nice to have (skip if budget tight)

- **Home hero vertical stacking** — `screenshot-home-desktop.png` — eyebrow, 3-line headline, subhead and pill are all packed into the lower ~40%, which feels slightly bottom-crowded against the deeper warm photo above. → Lift the cluster ~5–8% or trim the subhead to one line for more breathing room around the headline.
- **Mobile headline legibility zone** — `screenshot-home-mobile.png` — the knockout headline rides up over the brighter ceiling/window region where the scrim thins. → Extend the bottom gradient scrim higher on the 375px breakpoint so the white type always sits on dark pixels.

## Summary for the synthesiser

The signature shipped well on home (true poster-scale Anton knockout hero, real 9rem stat numerals, working grid-breaking espresso card) — the one thing to fix is the inner-page heroes: the About hero is an off-category bedroom with split focal hierarchy (blocker) and the Contact hero's cool blue field breaks the warm photo-poster system.
