<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * About — Y-Not Handyman & Remodel (Phase 5)
 * ------------------------------------------------------------------ */

$currentPage = 'about';
$pageType    = 'about';

$pageTitle       = 'About Us | Y-Not Handyman & Remodel | St. George, UT';
$pageDescription = 'Meet Y-Not Handyman & Remodel, a locally owned, owner-operated handyman and remodeling contractor serving St. George since 2020. Trusted by local homeowners.';
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/about/';
$ogImage         = $siteUrl . '/assets/images/gbp-05.jpg';

// BreadcrumbList schema
$breadcrumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'About Us', 'url' => '/about/'],
];
$schemaMarkup = generateBreadcrumbSchema($breadcrumbs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* About page-specific styles */
.about-hero {
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  padding: calc(var(--nav-height) + 80px) 0 80px;
  position: relative;
  overflow: hidden;
}
.about-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><filter id="noise"><feTurbulence type="fractalNoise" baseFrequency="0.9" numOctaves="4" /></filter></defs><rect width="100" height="100" filter="url(%23noise)" opacity="0.05"/></svg>');
  opacity: 0.3;
}
.about-hero .container { position: relative; z-index: 2; }
.about-hero h1 {
  color: #fff;
  font-size: clamp(2rem, 5vw, 3rem);
  margin-bottom: 1rem;
  text-wrap: balance;
}
.about-hero .hero-answer {
  color: rgba(255,255,255,0.95);
  font-size: 1.25rem;
  max-width: 700px;
  line-height: 1.6;
  text-wrap: pretty;
}

.story-section {
  padding: 80px 0;
  background: #fff;
}
.story-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  align-items: center;
}
.story-image {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: 0 20px 60px rgba(0,0,0,0.12);
}
.story-image img {
  display: block;
  width: 100%;
  height: auto;
  transition: transform 0.6s ease;
}
.story-image:hover img {
  transform: scale(1.05);
}
.story-content h2 {
  color: var(--color-primary);
  font-size: 2.25rem;
  margin-bottom: 1rem;
}
.story-content .eyebrow-label {
  color: var(--color-accent);
  font-family: var(--font-accent);
  text-transform: uppercase;
  letter-spacing: 0.1em;
  font-size: 0.85rem;
  margin-bottom: 0.5rem;
  display: block;
}
.story-content p {
  color: var(--color-text);
  line-height: 1.8;
  margin-bottom: 1.25rem;
  text-wrap: pretty;
}
.story-content p:last-of-type {
  margin-bottom: 0;
}

.values-section {
  padding: 80px 0;
  background: var(--color-bg-alt);
}
.values-section h2 {
  text-align: center;
  color: var(--color-primary);
  font-size: 2.5rem;
  margin-bottom: 60px;
}
.values-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 40px;
}
.value-card {
  background: #fff;
  padding: 40px 30px;
  border-radius: var(--radius);
  text-align: center;
  box-shadow: 0 4px 20px rgba(0,0,0,0.06);
  transition: all var(--transition);
}
.value-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 32px rgba(0,0,0,0.12);
}
.value-icon {
  width: 64px;
  height: 64px;
  margin: 0 auto 20px;
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
}
.value-card h3 {
  color: var(--color-primary);
  font-size: 1.4rem;
  margin-bottom: 12px;
}
.value-card p {
  color: var(--color-text-light);
  line-height: 1.6;
  font-size: 0.95rem;
}

.certifications-section {
  padding: 80px 0;
  background: #fff;
}
.certifications-section h2 {
  text-align: center;
  color: var(--color-primary);
  font-size: 2.5rem;
  margin-bottom: 40px;
}
.cert-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 30px;
  max-width: 800px;
  margin: 0 auto;
}
.cert-item {
  display: flex;
  align-items: center;
  gap: 20px;
  padding: 30px;
  background: var(--color-bg-alt);
  border-radius: var(--radius);
  border-left: 4px solid var(--color-accent);
}
.cert-icon {
  flex-shrink: 0;
  width: 48px;
  height: 48px;
  color: var(--color-accent);
}
.cert-text h3 {
  color: var(--color-primary);
  font-size: 1.1rem;
  margin-bottom: 4px;
}
.cert-text p {
  color: var(--color-text-light);
  font-size: 0.9rem;
  margin: 0;
}

.cta-band {
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  padding: 80px 0;
  text-align: center;
  position: relative;
}
.cta-band::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><filter id="noise"><feTurbulence type="fractalNoise" baseFrequency="0.9" numOctaves="4" /></filter></defs><rect width="100" height="100" filter="url(%23noise)" opacity="0.05"/></svg>');
  opacity: 0.2;
}
.cta-band .container { position: relative; z-index: 2; }
.cta-band h2 {
  color: #fff;
  font-size: 2.5rem;
  margin-bottom: 20px;
  text-wrap: balance;
}
.cta-band p {
  color: rgba(255,255,255,0.9);
  font-size: 1.2rem;
  margin-bottom: 30px;
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
}
.cta-buttons {
  display: flex;
  gap: 20px;
  justify-content: center;
  flex-wrap: wrap;
}
.btn-white {
  background: #fff;
  color: var(--color-primary);
  padding: 16px 32px;
  border-radius: var(--radius);
  font-weight: 700;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all var(--transition);
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.btn-white:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}
.btn-outline-white {
  background: transparent;
  color: #fff;
  padding: 16px 32px;
  border: 2px solid #fff;
  border-radius: var(--radius);
  font-weight: 700;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all var(--transition);
}
.btn-outline-white:hover {
  background: rgba(255,255,255,0.1);
  transform: translateY(-2px);
}

@media (max-width: 900px) {
  .story-grid {
    grid-template-columns: 1fr;
    gap: 40px;
  }
  .values-grid {
    grid-template-columns: 1fr;
    gap: 30px;
  }
  .cert-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">›</li>
      <li aria-current="page">About Us</li>
    </ol>
  </div>
</nav>

<!-- Hero -->
<section class="about-hero">
  <div class="container">
    <h1>About Y-Not Handyman & Remodel</h1>
    <p class="hero-answer">We're a family-owned handyman and remodeling contractor serving St. George and surrounding communities since 2020. When you hire us, you're working directly with owner Tony Pomikala and his wife Nancy—not a sales team, not a rotating crew, just honest work from people who care about getting it right.</p>
  </div>
</section>

<!-- Story Section -->
<section class="story-section">
  <div class="container">
    <div class="story-grid">
      <div class="story-image">
        <picture>
          <source type="image/avif" srcset="/assets/images/gbp-05-480.avif 480w, /assets/images/gbp-05-960.avif 960w" sizes="(max-width: 900px) 100vw, 50vw">
          <img src="/assets/images/gbp-05.jpg" srcset="/assets/images/gbp-05-480.webp 480w, /assets/images/gbp-05-960.webp 960w" sizes="(max-width: 900px) 100vw, 50vw" alt="Professional handyman work on a St. George home interior" width="800" height="600" loading="lazy">
        </picture>
      </div>
      <div class="story-content">
        <span class="eyebrow-label">Our Story</span>
        <h2>Built on Reliability</h2>
        <p>Y-Not Handyman & Remodel started when Tony Pomikala saw too many homeowners stuck waiting on contractors who never showed up or left jobs half-finished. After years in the trades, he knew there was a better way—treat every home like your own, show up when you say you will, and do the work right the first time.</p>
        <p>Tony runs the work on site, and his wife Nancy handles scheduling and communication, so there's always someone who knows your project when you get in touch.</p>
        <p>Since 2020, we've been serving St. George, Washington, Hurricane, Santa Clara, Ivins, and Leeds with everything from quick repairs to full remodels. We keep our crew small and our standards high. When you call, you talk to Tony or Nancy. When we show up, you know who's doing the work. And when the job's done, it's done right.</p>
        <p>We're not trying to be the biggest contractor in Washington County—we're trying to be the one you call back.</p>
      </div>
    </div>
  </div>
</section>

<!-- Values Section -->
<section class="values-section">
  <div class="container">
    <h2>What Sets Us Apart</h2>
    <div class="values-grid">
      <div class="value-card">
        <div class="value-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3>Family-Owned Since 2020</h3>
        <p>A St. George family business since 2020. You deal directly with the family that owns the company—no call center, no rotating crews.</p>
      </div>

      <div class="value-card">
        <div class="value-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <h3>Locally Owned</h3>
        <p>We live and work in St. George. This is our community. We're not a franchise or national chain—we're your neighbors, and we treat your home accordingly.</p>
      </div>

      <div class="value-card">
        <div class="value-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>
        </div>
        <h3>Transparent Pricing</h3>
        <p>No hidden fees, no surprise charges. We give you a clear, written estimate before any work begins, so you know exactly what you're paying for.</p>
      </div>

      <div class="value-card">
        <div class="value-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h3>Fast Response</h3>
        <p>Tony and Nancy return calls quickly and fit urgent problems in as soon as the schedule allows. When you need help, we're there.</p>
      </div>

      <div class="value-card">
        <div class="value-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
        </div>
        <h3>Full Service Range</h3>
        <p>From minor repairs to major remodels, we handle it all—drywall, painting, doors, faucets, decks, kitchens, baths. One call covers your entire to-do list.</p>
      </div>

      <div class="value-card">
        <div class="value-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
        </div>
        <h3>We Stand Behind Our Work</h3>
        <p>If something isn't right, we come back and make it right—no excuses. Your satisfaction is the measure of our success.</p>
      </div>
    </div>
  </div>
</section>

<!-- Certifications Section -->
<section class="certifications-section">
  <div class="container">
    <h2>Why Homeowners Trust Us</h2>
    <div class="cert-grid">
      <div class="cert-item">
        <div class="cert-icon">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <div class="cert-text">
          <h3>Serving Washington County</h3>
          <p>St. George, Washington, Hurricane, Santa Clara, Ivins, and Leeds</p>
        </div>
      </div>

      <div class="cert-item">
        <div class="cert-icon">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="m9 12 2 2 4-4"/></svg>
        </div>
        <div class="cert-text">
          <h3>Free Estimates</h3>
          <p>Written, no-obligation estimates before any work begins</p>
        </div>
      </div>

      <div class="cert-item">
        <div class="cert-icon">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3.5 13h6"/><path d="m2 16 4.5-9 4.5 9"/><path d="M18 7v9"/><path d="m14 12 4 4 4-4"/></svg>
        </div>
        <div class="cert-text">
          <h3>5.0-Star Rating</h3>
          <p>11 Google reviews, all 5 stars—our reputation speaks for itself</p>
        </div>
      </div>

      <div class="cert-item">
        <div class="cert-icon">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 0 0-16 0"/></svg>
        </div>
        <div class="cert-text">
          <h3>Owner-Operated</h3>
          <p>Tony Pomikala personally oversees every project from estimate to completion</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Band -->
<section class="cta-band">
  <div class="container">
    <h2>Ready to Start Your Project?</h2>
    <p>Let's talk about what you need done. Free estimates, honest pricing, and work that holds up for years.</p>
    <div class="cta-buttons">
      <a href="/contact/" class="btn-white">
        Get a Free Estimate
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
      </a>
      <a href="tel:<?php echo $phoneRaw; ?>" class="btn-outline-white">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        Call <?php echo htmlspecialchars($phone); ?>
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
