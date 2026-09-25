<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Cookie Policy — Y-Not Handyman & Remodel (Phase 5)
 * ------------------------------------------------------------------ */

$currentPage = 'cookie-policy';

$pageTitle       = 'Cookie Policy | Y-Not Handyman & Remodel';
$metaDescription = 'How Y-Not Handyman & Remodel uses cookies and tracking technologies on our website. Learn about the cookies we use and how to control them.';
$canonicalUrl    = $siteUrl . '/cookie-policy/';
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
                    "name" => "Cookie Policy",
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
      <li aria-current="page">Cookie Policy</li>
    </ol>
  </div>
</nav>

<!-- Hero -->
<section class="hero hero--legal" aria-label="Cookie Policy">
  <div class="hero__copy">
    <span class="eyebrow-label">Legal</span>
    <h1>Cookie Policy</h1>
    <span class="section-subtitle">how we use cookies</span>
    <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
  </div>
</section>

<!-- Legal Content -->
<article class="legal-prose">

  <h2>1. What Are Cookies?</h2>
  <p>Cookies are small text files stored on your device when you visit a website. They are used to make websites work more efficiently and provide information to site owners about how visitors use the site.</p>

  <h2>2. Cookies We Use</h2>

  <h3>Strictly Necessary</h3>
  <p>Essential for site functionality (form submission, security). These cannot be disabled. Example: session cookies during form submission.</p>

  <h3>Analytics (Google Analytics 4)</h3>
  <p>We use Google Analytics 4 to understand how visitors use our site. GA4 sets cookies prefixed with <code>_ga</code> and <code>_gid</code>. Data is anonymized via IP truncation.</p>

  <h3>First-Party Preferences</h3>
  <p>We store your cookie banner dismissal preference in your browser's local storage so you don't see the banner on repeat visits. This is stored locally and never sent to our servers.</p>

  <h3>Third-Party Embeds</h3>
  <p>Our site may embed tools and content from third parties (Google Maps, review widgets, social media, etc.). These services may set their own cookies subject to their own privacy policies.</p>

  <h2>3. How to Control Cookies</h2>
  <p>Most browsers allow you to view, delete, or block cookies. You can block third-party cookies or block all cookies (note: site functionality may break). Browser-specific instructions are available from Google, Mozilla, Apple, and Microsoft.</p>

  <h3>Browser Settings</h3>
  <ul>
    <li><strong>Google Chrome:</strong> Settings → Privacy and security → Cookies and other site data</li>
    <li><strong>Mozilla Firefox:</strong> Settings → Privacy & Security → Cookies and Site Data</li>
    <li><strong>Safari:</strong> Preferences → Privacy → Cookies and website data</li>
    <li><strong>Microsoft Edge:</strong> Settings → Privacy, search, and services → Cookies and site data</li>
  </ul>

  <h2>4. Opt Out of Google Analytics</h2>
  <p>You can opt out of GA4 tracking site-wide by installing the Google Analytics Opt-out Browser Add-on at <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">https://tools.google.com/dlpage/gaoptout</a>.</p>

  <h2>5. Our Cookie Notice</h2>
  <p>We display a brief banner notifying visitors of our cookie use. Once dismissed, the banner is suppressed for future visits via localStorage. You can re-enable the banner by clearing your browser's site data.</p>

  <h2>6. Changes to This Policy</h2>
  <p>We may update this Cookie Policy from time to time. The "Last Updated" date at the top will reflect the most recent version.</p>

  <h2>7. Contact Us</h2>
  <p>For questions about our use of cookies:</p>
  <p>
    <strong><?php echo htmlspecialchars($siteName); ?></strong><br>
    Email: <a href="mailto:<?php echo $email; ?>"><?php echo htmlspecialchars($email); ?></a><br>
    Phone: <a href="tel:<?php echo $phoneRaw; ?>"><?php echo htmlspecialchars($phone); ?></a>
  </p>

  <div class="legal-disclaimer">
    This Cookie Policy is provided as a general template. We recommend reviewing this document with a licensed attorney before publication to ensure compliance with current cookie consent laws.
  </div>

</article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
