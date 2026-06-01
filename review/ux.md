# USER EXPERIENCE REVIEW

## What I saw

The home hero (screenshot-home-desktop.png, top third) lands cleanly: a warm timber-and-white living-room photo full-bleed, a paper-white Anton knockout headline "WE SHAPE THE HOME YOU'LL LIVE IN" pinned bottom-left, a small caps eyebrow "ARCHITECTURAL SERVICES · BATANGAS CITY" above it, a one-line subhead, and a single moss-green "Get Your Brief →" pill. Below the fold the proof row reads "WHY BATANGAS FAMILIES BUILD WITH US" with three oversized moss numerals — **12 / 80+ / PRC** — each with a one-line caption, and a dark espresso "Start here / Tell us about your site." card with a second identical "Get Your Brief" pill. Page flow continues hero → stats → Fraunces manifesto + duotone still-life → 3 service cards → full-bleed dusk band → 3 featured-work cards → closing "Ready when you are" CTA + spec table. Coherent top-to-bottom story.

Two things jump out against the brief's § 1 objective ("get a 30–55 Batangas homeowner to message/**call** a trustworthy *local* architect"). First, the three featured-work cards are labelled "Hillside Family Residence · Batangas · 2023", "Studio & Annex · Batangas · 2022", "Open-Plan Family Home · Batangas · 2024" — but the shipped files are `ext-jacobs1.jpg` and `ext-schweiker.jpg` (docs/index.html:554,558), filenames matching well-known foreign Modernist houses, not local ANYO work. Second, across home, footer, About and Contact (all four screenshots) there is **no phone number, no email, and no human name** anywhere — the footer literally ships `<!-- TODO: add the firm's real phone + email here once verified -->` (docs/index.html:607), and the Contact "REACH US" card (screenshot-contact-desktop.png) offers only "Message on Facebook" + a form. The copy itself is genuinely in-voice ("A home is the biggest thing most families ever build. We treat it that way: listening first, drawing carefully…") — no generic filler.

## Findings

### Ship blockers (must fix before publish)

- **Featured-work cards** — docs/index.html:553–564 / screenshot-home-desktop.png is cut above this section, but markup + filenames `ext-jacobs1.jpg`, `ext-schweiker.jpg` — the firm's single strongest proof asset (§1) is stock/non-local architecture relabelled as ANYO's "Batangas · 2023" projects. A local prospect who recognises these (or just senses generic stock) loses trust faster than an empty portfolio would; fabricated proof is worse than no proof. → Replace with real ANYO project photos and true names/locations/years, or pull the section and the "12/80+" numerals until verifiable assets exist rather than ship invented credentials.

- **No call path / anonymous practice** — Contact "REACH US" card (screenshot-contact-desktop.png) + footer (docs/index.html:602–610) — the § 1 objective is explicitly "message/**call**," yet the site provides zero phone number, zero email, and never names the principal architect or shows a face; the only contact rail is Facebook Messenger + a form. For a homeowner trusting a stranger with their biggest investment, an unreachable, faceless practice fails the primary objective's "call" half and its "trustworthy local" framing. → Add a tappable phone number (in hero-adjacent proof card, footer, and Contact card) and name the licensed principal with a portrait on About/Contact.

### Important (should fix this revision pass)

- **Primary CTA copy "Get Your Brief"** — hero pill + espresso card + closing, repeated 3× (docs/index.html:458,486,578) — for a 30–55 Batangas homeowner this is architect-trade jargon; "your brief" is not a thing they know they want, so the button doesn't read as "contact the firm." The espresso card's own "Tell us about your site." is far clearer. → Change the primary label to a plainer first-contact verb ("Message us" / "Start your project" / "Send your plans") and keep "Get Your Brief" only as supporting copy.

- **Unverifiable proof numerals** — proof row "12 / 80+ / PRC" (screenshot-home-desktop.png, below fold) — these carry the entire trust load yet are placeholder figures (brief marks years/projects/license `[verify]`); presented as hard fact with no name behind them, they read as decoration rather than credentials, and an unfilled "PRC" with no licence number proves nothing. → Confirm the real numbers and surface the actual PRC licence number/principal so the stats function as proof, not graphic filler.

- **No third-party trust signals on home** — whole home page (screenshot-home-desktop.png) — for "the biggest thing most families ever build," there is not one testimonial-with-name, client logo, award, real address line, or map; trust rests entirely on self-reported stats. → Add at least one named homeowner testimonial and a concrete address/service-area line to the home funnel.

### Nice to have (skip if budget tight)

- **About hero image mismatch** — screenshot-about-desktop.png — "FORM, THEN DESIGN" sits over what reads as a twin-bed bedroom/guest-room interior, an oddly hospitality-looking choice for an architecture practice's identity statement. → Swap for a build/drafting/structural image that says "architecture" at a glance.

- **Nav label scent** — header "Work / Services / About / Contact" (screenshot-home-desktop.png, top-right) — serviceable but generic; the footer's "Selected Work" and "Start Your Build" carry more scent than the header's bare "Work"/"Contact." → Optionally align header labels to the more concrete footer phrasing.

## Summary for the synthesiser

The funnel is structurally sound and the copy is on-voice, but it ships hollow proof (foreign stock houses labelled as local "Batangas" projects) and is unreachable by phone with no named architect — so it fails § 1's "trustworthy local architect you can call" on exactly the two axes that convert this audience.

ux review written.
