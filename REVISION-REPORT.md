# Y-Not Handyman & Remodel — Revision Round 1 Report (28 Sep 2026)

Brief: `REVISION-BRIEF.md` (Nancy's "changes requested", 27 Sep). Everything was done on `main` in the working tree. **Nothing was pushed or deployed.**
Preview: https://preview-y-not-handyman-remodel.pageone.cloud/

Commits (oldest first):
1. `Remove all electrical-work mentions (client: licence issue)`
2. `Present Nancy alongside Tony as a point of contact`
3. `Photos: add client's 28 Sep job-photo batch, retire outdated GBP photos`
4. `Logo: client's new Y-Not Handyman & Remodel badge replaces the old mark`
5. `Wire new job photos into pages; gate links to unbuilt service pages; revision report`

---

## 1. Electrical work removed (priority)

| File | Before | After |
|---|---|---|
| services/handyman-services/index.php (FAQ) | "…door adjustments, fixture swaps, basic plumbing and electrical fixes, caulking…" | "…door adjustments, faucet swaps, basic plumbing fixes, caulking…" |
| services/handyman-services/index.php | "A plumber won't come out to swap a single faucet. An electrician won't travel for one outlet. A handyman handles these quick fixes…" | "A plumber won't come out to swap a single faucet. A remodeling contractor won't bid on one sticking door. A handyman handles these quick fixes…" |
| services/handyman-services/index.php | "We handle drywall, painting, doors, fixtures, caulking, basic plumbing and electrical, decks, fences, and more" | "We handle drywall, painting, doors, faucets, caulking, basic plumbing, decks, fences, and more" |
| services/handyman-services/index.php (answer block) | "covers small repairs, fixture installations, punch lists…" | "covers small repairs, faucet and hardware installs, punch lists…" |
| services/handyman-services/index.php (meta description) | "…drywall, painting, fixtures, doors." | "…drywall, painting, faucets, doors." |
| services/handyman-services/index.php (Service schema description) | "…punch lists, fixture installations, door adjustments…" | "…punch lists, faucet and hardware installations, door adjustments…" |
| services/home-remodeling/index.php (FAQ + FAQPage schema) | "Yes. We pull all necessary permits for structural work, electrical, plumbing, and HVAC. Permit costs are included in your estimate, and inspections are scheduled and managed by us." | "Permit needs depend on the scope of the job. During the free estimate we talk through whether your project is likely to need a permit from your city's building department, so there are no surprises before work starts." |
| services/home-remodeling/index.php | "Small vanity, old tile, poor lighting, no storage. A bathroom remodel … adds modern fixtures…" | "Small vanity, old tile, no storage. A bathroom remodel … adds a modern vanity and faucets…" |
| services/home-remodeling/index.php | "…wood paneling, outdated fixtures." | "…wood paneling, dated trim and hardware." |
| services/home-remodeling/index.php (Kitchen) | "…backsplash tile, new appliances, lighting upgrades, flooring, and layout changes." | "…backsplash tile, flooring, and layout changes." |
| services/home-remodeling/index.php (Bathroom) | "New vanities and fixtures, tile showers and tub surrounds, flooring, lighting, ventilation upgrades, and accessibility modifications." | "New vanities and faucets, tile showers and tub surrounds, flooring, and accessibility modifications." |
| services/home-remodeling/index.php (Additions) | "We handle framing, electrical, plumbing, HVAC, drywall, and finish work." | "We handle the framing, drywall, and finish work." |
| services/home-remodeling/index.php (Whole-home) | "…new fixtures and hardware, lighting upgrades, and finish carpentry throughout." | "…new hardware, and finish carpentry throughout." |
| services/home-remodeling/index.php (testimonial) | "…new tile shower, double vanity, lighting, and flooring." | "…new tile shower, double vanity, and flooring." (see "Unsure" below) |
| services/home-remodeling/index.php (why-us) | "We manage design, permits, labor, and inspections. No juggling multiple subcontractors or chasing down different trades." | "We manage the schedule, the labor, and the finish work, and tell you up front if any part of the project needs a separately licensed trade." |
| services/home-remodeling/index.php (hero chip) | "Permits handled for you" | "Written, itemized quotes" (already stated on the service cards) |
| index.php (FAQ + schema) | "…drywall, painting, doors, fixtures, caulking…" | "…drywall, painting, doors, faucets, caulking…" |
| index.php (services intro) | "…interior painting, fixture swaps, decks…" | "…interior painting, faucet swaps, decks…" |
| services/index.php (meta description) | "…drywall, painting, doors, fixtures, repairs…" | "…drywall, painting, doors, faucets, repairs…" |
| about/index.php | "…drywall, painting, doors, fixtures, decks, kitchens, baths." | "…drywall, painting, doors, faucets, decks, kitchens, baths." |
| llms.txt | "…punch lists, fixture installations…" / "(drywall, painting, fixtures)" | "…punch lists, faucet and hardware installs…" / "(drywall, painting, faucets)" |
| llms-full.txt | "…fixture installations…"; "…fixture swaps)"; "Faucets, sinks, toilets, basic plumbing repairs, garbage disposal installation, and water line connections."; "- Fixture installation (light, faucet, etc.): $100–$300" | "…faucet and hardware installs…"; "…faucet swaps)"; "Faucets, sinks, toilets, and basic plumbing repairs."; "- Faucet swap: $100–$300" |
| index.php gallery (retired photo) | caption/alt "accent wall cut in by hand around a ceiling fan" | That photo was retired with the other old GBP photos. It was painting work, not electrical. |

I replaced the general word "fixtures" with "faucets/hardware" everywhere because "fixtures" can be read as light fixtures. I left "fixture" only where it clearly means plumbing: the service name "Basic Plumbing & Fixture Installation" and its "Toilet & fixture installs" bullet. I left "protect floors, furniture, and fixtures" in the painting prep text because it is about masking, not installing anything. I removed garbage-disposal installs because disposals are often hard-wired. I didn't mention light bulbs anywhere because they didn't fit naturally.

**Final grep (as the brief specifies):**
```
$ grep -rniE "electric|outlet|wiring|breaker|panel upgrade|light fixture install" --include=*.php --include=*.txt .
(no output — zero hits)
```
I also checked the rendered HTML of all 16 pages, including JSON-LD, for `electric|outlet|wiring|breaker|lighting`, and the build-plan and config data: **0 hits**. A wider sweep for `lighting|light fixture|switch|ceiling fan|electrician|disposal|ventilation` also returned 0 hits in page copy. The only `switch` hits are PHP `switch()` statements in the icon code.

## 2. Photos

I downloaded and reviewed all 35 client uploads (33 job photos and 2 logos). Masters were resized to ≤150KB with EXIF/GPS stripped. `image-variants.mjs` generated 480/960 webp+avif variants, plus 1600 for the landscape shots. Every `<img>` has width/height and alt text that describes what is actually in the photo. In the rendered pages, no photo is used more than twice.

**Photos I didn't use:**
- `Mandys ToDo.jpg`: a phone screenshot of a to-do list, not a job photo. It also lists "fix light", "take down chandelier" and "hang fairy lights".
- `JeansMB_TearOut1.jpg`: shows exposed wiring hanging from the ceiling. I left it out because of the electrical brief.
- `Birdies_DoneInside.jpg`: a byte-for-byte duplicate of `Birdies_Done.jpg`.
- `JeansKit_Before`, `GarageGolfSim_FromScratch1`, `GarageGolfSim_Inside`, `Birdies_Before`, `Tylers_InProgress1`, `Tylers_InProgressFraming1`, `JeansMB_TearOut`: there were no free slots or better picks were available. These are easy to add later.

**Retired:** all old `gbp-*` photos (203 files including variants). None were still needed because a new photo fits every slot. The old logo files and old favicons are also gone; they remain in git history.

| Page | Slot | New photo (source file) |
|---|---|---|
| Home | Hero (LCP) + OG | job-kitchen-finished (JeansKit_AlmostDone) |
| Home | Service cards: Handyman / Remodeling / Drywall / Door / Caulking / Painting / Plumbing / Maintenance | entry-steps-finished (NewStairs_Done) / kitchen-finished-2 (JeansKit_AlmostDone1) / office-drywall-mud (Birdies_InProgress) / office-door (Birdies_Done) / backsplash (Backsplash) / office-finished (Birdies_Done1) / bath-finished (JeansBath_Done) / primary-bath-arch (JeansMB_TearOut2) |
| Home | Gallery (8) | kitchen-cabinets-install (JeansKit_Progress1), bath-tile-progress (JeansBath_InProgress1), garage-framing (GarageGolfSim_FromScratch), sim-bay-finished (Tylers_Complete), office-framing (Birdies_Framing), kitchen-new-floor (JeansKit_NewFloor), sim-bay-drywall (Tylers_InProgress), entry-steps-before (NewStairs_Before) |
| Home | About block | sim-bay-framing (Tylers_InProgressFraming) |
| Services | OG + 8 cards | kitchen-finished; entry-steps-before, kitchen-finished, office-drywall-hung (Birdies_Walls), office-door, backsplash, sim-bay-finished, bath-vanity-progress (JeansBath_InProgress), primary-bath-arch-mudded (JeansMB_InProgress) |
| Handyman Services | Feature image + OG + preload | entry-steps-finished |
| Home Remodeling | Feature image + OG + preload | bath-finished |
| Drywall Repair | Feature image + OG + preload | sim-bay-drywall-tape (Tylers_InProgress2) |
| Door Installation | Feature image + OG + preload | office-finished |
| About | Story image + OG | kitchen-cabinets-doors (JeansKit_Progress2) |
| Service Area | Hero | kitchen-cabinets-install. This also fixes a broken `gbp-05-1600` srcset that pointed at a file that didn't exist. |
| Contact | OG only | kitchen-finished-2 |

## 3. Logo decision

**I switched to the new logo.** `Logo PNG.png` is the client's new full badge (2048×2732, "Y-NOT HANDYMAN & REMODEL"). The old mark was a 500px GBP thumbnail reading only "Y-NOT HANDYMAN". The new PNG actually sits on an opaque white field, so I removed the white by flood-filling from the outer edge only (the white "HANDYMAN" lettering is kept) and trimmed it.

The new logo is saved under versioned names:
- `logo-mark-v2.png/.webp` (264px) for the nav and footer
- `logo-v2.png` (400px) for schema `logo`/`image` and the OG fallback
- `favicon-v2*` for the favicons

In the header it is 78px tall on desktop (70px when scrolled) and 72px on mobile. The bar is only 83px tall, so the old 96px logo overflowed it; 78px keeps the whole badge visible. The JPG version is the same artwork, so I didn't use it.

I kept the phone number that's printed on the badge ("801.833.1588"). It matches the site's number, and cropping it would cut through the badge's bottom plank. **Check with CM:** the standard says "crop baked-in phone numbers". The site's palette (charcoal/burnt-orange) came from the old logo. It sits fine next to the new badge's brown/orange, but CM may want to re-derive the accent colour.

## 4. Nancy as a point of contact

I changed every place that called Tony the only contact:
- **Home:** the about paragraph ("…his wife Nancy handles scheduling and keeps you updated… You deal with the same two people…"), the signature (now "Tony & Nancy" with both roles), the FAQ ("Nancy will offer the first available time"), the estimate form intro ("Nancy will get back to you") and "What happens next" ("Nancy or Tony calls or texts").
- **About:** hero answer ("…owner Tony Pomikala and his wife Nancy…"), a new story line ("Tony runs the work on site, and his wife Nancy handles scheduling and communication…"), "you talk to Tony or Nancy", and "Tony and Nancy return calls quickly".
- **Handyman and Remodeling pages:** the "one point of contact" lines now name Tony and Nancy, and the FAQ says "Tony and Nancy return calls".
- **Thank-you page, llms.txt and llms-full.txt:** updated the same way. The llms files have a new line: "Scheduling & communication: Nancy (Tony's wife)".

I didn't give Nancy a surname or an owner title. Phone and email are unchanged. `$ownerName` and the build-plan still say Tony Pomikala.

## 5. Other fix (outside the brief)

The nav, footer, home and services cards, and the sitemap all linked to 4 service pages that were never built: caulking-weatherproofing, interior-painting, basic-plumbing-fixture-installation and home-maintenance-repairs. All four returned 404. The folders exist in the working tree but are empty and aren't tracked in git. I added `servicePageExists()` to `includes/functions.php`, which checks for `index.php`. Nav, footer and sitemap now list only built pages. Cards for unbuilt services still show but link to "/contact/ — Ask about this". The links will switch over automatically once those pages exist. `sitemap.php` now also loads `functions.php`.

## 6. QA gate

- `php -l`: 23 files, 0 errors.
- `php -S 127.0.0.1:8091`: all 16 routes return 200 (404.php returns 404 by design) with 0 notices or warnings.
- Every internal href/src and every srcset file resolves. The one exception is `/sitemap.xml`, which only works through the `.htaccess` rewrite on Apache; `php -S` and the nginx preview don't apply it.
- `qa_audit.py . standard`: **Grade B (90%), 0 blockers, PASSED**, up from a clean-HEAD baseline of **B (86%), 0 blockers**. Failures dropped from 50 to 30.
  - The 5 non-image failures were all there before and are outside this brief: CTA-band form on About, industry schema subtype, nav scroll transition, a carousel-lib false positive in main.js, and llms.txt sections.
  - The other 25 are "Image resolution" warnings. That check flags every `-480` responsive variant and favicon simply for being 480px/32px, so the only way to clear them would be to game the check. That's why the grade isn't an A.
- I also looked at screenshots of Home (desktop and 390px), Services, About and Home Remodeling.

## 7. Unsure — please review

1. **Testimonials on the service pages** (Sarah M., David R., Brian K., Mark T. …) look like draft placeholder copy; I couldn't match them to a source. I removed "lighting" from the remodel quote. If it's a real review, confirm with the client before quoting it. If it isn't real, all of these quotes should be swapped for real GBP reviews.
2. **Plumbing:** "Basic Plumbing & Fixture Installation" is an intake service, so I kept it (faucets, sinks, toilets, basic repairs, "we call a licensed plumber for complex work"). Nothing presents it as licensed trade work. Confirm this is within Utah's handyman exemption.
3. **HVAC:** the only claim was in the additions sentence, and it's been removed.
4. **Permits/structural** claims still on the Home Remodeling page:
   - "from design consultation and permits to final walkthrough"
   - "from initial design and permitting through … final inspection"
   - Decks: "We handle structural design, permits, and inspections"
   - Service Area: "familiar with Washington County building codes, permit requirements"
   - llms: "Proper permitting for all work that requires permits"

   None of these mention electrical, so I kept them per the brief, but none has a source. Confirm Y-Not actually pulls permits and does structural design; if not, they should be removed.
5. **Additions** ("Add a bedroom… finish a basement") usually involve electrical. The copy now claims only framing, drywall and finish, and the why-us line says Y-Not tells you up front if a separately licensed trade is needed. Worth confirming the client wants to keep advertising additions.
6. Photo subjects I inferred from file names. "Birdies" photos are described as "a commercial space" (black acoustic ceiling, lounge seating). "Tylers" photos are described as a "simulator bay". The garage room is described as a "golf simulator room", as its file name says.
7. The badge logo keeps its baked-in phone number (see §3).
