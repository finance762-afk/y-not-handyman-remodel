<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Homepage — Y-Not Handyman & Remodel (Phase 3)
 * Archetype: warm-human · Tier: standard · Script: photo-led
 * ------------------------------------------------------------------ */

$currentPage = 'home';
$pageType    = 'home';                                   // attribution.php reads $GLOBALS['pageType']

$pageTitle       = 'Handyman & Remodeling in St. George, UT | Y-Not Handyman & Remodel';
$pageDescription = 'Y-Not Handyman & Remodel: family-owned handyman and remodeling contractor in St. George, UT since 2020. Drywall, painting, doors, remodels. Free estimates.';
$metaDescription = $pageDescription; // Alias for backwards compatibility
$canonicalUrl    = $siteUrl . '/';
$ogType          = 'website';
$ogImage         = $siteUrl . '/assets/images/gbp-05.jpg';

/* Hero image preload (LCP) — only 480/960 AVIF variants exist on disk */
$heroPreload = [
    'srcset' => '/assets/images/gbp-05-480.avif 480w, /assets/images/gbp-05-960.avif 960w',
    'sizes'  => '(max-width: 900px) 100vw, 560px',
];

/* FAQ data — from research_brief, plus one local service-area question */
$faqs = [
    [
        'q' => 'How quickly can you start work?',
        'a' => 'Call or send the form and Tony will offer the first available time. Urgent problems like water damage are fitted in as soon as the schedule allows, so it helps to book a free estimate early once the busy season starts.',
    ],
    [
        'q' => 'Do you charge for estimates?',
        'a' => 'No. We provide free, detailed estimates with no obligation. We walk the job, explain the scope, timeline, and cost in plain language, and put it in writing before any work begins.',
    ],
    [
        'q' => 'What types of projects do you handle?',
        'a' => 'Everything from small repairs — drywall, painting, doors, faucets, caulking — to larger projects like kitchen and bath updates, decks, and whole-room remodels. If it is on your home to-do list, ask us.',
    ],
    [
        'q' => 'What areas around St. George do you serve?',
        'a' => 'We serve St. George and the surrounding Washington County communities, including Washington, Hurricane, Santa Clara, Ivins, and Leeds. Not sure if you\'re in range? Give us a call and we\'ll let you know.',
    ],
];

$schemaMarkup = generateFAQSchema($faqs);

/* Home services overview cards — photo, inline icon, copy (3 bullets each).
   Photos limited to the 8 manifest photos that have -480/-960 responsive variants. */
$homeServices = [
    [
        'slug' => 'handyman-services', 'name' => 'Handyman Services',
        'photo' => 'gbp-12', 'icon' => 'wrench',
        'alt'  => 'Living room with a freshly painted accent wall and handyman tools on the table',
        'desc' => 'One call for the odd jobs and small fixes stacking up around your home.',
        'bullets' => ['Hourly or per-project rates', 'Punch lists welcome', 'Most jobs in one visit'],
    ],
    [
        'slug' => 'home-remodeling', 'name' => 'Home Remodeling',
        'photo' => 'gbp-35', 'icon' => 'hammer',
        'alt'  => 'Newly installed composite deck boards and railing on a St. George home',
        'desc' => 'Kitchen, bath, deck and whole-room updates built to hold up for years.',
        'bullets' => ['Kitchens & bathrooms', 'Decks & outdoor living', 'Written, itemized quotes'],
    ],
    [
        'slug' => 'drywall-repair', 'name' => 'Drywall Repair',
        'photo' => 'gbp-05', 'icon' => 'layers',
        'alt'  => 'Smoothly finished and repainted interior wall with clean baseboard lines',
        'desc' => 'Holes, cracks and water damage patched and textured to disappear.',
        'bullets' => ['Texture matching', 'Paint-ready finish', 'Nail-pop & crack repair'],
    ],
    [
        'slug' => 'door-installation', 'name' => 'Door Installation',
        'photo' => 'gbp-07', 'icon' => 'home',
        'alt'  => 'Interior doorway and closet opening with fresh paint and trim',
        'desc' => 'Interior and exterior doors hung square, sealed and swinging true.',
        'bullets' => ['Interior & exterior doors', 'Hardware & locksets', 'Weather-tight fit'],
    ],
    [
        'slug' => 'caulking-weatherproofing', 'name' => 'Caulking & Weatherproofing',
        'photo' => 'gbp-37', 'icon' => 'shield-check',
        'alt'  => 'Composite deck steps and railing sealed against the elements',
        'desc' => 'Sealing the gaps that let desert heat, dust and water into your home.',
        'bullets' => ['Window & door sealing', 'Exterior trim caulking', 'Lower cooling bills'],
    ],
    [
        'slug' => 'interior-painting', 'name' => 'Interior Painting',
        'photo' => 'gbp-11', 'icon' => 'paint-bucket',
        'alt'  => 'Bedroom masked and prepped for a full interior repaint',
        'desc' => 'Clean lines and even coats for a single room or the whole interior.',
        'bullets' => ['Walls, trim & ceilings', 'Careful prep & masking', 'Tidy daily cleanup'],
    ],
    [
        'slug' => 'basic-plumbing-fixture-installation', 'name' => 'Basic Plumbing & Fixture Installation',
        'photo' => 'gbp-13', 'icon' => 'droplets',
        'alt'  => 'Bedroom refresh with a new window and fixtures installed',
        'desc' => 'Faucets, toilets and fixtures swapped without the full plumber\'s bill.',
        'bullets' => ['Faucet & sink swaps', 'Toilet & fixture installs', 'Leak & drip fixes'],
    ],
    [
        'slug' => 'home-maintenance-repairs', 'name' => 'Home Maintenance & Repairs',
        'photo' => 'gbp-10', 'icon' => 'clipboard-list',
        'alt'  => 'Repainted window casing and wall during a home maintenance visit',
        'desc' => 'The recurring upkeep that keeps small issues from becoming big ones.',
        'bullets' => ['Seasonal checkups', 'Honey-do list clearing', 'Rental turnovers'],
    ],
];

/* Recent-work gallery — 8 client photos with variants (wide = every 3rd) */
$galleryItems = [
    ['img' => 'gbp-35', 'wide' => true,  'tag' => 'Decks & Carpentry',  'alt' => 'New composite deck boards and white railing on a St. George porch',   'cap' => 'New composite deck boards and railing'],
    ['img' => 'gbp-05', 'wide' => false, 'tag' => 'Interior Painting',  'alt' => 'Repainted interior walls with crisp baseboard lines',                  'cap' => 'Repainted walls, crisp baseboard lines'],
    ['img' => 'gbp-12', 'wide' => false, 'tag' => 'Painting',           'alt' => 'Living-room accent wall cut in by hand around a ceiling fan',          'cap' => 'Living-room accent wall, cut by hand'],
    ['img' => 'gbp-07', 'wide' => true,  'tag' => 'Doors & Trim',       'alt' => 'Fresh paint and trim around an interior closet doorway',              'cap' => 'Fresh paint around a closet doorway'],
    ['img' => 'gbp-37', 'wide' => false, 'tag' => 'Remodeling',         'alt' => 'Composite deck steps and landing rebuilt with new decking',           'cap' => 'Composite steps and landing rebuilt'],
    ['img' => 'gbp-10', 'wide' => false, 'tag' => 'Window Trim',        'alt' => 'Repainted window casing and surrounding wall',                        'cap' => 'Repainted window casing and wall'],
    ['img' => 'gbp-13', 'wide' => true,  'tag' => 'Maintenance',        'alt' => 'Bedroom refreshed with a new window installed and walls repainted',   'cap' => 'Bedroom refresh with new window in place'],
    ['img' => 'gbp-11', 'wide' => false, 'tag' => 'Painting Prep',      'alt' => 'Bedroom masked and prepped for a full repaint',                       'cap' => 'Room masked and prepped for repaint'],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ===== Homepage-specific composition (page <style>; tokens only) ===== */

/* Layered hero: gradient (::before from framework) + noise texture + accents */
.home-hero { isolation: isolate; }
.home-hero .grain { opacity: .35; z-index: -1; }
.home-hero .hero-visual__img img { object-position: 50% 42%; }
.home-hero .floating-accent { top: -6%; right: 8%; width: 220px; height: 220px; border-radius: 50%; background: radial-gradient(closest-side, rgba(var(--color-accent-rgb), .5), transparent 70%); opacity: .12; }
.home-hero .hero-chips { margin-top: var(--space-3); }

/* Ticker content spacing */
.home-ticker .ticker-track > * { color: var(--color-ink-2); }
.home-ticker svg { color: var(--color-accent-dark); width: 18px; height: 18px; }

/* Proof strip: verifiable facts, accent face */
.home-proof .stat-number { font-size: 1.9rem; }
.home-proof .proof-star { color: var(--color-star); }

/* Recent work gallery */
.gallery-section { background: var(--color-surface); }
.gallery-section .gallery-head { display: grid; gap: var(--space-2); max-width: 60ch; margin-bottom: var(--space-6); }
.gallery-section .gallery-head p { margin: 0; color: var(--color-ink-2); }
.gallery-section .gallery-foot { margin-top: var(--space-6); display: flex; flex-wrap: wrap; gap: var(--space-4); align-items: center; }
.gallery-section .floating-ring { opacity: .05; }
.gallery-section .floating-ring--a { top: -60px; left: -80px; }
.gallery-section .floating-ring--b { bottom: -120px; right: -90px; width: 260px; height: 260px; }

/* Services overview */
.home-services .section-head { max-width: 64ch; }
.home-services .section-head .hero-answer { color: var(--color-ink-2); }
.home-services .services-foot { margin-top: var(--space-8); text-align: center; }

/* About / process — asymmetric composition */
.home-about .about-split { align-items: start; }
.home-about .about-copy .eyebrow { margin-bottom: var(--space-1); }
.home-about .about-lead { font-size: var(--fs-lead); color: var(--color-ink-2); }
.home-about .about-right { margin-top: var(--space-10); }
.home-about .about-stat-card { display: grid; gap: var(--space-1); }
.home-about .about-stat-card b { font-family: var(--font-accent); font-size: 1.5rem; color: var(--color-primary); line-height: 1; }
.home-about .about-stat-card span { font-size: .8rem; color: var(--color-muted); }
.home-about .about-signature { margin-top: var(--space-6); display: flex; align-items: center; gap: var(--space-3); }
.home-about .about-signature .sig-name { font-family: var(--font-heading); font-weight: 800; }
.home-about .about-signature .sig-role { font-size: .85rem; color: var(--color-muted); }

/* Mid-page CTA band (dark, grain) */
.home-cta h2 { max-width: 18ch; }
.home-cta .cta-copy p { max-width: 46ch; }
.home-cta .actions { align-items: center; }
.home-cta .floating-ring { opacity: .08; top: -80px; right: -60px; }

/* FAQ */
.home-faq .section-head { max-width: 60ch; }
.home-faq .faq-aside { margin-top: var(--space-6); font-size: .95rem; color: var(--color-ink-2); }
.home-faq .faq-aside a { color: var(--color-primary); font-weight: 600; }

/* Estimate section */
.home-estimate { background: var(--color-paper-2); }
.home-estimate .card { position: relative; }
.home-estimate .estimate-form-head { display: grid; gap: var(--space-2); margin-bottom: var(--space-5); }
.home-estimate .estimate-aside h3 { margin-bottom: var(--space-4); }
.home-estimate .estimate-aside .service-area-line { margin-top: var(--space-5); font-size: .92rem; color: var(--color-ink-2); }
.home-estimate .form-actions { margin-top: var(--space-4); }
.home-estimate .form-actions .footnote { margin-top: var(--space-3); }

/* Shared: full contact form layout on the page */
.p1-form .form-grid { margin-bottom: var(--space-2); }
.p1-form .form-consent-fieldset { margin-top: var(--space-3); }

@media (max-width: 900px) {
  .home-about .about-right { margin-top: var(--space-6); }
}
@media (max-width: 560px) {
  .home-proof .stat-number { font-size: 1.6rem; }
}
</style>

<!-- ============================ HERO ============================ -->
<section class="hero hero--light home-hero" aria-label="Introduction">
  <span class="grain" aria-hidden="true"></span>
  <span class="floating-accent float-animate-slow" aria-hidden="true"></span>
  <div class="container">
    <div class="hero-grid hero-grid--visual">

      <div class="hero-text">
        <span class="eyebrow">St. George, UT &middot; Family-Owned Since 2020</span>
        <h1 class="hero-title">Handyman and remodeling done right in St. George</h1>
        <p class="hero-answer">Y-Not Handyman &amp; Remodel handles the repairs, upgrades, and full remodels most St. George homeowners keep putting off — from drywall patches and door installations to complete room makeovers. We're locally owned and family-run since 2020, delivering reliable work without the runaround.</p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <a class="link-call" href="tel:<?php echo $phoneRaw; ?>">
            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
            or call <?php echo htmlspecialchars($phone); ?>
          </a>
        </div>
        <ul class="hero-chips">
          <li>
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
            Owner-operated
          </li>
          <li>
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="m9 16 2 2 4-4"/></svg>
            Family-owned since 2020
          </li>
          <li>
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>
            Free written estimates
          </li>
        </ul>
      </div>

      <div class="hero-visual">
        <div class="hero-visual__img">
          <picture>
            <source type="image/avif" srcset="/assets/images/gbp-05-480.avif 480w, /assets/images/gbp-05-960.avif 960w" sizes="(max-width: 900px) 100vw, 560px">
            <img src="/assets/images/gbp-05.jpg" srcset="/assets/images/gbp-05-480.webp 480w, /assets/images/gbp-05-960.webp 960w" sizes="(max-width: 900px) 100vw, 560px" alt="Freshly repainted interior room with clean baseboard lines by Y-Not Handyman &amp; Remodel" width="1500" height="2000" loading="eager" fetchpriority="high">
          </picture>
        </div>
        <div class="photo-stack__tag">
          <b>Recent work</b>
          <span>Interior repaint &amp; trim</span>
        </div>

        <aside class="hero-form-card" id="estimate-form">
          <h2>Get a free estimate</h2>
          <p class="hero-form-tagline">No obligation. Same-day reply.</p>
          <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
            <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
            <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
            <?php echo p1_attribution_fields('hero'); ?>
            <input type="hidden" name="consent_version" value="<?php echo htmlspecialchars($consentVersion); ?>">
            <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
            <div class="form-row"><label class="sr-only" for="hero-name">Name</label><input id="hero-name" type="text" name="name" placeholder="Name" autocomplete="name" required></div>
            <div class="form-row"><label class="sr-only" for="hero-phone">Phone</label><input id="hero-phone" type="tel" name="phone" placeholder="Phone" autocomplete="tel" required></div>
            <div class="form-row"><label class="sr-only" for="hero-service">Service needed</label>
              <select id="hero-service" name="service">
                <option value="">What do you need?</option>
                <?php foreach ($services as $heroOpt): ?>
                <option value="<?php echo htmlspecialchars($heroOpt['name']); ?>"><?php echo htmlspecialchars($heroOpt['name']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <label class="consent"><input type="checkbox" name="terms_accepted" value="yes" required><span>I agree to the <a href="/terms/" target="_blank" rel="noopener">Terms</a> and <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a> and consent to be contacted. *</span></label>
            <button type="submit" class="btn btn-primary btn-block">Get my free estimate</button>
          </form>
        </aside>
      </div>

    </div>
  </div>
</section>

<!-- ============================ TICKER ============================ -->
<div class="ticker-strip home-ticker" aria-hidden="true">
  <div class="ticker-track">
    <?php
    $tickerItems = [
        ['star', 'Family-owned since 2020'],
        ['map-pin', 'St. George &amp; Washington County'],
        ['shield-check', 'Owner-operated'],
        ['hammer', 'Repairs to full remodels'],
        ['clock', 'Free same-day quotes'],
        ['check-circle', 'Workmanship you can trust'],
        ['star', '5.0 stars on Google'],
        ['home', 'One accountable contractor'],
    ];
    $tickerSvg = [
        'star'         => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>',
        'map-pin'      => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>',
        'shield-check' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>',
        'hammer'       => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 12-9.373 9.373a1 1 0 0 1-3.001-3L12 9"/><path d="m18 15 4-4"/><path d="m21.5 11.5-1.914-1.914A2 2 0 0 1 19 8.172v-.344a2 2 0 0 0-.586-1.414l-1.657-1.657A6 6 0 0 0 12.516 3H9l1.243 1.243A6 6 0 0 1 12 8.485V10l2 2h1.172a2 2 0 0 1 1.414.586L18.5 14.5"/></svg>',
        'clock'        => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>',
        'check-circle' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>',
        'home'         => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>',
    ];
    // Duplicate the set for a seamless loop
    for ($pass = 0; $pass < 2; $pass++):
      foreach ($tickerItems as $ti): ?>
        <span><?php echo $tickerSvg[$ti[0]]; ?><?php echo $ti[1]; ?></span>
    <?php endforeach; endfor; ?>
  </div>
</div>

<!-- ============================ PROOF STRIP ============================ -->
<section class="stats-band home-proof reveal" aria-label="Why homeowners choose us">
  <div class="container">
    <div class="stats-row">
      <div class="stat-item">
        <span class="stat-number">Est. <span>2020</span></span>
        <span class="stat-label">Locally owned in St. George</span>
      </div>
      <div class="stat-item">
        <span class="stat-number proof-star"><span>5.0</span> &#9733;</span>
        <span class="stat-label">From <?php echo (int)$reviewCount; ?> Google reviews</span>
      </div>
      <div class="stat-item">
        <span class="stat-number"><span><?php echo count($services); ?></span> Trades</span>
        <span class="stat-label">Repairs to full remodels</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">Owner-<span>Run</span></span>
        <span class="stat-label">Tony leads every job</span>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK GALLERY ============================ -->
<section class="section gallery-section edge-curve-top" aria-label="Recent projects">
  <span class="floating-ring floating-ring--a" aria-hidden="true"></span>
  <span class="floating-ring floating-ring--b" aria-hidden="true"></span>
  <div class="container-wide">
    <div class="gallery-head reveal-up">
      <span class="eyebrow">Recent Work</span>
      <h2>A look at recent St. George jobs</h2>
      <p>Real projects from around St. George and Washington County — the repairs, repaints, and rebuilds our neighbors called us for.</p>
    </div>
  </div>
  <div class="container-wide">
    <div class="gallery-track" data-p1-dynamic tabindex="0" aria-label="Project photos — scroll horizontally">
      <?php foreach ($galleryItems as $g): ?>
      <figure class="gallery-item<?php echo $g['wide'] ? ' gallery-item--wide' : ''; ?>">
        <picture>
          <source type="image/avif" srcset="/assets/images/<?php echo $g['img']; ?>-480.avif 480w, /assets/images/<?php echo $g['img']; ?>-960.avif 960w" sizes="(max-width: 600px) 80vw, <?php echo $g['wide'] ? '460px' : '300px'; ?>">
          <img src="/assets/images/<?php echo $g['img']; ?>.jpg" srcset="/assets/images/<?php echo $g['img']; ?>-480.webp 480w, /assets/images/<?php echo $g['img']; ?>-960.webp 960w" sizes="(max-width: 600px) 80vw, <?php echo $g['wide'] ? '460px' : '300px'; ?>" alt="<?php echo htmlspecialchars($g['alt']); ?>" width="1500" height="2000" loading="lazy" decoding="async">
        </picture>
        <figcaption>
          <span class="gallery-item__tag"><?php echo htmlspecialchars($g['tag']); ?></span>
          <span class="gallery-item__cap"><?php echo htmlspecialchars($g['cap']); ?></span>
        </figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="container">
    <div class="gallery-foot reveal-up">
      <a href="/services/" class="btn btn-secondary">See all services</a>
      <span class="gallery-hint">
        <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        Swipe to see more projects
      </span>
    </div>
  </div>
</section>

<!-- ============================ SERVICES ============================ -->
<section class="section section--light home-services" aria-label="Handyman and remodeling services">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What can <span class="text-accent">Y-Not</span> fix or build for your St. George home?</h2>
      <p class="hero-answer">Y-Not Handyman &amp; Remodel covers the full range of home projects for St. George homeowners — from a single sticking door or drywall patch to interior painting, faucet swaps, decks, and complete room remodels, all handled by one accountable crew.</p>
    </div>

    <div class="services-grid">
      <?php foreach ($homeServices as $i => $svc):
        $tint  = ($i % 3) + 1;
        $delay = ($i % 3) + 1;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-up reveal-delay-<?php echo $delay; ?>">
        <div class="service-card__image">
          <picture>
            <source type="image/avif" srcset="/assets/images/<?php echo $svc['photo']; ?>-480.avif 480w, /assets/images/<?php echo $svc['photo']; ?>-960.avif 960w" sizes="(max-width: 720px) 100vw, (max-width: 1000px) 33vw, 290px">
            <img src="/assets/images/<?php echo $svc['photo']; ?>.jpg" srcset="/assets/images/<?php echo $svc['photo']; ?>-480.webp 480w, /assets/images/<?php echo $svc['photo']; ?>-960.webp 960w" sizes="(max-width: 720px) 100vw, (max-width: 1000px) 33vw, 290px" alt="<?php echo htmlspecialchars($svc['alt']); ?>" width="600" height="360" loading="lazy" decoding="async">
          </picture>
        </div>
        <div class="service-card__body">
          <div class="service-card__icon">
            <?php
            switch ($svc['icon']):
              case 'wrench': ?><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.106-3.105c.32-.322.863-.22.983.218a6 6 0 0 1-8.259 7.057l-7.91 7.91a1 1 0 0 1-2.999-3l7.91-7.91a6 6 0 0 1 7.057-8.259c.438.12.54.662.219.984z"/></svg><?php break;
              case 'hammer': ?><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 12-9.373 9.373a1 1 0 0 1-3.001-3L12 9"/><path d="m18 15 4-4"/><path d="m21.5 11.5-1.914-1.914A2 2 0 0 1 19 8.172v-.344a2 2 0 0 0-.586-1.414l-1.657-1.657A6 6 0 0 0 12.516 3H9l1.243 1.243A6 6 0 0 1 12 8.485V10l2 2h1.172a2 2 0 0 1 1.414.586L18.5 14.5"/></svg><?php break;
              case 'layers': ?><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z"/><path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65"/><path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65"/></svg><?php break;
              case 'home': ?><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg><?php break;
              case 'shield-check': ?><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg><?php break;
              case 'paint-bucket': ?><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 7 6 2"/><path d="M18.992 12H2.041"/><path d="M21.145 18.38A3.34 3.34 0 0 1 20 16.5a3.3 3.3 0 0 1-1.145 1.88c-.575.46-.855 1.02-.855 1.595A2 2 0 0 0 20 22a2 2 0 0 0 2-2.025c0-.58-.285-1.13-.855-1.595"/><path d="m8.5 4.5 2.148-2.148a1.205 1.205 0 0 1 1.704 0l7.296 7.296a1.205 1.205 0 0 1 0 1.704l-7.592 7.592a3.615 3.615 0 0 1-5.112 0l-3.888-3.888a3.615 3.615 0 0 1 0-5.112L5.67 7.33"/></svg><?php break;
              case 'droplets': ?><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"/><path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"/></svg><?php break;
              case 'clipboard-list': ?><svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/></svg><?php break;
            endswitch; ?>
          </div>
          <h3><?php echo htmlspecialchars($svc['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($svc['desc']); ?></p>
          <ul>
            <?php foreach ($svc['bullets'] as $b): ?>
            <li><?php echo htmlspecialchars($b); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/services/<?php echo htmlspecialchars($svc['slug']); ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <div class="services-foot reveal-up">
      <a href="/services/" class="btn btn-secondary btn-lg">View all services</a>
    </div>
  </div>
</section>

<!-- ============================ ABOUT / PROCESS ============================ -->
<section class="section home-about" aria-label="About Y-Not Handyman &amp; Remodel">
  <div class="container">
    <div class="about-split">
      <div class="about-copy">
        <span class="eyebrow">Who You're Hiring</span>
        <h2>A St. George neighbor who does what he says</h2>
        <p class="about-lead">Y-Not Handyman &amp; Remodel started in 2020 on a simple idea: St. George homeowners deserve a contractor who shows up, does what he promises, and treats your house like his own.</p>
        <p>Owner Tony Pomikala runs every job personally — from a single sticking door to a full kitchen remodel. You get one accountable point of contact, honest pricing, and a clean job site from the first visit to the final walkthrough. No subcontractor runaround, no surprise line items.</p>

        <ol class="process-steps">
          <li>
            <b>Free on-site estimate</b>
            <span>We walk the job with you and answer questions on the spot.</span>
          </li>
          <li>
            <b>Clear plan &amp; price</b>
            <span>You get the scope, timeline, and cost in writing before we start.</span>
          </li>
          <li>
            <b>Careful, tidy work</b>
            <span>We protect your home, keep the site clean, and keep you posted.</span>
          </li>
          <li>
            <b>Final walkthrough</b>
            <span>We don't call it done until you're happy with every detail.</span>
          </li>
        </ol>

        <div class="about-signature">
          <span class="sig-name">Tony Pomikala</span>
          <span class="sig-role">Owner &amp; Lead Craftsman</span>
        </div>
      </div>

      <div class="about-right">
        <div class="about-image about-image-primary frame__img">
          <picture>
            <source type="image/avif" srcset="/assets/images/gbp-35-480.avif 480w, /assets/images/gbp-35-960.avif 960w" sizes="(max-width: 900px) 100vw, 460px">
            <img src="/assets/images/gbp-35.jpg" srcset="/assets/images/gbp-35-480.webp 480w, /assets/images/gbp-35-960.webp 960w" sizes="(max-width: 900px) 100vw, 460px" alt="Owner-built composite deck with new boards and railing on a St. George home" width="1500" height="2000" loading="lazy" decoding="async">
          </picture>
        </div>
        <div class="about-stat-card">
          <b>Since 2020</b>
          <span>Serving Washington County</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ MID-PAGE CTA BAND ============================ -->
<section class="cta-banner texture-grain slant-top home-cta" aria-label="Book your project">
  <span class="grain-layer" aria-hidden="true"></span>
  <span class="floating-ring" aria-hidden="true"></span>
  <div class="container">
    <div class="cta-copy">
      <span class="eyebrow">Booking Up for the Season</span>
      <h2>Put your project at the top of the list</h2>
      <p>Our calendar fills quickly once St. George's building season hits. Lock in a free estimate today and get your project on the schedule.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get my free estimate</button>
      <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg">Call <?php echo htmlspecialchars($phone); ?></a>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section home-faq" aria-label="Frequently asked questions">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Good Questions</span>
      <h2>Answers before you call</h2>
      <p>The things St. George homeowners ask us most, answered straight.</p>
    </div>
    <div class="faq-grid">
      <?php foreach ($faqs as $fi => $faq): ?>
      <details class="faq"<?php echo $fi < 2 ? ' open' : ''; ?>>
        <summary><?php echo htmlspecialchars($faq['q']); ?></summary>
        <p><?php echo htmlspecialchars($faq['a']); ?></p>
      </details>
      <?php endforeach; ?>
    </div>
    <p class="faq-aside reveal-up">Still have a question? <a href="tel:<?php echo $phoneRaw; ?>">Call <?php echo htmlspecialchars($phone); ?></a> or <a href="#estimate">send us the details</a> and we'll get right back to you.</p>
  </div>
</section>

<!-- ============================ ESTIMATE SECTION ============================ -->
<section class="section home-estimate" id="estimate" aria-label="Request a free estimate">
  <div class="container">
    <div class="estimate">
      <div class="card">
        <div class="estimate-form-head">
          <span class="eyebrow-label">Free Estimate</span>
          <h2>Tell us about the job</h2>
          <p>Send a few details and Tony will get back to you the same day with next steps.</p>
        </div>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="p1-form">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <?php echo p1_attribution_fields('estimate-section'); ?>
          <input type="hidden" name="consent_version" value="<?php echo htmlspecialchars($consentVersion); ?>">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

          <div class="form-grid">
            <div class="field">
              <label for="es-name">Your Name</label>
              <input id="es-name" type="text" name="name" autocomplete="name" required>
            </div>
            <div class="field">
              <label for="es-phone">Phone</label>
              <input id="es-phone" type="tel" name="phone" autocomplete="tel" required>
            </div>
            <div class="field">
              <label for="es-email">Email</label>
              <input id="es-email" type="email" name="email" autocomplete="email" required>
            </div>
            <div class="field">
              <label for="es-service">Service Needed</label>
              <select id="es-service" name="service">
                <option value="">Select a service</option>
                <?php foreach ($services as $esOpt): ?>
                <option value="<?php echo htmlspecialchars($esOpt['name']); ?>"><?php echo htmlspecialchars($esOpt['name']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="field full">
              <label for="es-message">Project Details</label>
              <textarea id="es-message" name="message" rows="4" placeholder="Tell us what you need done and where in St. George you're located."></textarea>
            </div>
          </div>

          <fieldset class="form-consent-fieldset">
            <legend class="form-consent-legend">Communication Consent</legend>

            <label class="form-consent-item">
              <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label">
                <strong>Email updates (optional):</strong> I agree to receive emails from
                <?php echo htmlspecialchars($siteName); ?> about my inquiry, services, and news. I can unsubscribe anytime via the link in any email or by emailing <?php echo htmlspecialchars($email); ?>. Message frequency varies.
              </span>
            </label>

            <label class="form-consent-item">
              <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label">
                <strong>SMS/Text messages (optional):</strong> I agree to receive text messages from
                <?php echo htmlspecialchars($siteName); ?> at the number I provided (appointment reminders, service updates, and offers). Message frequency varies. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help. <strong>Consent is not a condition of purchase.</strong>
              </span>
            </label>

            <label class="form-consent-item form-consent-required">
              <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
              <span class="consent-label">
                I have read and agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span>
              </span>
            </label>
          </fieldset>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
              <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"/><path d="m21.854 2.147-10.94 10.939"/></svg>
              Send my request
            </button>
            <p class="footnote">No obligation. We reply the same day during business hours.</p>
          </div>
        </form>
      </div>

      <aside class="estimate-aside">
        <h3>What happens next</h3>
        <ol class="next-steps">
          <li><strong>We reach out same day</strong> Tony calls or texts to talk through your project and answer questions.</li>
          <li><strong>Free on-site estimate</strong> We walk the job in person and put the scope, timeline, and price in writing.</li>
          <li><strong>We get to work</strong> Once you approve, we put the job on the schedule and confirm the date with you.</li>
        </ol>

        <div class="nap">
          <div>
            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
            <a href="tel:<?php echo $phoneRaw; ?>"><?php echo htmlspecialchars($phone); ?></a>
          </div>
          <div>
            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>
            <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
          </div>
          <div>
            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
            <span><?php echo htmlspecialchars($businessHours); ?></span>
          </div>
        </div>

        <p class="service-area-line">Proudly serving St. George, Washington, Hurricane, Santa Clara, Ivins, and Leeds.</p>
      </aside>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
