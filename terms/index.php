<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Terms of Service — Y-Not Handyman & Remodel (Phase 5)
 * ------------------------------------------------------------------ */

$currentPage = 'terms';

$pageTitle       = 'Terms of Service | Y-Not Handyman & Remodel';
$pageDescription = 'Terms governing use of our website and engagement of our services. Read our terms before submitting a project request.';
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/terms/';
$ogImage         = $siteUrl . '/assets/images/logo-v2.png';

$companyEntityType = 'Limited Liability Company';
$companyState      = 'Utah';
$lastUpdated       = date('F j, Y');

// Schema
$schemaGraph = [
    "@context" => "https://schema.org",
    "@graph" => [
        [
            "@type" => "WebPage",
            "@id" => $canonicalUrl . "#webpage",
            "url" => $canonicalUrl,
            "name" => $pageTitle,
            "description" => $metaDescription
        ],
        [
            "@type" => "BreadcrumbList",
            "itemListElement" => [
                [
                    "@type" => "ListItem",
                    "position" => 1,
                    "name" => "Home",
                    "item" => $siteUrl . "/"
                ],
                [
                    "@type" => "ListItem",
                    "position" => 2,
                    "name" => "Terms of Service",
                    "item" => $canonicalUrl
                ]
            ]
        ]
    ]
];
$schemaMarkup = json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* Reuse legal styles from privacy-policy */
.hero--legal {
  background: var(--color-bg-alt);
  min-height: 40vh;
  padding-top: calc(var(--nav-height) + var(--space-2xl));
  padding-bottom: var(--space-2xl);
  display: flex;
  align-items: center;
}
.hero--legal .hero__copy {
  max-width: var(--max-width);
  margin: 0 auto;
  padding: 0 var(--space-xl);
  width: 100%;
}
.hero--legal h1 { color: var(--color-primary); }
.hero--legal .eyebrow-label { color: var(--color-primary); }
.hero--legal .section-subtitle { color: var(--color-primary); }
.hero--legal .hero__phone { opacity: 0.8; color: var(--color-text); margin-top: 1rem; }

.legal-prose {
  max-width: 65ch;
  margin: 0 auto;
  padding: var(--space-2xl) var(--space-xl);
}
.legal-prose h2 {
  color: var(--color-primary);
  font-family: var(--font-heading);
  margin-top: var(--space-xl);
  margin-bottom: var(--space-sm);
  font-size: 1.5rem;
}
.legal-prose h3 {
  color: var(--color-primary);
  font-family: var(--font-heading);
  margin-top: var(--space-md);
  margin-bottom: var(--space-xs);
  font-size: 1.15rem;
}
.legal-prose p {
  margin-bottom: var(--space-sm);
  line-height: 1.7;
}
.legal-prose ul,
.legal-prose ol {
  margin-left: var(--space-md);
  margin-bottom: var(--space-md);
}
.legal-prose li {
  margin-bottom: 6px;
  line-height: 1.6;
}
.legal-prose a {
  color: var(--color-primary);
  border-bottom: 1px solid rgba(var(--color-primary-rgb), 0.2);
  transition: border-color var(--transition);
}
.legal-prose a:hover {
  color: var(--color-primary-dark);
  border-color: var(--color-primary-dark);
}
.legal-disclaimer {
  background: var(--color-card-tint-3, rgba(0,0,0,0.03));
  border-left: 4px solid var(--color-primary);
  padding: var(--space-md);
  margin: var(--space-xl) 0;
  font-size: 0.92rem;
  font-style: italic;
  border-radius: var(--radius);
}
</style>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">›</li>
      <li aria-current="page">Terms of Service</li>
    </ol>
  </div>
</nav>

<!-- Hero -->
<section class="hero hero--legal" aria-label="Terms of Service">
  <div class="hero__copy">
    <span class="eyebrow-label">Legal</span>
    <h1>Terms of Service</h1>
    <span class="section-subtitle">our agreement with you</span>
    <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
  </div>
</section>

<!-- Legal Content -->
<article class="legal-prose">

  <h2>1. Agreement to Terms</h2>
  <p>By accessing or using <?php echo htmlspecialchars($domain); ?> or engaging <?php echo htmlspecialchars($siteName); ?> for services, you agree to these Terms of Service. If you do not agree, do not use this site or our services.</p>

  <h2>2. Use of This Website</h2>
  <p>You may use this Site for personal, non-commercial purposes to learn about our services and contact us.</p>
  <p>You may not:</p>
  <ul>
    <li>Use the Site for unlawful purposes</li>
    <li>Attempt to access non-public systems</li>
    <li>Scrape or copy content without written permission</li>
    <li>Submit false information through our contact form</li>
    <li>Use automated systems to extract data</li>
  </ul>

  <h2>3. Service Estimates and Quotes</h2>
  <p>All estimates are based on information provided and conditions visible at the time of inspection. Final pricing may differ if:</p>
  <ul>
    <li>Project scope changes</li>
    <li>Hidden damage is discovered</li>
    <li>Material costs change between estimate and project start</li>
    <li>Code requirements differ from initial assumptions</li>
  </ul>
  <p>Verbal quotes are non-binding. Only written, signed contracts constitute a final agreement.</p>

  <h2>4. Project Work</h2>
  <ul>
    <li>Work is governed by a written contract specific to each job</li>
    <li>We comply with applicable <?php echo $companyState; ?> state and local building codes</li>
    <li>Work is performed by <?php echo htmlspecialchars($siteName); ?> employees and qualified subcontractors</li>
  </ul>

  <h2>5. Materials and Workmanship</h2>
  <p>Any commitments regarding workmanship are set out in your written project contract. Manufacturer coverage on materials, where offered, is provided by those manufacturers and passes through to you upon project completion.</p>
  <p>Such coverage does not extend to:</p>
  <ul>
    <li>Acts of God beyond manufacturer ratings</li>
    <li>Damage from neglect or alteration by others</li>
    <li>Pre-existing conditions disclosed prior to work</li>
  </ul>

  <h2>6. Payment Terms</h2>
  <p>Payment terms are specified in your project contract. Standard terms include:</p>
  <ul>
    <li>A deposit at contract signing</li>
    <li>Progress payments at milestones where applicable</li>
    <li>Final balance due upon project completion</li>
  </ul>
  <p>We accept check, electronic transfer, and financing through approved third-party providers. Past-due balances may accrue interest as permitted by <?php echo $companyState; ?> law.</p>

  <h2>7. Cancellation</h2>
  <p>Cancellation terms are specified in your contract. Generally:</p>
  <ul>
    <li>Cancellation prior to materials ordered: deposit refunded minus administrative costs</li>
    <li>Cancellation after materials ordered: deposit forfeited; materials become customer property</li>
    <li>Cancellation after work begins: payment due for work completed plus materials</li>
  </ul>

  <h2>8. Limitation of Liability</h2>
  <p>To the maximum extent permitted by <?php echo $companyState; ?> law, <?php echo htmlspecialchars($siteName); ?>'s total liability for any claim related to the Site or our services shall not exceed the amount you paid for the specific service giving rise to the claim. We are not liable for indirect, incidental, special, or consequential damages.</p>

  <h2>9. Intellectual Property</h2>
  <p>All content on this Site — text, graphics, photographs, logos — is owned by <?php echo htmlspecialchars($siteName); ?> or used with permission, and is protected by copyright. You may not reproduce, distribute, or create derivative works without written permission.</p>

  <h2>10. Governing Law and Disputes</h2>
  <p>These Terms are governed by the laws of the State of <?php echo $companyState; ?> without regard to conflict-of-laws principles. Any disputes shall be resolved in the state or federal courts located in Washington County, <?php echo $companyState; ?>.</p>

  <h2>11. Changes to These Terms</h2>
  <p>We may update these Terms at any time. The "Last Updated" date will reflect the most recent version. Continued use of the Site after updates constitutes acceptance of revised Terms.</p>

  <h2>12. Contact Us</h2>
  <p>For questions about these Terms of Service:</p>
  <p>
    <strong><?php echo htmlspecialchars($siteName); ?></strong><br>
    Email: <a href="mailto:<?php echo $email; ?>"><?php echo htmlspecialchars($email); ?></a><br>
    Phone: <a href="tel:<?php echo $phoneRaw; ?>"><?php echo htmlspecialchars($phone); ?></a><br>
    Address: <?php echo htmlspecialchars($address['street']); ?>, <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?> <?php echo htmlspecialchars($address['zip']); ?>
  </p>


</article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
