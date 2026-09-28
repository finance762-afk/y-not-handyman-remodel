<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Door Installation — Y-Not Handyman & Remodel
 * Service: Door Installation · St. George, UT
 * ------------------------------------------------------------------ */

$currentPage = 'door-installation';
$pageType    = 'service';
$serviceSlug = 'door-installation';

$pageTitle       = 'Door Installation in St. George, UT | Y-Not Handyman & Remodel';
$pageDescription = 'Interior and exterior door installation in St. George, UT. Local, owner-run contractor for new doors, replacements, hardware, weatherstripping. Free estimates.';
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/services/door-installation/';
$ogImage         = $siteUrl . '/assets/images/job-office-finished.jpg';

/* Service data for schema */
$currentService = getServiceBySlug($serviceSlug);

/* FAQs */
$serviceFaqs = [
    [
        'q' => 'How much does door installation cost in St. George?',
        'a' => 'Interior door installation typically runs $150 to $400 per door including labor and hardware. Exterior door installation ranges from $400 to $1,200 depending on the door type, weatherproofing needs, and trim work. We give you a written estimate before starting.',
    ],
    [
        'q' => 'How long does door installation take?',
        'a' => 'A single interior door usually takes 2-4 hours. Exterior doors take longer — 3-6 hours — because they require precise fitting, weatherstripping, threshold adjustment, and hardware installation. We give you an accurate timeline upfront.',
    ],
    [
        'q' => 'Can you help me select the right door?',
        'a' => 'Yes. We walk you through door options — solid core vs hollow, slab vs pre-hung, material, style, and hardware — and recommend what fits your budget and needs. We work with local suppliers to get quality doors at fair prices.',
    ],
    [
        'q' => 'Do you install exterior doors and weatherproof them?',
        'a' => 'Yes. We install exterior doors, adjust the threshold for a tight seal, install weatherstripping, caulk the trim, and ensure the door closes securely. Proper weatherproofing keeps dust, heat, and moisture out in St. George\'s desert climate.',
    ],
    [
        'q' => 'Do you haul away the old door?',
        'a' => 'Yes. We remove the old door and trim, haul it away, and clean up the job site. You won\'t have debris sitting in your driveway.',
    ],
];

/* Schema: @graph with Service, BreadcrumbList, FAQPage */
$serviceSchema = [
    '@type' => 'Service',
    '@id' => $siteUrl . '/services/door-installation/#service',
    'name' => 'Door Installation',
    'description' => 'Professional door installation services in St. George, UT. We install interior and exterior doors, replace old doors, upgrade hardware, and weatherproof entries for a secure, energy-efficient fit.',
    'provider' => ['@id' => $siteUrl . '#organization'],
    'areaServed' => [
        '@type' => 'City',
        'name' => 'St. George, UT'
    ],
    'serviceType' => 'Door Installation'
];

$breadcrumbSchema = [
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => $siteUrl . '/'
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Services',
            'item' => $siteUrl . '/services/'
        ],
        [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => 'Door Installation',
            'item' => $siteUrl . '/services/door-installation/'
        ]
    ]
];

$faqSchema = [
    '@type' => 'FAQPage',
    'mainEntity' => array_map(function($faq) {
        return [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a']
            ]
        ];
    }, $serviceFaqs)
];

$schemaMarkup = generateGraphSchema([$serviceSchema, $breadcrumbSchema, $faqSchema]);

/* Hero preload */
$heroPreload = [
    'srcset' => '/assets/images/job-office-finished-480.avif 480w, /assets/images/job-office-finished-960.avif 960w',
    'sizes'  => '(max-width: 900px) 100vw, 50vw',
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ===== Door Installation Page (page <style>) ===== */

/* Hero */
.sp-hero .hero-grid--form { align-items: start; }
.sp-hero .hero-form-card { position: sticky; top: calc(var(--nav-height) + var(--space-3)); }

/* Problem section */
.sp-problem .problem-intro { font-size: var(--fs-lead); color: var(--color-ink-2); max-width: 58ch; margin-bottom: var(--space-6); }
.sp-problem .bento-grid { display: grid; gap: var(--space-4); grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); }
.sp-problem .bento-card { background: var(--color-paper); border-radius: var(--radius-lg); padding: var(--space-5); box-shadow: var(--shadow-sm); }
.sp-problem .bento-card h3 { font-size: var(--fs-4); margin-bottom: var(--space-2); }

/* Expert positioning */
.sp-expert .expert-grid { display: grid; gap: var(--space-6); grid-template-columns: 1fr 1.2fr; align-items: center; }
.sp-expert .expert-stat { font-family: var(--font-accent); font-size: 3rem; color: var(--color-primary); line-height: 1; margin-bottom: var(--space-3); }
.sp-expert .expert-differentiators { display: grid; gap: var(--space-3); margin-top: var(--space-4); }
.sp-expert .diff-item { display: flex; gap: var(--space-2); align-items: start; }
.sp-expert .diff-item svg { flex-shrink: 0; color: var(--color-accent); margin-top: 2px; }

/* Service breakdown */
.sp-breakdown .breakdown-grid { display: grid; gap: var(--space-5); margin-top: var(--space-6); }
.sp-breakdown .breakdown-item { display: grid; grid-template-columns: auto 1fr; gap: var(--space-4); padding: var(--space-5); background: var(--color-surface); border-radius: var(--radius); }
.sp-breakdown .breakdown-icon { width: 56px; height: 56px; display: flex; align-items: center; justify-content: center; background: var(--color-accent-muted); border-radius: var(--radius); color: var(--color-accent-dark); flex-shrink: 0; }
.sp-breakdown .breakdown-item h3 { margin-bottom: var(--space-2); }

/* Proof/reviews */
.sp-proof { background: var(--color-surface); }
.sp-proof .proof-stat { text-align: center; margin-bottom: var(--space-7); }
.sp-proof .proof-stat .stat-number { font-family: var(--font-accent); font-size: 3.2rem; color: var(--color-accent); }
.sp-proof .testimonials { display: grid; gap: var(--space-5); }
.sp-proof .testimonial { background: var(--color-paper); padding: var(--space-5); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); }
.sp-proof .testimonial-stars { color: var(--color-star); margin-bottom: var(--space-3); }
.sp-proof .testimonial-author { margin-top: var(--space-3); font-weight: 600; }

/* Comparison */
.sp-comparison .comparison-grid { display: grid; gap: var(--space-6); grid-template-columns: 1fr 1fr; margin-top: var(--space-6); }
.sp-comparison .comparison-col h3 { margin-bottom: var(--space-4); }
.sp-comparison .comparison-item { display: flex; gap: var(--space-2); align-items: start; margin-bottom: var(--space-3); }
.sp-comparison .comparison-item svg { flex-shrink: 0; margin-top: 2px; }
.sp-comparison .comp-other { opacity: .7; }
.sp-comparison .comp-us svg { color: var(--color-accent); }
.sp-comparison .comp-other svg { color: var(--color-muted); }

/* FAQ */
.sp-faq .faq-grid { max-width: 76ch; }

/* Final CTA */
.sp-final-cta h2 { max-width: 20ch; }

@media (max-width: 900px) {
  .sp-expert .expert-grid,
  .sp-comparison .comparison-grid { grid-template-columns: 1fr; }
  .sp-hero .hero-form-card { position: static; }
}
</style>

<!-- ============================ HERO ============================ -->
<section class="hero hero--light sp-hero" aria-label="Door Installation in St. George">
  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-copy">
        <span class="eyebrow">Door Installation · St. George, UT</span>
        <h1 class="hero-title">Professional door installation for St. George homes</h1>
        <p class="hero-answer">Y-Not Handyman &amp; Remodel installs interior and exterior doors across St. George — from single replacements to full-home door upgrades — with precise fitting, quality hardware, and weatherproofing that keeps heat and dust out.</p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <a class="link-call" href="tel:<?php echo $phoneRaw; ?>">
            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
            or call <?php echo htmlspecialchars($phone); ?>
          </a>
        </div>
        <ul class="hero-chips">
          <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>Owner-operated since 2020</li>
          <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="m9 16 2 2 4-4"/></svg>Interior &amp; exterior</li>
          <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>Weatherproofed &amp; sealed</li>
        </ul>
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
              <option value="Door Installation" selected>Door Installation</option>
              <?php foreach ($services as $heroOpt): if ($heroOpt['slug'] !== 'door-installation'): ?>
              <option value="<?php echo htmlspecialchars($heroOpt['name']); ?>"><?php echo htmlspecialchars($heroOpt['name']); ?></option>
              <?php endif; endforeach; ?>
            </select>
          </div>
          <label class="consent"><input type="checkbox" name="terms_accepted" value="yes" required><span>I agree to the <a href="/terms/" target="_blank" rel="noopener">Terms</a> and <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a>. *</span></label>
          <button type="submit" class="btn btn-primary btn-block">Get my free estimate</button>
        </form>
      </aside>

    </div>
  </div>
</section>

<!-- ============================ PROBLEM STATEMENT ============================ -->
<section class="section sp-problem" aria-label="When you need door installation">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">The Problem</span>
      <h2>When should you replace or install a <span class="text-accent">new door?</span></h2>
      <p class="answer-block">When doors stick, gaps let dust and heat in, hardware fails, or the door no longer matches your home's style — and you need a secure, energy-efficient replacement installed properly the first time.</p>
      <p class="problem-intro">St. George homeowners call us when they notice these issues:</p>
    </div>

    <div class="bento-grid reveal-up">
      <div class="bento-card">
        <h3>The door sticks, drags, or won't close</h3>
        <p>Warped wood, settling foundation, or worn hinges cause doors to bind or refuse to latch. Adjusting or replacing the door restores smooth operation.</p>
      </div>
      <div class="bento-card">
        <h3>Gaps around the door let dust and heat in</h3>
        <p>Exterior doors without proper weatherstripping allow St. George's heat and dust to pour in, raising your cooling bills. A properly sealed door keeps the elements out.</p>
      </div>
      <div class="bento-card">
        <h3>Old hollow-core doors feel cheap</h3>
        <p>Thin hollow-core interior doors dent easily, sound hollow, and lack privacy. Upgrading to solid-core doors adds weight, durability, and noise reduction.</p>
      </div>
      <div class="bento-card">
        <h3>You're remodeling and need updated doors</h3>
        <p>New flooring, trim, or paint makes old doors look dated. Fresh doors complete the updated look and add value to your home.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section section--light sp-expert" aria-label="Why choose Y-Not for door installation">
  <div class="container">
    <div class="expert-grid">
      <div class="reveal-left">
        <picture>
          <source type="image/avif" srcset="/assets/images/job-office-finished-480.avif 480w, /assets/images/job-office-finished-960.avif 960w" sizes="(max-width: 900px) 100vw, 45vw">
          <img src="/assets/images/job-office-finished.jpg" srcset="/assets/images/job-office-finished-480.webp 480w, /assets/images/job-office-finished-960.webp 960w" sizes="(max-width: 900px) 100vw, 45vw" alt="New interior wall and wood door finished and painted by Y-Not Handyman &amp; Remodel" width="1500" height="2000" loading="lazy" decoding="async">
        </picture>
      </div>

      <div class="reveal-right">
        <span class="eyebrow-label">Our Difference</span>
        <h2>Why do St. George homeowners choose <span class="text-accent">Y-Not</span> for door installation?</h2>
        <p class="answer-block">Because Y-Not Handyman &amp; Remodel measures precisely, levels carefully, and installs doors that close smoothly, latch securely, and seal tight — with quality hardware and clean trim work that lasts.</p>

        <div class="expert-stat">6 <span style="font-size:.5em;opacity:.7;">years serving St. George</span></div>

        <div class="expert-differentiators">
          <div class="diff-item">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <p><strong>Precision fitting every time.</strong> We measure, shim, and level each door so it swings smoothly, closes without binding, and seals tight against the frame.</p>
          </div>
          <div class="diff-item">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <p><strong>Proper weatherproofing on exterior doors.</strong> We install weatherstripping, adjust thresholds, and caulk trim so heat, dust, and moisture stay outside.</p>
          </div>
          <div class="diff-item">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <p><strong>Clean, finished trim work.</strong> We install or touch up casing and trim around each door, caulk gaps, and leave a paint-ready or finished surface.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ SERVICE BREAKDOWN ============================ -->
<section class="section sp-breakdown" aria-label="What's included in door installation">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">What We Handle</span>
      <h2>What's included in our <span class="text-accent">door installation</span> service?</h2>
      <p class="answer-block">Y-Not Handyman &amp; Remodel handles every step of door installation — from removing the old door and prepping the opening to installing the new door, leveling, weatherproofing, hardware installation, and trim finishing.</p>
    </div>

    <div class="breakdown-grid reveal-up">
      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M9 3v18"/></svg>
        </div>
        <div>
          <h3>Interior Door Installation</h3>
          <p>Install new bedroom, bathroom, closet, and hallway doors. We hang pre-hung or slab doors, install hinges and hardware, and adjust for smooth operation.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
        </div>
        <div>
          <h3>Exterior Door Installation</h3>
          <p>Install front, back, and side entry doors. We level, shim, install weatherstripping, adjust thresholds, and seal the perimeter to keep dust and heat out.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 2H3v16h5v4l4-4h5l4 4v-4h0V2z"/><path d="M7 8h10"/><path d="M7 12h10"/></svg>
        </div>
        <div>
          <h3>Door Replacement</h3>
          <p>Remove old worn or damaged doors, prep the opening, and install a new door in the same frame. Faster and more affordable than a full frame replacement.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M15 9h0"/></svg>
        </div>
        <div>
          <h3>Hardware Installation &amp; Upgrades</h3>
          <p>Install new locksets, deadbolts, handles, hinges, and door stops. We can also upgrade existing hardware to modern finishes and styles.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
        </div>
        <div>
          <h3>Weatherstripping &amp; Threshold Adjustment</h3>
          <p>Install or replace weatherstripping on exterior doors, adjust thresholds for a tight seal, and caulk trim to prevent air and dust infiltration.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18"/><path d="M3 18h18"/><path d="M3 6h18"/></svg>
        </div>
        <div>
          <h3>Trim &amp; Casing Installation</h3>
          <p>Install or replace door casing and trim, caulk gaps, and leave a paint-ready or stained finish. We match existing trim styles or install new modern profiles.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROOF / REVIEWS ============================ -->
<section class="section sp-proof" aria-label="Customer reviews and proof">
  <div class="container">
    <div class="proof-stat reveal-up">
      <div class="stat-number">5.0 ★</div>
      <p>From <?php echo $reviewCount; ?> verified Google reviews</p>
    </div>

    <div class="reveal-up">
      <span class="eyebrow-label">What Our Customers Say</span>
      <h2>Why do St. George homeowners trust <span class="text-accent">Y-Not</span> for door installation?</h2>
      <p class="answer-block">Because the doors close smoothly, seal tightly, and look professionally finished — and the job gets done on schedule without surprises.</p>
    </div>

    <div class="reveal-up" style="margin-top:var(--space-5);text-align:center;">
      <a href="https://www.google.com/maps/place/?q=place_id:ChIJCeywCKNFyoARDSbMDhHeo8o" class="btn btn-primary" target="_blank" rel="noopener">Read our <?php echo $reviewCount; ?> reviews on Google</a>
    </div>

    <div class="reveal-up" style="margin-top:var(--space-6);text-align:center;">
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" class="btn btn-secondary" target="_blank" rel="noopener">Leave us a Google review</a>
    </div>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section sp-comparison" aria-label="Y-Not vs other door installers">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">How We Compare</span>
      <h2>How does Y-Not compare to <span class="text-accent">other door installation contractors?</span></h2>
      <p class="answer-block">Y-Not Handyman &amp; Remodel is local, meticulous, and accountable — you get doors installed level and secure, weatherproofed properly, and finished cleanly, not a rushed job with gaps and binding.</p>
    </div>

    <div class="comparison-grid reveal-up">
      <div class="comparison-col comp-other">
        <h3>Other Door Installers</h3>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Doors installed crooked or out of level</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Gaps around exterior doors let dust and heat in</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Hardware installed crooked or loose</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Trim gaps uncaulked or poorly finished</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Old door and debris left for you to dispose of</p>
        </div>
      </div>

      <div class="comparison-col comp-us">
        <h3>Y-Not Handyman &amp; Remodel</h3>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Every door installed level, plumb, and square</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Exterior doors sealed tight with weatherstripping and caulk</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Quality hardware installed securely and aligned properly</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Trim caulked, sanded, and paint-ready or finished</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Old door removed and hauled away, site cleaned</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section section--light sp-faq" aria-label="Door installation FAQ">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">Common Questions</span>
      <h2>Door installation <span class="text-accent">questions</span> answered</h2>
    </div>
    <div class="faq-grid">
      <?php foreach ($serviceFaqs as $fi => $faq): ?>
      <details class="faq"<?php echo $fi < 2 ? ' open' : ''; ?>>
        <summary><?php echo htmlspecialchars($faq['q']); ?></summary>
        <p><?php echo htmlspecialchars($faq['a']); ?></p>
      </details>
      <?php endforeach; ?>
    </div>
    <p class="faq-aside reveal-up">More questions? <a href="tel:<?php echo $phoneRaw; ?>">Call <?php echo htmlspecialchars($phone); ?></a> or <a href="#estimate-form">send us your project details</a> and we'll get right back.</p>
  </div>
</section>

<!-- ============================ FINAL CTA ============================ -->
<section class="cta-banner texture-grain slant-top sp-final-cta" aria-label="Get your free estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div class="cta-copy">
      <span class="eyebrow">Owner-operated since 2020</span>
      <h2>Let's upgrade your doors</h2>
      <p>Get a free written estimate for your door installation project — usually within a day or two. No obligation, no pressure.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get my free estimate</button>
      <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg">Call <?php echo htmlspecialchars($phone); ?></a>
    </div>
  </div>
</section>

<p style="text-align:center;padding:var(--space-5) 0;color:var(--color-muted);font-size:.92rem;">Last updated: <?php echo date('F Y'); ?></p>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
