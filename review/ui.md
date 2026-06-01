# UI / INTERACTION REVIEW

## What I saw

Four screenshots opened cleanly. **Home (desktop, 1440px):** full-bleed warm
timber-ceiling hero, "WE SHAPE THE HOME YOU'LL LIVE IN" knocked out paper-white
bottom-left, a readable subhead under it, and a solid moss-green "Get Your Brief"
pill — a genuinely button-shaped CTA (filled, rounded, white label, arrow).
Below: "PROOF, NOT PROMISES" eyebrow, an Anton H2, three oversized moss numerals
(12 / 80+ / PRC) with captions, and a dark espresso "START HERE / Tell us about
your site" card raised and nudged left into the gutter. No clipped or colliding
copy anywhere in the region captured. **Note:** the home-desktop shot ends right
after the espresso card — the manifesto, services row, photo band, featured-work
strip and closing block are NOT in the capture, so I cannot vouch for their
rendered integrity. **About/Contact (desktop):** "FORM, THEN DESIGN" and "START
YOUR BUILD" heroes render correctly; the Contact form shows UPPERCASE labels
stacked *above* underline-only inputs (Your name / Contact number / Project
location / Project type / About your project), a "Get Your Brief" submit pill,
and the espresso "REACH US" card pulled into the gutter beside it — no overlap of
form and card. The About manifesto wraps inside its column with first and last
words intact.

**Mobile (375px):** the capture is small/low-res; I can resolve overall structure
(stacked hero headline + subhead + pill, then the beige proof section with big
moss numerals) but not per-character edges. Within that limit I see no overflow
or clipping, and `overflow-x:hidden` on `body` (index.html:59) plus the
`100vw` band's `margin-left:calc(50% - 50vw)` rule mean no horizontal scrollbar.
The grid-breaking transforms (`.proof-callout`, `.contact-card`) are gated to
≥900px / ≥860px, so on mobile those blocks stack normally — no collision risk
there.

## Findings

### Ship blockers (must fix before publish)

None. In the regions the screenshots actually capture, no body copy is occluded
and no two elements claim the same pixels. (Caveat: the home-desktop capture
stops after the proof row, so sections 3–6 of Home are unverified by pixel — see
"What I saw." If the synthesiser has a fuller capture, re-check the manifesto and
closing blocks.)

### Important (should fix this revision pass)

- **Top-nav links over the hero** — screenshot-home-desktop.png, top-right ("Work
  Services About Contact") over the pale timber ceiling; CSS index.html:202-205
  (paper-white links) + :174-178 (header scrim is only `rgba(20,18,15,.55)→0`
  over 70px) + :651 (`scrolled` flips only after scrolling nearly the full hero) —
  the white links sit on the brightest part of the photo with a near-spent scrim,
  reading as low-contrast and barely distinguishable as nav. → Add a persistent
  text-shadow on `.site-nav a`/`.brand-name` over heroes, or strengthen the header
  scrim, so links stay legible regardless of the photo region beneath them.
- **Required fields not marked** — docs/contact.html:436,440,458 (`name`,
  `contact`, `message` carry `required` but no visible indicator) — on the
  conversion-critical brief form the user can't tell which fields are mandatory
  until a submit-time browser error fires. → Append a visible required marker to
  those three labels (e.g. an asterisk with a "* required" legend) so the
  obligation is clear before submit.
- **Small touch targets in footer + inline links** — index.html:304-307
  (`.footer-col a` ≈ 0.95rem, line-height 1.5, only 0.65rem gap → ~22px tall) and
  the spec-table / form-help inline links (contact.html:462) — on mobile these
  fall well under the 44×44px target and sit close together. → Give footer/list
  links `display:block; padding:.5rem 0` (or min-height 44px) on mobile so each is
  comfortably tappable.
- **Hero image is `loading="lazy"`** — index.html:453, contact.html:416 (and the
  other heroes) — the signature LCP photo is deferred; until it paints, the giant
  paper-white knockout headline sits over only the gradient scrim, risking a
  flash of low-contrast text on first load. → Switch the above-the-fold hero
  `<img>` to `loading="eager"` (drop lazy) and add `fetchpriority="high"`.

### Nice to have (skip if budget tight)

- **No explicit form error styling** — contact.html `.brief-form` defines only
  `:focus` states (contact.html:362-364); validation falls back to native browser
  bubbles. → Add an `:invalid`/error border-color rule so error states match the
  underline-input aesthetic and read predictably.
- **Select defaults to "New home" with no neutral prompt** — contact.html:448-454
  — there's no "Select one…" placeholder option, so a user who skips the field
  silently submits "New home." → Add a disabled selected placeholder option, or
  confirm the default is intentional.
- **Cropped monogram is the only brand mark ≤600px** — index.html:198
  (`.brand-name` hidden ≤600px) leaves an 84×40 cropped image (index.html:190-191)
  as the sole home affordance on mobile; it's small but does carry an aria-label.
  → Verify the cropped region reads as the "ad" loop and not a sliver of wordmark
  at that size.

## Summary for the synthesiser

No layout-integrity break is visible in the captured pixels (0 blockers from my
lens), but two interaction fixes matter for a conversion site: white nav links
lose contrast over the bright hero photo, and the contact form's required fields
are unmarked — and note the home-desktop capture stops after the proof row, so
Home sections 3–6 are pixel-unverified.
