# Y-Not Handyman & Remodel — draft revision round 1 (28 Sep 2026)

The client (Nancy, Tony Pomikala's wife, y.nothm70@gmail.com) sent the draft back with "changes requested" on
27 Sep. Her words, verbatim:
> I just sent a bunch of recent job photos, so you could delete most of the outdated ones you have.
> Please make sure nothing electrical is mentioned. We DO NOT handle anything electrical. That's a license
> violation. We can change lightbulbs...
> I'm not trying to take away from Tony, but he's not the only "one point of contact". His wife Nancy is very
> much involved.

Work in THIS repo on the current branch (`main`); the working tree is served noindexed at
https://preview-y-not-handyman-remodel.pageone.cloud. Do NOT push and do NOT deploy anywhere — this is a draft.
Standards: `~/crm/references/` (design-system, performance-2026, seo-aeo-2026) and this repo's CLAUDE.md.

## 1. Remove ALL electrical work — this is the priority (licence issue)
- Every page, include, FAQ, schema (JSON-LD serviceType/makesOffer/hasOfferCatalog), meta description, title,
  llms.txt, llms-full.txt, sitemap captions, image alt text and captions: no electrical services, no "basic
  electrical", no "outlet", "wiring", "switch", "fixture wiring", "electrical permits", no "we handle framing,
  electrical, plumbing…". Changing a light bulb is fine to mention only if it reads naturally; otherwise omit.
- Where a sentence says "we pull permits for structural, electrical, plumbing and HVAC", rewrite it so it no longer
  claims electrical (and do not ADD any new claims — licences, insurance, warranties, years — that are not already
  supported; if unsure, remove). Also check plumbing/HVAC claims are not presented as licensed trade work unless the
  site already had a source for it; flag any you are unsure about in the report rather than inventing.
- A caption like "accent wall cut in around a ceiling fan" is painting, not electrical — keep it.
- Finish with `grep -rniE "electric|outlet|wiring|breaker|panel upgrade|light fixture install" --include=*.php --include=*.txt .`
  → zero hits that offer electrical work (list any remaining hits and why they are fine).

## 2. Photos: use the client's new job photos, drop the outdated ones
- `inventory/client-photos-all.json` lists every image on file. The ones with `"uploaded": "2026-09-28…"` and
  `"source": "client_upload"` are Nancy's new batch (33 job photos + 2 logo files). Download them (curl with a browser
  UA), look at each one, and use them as the site's primary photos: heroes, service pages (match each photo to the
  service it shows), gallery. Retire most of the older GBP photos as she asked (keep an old one only where no new
  photo fits). Do not reuse one photo more than twice sitewide.
- If one of the new logo files is better than the current logo (higher resolution / cleaner), use it.
- Resize/compress to the performance budget and generate 480/960/1600 webp(+avif) with
  `node ~/crm/scripts/image-variants.mjs assets/images <file.jpg …>` (pass file names WITH extension). Width/height
  on every <img>, descriptive alt text that describes what is actually in the photo.

## 3. Nancy as a point of contact
- About page + anywhere the copy says Tony is the single point of contact: present it as Tony and his wife Nancy
  running the business together (Nancy handles scheduling and communication). Do not invent Nancy's surname or
  any other biography details. Contact details (phone/email) stay as they are.

## QA gate
- `php -l` on every PHP file; render every page via `php -S 127.0.0.1:8091` (never port 8000) → 200, no notices.
- `python3 ~/crm/qa/qa_audit.py . standard --slug y-not-handyman-remodel` → grade A (or no worse than before),
  0 blockers. Re-run after your last change.
- Commit in logical steps. Finish with `REVISION-REPORT.md` (every electrical mention removed: file + before/after
  sentence; photos added/retired per page; logo decision; anything you were unsure about) and `touch .revision-done`.
