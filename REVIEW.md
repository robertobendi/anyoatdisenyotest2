# REVIEW

## Visual evaluation

### What I saw

On `screenshot-home-desktop.png` the eye lands exactly where it should: the giant tight-tracked Anton knockout "WE SHAPE THE HOME YOU'LL LIVE IN" pinned bottom-left in paper-white over a full-bleed warm timber-and-white interior (beamed ceiling, dark door, slat panel), a taupe eyebrow above, a one-line subhead and a single moss "Get Your Brief →" pill beneath. The brief's "confident photo-poster studio" family reads at first glance — this is unmistakably ref-01's golden-hour knockout hero re-keyed onto warm beige, not a centered card on white. The proof row below it is genuinely poster-scale: moss "12 / 80+ / PRC" numerals tower over an Anton H2, with the espresso "START HERE / Tell us about your site" card raised and nudged into the gutter. That first screen is the build at its best.

The inner-page heroes are where the signature wobbles. `screenshot-about-desktop.png` opens on a fussy styled **twin-bed bedroom** — decor, not architecture — and a centered framed picture plus bright windows form a second focal magnet that competes with the small "FORM, THEN DESIGN" headline at roughly equal weight, so there is no clean first-read. `screenshot-contact-desktop.png` opens on a saturated **cobalt-blue dusk** sky filling the top third — tonally the odd one out against the warm photo-poster system every other surface commits to; it reads like a different site. Mobile (`screenshot-home-mobile.png`) stacks cleanly with no overflow, though the headline top rides over a brighter ceiling region where the scrim thins.

### Visual pass/fail checks

- **No clipped or colliding content** — PASS. Scanning every captured block — home hero headline + subhead + pill, the 12/80+/PRC numerals and their captions, the espresso card, the About manifesto column, the Contact form labels/inputs and the "REACH US" card beside it — no character is occluded and no two elements claim the same pixels (Contact form and gutter card sit side-by-side with clear separation). (Caveat: home-desktop capture stops after the proof row, so Home §3–6 are pixel-unverified; markup shows them intact.)
- **Logo visible in header** — PASS. The interlocking "ad" moss monogram sits top-left in all four screenshots.
- **First-glance family recognizable** — PASS. Full-bleed warm photo + Anton paper-white knockout + moss pill = the photo-poster studio family on sight (home hero).
- **Decorative system visible** — PASS. Well over two motifs: oversized Anton stat numerals, the grid-breaking espresso callout card, moss pills, UPPERCASE taupe eyebrows, and the full-bleed mid-page band (markup `index.html:535`).
- **Source imagery placed** — PASS. The only real source asset, `source/images/og-image.jpg`, ships as the header/footer "ad" lock-up; real photographs (not flat illustration/placeholder) fill every hero and card. (See UX finding — the *featured-work* photos are off-category foreign houses, a trust problem, not a "no imagery placed" failure.)
- **Mobile holds** — PASS. `screenshot-home-mobile.png` stacks hero → beige proof row with no horizontal overflow or clipping; `overflow-x:hidden` + `margin-left:calc(50% - 50vw)` band rule hold.

No FAIL in the six checks — the verdict below is driven by the Must Fix list, not a layout-integrity break.

## Council consolidation

- **Designer**: Signature shipped well on Home, but the About hero is an off-category bedroom with split focal hierarchy (ship blocker) and the Contact hero's cool-blue field breaks the warm photo-poster system.
- **UX**: The funnel is sound and the copy on-voice, but it ships hollow proof (foreign stock houses relabeled as local "Batangas" projects) and is unreachable — no phone, no email, no named/pictured principal — failing §1's "trustworthy local architect you can call."
- **UI**: No layout collision in captured pixels, but white nav links lose contrast over the bright hero, the conversion-critical contact form leaves required fields unmarked, and every above-the-fold hero `<img>` is `loading="lazy"`.
- **Colour**: The hardest call (warm beige surface, brand-locked moss/espresso) is nailed, but the moss-on-beige link colour fails AA at 4.13:1, walnut is declared yet invisible, and the **Contact hero's cool blue breaks the warm family** (same issue the designer flagged).
- **Programmer**: Markup is semantically excellent, but the only lead form POSTs to `formspree.io/f/REPLACE_ME` (dead on arrival), heroes lazy-load the LCP image (same element UI flagged), JSON-LD logo path 404s at this base, and `<!-- TODO -->` notes ship in production HTML.

## Prioritised findings

### Must fix (revision will close these)

- **Contact brief form endpoint** — `docs/contact.html:433` `action="https://formspree.io/f/REPLACE_ME"` + TODO `:431` — the site's only lead path POSTs to a non-existent endpoint, so every submission errors and the literal `REPLACE_ME` token ships publicly; the conversion goal (§1) is dead on arrival. — Insert the firm's real Formspree ID (or working endpoint) and strip the placeholder/TODO comments site-wide.
- **No call path / anonymous practice** — Contact "REACH US" card + footer (`docs/index.html:602-610`, TODO `:607`) — zero phone, zero email, no named or pictured principal anywhere; §1 explicitly wants "message/**call**" a "trustworthy local architect," and a faceless, uncallable practice fails exactly that. — Add a tappable phone + email in the footer and Contact card, and name + portrait the licensed principal on About/Contact.
- **Featured-work fabrication** — `docs/index.html:553-564`, files `ext-jacobs1.jpg` / `ext-schweiker.jpg` labeled "Hillside Family Residence · Batangas · 2023" etc. — the firm's single strongest proof asset is foreign Modernist houses relabeled as local ANYO projects; fabricated credentials lose trust faster than an empty portfolio. — Replace with real ANYO project photos + true names/locations/years, or pull the strip and the 12/80+ numerals until verifiable.
- **About hero composition** — `screenshot-about-desktop.png`, hero region — the page's signature element is an off-category styled bedroom, and a centered framed artwork + bright windows compete with "FORM, THEN DESIGN" at equal weight, so there is no clear first-read (fingerprint #1 failing its job here). — Swap to a warm architectural full-bleed (timber detail, vault, worksite) with a quiet off-center field and a stronger bottom-left scrim so the headline is the unambiguous focal point.
- **Contact hero tonality** — `screenshot-contact-desktop.png`, top third (designer + colour) — the saturated cobalt-blue dusk sky is the one hero whose dominant hue sits outside the warm golden-hour family, so Contact reads as a different site against the warm-beige panel directly below. — Replace with a warm golden-hour exterior/interior, or warm the scrim with a low-opacity espresso/walnut multiply, so all four heroes share one tonal family.
- **Lazy-loaded LCP hero images** — `docs/index.html:453`, `about.html:403`, `contact.html:416`, `services.html:409`, `work.html:411` all `loading="lazy"` (UI + programmer, same element) — the signature above-the-fold hero is deferred, hurting LCP and risking a flash of paper-white knockout type over only the gradient before the photo paints. — Switch above-the-fold heroes to `loading="eager"` + `fetchpriority="high"`; keep lazy on below-the-fold images.
- **Body / text-link contrast** — `docs/index.html:73` `a{color:var(--moss)}`, `:147` `.text-link`, spec-table link `:587` on `#ece5da` — moss `#6e7044` on beige measures **4.13:1**, below the 4.5:1 AA floor for normal text. — Darken links to ≈`#54562f` (≈5.5:1) or set espresso ink with a moss underline.
- **Required fields unmarked on brief form** — `docs/contact.html:436,440,458` (`name`, `contact`, `message` carry `required` but no visible marker) — on the conversion-critical form the user can't tell what's mandatory until a submit-time native error fires. — Append a visible required marker (asterisk + "* required" legend) to those labels.

### Defer

- **Primary CTA copy "Get Your Brief"** — hero/card/closing ×3 (`docs/index.html:458,486,578`) — trade jargon for a 30–55 homeowner; consider a plainer first-contact verb later. — UX, single lens.
- **Walnut second accent invisible** — declared `docs/index.html:26`, used only at low-opacity hairlines/shadows — palette reads moss-monochrome rather than moss+walnut; promote walnut to a visible duotone/rule in a later pass. — Colour, single lens.
- **Nav links low-contrast over hero** — `docs/index.html:202-205` + scrim `:174-178` — paper-white links sit on the brightest photo region; add persistent text-shadow or a stronger scrim. — UI, single lens.
- **JSON-LD logo path** — `docs/index.html:410-411` `/uploads/logo.jpg` resolves to domain root, not the `/anyoatdisenyotest2/` base — Google drops the logo; use absolute canonical URLs. — Programmer, SEO, non-visual.
- **Small mobile touch targets** — footer/inline links `docs/index.html:304-307` ~22px tall — add `display:block; padding:.5rem 0` on mobile. — UI, single lens.
- **Stat caption rhythm** — `docs/index.html:351-352` full-sentence captions under the numerals — trim to 2–4 word labels so the numerals stay the graphic element. — Designer, polish.

## Fingerprint check

- **1. Full-bleed warm photo hero, Anton paper-white knockout bottom-left over scrim** — PRESENT. Home/About/Contact all show full-bleed photo + bottom-left Anton knockout; clamp rendered at scale (~110–120px cap height, not collapsed to 3rem). (Contact's hue is off-family — see Must Fix — but the structure holds.)
- **2. Home hero "WE SHAPE THE HOME YOU'LL LIVE IN" + moss "Get Your Brief" pill beneath** — PRESENT. Exact headline + moss pill visible on `screenshot-home-desktop.png`.
- **3. Oversized Anton stat numerals (12 / 80+ / PRC) against the gutter, not in cards** — PRESENT. Poster-scale moss numerals on the home proof row; About row in markup.
- **4. Exactly one espresso `#2a2620` card breaking the grid on Home/Services/Contact** — PRESENT. Home espresso "START HERE" card overlaps the gutter; Contact "REACH US" card pulled into the gutter.
- **5. Every H2 carries an UPPERCASE Inter-600 taupe eyebrow** — PRESENT. "PROOF, NOT PROMISES" eyebrow above the proof H2; "THE PRACTICE" on About.
- **6. Fraunces manifesto incl. "anyo at disenyo — form and design"** — PRESENT. About manifesto in Fraunces 400 with the bilingual line visible.
- **7. Home and Work each one full-bleed mid-page band with Fraunces caption** — PARTIAL. Home band confirmed in markup (`docs/index.html:535`, `.band__cap` Fraunces) but below the capture; Work not screenshotted, so the Work band is pixel-unverified.
- **8. Cropped og-image "ad" monogram left + moss pill right, transparent over hero flipping on scroll** — PRESENT. Monogram left + "Get Your Brief" pill right in all captures; scroll-flip in CSS (`:651`). (White links low-contrast — deferred.)
- **9. Footer dark anchor with full untouched og-image lock-up ≈140–180px** — PARTIAL. Confirmed in markup/CSS and `logo.jpg` ships, but the footer is below every capture, so unverified by pixel.
- **10. Warm beige surface (never white) + underline-only Contact inputs, UPPERCASE labels, Formspree submit** — PRESENT. Surface is `#ece5da` throughout; Contact shows uppercase labels above underline-only inputs (the `REPLACE_ME` endpoint is itself the fingerprint spec — see Must Fix to make it live).

## Generic-AI tells

- **Centered hero on white over generic stock photo** — ABSENT. Bottom-left Anton knockout over a full-bleed warm photo, never centered on white.
- **Only Inter / Inter + Lora loaded as fonts** — ABSENT. `index.html:16` loads Anton + Fraunces + Inter (real condensed display + serif + sans).
- **Palette is 3 neutrals + 1 muted accent** — PRESENT. With walnut effectively invisible, the rendered palette reads as beige/sand/espresso neutrals + a single moss accent (colour lens). Mitigated by the espresso dark anchor and brand-locked (not arbitrary) moss, but the pattern is there.
- **H1 / display capped near 3rem** — ABSENT. Hero clamp renders ~110–120px; stat numerals at the 9rem cap.
- **Three identical cards as the home page's primary content** — ABSENT. Primary content is the photo-poster hero + oversized numerals; the 3-card services row is secondary.
- **All decoration is border-radius + soft shadow** — ABSENT. Full-bleed bands, grid-breaking espresso card, oversized typographic numerals and knockout type carry the ornament.
- **Modular scale 1.25 with body-sized H1** — ABSENT. Scale ≈1.5 with a true poster-scale H1.
- **Logo missing or replaced by generic SVG when og-image existed** — ABSENT. The real `og-image.jpg` "ad" lock-up ships in header and footer.
- **Real source imagery dropped (source/images/* unused)** — ABSENT. The only source asset (`og-image.jpg`) is used; no architectural source photos existed to drop. (The fabricated *featured-work* photos are a separate trust issue, in Must Fix.)
- **Decorative kit unused — all ornament is CSS only** — ABSENT. Ornament includes real photographic bands and a duotone still-life, not CSS-only.

## Reference fidelity

The build honors REFERENCES.md's instruction to "lead with ref-00's calm editorial system and borrow ref-01's confident hero and stat treatment." From **ref-01.png** it lifts the load-bearing moves faithfully: the full-bleed warm low-lit interior hero with a huge uppercase knockout headline, the "GET YOUR BRIEF" pill, the oversized editorial stat numerals (62/20 → 12/80+/PRC), and the one espresso card breaking the grid. From **ref-00.png** it keeps the warm cream/beige ground, UPPERCASE eyebrow labels, thin hairline rules, the single mid-page full-bleed timber band, and the closing spec/stat table. The one clear departure is the **Contact hero's cobalt-blue dusk**, which abandons both references' warm golden-wood grading (ref-00's "warm, natural… golden wood tones"; ref-01's "espresso, oak") — addressed in Must Fix.

## Overall

What's mediocre first: the build is one off-category bedroom hero and one cobalt-blue Contact hero away from holding its own system, its proof strip is fabricated (foreign houses sold as local Batangas work), and — most damning for a conversion site — the one lead form is wired to a dead `REPLACE_ME` endpoint with no phone, email, or named architect anywhere, so a homeowner literally cannot reach this practice. Those are trust and function failures, not taste calls. What's working is real: the Home hero, the poster-scale numerals, the grid-breaking espresso card and the brand-locked warm palette are a genuine, non-generic photo-poster studio that clears every generic-AI structural tell. But I would not sign my name to it shipping today — a faceless, uncallable practice presenting invented credentials through a broken form is not a portfolio piece. All five role reviews landed; none were missing.

## Verdict

verdict: revise
