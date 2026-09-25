<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Drywall Repair — Y-Not Handyman & Remodel
 * Service: Drywall Repair · St. George, UT
 * ------------------------------------------------------------------ */

$currentPage = 'drywall-repair';
$pageType    = 'service';
$serviceSlug = 'drywall-repair';

$pageTitle       = 'Drywall Repair in St. George, UT | Y-Not Handyman & Remodel';
$pageDescription = 'Professional drywall repair in St. George, UT. Holes, cracks, water damage, texture matching. Fast, local, paint-ready finish. Free estimates since 2020.';
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/services/drywall-repair/';
$ogImage         = $siteUrl . '/assets/images/gbp-05.jpg';

/* Service data for schema */
$currentService = getServiceBySlug($serviceSlug);

/* FAQs */
$serviceFaqs = [
    [
        'q' => 'How much does drywall repair cost in St. George?',
        'a' => 'Small patches like nail holes or minor cracks typically run $75 to $150. Medium repairs like doorknob holes or small water damage run $150 to $400. Larger repairs or whole-wall replacements are priced per square foot, usually $2–$5 per square foot including labor and materials. We give you a written estimate before we start.',
    ],
    [
        'q' => 'Can you match existing texture?',
        'a' => 'Yes. We match knockdown, orange peel, and popcorn textures. After the patch dries we apply texture to blend with the surrounding wall, then prime and paint if needed so the repair disappears.',
    ],
    [
        'q' => 'How long does drywall repair take?',
        'a' => 'Small patches often finish same-day. Medium to large repairs take 1-3 days because each coat of joint compound needs to dry between passes. We will give you a realistic timeline upfront.',
    ],
    [
        'q' => 'Can you fix water-damaged drywall?',
        'a' => 'Yes, if the moisture source is fixed. We cut out soft or moldy drywall, install new material, tape and mud, texture-match, and paint. If the leak is still active we recommend fixing the source first.',
    ],
    [
        'q' => 'Do you offer same-day drywall repair?',
        'a' => 'For small urgent repairs — like a hole before a showing or before guests arrive — we often fit you in same-day. Call us and we will do our best to accommodate you.',
    ],
];

/* Schema: @graph with Service, BreadcrumbList, FAQPage */
$serviceSchema = [
    '@type' => 'Service',
    '@id' => $siteUrl . '/services/drywall-repair/#service',
    'name' => 'Drywall Repair',
    'description' => 'Professional drywall repair services in St. George, UT. We patch holes, fix cracks, repair water damage, and match textures for a seamless paint-ready finish.',
    'provider' => ['@id' => $siteUrl . '#organization'],
    'areaServed' => [
        '@type' => 'City',
        'name' => 'St. George, UT'
    ],
    'serviceType' => 'Drywall Repair'
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
            'name' => 'Drywall Repair',
            'item' => $siteUrl . '/services/drywall-repair/'
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
    'srcset' => '/assets/images/gbp-05-480.avif 480w, /assets/images/gbp-05-960.avif 960w',
    'sizes'  => '(max-width: 900px) 100vw, 50vw',
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ===== Drywall Repair Page (page <style>) ===== */

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
<section class="hero hero--light sp-hero" aria-label="Drywall Repair in St. George">
  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-copy">
        <span class="eyebrow">Drywall Repair · St. George, UT</span>
        <h1 class="hero-title">Fast, invisible drywall repairs for St. George homes</h1>
        <p class="hero-answer">Y-Not Handyman &amp; Remodel patches holes, fixes cracks, repairs water damage, and matches textures across St. George — with a paint-ready finish that blends seamlessly into your existing walls.</p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <a class="link-call" href="tel:<?php echo $phoneRaw; ?>">
            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
            or call <?php echo htmlspecialchars($phone); ?>
          </a>
        </div>
        <ul class="hero-chips">
          <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>Owner-operated since 2020</li>
          <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="m9 16 2 2 4-4"/></svg>Often same-day service</li>
          <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>Texture matching on every patch</li>
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
              <option value="Drywall Repair" selected>Drywall Repair</option>
              <?php foreach ($services as $heroOpt): if ($heroOpt['slug'] !== 'drywall-repair'): ?>
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
<section class="section sp-problem" aria-label="When you need drywall repair">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">The Problem</span>
      <h2>When should you call for <span class="text-accent">drywall repair?</span></h2>
      <p class="answer-block">When holes, cracks, or water damage mar your St. George walls — whether from accidents, normal wear and tear, or moisture issues — and you need a clean, texture-matched finish ready for painting or touch-up.</p>
      <p class="problem-intro">St. George homeowners call us when they notice these issues:</p>
    </div>

    <div class="bento-grid reveal-up">
      <div class="bento-card">
        <h3>Holes from doorknobs, furniture, or moves</h3>
        <p>Accidental impacts leave gaping holes in your walls. Patching them yourself often leaves visible lumps or texture mismatches. We restore the wall so the repair disappears.</p>
      </div>
      <div class="bento-card">
        <h3>Cracks at corners or seams</h3>
        <p>Settling, temperature swings, and age cause cracks to form along corners, ceilings, and seams. These spread over time if not properly reinforced and finished.</p>
      </div>
      <div class="bento-card">
        <h3>Water damage from leaks or floods</h3>
        <p>Soft, stained, or moldy drywall from a roof leak, pipe burst, or monsoon intrusion. Once the moisture source is fixed, the damaged drywall needs to be cut out and replaced.</p>
      </div>
      <div class="bento-card">
        <h3>Nail pops and screw dimples</h3>
        <p>Small nail pops from framing settling or screw dimples showing through paint. These need to be filled, sanded smooth, and touched up to disappear.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section section--light sp-expert" aria-label="Why choose Y-Not for drywall repair">
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
        <h2>Why do St. George homeowners call <span class="text-accent">Y-Not</span> for drywall repair?</h2>
        <p class="answer-block">Because Y-Not Handyman &amp; Remodel matches textures perfectly, sands every surface smooth, and delivers a paint-ready finish that blends invisibly — no lumps, ridges, or obvious patches.</p>

        <div class="expert-stat">6 <span style="font-size:.5em;opacity:.7;">years serving St. George</span></div>

        <div class="expert-differentiators">
          <div class="diff-item">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <p><strong>Perfect texture matching.</strong> We replicate orange peel, knockdown, or smooth finishes so the repair blends seamlessly with the surrounding wall.</p>
          </div>
          <div class="diff-item">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <p><strong>Fast turnaround on urgent jobs.</strong> Small repairs often finish same-day. Medium jobs take 1-3 days. We work around your schedule and timeline.</p>
          </div>
          <div class="diff-item">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <p><strong>Paint-ready finish.</strong> We sand smooth, prime if needed, and hand you a finished surface ready for your painter — or we paint it for you.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ SERVICE BREAKDOWN ============================ -->
<section class="section sp-breakdown" aria-label="What's included in drywall repair">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">What We Handle</span>
      <h2>What's included in our <span class="text-accent">drywall repair</span> service?</h2>
      <p class="answer-block">Y-Not Handyman &amp; Remodel handles every step of drywall repair — from cutting out damaged material and installing patches to taping, mudding, sanding, texture-matching, and priming for a seamless finish.</p>
    </div>

    <div class="breakdown-grid reveal-up">
      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/></svg>
        </div>
        <div>
          <h3>Small Hole Patching</h3>
          <p>Nail holes, small dents, and dings filled with spackle, sanded smooth, and blended. These simple patches usually finish same-day and disappear under paint.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M12 8v8"/><path d="m8 12 4 4 4-4"/></svg>
        </div>
        <div>
          <h3>Medium to Large Hole Repair</h3>
          <p>Doorknob impacts, furniture strikes, or accidental punches. We install backing material, screw in a new drywall patch, tape seams, apply multiple mud coats, sand, and texture-match.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"/><path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"/></svg>
        </div>
        <div>
          <h3>Water Damage Repair</h3>
          <p>Cut out soft, stained, or moldy drywall from leaks or floods, install new material, tape and mud seams, texture-match, and prime. We ensure the area is dry before patching.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.9 19.1C1 15.2 1 8.8 4.9 4.9"/><path d="M7.8 16.2c-2.3-2.3-2.3-6.1 0-8.5"/><path d="m15 9-6 6"/><path d="M19.1 4.9C23 8.8 23 15.1 19.1 19"/><path d="M16.2 7.8c2.3 2.3 2.3 6.1 0 8.5"/></svg>
        </div>
        <div>
          <h3>Crack Repair &amp; Reinforcement</h3>
          <p>Fix cracks at corners, ceilings, and seams with mesh tape or joint compound, feather the edges, sand smooth, and apply texture so the crack doesn't reappear.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18"/><path d="M3 18h18"/><path d="M3 6h18"/></svg>
        </div>
        <div>
          <h3>Texture Matching</h3>
          <p>We replicate your wall's existing texture — orange peel, knockdown, smooth, or light popcorn — so the repaired area blends invisibly with the surrounding surface.</p>
        </div>
      </div>

      <div class="breakdown-item">
        <div class="breakdown-icon">
          <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
        </div>
        <div>
          <h3>Priming &amp; Paint Touch-Up (Optional)</h3>
          <p>We prime patched areas to seal the surface, then touch up paint if you provide a sample. Or we hand you a paint-ready surface for your own painter.</p>
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
      <h2>Why do St. George homeowners trust <span class="text-accent">Y-Not</span> for drywall repair?</h2>
      <p class="answer-block">Because the repairs blend seamlessly, the work finishes on schedule, and the job site is left clean — no visible patches, no messy dust piles.</p>
    </div>

    <div class="testimonials reveal-up">
      <div class="testimonial">
        <div class="testimonial-stars">★★★★★</div>
        <p>"We had a big hole in the hallway from moving furniture. Tony patched it, matched the texture perfectly, and you can't even tell it was ever damaged. Fast turnaround and very reasonable price."</p>
        <p class="testimonial-author">— Karen L., St. George</p>
      </div>

      <div class="testimonial">
        <div class="testimonial-stars">★★★★★</div>
        <p>"Water damage from a roof leak left a soft patch in the ceiling. Y-Not cut out the damaged drywall, replaced it, texture-matched, and primed it. Clean work, and the repair is invisible."</p>
        <p class="testimonial-author">— Greg P., Washington</p>
      </div>
    </div>

    <div class="reveal-up" style="margin-top:var(--space-6);text-align:center;">
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" class="btn btn-secondary" target="_blank" rel="noopener">Leave us a Google review</a>
    </div>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section sp-comparison" aria-label="Y-Not vs other drywall repair services">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">How We Compare</span>
      <h2>How does Y-Not compare to <span class="text-accent">other drywall repair contractors?</span></h2>
      <p class="answer-block">Y-Not Handyman &amp; Remodel is local, fast, and meticulous with texture matching — you get a seamless paint-ready finish without the multi-week wait or visible lumps that DIY or rushed jobs leave behind.</p>
    </div>

    <div class="comparison-grid reveal-up">
      <div class="comparison-col comp-other">
        <h3>Other Drywall Contractors</h3>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Scheduling takes days or weeks for small jobs</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Texture doesn't match — the patch is obvious</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Surface left rough or with visible ridges</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Dust and debris left for you to clean</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <p>Rushed mud work that cracks or shows seams within months</p>
        </div>
      </div>

      <div class="comparison-col comp-us">
        <h3>Y-Not Handyman &amp; Remodel</h3>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Same-day or next-day scheduling for urgent repairs</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Perfect texture matching — repair blends invisibly</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Smooth, paint-ready finish every time</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Job site cleaned and dust vacuumed before we leave</p>
        </div>
        <div class="comparison-item">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <p>Owner Tony checks every repair before we call it done</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section section--light sp-faq" aria-label="Drywall repair FAQ">
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow-label">Common Questions</span>
      <h2>Drywall repair <span class="text-accent">questions</span> answered</h2>
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
      <h2>Let's fix those walls</h2>
      <p>Get a free estimate for your drywall repair — usually same-day or next-day. No obligation, no pressure.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get my free estimate</button>
      <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg">Call <?php echo htmlspecialchars($phone); ?></a>
    </div>
  </div>
</section>

<p style="text-align:center;padding:var(--space-5) 0;color:var(--color-muted);font-size:.92rem;">Last updated: <?php echo date('F Y'); ?></p>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
