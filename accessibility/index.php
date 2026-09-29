<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Accessibility Statement — Y-Not Handyman & Remodel (Phase 5)
 * ------------------------------------------------------------------ */

$currentPage = 'accessibility';

$pageTitle       = 'Accessibility Statement | Y-Not Handyman & Remodel';
$pageDescription = 'Our commitment to digital accessibility and WCAG 2.1 AA conformance. Learn about our accessibility features and how to report barriers.';
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/accessibility/';
$ogImage         = $siteUrl . '/assets/images/logo-mark.png';

$lastUpdated     = date('F j, Y');

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
                    "name" => "Accessibility",
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
      <li aria-current="page">Accessibility</li>
    </ol>
  </div>
</nav>

<!-- Hero -->
<section class="hero hero--legal" aria-label="Accessibility Statement">
  <div class="hero__copy">
    <span class="eyebrow-label">Legal</span>
    <h1>Accessibility Statement</h1>
    <span class="section-subtitle">our commitment to accessibility</span>
    <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
  </div>
</section>

<!-- Legal Content -->
<article class="legal-prose">

  <h2>1. Our Commitment</h2>
  <p><?php echo htmlspecialchars($siteName); ?> is committed to ensuring digital accessibility for people with disabilities. We continually improve the user experience for everyone and apply relevant accessibility standards to <?php echo htmlspecialchars($domain); ?>.</p>

  <h2>2. Conformance Status</h2>
  <p>This site is designed to conform with Web Content Accessibility Guidelines (WCAG) 2.1 Level AA. WCAG defines requirements for designers and developers to improve accessibility for people with disabilities.</p>
  <p>Our site partially conforms with WCAG 2.1 Level AA, meaning some content does not yet fully meet the standard. We are working to address all known issues.</p>

  <h2>3. Accessibility Features</h2>
  <p>This website includes the following accessibility features:</p>
  <ul>
    <li>Semantic HTML5 markup with proper landmark regions (header, nav, main, footer)</li>
    <li>Skip-to-content link at the top of every page</li>
    <li>Visible keyboard focus indicators on all interactive elements</li>
    <li>Alt text on all meaningful images</li>
    <li>Sufficient color contrast for body text and interactive elements</li>
    <li>Responsive design that works across screen sizes and zoom levels</li>
    <li><code>prefers-reduced-motion</code> support — animations disabled for users who request reduced motion</li>
    <li>ARIA labels on navigation and form elements</li>
    <li>Form field labels associated with inputs</li>
    <li>Logical heading structure on all pages</li>
  </ul>

  <h2>4. Known Issues</h2>
  <p>We are aware of these areas needing improvement:</p>
  <ul>
    <li>Some third-party embeds may not fully meet WCAG standards. We provide alternative ways to access this information (call us, email us).</li>
    <li>Some PDF documents may not be fully accessible. Contact us for alternative formats.</li>
  </ul>

  <h2>5. Feedback and Reporting Issues</h2>
  <p>If you encounter an accessibility barrier on this site, please tell us. We aim to respond to accessibility feedback within 5 business days.</p>
  <p>When reporting an issue, please include:</p>
  <ul>
    <li>The specific page or feature where you encountered the barrier</li>
    <li>A description of the issue</li>
    <li>The assistive technology you were using (if applicable)</li>
    <li>Your contact information so we can follow up</li>
  </ul>

  <h2>6. Alternative Contact Methods</h2>
  <p>If our website is not accessible to you, you can reach us by phone or email. We will provide service information in alternative formats on request.</p>

  <h2>7. Changes to This Statement</h2>
  <p>We may update this Accessibility Statement from time to time. The "Last Updated" date at the top will reflect the most recent version.</p>

  <h2>8. Contact Us</h2>
  <p>For accessibility questions or to report barriers:</p>
  <p>
    <strong><?php echo htmlspecialchars($siteName); ?></strong><br>
    Email: <a href="mailto:<?php echo $email; ?>"><?php echo htmlspecialchars($email); ?></a><br>
    Phone: <a href="tel:<?php echo $phoneRaw; ?>"><?php echo htmlspecialchars($phone); ?></a><br>
    Address: <?php echo htmlspecialchars($address['street']); ?>, <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?> <?php echo htmlspecialchars($address['zip']); ?>
  </p>


</article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
