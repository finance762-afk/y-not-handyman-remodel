<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Privacy Policy — Y-Not Handyman & Remodel (Phase 5)
 * ------------------------------------------------------------------ */

$currentPage = 'privacy-policy';

$pageTitle       = 'Privacy Policy | Y-Not Handyman & Remodel';
$pageDescription = 'How Y-Not Handyman & Remodel collects, uses, and protects your information. Privacy practices for our website and contact forms.';
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/privacy-policy/';
$ogImage         = $siteUrl . '/assets/images/logo-mark.png';

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
                    "name" => "Privacy Policy",
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
/* Legal page styles */
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
  scroll-margin-top: calc(var(--nav-height) + 20px);
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
      <li aria-current="page">Privacy Policy</li>
    </ol>
  </div>
</nav>

<!-- Hero -->
<section class="hero hero--legal" aria-label="Privacy Policy">
  <div class="hero__copy">
    <span class="eyebrow-label">Legal</span>
    <h1>Privacy Policy</h1>
    <span class="section-subtitle">your data, our commitments</span>
    <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
  </div>
</section>

<!-- Legal Content -->
<article class="legal-prose">

  <h2>1. Introduction</h2>
  <p>This Privacy Policy explains how <?php echo htmlspecialchars($siteName); ?> ("we", "us", "our") collects, uses, and protects your personal information when you visit <?php echo htmlspecialchars($domain); ?> or interact with our services.</p>

  <h2>2. Information We Collect</h2>
  <ul>
    <li><strong>Information you provide:</strong> name, email, phone, service address, project details (via contact forms, phone, or in-person estimates)</li>
    <li><strong>Photo uploads:</strong> if you submit damage photos or project reference images through our forms</li>
    <li><strong>Automatically collected:</strong> IP address, browser type, device info, pages visited, referring URL, timestamps (via Google Analytics 4)</li>
    <li><strong>Cookies and similar technologies:</strong> see our <a href="/cookie-policy/">Cookie Policy</a></li>
  </ul>

  <h2>3. How We Use Your Information</h2>
  <ul>
    <li>Respond to inquiries and provide requested services</li>
    <li>Schedule estimates, inspections, and project work</li>
    <li>Communicate during active projects</li>
    <li>Send service-related communications (including phone calls and SMS messages where you have consented)</li>
    <li>Improve our website and services</li>
    <li>Comply with legal obligations (tax, contractual, and regulatory)</li>
  </ul>

  <h2>4. How We Share Your Information</h2>
  <ul>
    <li>We do <strong>NOT</strong> sell personal information.</li>
    <li><strong>Service providers:</strong> Google Analytics (analytics), our hosting provider, and Page One Insights, LLC (our web design partner — receives copies of contact form submissions via lead tracking for service delivery purposes).</li>
    <li><strong>Subcontractors and material suppliers:</strong> as necessary to complete your project.</li>
    <li><strong>Legal compliance:</strong> if required by <?php echo $companyState; ?> or federal law.</li>
    <li><strong>Business transfers:</strong> in the event of a merger, acquisition, or sale of business assets.</li>
  </ul>

  <h2>5. Your Privacy Rights</h2>

  <h3 id="state-rights"><?php echo $companyState; ?> Residents</h3>
  <p>You may request access to or deletion of personal information we hold about you. Contact us using the methods below.</p>

  <h3 id="ccpa-rights">California Residents (CCPA / CPRA)</h3>
  <p>If you are a California resident, you have the following rights under the California Consumer Privacy Act (CCPA) and California Privacy Rights Act (CPRA):</p>
  <ul>
    <li><strong>Right to know</strong> what personal information we collect, use, disclose, and sell.</li>
    <li><strong>Right to delete</strong> personal information we have collected from you, subject to certain exceptions.</li>
    <li><strong>Right to correct</strong> inaccurate personal information.</li>
    <li><strong>Right to opt-out of sale or sharing</strong> of personal information. (We do not sell personal information, but you may still submit an opt-out request for our records.)</li>
    <li><strong>Right to limit use</strong> of sensitive personal information.</li>
    <li><strong>Right to non-discrimination</strong> — we will not deny you services or charge different prices based on exercising your rights.</li>
  </ul>
  <p><strong>How to exercise your rights:</strong> Email <a href="mailto:<?php echo $email; ?>"><?php echo htmlspecialchars($email); ?></a> or call <a href="tel:<?php echo $phoneRaw; ?>"><?php echo htmlspecialchars($phone); ?></a>. We will respond within 45 days of receipt.</p>

  <h3>Other State Residents</h3>
  <p>Residents of Colorado, Virginia, Connecticut, Utah, and Texas have similar rights under their respective state privacy laws. Contact us using the same methods above to exercise your rights.</p>

  <h2>6. SMS and Phone Communications (TCPA)</h2>
  <p>When you submit our contact form and check the consent boxes, you may agree to receive phone calls and SMS text messages from us about your project request. Standard message and data rates may apply. Consent is not a condition of purchase. You can opt out of SMS communications at any time by replying STOP to any text message. You can opt out of phone communications at any time by telling our representative or emailing us at <a href="mailto:<?php echo $email; ?>"><?php echo htmlspecialchars($email); ?></a>.</p>

  <h2>7. Data Retention</h2>
  <p>We retain contact form submissions and service records for as long as necessary to provide services and comply with legal obligations, typically 5–7 years for business records. Photos uploaded via contact forms are deleted after the related project is closed unless retained for legal purposes.</p>

  <h2>8. Data Security</h2>
  <p>We use reasonable administrative, technical, and physical safeguards including SSL encryption on all form submissions and secure hosting infrastructure. No system is 100% secure. We cannot promise absolute security, but we work to minimize risks.</p>

  <h2>9. Children's Privacy</h2>
  <p>This site is not directed to children under 13. We do not knowingly collect information from children. If you believe a child has provided us information, contact us and we will delete it.</p>

  <h2>10. Third-Party Links</h2>
  <p>Our website may link to third-party sites (Facebook, LinkedIn, Yelp, Google Business Profile, manufacturer sites, etc.). We are not responsible for the privacy practices of these sites. Review their privacy policies separately.</p>

  <h2>11. Changes to This Policy</h2>
  <p>We may update this Privacy Policy from time to time. The "Last Updated" date at the top will reflect the most recent change. Material changes will be prominently posted on the site.</p>

  <h2>12. Contact Us</h2>
  <p>For privacy questions or to exercise your rights:</p>
  <p>
    <strong><?php echo htmlspecialchars($siteName); ?></strong><br>
    Email: <a href="mailto:<?php echo $email; ?>"><?php echo htmlspecialchars($email); ?></a><br>
    Phone: <a href="tel:<?php echo $phoneRaw; ?>"><?php echo htmlspecialchars($phone); ?></a><br>
    Address: <?php echo htmlspecialchars($address['street']); ?>, <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?> <?php echo htmlspecialchars($address['zip']); ?>
  </p>

  <div class="legal-disclaimer">
    This Privacy Policy is provided as a general template. We recommend reviewing this document with a licensed <?php echo $companyState; ?> attorney before publication to ensure compliance with current state and federal privacy laws.
  </div>

</article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
