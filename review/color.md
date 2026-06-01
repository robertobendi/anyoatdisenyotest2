# COLOUR REVIEW

## What I saw

Across all four screenshots the surface is unmistakably the brief's warm beige
`#ece5da`, never pure white — the proof row on `screenshot-home-desktop.png`,
the manifesto/lock-up band on `screenshot-about-desktop.png`, and the form panel
on `screenshot-contact-desktop.png` all sit on the same warm oat ground, with
secondary cards a half-step warmer (the sand `#e0d7c8` service/logo cards). The
single most common drift — body copy on `#ffffff` — is cleanly avoided. Moss
`#6e7044` carries nearly all the accent work: the "Get Your Brief" pill (nav,
hero, callout, closing), the giant "12 / 80+ / PRC" numerals on the home proof
row, the service-card top borders, the "ad" monogram (nav, about card, footer),
and the manifesto restatement line. The espresso `#2a2620` callout card and the
footer read as intended dark anchors; hero/band knockout type is paper-white.

What I did NOT see in pixels: `screenshot-home-desktop.png` is truncated just
below the espresso proof card, so the services row, moss-duotone still-life
(`.home-duo`), mid-page band, featured-work strip and footer on Home are
evidenced from markup/CSS only. The one tonal outlier in the captured set is the
Contact hero: a deeply saturated cobalt-blue dusk sky fills the top third of
`screenshot-contact-desktop.png` — a cool note against a palette the brief keys
to warm golden-hour espresso and oak.

## Findings

### Ship blockers (must fix before publish)

None. The surface is the named brand beige `#ece5da` (not white), accents are
brand-locked moss/espresso, and the dark-card/footer grounds render at full
strength. No accent-on-accent button failure (the moss pill uses `--paper-hi`
`#f8f5ef` label → 4.83:1, deliberate headroom). Nothing in the colour layer is,
by itself, unfit to ship.

### Important (should fix this revision pass)

- **Body / text links (moss on beige)** — `docs/index.html:73` `a{color:var(--moss)}`, `:147` `a.text-link`, and the spec-table link `:587` ("facebook.com/anyoatdisenyo"), all rendered on `#ece5da` — moss `#6e7044` on beige measures **4.13:1**, below the 4.5:1 AA floor for normal text; the 17px inline link and the 14px/600 `.text-link` both fall short, readability surviving only because they're underlined. → Darken the link/text-link colour to roughly `#54562f` (≈5.5:1 on beige) or set links to espresso ink with a moss underline.
- **Walnut `#8a6a4d` (the brief's second warm accent)** — declared at `docs/index.html:26` but used only as `--hairline: rgba(138,106,77,.35)` (`:43`) and faint card drop-shadows `rgba(138,106,77,.20)` (`:377`); at those opacities it is invisible as a hue, so the rendered palette reads as moss-monochrome + neutrals rather than the moss **and** walnut warm pairing § 3 specifies. → Promote walnut to visible work — raise hairline opacity, set the services-block duotone to `duotone(#8a6a4d,#ece5da)` per the imagery plan, or use walnut for an eyebrow rule — so a second accent earns its place.
- **Contact hero — cool-blue sky** — `screenshot-contact-desktop.png`, top third (`uploads` hero on `docs/contact.html`) — the saturated blue dusk sky fights the family's warm golden-hour DNA (BRIEF § 2 / imagery plan: "house construction nearly complete warm evening"), making Contact the one page whose dominant hero hue sits outside the palette. → Swap for a warm-evening/interior-glow frame, or warm the hero scrim (add a low-opacity espresso/walnut multiply) to pull the blue back toward the palette.

### Nice to have (skip if budget tight)

- **Eyebrow tags (taupe on beige)** — `docs/index.html:84-91`, taupe `#6c645b` on `#ece5da` at 13px/600 = **4.65:1**, a hair over the line; nudging to `#615a51` buys comfortable margin for the site's most repeated small-text element.
- **Two moss pills as primary + secondary** — `screenshot-contact-desktop.png`: the form submit and the "Message on Facebook" pill are both solid moss, so colour does not separate primary from secondary CTA; the brief calls the secondary a ghost outline (`.pill--ink`/`.pill--ghost` exist at `:135-144` but go unused here). → Render the secondary action as the ghost variant.
- **Home-mobile hero contrast** — `screenshot-home-mobile.png`: the top of the knockout headline crosses a bright window/wall region where paper-white loses some bite against the photo; relies on `text-shadow` alone. → Extend the hero top-gradient scrim slightly on narrow viewports.

## Summary for the synthesiser

The build nailed the hardest colour call — warm beige surface, brand-locked moss
and espresso at full strength — so there are no colour ship blockers; the real
gaps are a WCAG-failing moss-on-beige link colour (4.13:1) and a second accent
(walnut) that's declared but invisible, leaving the palette more moss-monochrome
than the brief's moss-plus-walnut warmth.
