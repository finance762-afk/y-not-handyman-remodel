<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Handyman Services — Y-Not Handyman & Remodel
 * Service: Handyman Services · St. George, UT
 * ------------------------------------------------------------------ */

$currentPage = 'handyman-services';
$pageType    = 'service';
$serviceSlug = 'handyman-services';

$pageTitle       = 'Handyman Services in St. George, UT | Y-Not Handyman & Remodel';
$metaDescription = 'Professional handyman services in St. George, UT. Small repairs to punch lists — drywall, painting, fixtures, doors, and more. Licensed, insured, free estimates. Call (801) 833-1588.';
$canonicalUrl    = $siteUrl . '/services/handyman-services/';
$ogImage         = $siteUrl . '/assets/images/gbp-12.jpg';

/* Service data for schema */
$currentService = getServiceBySlug($serviceSlug);

/* FAQs */
$serviceFaqs = [
    [
        'q' => 'What types of handyman jobs do you handle in St. George?',
        'a' => 'We handle small to medium repairs like drywall patching, door adjustments, fixture swaps, basic plumbing and electrical fixes, caulking, painting touch-ups, deck and fence repairs, and general punch lists. If it fits on a home to-do list, we can help.',
    ],
    [
        'q' => 'Do you charge by the hour or by the job?',
        'a' => 'Either way. For small quick-fix jobs we work hourly with a two-hour minimum. For larger or scoped projects we provide a written per-job quote. We talk through the pricing before we start so you know what to expect.',
    ],
    [
        'q' => 'How quickly can you schedule handyman work?',
        'a' => 'Most handyman work gets scheduled within 24 to 48 hours. If you have an urgent fix we do our best to fit you in same-day. During busy season, booking a few days ahead is safest.',
    ],
    [
        'q' => 'Can you handle my honey-do list all at once?',
        'a' => 'Yes. Bring us a list and we will knock it out in order of priority. Most homeowners find it cheaper and more convenient to batch small jobs rather than call different contractors for every fix.',
    ],
    [
        'q' => 'Do you do both indoor and outdoor handyman work?',
        'a' => 'Yes. We handle interior repairs like drywall and painting, plus outdoor work like caulking, weatherproofing, deck and fence repairs, and exterior door adjustments.',
    ],
];

/* Schema: @graph with Service, BreadcrumbList, FAQPage */
$serviceSchema = [
    '@type' => 'Service',
    '@id' => $siteUrl . '/services/handyman-services/#service',
    'name' => 'Handyman Services',
    'description' => 'Professional handyman services in St. George, UT. We handle small repairs, punch lists, fixture installations, door adjustments, drywall patching, and general home maintenance work.',
    'provider' => ['@id' => $siteUrl . '#organization'],
    'areaServed' => [
        '@type' => 'City',
        'name' => 'St. George, UT'
    ],
    'serviceType' => 'Handyman Services'
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
            'name' => 'Handyman Services',
            'item' => $siteUrl . '/services/handyman-services/'
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
    'srcset' => '/assets/images/gbp-12-480.avif 480w, /assets/images/gbp-12-960.avif 960w',
    'sizes'  => '(max-width: 900px) 100vw, 50vw',
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ===== Handyman Services Page (page <style>) ===== */

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
<section class="hero hero--light sp-hero" aria-label="Handyman Services in St. George">
  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-copy">
        <span class="eyebrow">Handyman Services · St. George, UT</span>
        <h1 class="hero-title">The handyman who tackles your whole to-do list</h1>
        <p class="hero-answer">Y-Not Handyman &amp; Remodel handles the small repairs and odd jobs stacking up around your St. George home — from a single sticking door to an entire punch list, all completed by one licensed, locally owned crew.</p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <a class="link-call" href="tel:<?php echo $phoneRaw; ?>">
            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
            or call <?php echo htmlspecialchars($phone); ?>
          </a>
        </div>
        <ul class="hero-chips">
          <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>Licensed &amp; insured</li>
          <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="m9 16 2 2 4-4"/></svg>Same-day scheduling</li>
          <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>Punch lists welcome</li>
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
              <option value="Handyman Services" selected>Handyman Services</option>
              <?php foreach ($services as $heroOpt): if ($heroOpt['slug'] !== 'handyman-services'): ?>
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
<section class="section sp-problem" aria-label="Common handyman problems">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">The Problem</span>
      <h2>What tells you it's time to call a <span class="text-accent">handyman?</span></h2>
      <p class="answer-block">When small repairs start piling up — a door that sticks, drywall that needs patching, a faucet that drips, a fence that sags — and you would rather pay one professional to knock them all out than spend weekends doing it yourself.</p>
      <p class="problem-intro">St. George homeowners call us when they notice these signs:</p>
    </div>

    <div class="bento-grid reveal-up">
      <div class="bento-card">
        <h3>The to-do list keeps growing</h3>
        <p>Small fixes stack up faster than you can handle them. One weekend project turns into five. A handyman clears the backlog in one visit.</p>
      </div>
      <div class="bento-card">
        <h3>You don't have the right tools</h3>
        <p>Buying specialized tools for a one-time job doesn't make sense. We bring what the job needs — drills, saws, patch kits, caulk guns, paint sprayers.</p>
      </div>
      <div class="bento-card">
        <h3>The job is too small for a specialist</h3>
        <p>A plumber won't come out to swap a single faucet. An electrician won't travel for one outlet. A handyman handles these quick fixes without a three-hour minimum.</p>
      </div>
      <div class="bento-card">
        <h3>You'd rather not DIY it</h3>
        <p>Home repairs eat your weekends and you would pay someone who knows how to do it right the first time. That's what we're here for.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section section--light sp-expert" aria-label="Why choose Y-Not Handyman">
  <div class="container">
    <div class="expert-grid">
      <div class="reveal-left">
        <picture>
          <source type="image/avif" srcset="/assets/images/gbp-05-480.avif 480w, /assets/images/gbp-05-960.avif 960w" sizes="(max-width: 900px) 100vw, 45vw">
          <img src="/assets/images/gbp-05.jpg" srcset="/assets/images/gbp-05-480.webp 480w, /assets/images/gbp-05-960.webp 960w" sizes="(max-width: 900px) 100vw, 45vw" alt="Smoothly finished and repainted interior wall" width="1500" height="2000" loading="lazy" decoding="async">
        </picture>
      </div>

      <div class="reveal-right">
        <span class="eyebrow-label">Our Difference</span>
        <h2>Why do St. George homeowners call <span class="text-accent">Y-Not</span> first?</h2>
        <p class="answer-block">Because Y-Not Handyman &amp; Remodel is a one-call solution for all your small to medium home repairs, run by a licensed local contractor who shows up on time, prices the job honestly, and finishes it right.</p>

        <div class="expert-stat">6 <span style="font-size:.5em;opacity:.7;">years serving St. George</span></div>

        <div class="expert-differentiators">
          <div class="diff-item">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <p><strong>One contractor for everything.</strong> We handle drywall, painting, doors, fixtures, caulking, basic plumbing and electrical, decks, fences, and more — no need to juggle multiple contractors.</p>
          </div>
          <div class="diff-item">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <p><strong>Transparent pricing upfront.</strong> We tell you the cost before we start, whether hourly or per-job. No surprise charges, no hidden fees.</p>
          </div>
          <div class="diff-item">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <p><strong>Owner-run and accountable.</strong> Tony Pomikala manages every job personally. You get one point of contact from estimate to completion.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ SERVICE BREAKDOWN ============================ -->
<section class="section sp-breakdown" aria-label="What's included in handyman services">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">What We Handle</span>
      <h2>What's included in our <span class="text-accent">handyman services?</span></h2>
      <p class="answer-block">Y-Not Handyman &amp; Remodel covers small repairs, fixture installations, punch lists, and general home maintenance work — essentially any job that doesn't require a licensed specialist for the full project.</p>
    </div>

    <div class="breakdown-grid reveal-up">
      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z"/><path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65"/><path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65"/></svg>
        </div>
        <div>
          <h3>Drywall &amp; Painting Touch-Ups</h3>
          <p>Patch nail holes, fix cracks, repair water damage, texture-match, paint touch-ups for walls and trim, and small room repaints.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
        </div>
        <div>
          <h3>Door &amp; Window Repairs</h3>
          <p>Adjust sticking doors, replace worn weatherstripping, install new door hardware, repair or replace screens, and fix window locks.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"/><path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"/></svg>
        </div>
        <div>
          <h3>Basic Plumbing &amp; Fixture Installs</h3>
          <p>Swap faucets, install new showerheads, replace toilet seats and fill valves, fix leaky drips, install towel bars and grab bars.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
        </div>
        <div>
          <h3>Caulking &amp; Weatherproofing</h3>
          <p>Seal windows and doors, recaulk tubs and showers, weatherstrip exterior doors, and seal exterior trim to keep dust and heat out.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 12-9.373 9.373a1 1 0 0 1-3.001-3L12 9"/><path d="m18 15 4-4"/><path d="m21.5 11.5-1.914-1.914A2 2 0 0 1 19 8.172v-.344a2 2 0 0 0-.586-1.414l-1.657-1.657A6 6 0 0 0 12.516 3H9l1.243 1.243A6 6 0 0 1 12 8.485V10l2 2h1.172a2 2 0 0 1 1.414.586L18.5 14.5"/></svg>
        </div>
        <div>
          <h3>Deck, Fence &amp; Outdoor Repairs</h3>
          <p>Replace broken deck boards, tighten loose railings, fix fence panels, and handle small outdoor carpentry projects.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/></svg>
        </div>
        <div>
          <h3>Punch Lists &amp; Honey-Do Lists</h3>
          <p>Bring us a list and we will prioritize and complete it all at once. Most homeowners find it cheaper and more convenient to batch small jobs.</p>
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
      <h2>Why do St. George homeowners trust <span class="text-accent">Y-Not</span> for handyman work?</h2>
      <p class="answer-block">Because we show up on time, price the job fairly, finish it right, and clean up the site when we're done — the basics that too many contractors skip.</p>
    </div>

    <div class="testimonials reveal-up">
      <div class="testimonial">
        <div class="testimonial-stars">★★★★★</div>
        <p>"Tony fixed a laundry list of small repairs around our house — drywall patches, a sticking door, caulking around the shower, and a fence panel that had come loose. He knocked it all out in one day. Honest pricing and good work."</p>
        <p class="testimonial-author">— Mike T., St. George</p>
      </div>

      <div class="testimonial">
        <div class="testimonial-stars">★★★★★</div>
        <p>"We called Y-Not to swap out a few old faucets and install some grab bars in the bathroom. Tony showed up on time, brought all the right tools, and finished the job in a few hours. No drama, no upselling. Will call him again."</p>
        <p class="testimonial-author">— Linda R., Washington</p>
      </div>
    </div>

    <div class="reveal-up" style="margin-top:var(--space-6);text-align:center;">
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" class="btn btn-secondary" target="_blank" rel="noopener">Leave us a Google review</a>
    </div>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section sp-comparison" aria-label="Y-Not vs other handymen">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">How We Compare</span>
      <h2>How does Y-Not compare to <span class="text-accent">other handymen?</span></h2>
      <p class="answer-block">Y-Not Handyman &amp; Remodel is licensed, insured, and owner-run — you get one accountable point of contact, transparent pricing, and guaranteed work, not a different subcontractor every visit.</p>
    </div>

    <div class="comparison-grid reveal-up">
      <div class="comparison-col comp-other">
        <h3>Other Handymen</h3>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Unlicensed or uninsured — you take the liability risk</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Hourly rate unclear until the bill shows up</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>No written estimate — verbal quote only</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Different subcontractors on every visit</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Job site left messy with scrap piles</p>
        </div>
      </div>

      <div class="comparison-col comp-us">
        <h3>Y-Not Handyman &amp; Remodel</h3>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Fully licensed, bonded, and insured across all services</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Transparent pricing discussed before we start</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Free written estimates on all scoped work</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Owner Tony manages every job personally</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Site cleaned daily and debris hauled away</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section section--light sp-faq" aria-label="Handyman services FAQ">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">Common Questions</span>
      <h2>Handyman services <span class="text-accent">questions</span> answered</h2>
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
      <span class="eyebrow">Licensed &amp; Insured Since 2020</span>
      <h2>Let's clear that to-do list</h2>
      <p>Get a free written estimate for your handyman work — usually the same day. No obligation, no pressure.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get my free estimate</button>
      <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg">Call <?php echo htmlspecialchars($phone); ?></a>
    </div>
  </div>
</section>

<p style="text-align:center;padding:var(--space-5) 0;color:var(--color-muted);font-size:.92rem;">Last updated: <?php echo date('F Y'); ?></p>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
