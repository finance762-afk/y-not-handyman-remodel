<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

/* ---- Page Setup ---------------------------------------------------------- */
$currentPage    = 'service-area';
$pageType       = 'other';
$pageTitle      = "Service Areas | $siteName | St. George & Surrounding UT Communities";
$pageDescription = "Y-Not Handyman & Remodel serves St. George, Washington, Hurricane, Santa Clara, Ivins and Leeds with handyman and remodeling services. Locally owned since 2020.";
$metaDescription = $pageDescription;
$canonicalUrl   = $siteUrl . '/service-area/';

/* ---- Schema Markup ------------------------------------------------------- */
$breadcrumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Service Areas', 'url' => '/service-area/'],
];

$breadcrumbSchema = generateBreadcrumbSchema($breadcrumbs);
$schemaMarkup = $breadcrumbSchema;

/* ---- Hero Image Preload -------------------------------------------------- */
$heroPreload = [
    'srcset' => '/assets/images/gbp-05-480.avif 480w, /assets/images/gbp-05-960.avif 960w, /assets/images/gbp-05-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* ---- Includes ------------------------------------------------------------ */
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero hero--interior">
  <picture>
    <source
      type="image/avif"
      srcset="/assets/images/gbp-05-480.avif 480w,
              /assets/images/gbp-05-960.avif 960w,
              /assets/images/gbp-05-1600.avif 1600w"
      sizes="100vw">
    <img
      src="/assets/images/gbp-05.jpg"
      srcset="/assets/images/gbp-05-480.webp 480w,
              /assets/images/gbp-05-960.webp 960w,
              /assets/images/gbp-05-1600.webp 1600w"
      sizes="100vw"
      alt="Professional handyman services throughout St. George and Washington County"
      width="1600"
      height="900"
      loading="eager"
      fetchpriority="high">
  </picture>
  <div class="hero-overlay"></div>
  <div class="container hero-content">
    <div class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">Service Areas</span>
    </div>
    <h1>Professional <span class="text-accent">Handyman & Remodeling Services</span> in St. George & Surrounding Communities</h1>
    <p class="hero-answer">
      Y-Not Handyman & Remodel is proud to serve homeowners throughout Washington County, Utah. From quick repairs to complete remodels, we bring the same quality craftsmanship and honest pricing to every community we serve.
    </p>
    <div class="hero-cta-group">
      <a href="/#estimate" class="btn btn-primary btn-lg">Get Free Estimate</a>
      <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-secondary btn-lg">
        <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <?php echo htmlspecialchars($phone); ?>
      </a>
    </div>
  </div>
</section>

<!-- Service Areas Grid -->
<section class="section service-areas-section">
  <div class="container">
    <div class="section-header">
      <p class="eyebrow">WHERE WE WORK</p>
      <h2>Trusted Handyman Services Across <span class="text-accent">Washington County</span></h2>
      <p class="section-intro">
        We're based in St. George and serve the entire region with the same commitment to quality, reliability, and transparent pricing. Whether you're in a downtown neighborhood or a rural community, we're ready to help with your home repair and remodeling needs.
      </p>
    </div>

    <div class="areas-grid">
      <!-- St. George -->
      <article class="area-card card-tint-1">
        <div class="area-card__header">
          <svg aria-hidden="true" class="area-card__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          <h3 class="area-card__title">St. George</h3>
        </div>
        <p class="area-card__description">
          Our home base. Serving historic downtown, Entrada, Stone Cliff, Bloomington Hills, and every St. George neighborhood with fast response times and local expertise. From century-old homes in the downtown historic district to newer developments in the Red Cliffs area, we understand St. George's unique housing landscape.
        </p>
        <ul class="area-card__features">
          <li>Familiar with local building codes</li>
          <li>Expert in both historic and modern homes</li>
        </ul>
      </article>

      <!-- Washington -->
      <article class="area-card card-tint-2">
        <div class="area-card__header">
          <svg aria-hidden="true" class="area-card__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          <h3 class="area-card__title">Washington</h3>
        </div>
        <p class="area-card__description">
          Serving Washington's growing residential areas including Green Valley, Coral Canyon, and surrounding communities. We work with homeowners throughout this rapidly expanding city to maintain and improve homes of all ages and styles.
        </p>
        <ul class="area-card__features">
          <li>Experience with newer construction standards</li>
          <li>HOA-compliant exterior work</li>
          <li>Serving Green Valley and Coral Canyon</li>
        </ul>
      </article>

      <!-- Hurricane -->
      <article class="area-card card-tint-3">
        <div class="area-card__header">
          <svg aria-hidden="true" class="area-card__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          <h3 class="area-card__title">Hurricane</h3>
        </div>
        <p class="area-card__description">
          Providing reliable handyman and remodeling services to Hurricane's diverse neighborhoods from Main Street's historic homes to newer developments. We understand the unique challenges of this area's desert climate and adapt our work accordingly.
        </p>
        <ul class="area-card__features">
          <li>Weatherproofing for desert conditions</li>
          <li>Experience with older home renovations</li>
          <li>Wind and sun damage repairs</li>
        </ul>
      </article>

      <!-- Santa Clara -->
      <article class="area-card card-tint-1">
        <div class="area-card__header">
          <svg aria-hidden="true" class="area-card__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          <h3 class="area-card__title">Santa Clara</h3>
        </div>
        <p class="area-card__description">
          Trusted by Santa Clara homeowners for repairs, renovations, and ongoing home maintenance. From the Swiss Village area to the newer developments near the Santa Clara River, we provide quality workmanship throughout this tight-knit community.
        </p>
        <ul class="area-card__features">
          <li>Respectful of community character</li>
          <li>Experience with varying terrain challenges</li>
          <li>Prompt service to all neighborhoods</li>
        </ul>
      </article>

      <!-- Ivins -->
      <article class="area-card card-tint-2">
        <div class="area-card__header">
          <svg aria-hidden="true" class="area-card__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          <h3 class="area-card__title">Ivins</h3>
        </div>
        <p class="area-card__description">
          Serving Ivins' beautiful residential communities with careful attention to the area's unique aesthetic standards. We work on homes near Snow Canyon, Kayenta, and throughout Ivins with the same quality craftsmanship and respect for the environment that residents expect.
        </p>
        <ul class="area-card__features">
          <li>Sensitive to scenic area requirements</li>
          <li>Experience with premium home finishes</li>
          <li>Familiar with Red Mountain and Kayenta standards</li>
        </ul>
      </article>

      <!-- Leeds -->
      <article class="area-card card-tint-3">
        <div class="area-card__header">
          <svg aria-hidden="true" class="area-card__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          <h3 class="area-card__title">Leeds</h3>
        </div>
        <p class="area-card__description">
          Providing dependable handyman services to Leeds and the surrounding rural areas. We appreciate the character of this community and work carefully on homes ranging from historic properties to modern builds, always respecting the area's small-town atmosphere.
        </p>
        <ul class="area-card__features">
          <li>No job too small or remote</li>
          <li>Understanding of rural property needs</li>
          <li>Flexible scheduling for outlying areas</li>
        </ul>
      </article>
    </div>
  </div>
</section>

<!-- Map Section -->
<section class="section section-alt map-section">
  <div class="container">
    <div class="section-header">
      <p class="eyebrow">FIND US</p>
      <h2>Serving the Greater <span class="text-accent">St. George Area</span></h2>
      <p class="section-intro">
        Based in St. George, we serve a <?php echo $seo['target_radius'] ?? 30; ?>-mile radius throughout Washington County. If you're in the area and need a reliable handyman or remodeling contractor, we'd be happy to help.
      </p>
    </div>

    <div class="map-container">
      <?php if (!empty($gbpMapEmbed)): ?>
        <?php echo $gbpMapEmbed; ?>
      <?php else: ?>
      <div class="map-placeholder">
        <svg aria-hidden="true" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
        <p><strong><?php echo htmlspecialchars($siteName); ?></strong></p>
        <p><?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?> <?php echo htmlspecialchars($address['zip']); ?></p>
        <a href="<?php echo htmlspecialchars($directionsUrl); ?>" target="_blank" rel="noopener" class="btn btn-primary">
          Get Directions
          <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/></svg>
        </a>
      </div>
      <?php endif; ?>
    </div>

    <div class="service-radius-note">
      <p>
        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
        <strong>Not sure if we serve your area?</strong> We're always expanding our service radius. Give us a call at <a href="tel:<?php echo $phoneRaw; ?>"><?php echo htmlspecialchars($phone); ?></a> and we'll let you know if we can help.
      </p>
    </div>
  </div>
</section>

<!-- Why Choose Us Section -->
<section class="section why-local-section">
  <div class="container-narrow">
    <div class="section-header">
      <p class="eyebrow">LOCAL EXPERTISE</p>
      <h2>Why Choose a <span class="text-accent">Local</span> Handyman?</h2>
    </div>

    <div class="why-local-grid">
      <div class="why-local-item">
        <div class="why-local-icon">
          <svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8v4l3 3"/><circle cx="12" cy="12" r="10"/></svg>
        </div>
        <h3>Faster Response Times</h3>
        <p>Being local means short drive times and quick turnaround on estimates, and urgent repairs are fitted in as soon as the schedule allows.</p>
      </div>

      <div class="why-local-item">
        <div class="why-local-icon">
          <svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <h3>Community Reputation</h3>
        <p>Our reputation is built on relationships with neighbors, not just transactions. We live here, work here, and care about this community.</p>
      </div>

      <div class="why-local-item">
        <div class="why-local-icon">
          <svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M16 13H8"/><path d="M16 17H8"/><path d="M10 9H8"/></svg>
        </div>
        <h3>Local Code Knowledge</h3>
        <p>We're familiar with Washington County building codes, permit requirements, and the specific challenges of working in Southern Utah's climate.</p>
      </div>

      <div class="why-local-item">
        <div class="why-local-icon">
          <svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3>Accountability</h3>
        <p>We stand behind our work because we'll still be here next year. Local businesses depend on customer satisfaction and referrals to thrive.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="section cta-section">
  <div class="container">
    <div class="cta-card">
      <div class="cta-content">
        <p class="eyebrow">READY TO GET STARTED?</p>
        <h2>Let's Talk About Your <span class="text-accent">Project</span></h2>
        <p>No matter where you are in Washington County, we're ready to help with your home repair or remodeling needs. From small fixes to complete renovations, we deliver the same quality craftsmanship and honest pricing to every job.</p>
        <ul class="cta-features">
          <li>
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
            Free, no-obligation estimates
          </li>
          <li>
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
            Locally owned since 2020
          </li>
          <li>
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
            5.0-star Google rating
          </li>
        </ul>
      </div>
      <div class="cta-actions">
        <a href="/#estimate" class="btn btn-primary btn-lg btn-block">Get Your Free Estimate</a>
        <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-secondary btn-lg btn-block">
          <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Call <?php echo htmlspecialchars($phone); ?>
        </a>
        <p class="cta-footnote">We typically respond within the same business day.</p>
      </div>
    </div>
  </div>
</section>

<style>
/* Service Areas Page Styles */

.service-areas-section {
  padding: var(--space-3xl) 0;
}

.areas-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(min(320px, 100%), 1fr));
  gap: var(--space-lg);
  margin-top: var(--space-2xl);
}

.area-card {
  padding: var(--space-xl);
  border-radius: var(--radius-lg);
  background: var(--color-bg);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.area-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}

.area-card__header {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  margin-bottom: var(--space-md);
}

.area-card__icon {
  color: var(--color-accent);
  flex-shrink: 0;
}

.area-card__title {
  font-size: var(--fs-h3);
  font-family: var(--font-heading);
  margin: 0;
}

.area-card__description {
  color: var(--color-text-light);
  margin-bottom: var(--space-md);
  line-height: 1.6;
}

.area-card__features {
  list-style: none;
  padding: 0;
  margin: 0;
}

.area-card__features li {
  padding: var(--space-xs) 0;
  padding-left: var(--space-lg);
  position: relative;
  color: var(--color-text-light);
  font-size: 0.9375rem;
}

.area-card__features li::before {
  content: '✓';
  position: absolute;
  left: 0;
  color: var(--color-accent);
  font-weight: 600;
}

/* Map Section */
.map-section {
  background: var(--color-bg-alt);
}

.map-container {
  margin-top: var(--space-2xl);
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
}

.map-placeholder {
  background: var(--color-bg);
  padding: var(--space-3xl);
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--space-md);
}

.map-placeholder svg {
  color: var(--color-accent);
  margin-bottom: var(--space-md);
}

.map-placeholder p {
  margin: 0;
  color: var(--color-text-light);
}

.map-placeholder strong {
  color: var(--color-text);
  font-size: var(--fs-h4);
}

.service-radius-note {
  margin-top: var(--space-xl);
  padding: var(--space-lg);
  background: rgba(var(--color-accent-rgb), 0.1);
  border-left: 4px solid var(--color-accent);
  border-radius: var(--radius);
}

.service-radius-note p {
  margin: 0;
  display: flex;
  align-items: flex-start;
  gap: var(--space-md);
  color: var(--color-text-light);
}

.service-radius-note svg {
  color: var(--color-accent);
  flex-shrink: 0;
  margin-top: 2px;
}

.service-radius-note a {
  color: var(--color-accent);
  font-weight: 600;
  text-decoration: underline;
}

/* Why Local Section */
.why-local-section {
  padding: var(--space-3xl) 0;
}

.why-local-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(min(280px, 100%), 1fr));
  gap: var(--space-xl);
  margin-top: var(--space-2xl);
}

.why-local-item {
  text-align: center;
}

.why-local-icon {
  width: 72px;
  height: 72px;
  margin: 0 auto var(--space-md);
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, rgba(var(--color-accent-rgb), 0.1), rgba(var(--color-accent-rgb), 0.05));
  border-radius: 50%;
  color: var(--color-accent);
}

.why-local-item h3 {
  font-size: var(--fs-h4);
  font-family: var(--font-heading);
  margin-bottom: var(--space-sm);
}

.why-local-item p {
  color: var(--color-text-light);
  line-height: 1.6;
}

/* CTA Section */
.cta-section {
  padding: var(--space-3xl) 0;
  background: var(--color-bg-dark);
  color: #fff;
}

.cta-card {
  display: grid;
  grid-template-columns: 1fr;
  gap: var(--space-2xl);
  align-items: center;
}

@media (min-width: 768px) {
  .cta-card {
    grid-template-columns: 1.5fr 1fr;
  }
}

.cta-content .eyebrow {
  color: rgba(255, 255, 255, 0.7);
}

.cta-content h2 {
  color: #fff;
  margin-bottom: var(--space-md);
}

.cta-content p {
  color: rgba(255, 255, 255, 0.85);
  line-height: 1.7;
  margin-bottom: var(--space-lg);
}

.cta-features {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}

.cta-features li {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  color: rgba(255, 255, 255, 0.9);
}

.cta-features svg {
  color: var(--color-accent);
  flex-shrink: 0;
}

.cta-actions {
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}

.cta-footnote {
  text-align: center;
  font-size: 0.875rem;
  color: rgba(255, 255, 255, 0.7);
  margin: 0;
}

/* Responsive adjustments */
@media (max-width: 767px) {
  .areas-grid {
    grid-template-columns: 1fr;
  }

  .why-local-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
