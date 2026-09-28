<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Home Remodeling — Y-Not Handyman & Remodel
 * Service: Home Remodeling · St. George, UT
 * ------------------------------------------------------------------ */

$currentPage = 'home-remodeling';
$pageType    = 'service';
$serviceSlug = 'home-remodeling';

$pageTitle       = 'Home Remodeling in St. George, UT | Y-Not Handyman & Remodel';
$pageDescription = 'Kitchen, bathroom, and whole-home remodeling in St. George, UT. Local, owner-run contractor for decks, additions, and complete room updates. Free estimates.';
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/services/home-remodeling/';
$ogImage         = $siteUrl . '/assets/images/gbp-35.jpg';

/* Service data for schema */
$currentService = getServiceBySlug($serviceSlug);

/* FAQs */
$serviceFaqs = [
    [
        'q' => 'How much does a typical home remodel cost in St. George?',
        'a' => 'Kitchen remodels typically range from $15,000 to $50,000 depending on size and finishes. Bathroom remodels run $8,000 to $25,000. Whole-home remodels vary widely based on square footage and scope. We provide free written estimates before any work starts.',
    ],
    [
        'q' => 'How long does a home remodeling project take?',
        'a' => 'A single-room remodel like a bathroom takes 2-4 weeks. Kitchen remodels usually take 4-8 weeks. Whole-home projects can span 2-6 months depending on scope. We give you a detailed timeline in your estimate and keep you updated throughout.',
    ],
    [
        'q' => 'Can you help with design and material selection?',
        'a' => 'Yes. We walk you through design options, recommend materials that fit your budget and lifestyle, and help you visualize the finished space. We work with local suppliers to get you quality materials at fair prices.',
    ],
    [
        'q' => 'Do you handle permits for remodeling work?',
        'a' => 'Permit needs depend on the scope of the job. During the free estimate we talk through whether your project is likely to need a permit from your city\'s building department, so there are no surprises before work starts.',
    ],
    [
        'q' => 'Do you offer financing for larger remodeling projects?',
        'a' => 'We can connect you with local financing partners who specialize in home improvement loans. Many homeowners also use home equity lines or construction loans — we will work with whatever financing you arrange.',
    ],
];

/* Schema: @graph with Service, BreadcrumbList, FAQPage */
$serviceSchema = [
    '@type' => 'Service',
    '@id' => $siteUrl . '/services/home-remodeling/#service',
    'name' => 'Home Remodeling',
    'description' => 'Complete home remodeling services in St. George, UT. We handle kitchen and bathroom remodels, room additions, deck construction, and whole-home renovations with owner-run, locally owned craftsmanship.',
    'provider' => ['@id' => $siteUrl . '#organization'],
    'areaServed' => [
        '@type' => 'City',
        'name' => 'St. George, UT'
    ],
    'serviceType' => 'Home Remodeling'
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
            'name' => 'Home Remodeling',
            'item' => $siteUrl . '/services/home-remodeling/'
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
    'srcset' => '/assets/images/gbp-35-480.avif 480w, /assets/images/gbp-35-960.avif 960w',
    'sizes'  => '(max-width: 900px) 100vw, 50vw',
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ===== Home Remodeling Page (page <style>) ===== */

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
<section class="hero hero--light sp-hero" aria-label="Home Remodeling in St. George">
  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-copy">
        <span class="eyebrow">Home Remodeling · St. George, UT</span>
        <h1 class="hero-title">Transform your St. George home into the space you've always wanted</h1>
        <p class="hero-answer">Y-Not Handyman &amp; Remodel handles kitchen and bathroom remodels, room additions, deck construction, and whole-home renovations across St. George — with one local, owner-run contractor managing every detail from design to final walkthrough.</p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <a class="link-call" href="tel:<?php echo $phoneRaw; ?>">
            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
            or call <?php echo htmlspecialchars($phone); ?>
          </a>
        </div>
        <ul class="hero-chips">
          <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>Owner-operated since 2020</li>
          <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="m9 16 2 2 4-4"/></svg>Free design consultation</li>
          <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>Written, itemized quotes</li>
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
              <option value="Home Remodeling" selected>Home Remodeling</option>
              <?php foreach ($services as $heroOpt): if ($heroOpt['slug'] !== 'home-remodeling'): ?>
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
<section class="section sp-problem" aria-label="When you need home remodeling">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">The Problem</span>
      <h2>When does it make sense to <span class="text-accent">remodel</span> instead of replace?</h2>
      <p class="answer-block">When your St. George home's layout, finishes, or functionality no longer fit how you live — outdated kitchens that slow you down, bathrooms that feel cramped, spaces that waste potential — and you would rather invest in making your current home work than move.</p>
      <p class="problem-intro">St. George homeowners call us when they notice these signs:</p>
    </div>

    <div class="bento-grid reveal-up">
      <div class="bento-card">
        <h3>The kitchen doesn't work anymore</h3>
        <p>Worn cabinets, outdated appliances, poor layout, insufficient storage. You spend more time frustrated in your kitchen than enjoying it. A remodel fixes the workflow and updates the finishes all at once.</p>
      </div>
      <div class="bento-card">
        <h3>The bathroom feels cramped or dated</h3>
        <p>Small vanity, old tile, no storage. A bathroom remodel opens up the space, adds a modern vanity and faucets, and makes mornings less stressful.</p>
      </div>
      <div class="bento-card">
        <h3>You need more space but don't want to move</h3>
        <p>Adding a bedroom, expanding the living room, or building a deck gives you the square footage you need without the cost and hassle of selling and relocating.</p>
      </div>
      <div class="bento-card">
        <h3>The home feels stuck in another decade</h3>
        <p>Popcorn ceilings, carpet throughout, wood paneling, dated trim and hardware. A whole-home remodel brings your space into this century and raises your home's value.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section section--light sp-expert" aria-label="Why choose Y-Not for remodeling">
  <div class="container">
    <div class="expert-grid">
      <div class="reveal-left">
        <picture>
          <source type="image/avif" srcset="/assets/images/gbp-35-480.avif 480w, /assets/images/gbp-35-960.avif 960w" sizes="(max-width: 900px) 100vw, 45vw">
          <img src="/assets/images/gbp-35.jpg" srcset="/assets/images/gbp-35-480.webp 480w, /assets/images/gbp-35-960.webp 960w" sizes="(max-width: 900px) 100vw, 45vw" alt="Composite deck with lattice panels" width="1500" height="2000" loading="lazy" decoding="async">
        </picture>
      </div>

      <div class="reveal-right">
        <span class="eyebrow-label">Our Difference</span>
        <h2>Why do St. George homeowners choose <span class="text-accent">Y-Not</span> for remodeling?</h2>
        <p class="answer-block">Because Y-Not Handyman &amp; Remodel is a locally owned, owner-run contractor who handles the full remodel — from design consultation and permits to final walkthrough — with one accountable team and transparent pricing from day one.</p>

        <div class="expert-stat">6 <span style="font-size:.5em;opacity:.7;">years serving St. George</span></div>

        <div class="expert-differentiators">
          <div class="diff-item">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <p><strong>One contractor, full project.</strong> We manage the schedule, the labor, and the finish work, and tell you up front if any part of the project needs a separately licensed trade.</p>
          </div>
          <div class="diff-item">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <p><strong>Transparent budgeting upfront.</strong> We give you a detailed written estimate with line-item breakdowns. No hidden fees, no surprise change orders.</p>
          </div>
          <div class="diff-item">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <p><strong>Owner-run accountability.</strong> Tony Pomikala personally oversees every remodel. You get one point of contact from estimate to final walkthrough.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ SERVICE BREAKDOWN ============================ -->
<section class="section sp-breakdown" aria-label="What's included in home remodeling">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">What We Handle</span>
      <h2>What's included in our <span class="text-accent">home remodeling</span> services?</h2>
      <p class="answer-block">Y-Not Handyman &amp; Remodel manages every phase of your remodel — from initial design and permitting through demolition, construction, finish work, and final inspection — all with one local, owner-run contractor.</p>
    </div>

    <div class="breakdown-grid reveal-up">
      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"/><path d="m3 9 2.45-4.9A2 2 0 0 1 7.24 3h9.52a2 2 0 0 1 1.8 1.1L21 9"/><path d="M12 3v6"/></svg>
        </div>
        <div>
          <h3>Kitchen Remodels</h3>
          <p>Cabinet installation or refacing, countertops, backsplash tile, flooring, and layout changes. We turn outdated kitchens into efficient, modern spaces.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"/><path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"/></svg>
        </div>
        <div>
          <h3>Bathroom Remodels</h3>
          <p>New vanities and faucets, tile showers and tub surrounds, flooring, and accessibility modifications. Small powder rooms to full master baths.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>
        </div>
        <div>
          <h3>Room Additions &amp; Expansions</h3>
          <p>Add a bedroom, expand a living room, build a sunroom, or finish a basement. We handle the framing, drywall, and finish work.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
        </div>
        <div>
          <h3>Deck &amp; Outdoor Space Construction</h3>
          <p>Composite or wood decks, covered patios, pergolas, and outdoor living spaces built to St. George codes. We handle structural design, permits, and inspections.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"/><path d="M19.409 17.409A2.5 2.5 0 0 1 18 18H6a2.5 2.5 0 0 1-1.409-.591"/><path d="M19.409 6.591A2.5 2.5 0 0 0 18 6H6a2.5 2.5 0 0 0-1.409.591"/><path d="M2 5v14"/><path d="M22 5v14"/></svg>
        </div>
        <div>
          <h3>Flooring Replacement &amp; Updates</h3>
          <p>Hardwood, luxury vinyl plank, tile, and carpet installation. We remove old flooring, prep subfloors, and install new materials with clean transitions.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
        </div>
        <div>
          <h3>Whole-Home Remodels</h3>
          <p>Complete interior renovations — new flooring, updated kitchens and baths, fresh paint, new hardware, and finish carpentry throughout.</p>
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
      <h2>Why do St. George homeowners trust <span class="text-accent">Y-Not</span> for remodeling?</h2>
      <p class="answer-block">Because we finish on schedule, stay within budget, communicate through every step, and leave the job site clean at the end of each day — the basics that matter most on a multi-week project.</p>
    </div>

    <div class="testimonials reveal-up">
      <div class="testimonial">
        <div class="testimonial-stars">★★★★★</div>
        <p>"Tony remodeled our master bathroom from floor to ceiling — new tile shower, double vanity, and flooring. The timeline was exactly what he promised, and the quality is excellent. He cleaned up every day and kept us in the loop throughout."</p>
        <p class="testimonial-author">— Sarah M., St. George</p>
      </div>

      <div class="testimonial">
        <div class="testimonial-stars">★★★★★</div>
        <p>"We hired Y-Not to update our kitchen — new cabinets, countertops, backsplash, and flooring. Tony walked us through material options, kept the job on budget, and the finished kitchen looks amazing. We couldn't be happier."</p>
        <p class="testimonial-author">— David R., Washington</p>
      </div>
    </div>

    <div class="reveal-up" style="margin-top:var(--space-6);text-align:center;">
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" class="btn btn-secondary" target="_blank" rel="noopener">Leave us a Google review</a>
    </div>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section sp-comparison" aria-label="Y-Not vs other remodeling contractors">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">How We Compare</span>
      <h2>How does Y-Not compare to <span class="text-accent">other remodeling contractors?</span></h2>
      <p class="answer-block">Y-Not Handyman &amp; Remodel is owner-run, local, and accountable for the full project — you get one point of contact, transparent pricing, and work Tony stands behind, not a sales rep who disappears after the contract is signed.</p>
    </div>

    <div class="comparison-grid reveal-up">
      <div class="comparison-col comp-other">
        <h3>Other Remodeling Contractors</h3>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Sales rep handles estimate, then you never see them again</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Change orders and surprise charges inflate the final bill</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Timeline stretches weeks past the original schedule</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Different subcontractors every week with no oversight</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Job site left messy for days or weeks</p>
        </div>
      </div>

      <div class="comparison-col comp-us">
        <h3>Y-Not Handyman &amp; Remodel</h3>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Owner Tony manages your project from start to finish</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Line-item written estimate with all costs disclosed upfront</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Realistic timeline provided upfront and honored</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Our crew handles all phases with owner supervision daily</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Site cleaned at the end of every work day</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section section--light sp-faq" aria-label="Home remodeling FAQ">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">Common Questions</span>
      <h2>Home remodeling <span class="text-accent">questions</span> answered</h2>
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
      <h2>Let's transform your St. George home</h2>
      <p>Get a free written estimate and design consultation for your remodeling project — usually within a day or two. No obligation, no pressure.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get my free estimate</button>
      <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg">Call <?php echo htmlspecialchars($phone); ?></a>
    </div>
  </div>
</section>

<p style="text-align:center;padding:var(--space-5) 0;color:var(--color-muted);font-size:.92rem;">Last updated: <?php echo date('F Y'); ?></p>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
