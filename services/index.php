<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Services Listing Page — Y-Not Handyman & Remodel
 * ------------------------------------------------------------------ */

$currentPage = 'services';
$pageType    = 'other';

$pageTitle       = 'Handyman & Remodeling Services in St. George, UT | Y-Not Handyman & Remodel';
$pageDescription = 'Handyman and remodeling services in St. George, UT — drywall, painting, doors, faucets, repairs to full remodels. Locally owned since 2020. Free estimates.';
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/services/';
$ogImage         = $siteUrl . '/assets/images/job-kitchen-finished.jpg';

/* Breadcrumb schema */
$breadcrumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Services', 'url' => '/services/'],
];
$schemaMarkup = generateBreadcrumbSchema($breadcrumbs);

/* Services with photos — same from homepage but full 8 */
$servicesDisplay = [
    [
        'slug' => 'handyman-services', 'name' => 'Handyman Services',
        'photo' => 'job-entry-steps-before', 'icon' => 'wrench',
        'alt'  => 'Old wooden entry step frame being removed before new steps are built',
        'desc' => 'One call for the odd jobs and small fixes stacking up around your home.',
        'bullets' => ['Hourly or per-project rates', 'Punch lists welcome', 'Most jobs in one visit'],
    ],
    [
        'slug' => 'home-remodeling', 'name' => 'Home Remodeling',
        'photo' => 'job-kitchen-finished', 'icon' => 'hammer',
        'alt'  => 'Remodeled kitchen with white shaker cabinets, a new island and wood-look plank flooring',
        'desc' => 'Kitchen, bath, deck and whole-room updates built to hold up for years.',
        'bullets' => ['Kitchens & bathrooms', 'Decks & outdoor living', 'Written, itemized quotes'],
    ],
    [
        'slug' => 'drywall-repair', 'name' => 'Drywall Repair',
        'photo' => 'job-office-drywall-hung', 'icon' => 'layers',
        'alt'  => 'Freshly hung drywall on a new interior wall and doorway before taping',
        'desc' => 'Holes, cracks and water damage patched and textured to disappear.',
        'bullets' => ['Texture matching', 'Paint-ready finish', 'Nail-pop & crack repair'],
    ],
    [
        'slug' => 'door-installation', 'name' => 'Door Installation',
        'photo' => 'job-office-door', 'icon' => 'home',
        'alt'  => 'New interior door in a freshly built and painted wall',
        'desc' => 'Interior and exterior doors hung square, sealed and swinging true.',
        'bullets' => ['Interior & exterior doors', 'Hardware & locksets', 'Weather-tight fit'],
    ],
    [
        'slug' => 'caulking-weatherproofing', 'name' => 'Caulking & Weatherproofing',
        'photo' => 'job-backsplash', 'icon' => 'shield-check',
        'alt'  => 'Patterned tile backsplash finished cleanly along a stone countertop and sink',
        'desc' => 'Sealing the gaps that let desert heat, dust and water into your home.',
        'bullets' => ['Window & door sealing', 'Exterior trim caulking', 'Lower cooling bills'],
    ],
    [
        'slug' => 'interior-painting', 'name' => 'Interior Painting',
        'photo' => 'job-sim-bay-finished', 'icon' => 'paint-bucket',
        'alt'  => 'Simulator bay enclosure with freshly painted gray walls and a dark interior',
        'desc' => 'Clean lines and even coats for a single room or the whole interior.',
        'bullets' => ['Walls, trim & ceilings', 'Careful prep & masking', 'Tidy daily cleanup'],
    ],
    [
        'slug' => 'basic-plumbing-fixture-installation', 'name' => 'Basic Plumbing & Fixture Installation',
        'photo' => 'job-bath-vanity-progress', 'icon' => 'droplets',
        'alt'  => 'Bathroom remodel in progress with a new white vanity, tiled floor and tub surround',
        'desc' => 'Faucets, toilets and fixtures swapped without the full plumber\'s bill.',
        'bullets' => ['Faucet & sink swaps', 'Toilet & fixture installs', 'Leak & drip fixes'],
    ],
    [
        'slug' => 'home-maintenance-repairs', 'name' => 'Home Maintenance & Repairs',
        'photo' => 'job-primary-bath-arch-mudded', 'icon' => 'clipboard-list',
        'alt'  => 'Arched doorway with fresh drywall mud during a primary bathroom renovation',
        'desc' => 'The recurring upkeep that keeps small issues from becoming big ones.',
        'bullets' => ['Seasonal checkups', 'Honey-do list clearing', 'Rental turnovers'],
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ===== Services Listing Page (page <style>) ===== */

/* Interior hero */
.services-hero { background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); color: var(--color-paper); }
.services-hero .hero-text { max-width: 56ch; }
.services-hero .hero-answer { color: rgba(255,255,255,.88); }

/* Services grid */
.services-overview .section-head { max-width: 60ch; margin-bottom: var(--space-7); }

/* CTA band */
.services-cta h2 { max-width: 18ch; }
.services-cta .cta-copy p { max-width: 48ch; }
.services-cta .floating-ring { opacity: .08; top: -70px; right: -50px; }
</style>

<!-- ============================ INTERIOR HERO ============================ -->
<section class="hero hero--interior services-hero" aria-label="Handyman and remodeling services">
  <div class="container">
    <div class="hero-text">
      <span class="eyebrow">St. George, UT</span>
      <h1 class="hero-title">Every handyman and remodeling service your home needs</h1>
      <p class="hero-answer">Y-Not Handyman &amp; Remodel handles the full range of home repair and renovation work across St. George — from a single sticking door to complete kitchen remodels, all managed by one locally owned, owner-run crew.</p>
      <div class="hero-actions">
        <button type="button" class="btn btn-accent btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
        <a class="link-call-light" href="tel:<?php echo $phoneRaw; ?>">
          <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
          or call <?php echo htmlspecialchars($phone); ?>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ============================ ALL SERVICES GRID ============================ -->
<section class="section services-overview" aria-label="Our handyman and remodeling services">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>The handyman and remodeling work <span class="text-accent">St. George</span> homeowners count on</h2>
      <p>From quick repairs to full-scale remodels, Y-Not Handyman &amp; Remodel covers it all. Each service is backed by a written estimate, careful work, and the same accountable crew start to finish.</p>
    </div>

    <div class="services-grid">
      <?php foreach ($servicesDisplay as $i => $svc):
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
          <?php if (servicePageExists($svc['slug'])): ?>
          <a href="/services/<?php echo htmlspecialchars($svc['slug']); ?>/" class="service-card__cta">Learn more</a>
          <?php else: ?>
          <a href="/contact/" class="service-card__cta">Ask about this</a>
          <?php endif; ?>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ CTA BAND ============================ -->
<section class="cta-banner texture-grain slant-top services-cta" aria-label="Request your free estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <span class="floating-ring" aria-hidden="true"></span>
  <div class="container">
    <div class="cta-copy">
      <span class="eyebrow">Ready to Get Started?</span>
      <h2>Let's talk about your project</h2>
      <p>Whether it's one small repair or a full remodel, Y-Not Handyman &amp; Remodel gives you the same careful attention and honest pricing. Get a free written estimate — usually the same day.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get my free estimate</button>
      <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg">Call <?php echo htmlspecialchars($phone); ?></a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
