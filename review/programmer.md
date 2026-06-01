# FRONTEND ENGINEER REVIEW

## What I saw

Four desktop/mobile screenshots rendered cleanly — home (1440 + 375), about, contact. The home hero shows a full-bleed warm interior photo with a knock-out Anton headline "WE SHAPE THE HOME YOU'LL LIVE IN" and a moss pill CTA; below it an oversized-numeral proof row (12 / 80+ / PRC) with an espresso callout card overhanging the grid. About leads with a duotone-screened interior and a "FORM, THEN DESIGN" hero; contact pairs a labelled brief form with a dark "REACH US" card. Markup is genuinely strong under the hood: `header > nav[aria-label="Primary"]`, `main#main`, `section`/`article`/`aside`/`figure`/`figcaption`/`address` landmarks are used correctly throughout, a working skip-link is present, every `<img>` carries a real descriptive `alt`, `html[lang="en"]` is set, the mobile toggle wires `aria-expanded`/`aria-controls`, and the form has properly `for`/`id`-associated `<label>`s plus a `tabindex="-1"` honeypot.

But pixels and source diverge on the things that matter at ship time: the contact form's `action` is a literal placeholder (`formspree.io/f/REPLACE_ME`), every page lazy-loads its own LCP hero image, the home-page JSON-LD points its logo/image at a path that does not exist at this base, and several `<!-- TODO -->` notes ride along in the exported HTML.

## Findings

### Ship blockers (must fix before publish)

- **Contact brief form** — `docs/contact.html:433` (`action="https://formspree.io/f/REPLACE_ME"`), TODO at `:431` — the only lead-capture form on the site POSTs to a non-existent Formspree endpoint; every submission 404s/errors, and the literal token `REPLACE_ME` ships in production HTML (also fails the "no TBD/placeholder" rule). → Insert the firm's real Formspree form ID (or swap to a working endpoint), and remove the placeholder before publish.

### Important (should fix this revision pass)

- **Hero `<img>` on every page** — `docs/index.html:453`, `about.html:403`, `contact.html:416`, `services.html:409`, `work.html:411` all set `loading="lazy"` on the above-the-fold hero — the LCP element — which defers the largest paint and measurably hurts LCP. → Change hero images to `loading="eager"` + `fetchpriority="high"` and keep `loading="lazy"` only on the below-the-fold images.
- **JSON-LD structured data** — `docs/index.html:410-411` (`"logo": "/uploads/logo.jpg"`, `"image": "/uploads/logo.jpg"`, `"url": "/"`) — these resolve to the domain root, not the `/anyoatdisenyotest2/` base, so the LocalBusiness logo/image references a 404 and `url` points off-site; Google will drop the logo. → Use absolute URLs matching the canonical base (`https://robertobendi.github.io/anyoatdisenyotest2/uploads/logo.jpg` and `.../anyoatdisenyotest2/`).
- **Leftover `<!-- TODO -->` comments in exported HTML** — `docs/contact.html:431-432, :487`; footer TODO repeated on every page (`index.html:607`, etc.) — internal build notes ("add real phone + email", "replace REPLACE_ME") ship in the public source. → Strip TODO comments from the static export.

### Nice to have (skip if budget tight)

- **Home OG/Twitter image** — `docs/index.html:423-425` — `og:image` is the square `logo.jpg` while `twitter:card` is `summary_large_image` (wants ~1200×630); the social preview will show a cropped/letterboxed logo instead of the hero. → Point `og:image` at a landscape hero photo (e.g. `hero-home.jpg`) sized for large cards.
- **Extensionless internal links + canonicals** — `docs/index.html:439-442`, `canonical :420` — nav hrefs and canonicals are root-absolute and drop `.html` (`/anyoatdisenyotest2/work`) while the build ships flat `work.html` files (no `work/index.html`). GitHub Pages strips `.html` so this works on the target host, but it breaks under local `file://` preview or any host that doesn't. → Acceptable on GH Pages; if portability matters, emit directory-index pages (`work/index.html`).
- **Untagged Tagalog phrases** — `docs/about.html:418` ("Ibig sabihin…"), `contact.html:418` ("Magpasimula"), `:440` — bilingual copy sits inside `lang="en"` with no `lang="tl"`, so screen readers mispronounce it. → Wrap the Tagalog runs in `<span lang="tl">`.
- **Contact-number input type** — `docs/contact.html:440` uses `type="text"` with `inputmode="tel"` — fine, but `type="tel"` is the idiomatic choice and gives better autofill/validation. → Switch to `type="tel"`.

## Summary for the synthesiser

The markup is semantically excellent, but the contact form ships pointed at a placeholder Formspree endpoint (`REPLACE_ME`) so the site's only lead path is dead on arrival — fix that first, then de-lazy the LCP hero images and correct the JSON-LD logo path.
