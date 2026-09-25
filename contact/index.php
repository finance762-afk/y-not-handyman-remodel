<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Contact — Y-Not Handyman & Remodel (Phase 5)
 * ------------------------------------------------------------------ */

$currentPage = 'contact';
$pageType    = 'contact';

$pageTitle       = 'Contact Us | Y-Not Handyman & Remodel | St. George, UT';
$metaDescription = 'Get in touch with Y-Not Handyman & Remodel in St. George, UT. Call (801) 833-1588 for your free estimate or fill out our contact form. Fast response times.';
$canonicalUrl    = $siteUrl . '/contact/';
$ogImage         = $siteUrl . '/assets/images/gbp-05.jpg';

// BreadcrumbList schema
$breadcrumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Contact', 'url' => '/contact/'],
];
$schemaMarkup = generateBreadcrumbSchema($breadcrumbs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* Contact page-specific styles */
.contact-hero {
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  padding: calc(var(--nav-height) + 60px) 0 60px;
  position: relative;
  overflow: hidden;
}
.contact-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><filter id="noise"><feTurbulence type="fractalNoise" baseFrequency="0.9" numOctaves="4" /></filter></defs><rect width="100" height="100" filter="url(%23noise)" opacity="0.05"/></svg>');
  opacity: 0.3;
}
.contact-hero .container { position: relative; z-index: 2; text-align: center; }
.contact-hero h1 {
  color: #fff;
  font-size: clamp(2rem, 5vw, 2.75rem);
  margin-bottom: 1rem;
  text-wrap: balance;
}
.contact-hero .hero-answer {
  color: rgba(255,255,255,0.95);
  font-size: 1.15rem;
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.6;
}

.contact-section {
  padding: 80px 0;
  background: #fff;
}
.contact-grid {
  display: grid;
  grid-template-columns: 1fr 1.2fr;
  gap: 60px;
  align-items: start;
}

.contact-info h2 {
  color: var(--color-primary);
  font-size: 2rem;
  margin-bottom: 1.5rem;
}
.contact-info p {
  color: var(--color-text);
  line-height: 1.7;
  margin-bottom: 2rem;
}

.contact-methods {
  display: flex;
  flex-direction: column;
  gap: 20px;
  margin-bottom: 40px;
}
.contact-method {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 20px;
  background: var(--color-bg-alt);
  border-radius: var(--radius);
  border-left: 4px solid var(--color-accent);
  transition: all var(--transition);
}
.contact-method:hover {
  background: var(--color-bg);
  transform: translateX(4px);
}
.contact-method-icon {
  flex-shrink: 0;
  width: 48px;
  height: 48px;
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
}
.contact-method-text h3 {
  color: var(--color-primary);
  font-size: 1.1rem;
  margin-bottom: 4px;
}
.contact-method-text a,
.contact-method-text span {
  color: var(--color-text);
  font-size: 1rem;
  text-decoration: none;
}
.contact-method-text a:hover {
  color: var(--color-accent);
}

.business-hours {
  background: var(--color-bg-alt);
  padding: 24px;
  border-radius: var(--radius);
  border-left: 4px solid var(--color-accent);
}
.business-hours h3 {
  color: var(--color-primary);
  font-size: 1.2rem;
  margin-bottom: 12px;
}
.business-hours p {
  color: var(--color-text);
  margin: 0;
  font-size: 1rem;
}

.contact-form-card {
  background: var(--color-bg-alt);
  padding: 40px;
  border-radius: var(--radius-lg);
  box-shadow: 0 8px 32px rgba(0,0,0,0.08);
}
.contact-form-card h2 {
  color: var(--color-primary);
  font-size: 1.75rem;
  margin-bottom: 1rem;
}
.contact-form-card .form-subtitle {
  color: var(--color-text-light);
  font-size: 0.95rem;
  margin-bottom: 2rem;
  display: block;
}

.form-field {
  margin-bottom: 24px;
  position: relative;
}
.form-field label {
  display: block;
  color: var(--color-text);
  font-weight: 600;
  margin-bottom: 8px;
  font-size: 0.9rem;
}
.form-field input,
.form-field select,
.form-field textarea {
  width: 100%;
  padding: 14px 16px;
  border: 2px solid var(--color-border);
  border-radius: var(--radius);
  font-family: var(--font-body);
  font-size: 1rem;
  transition: all var(--transition);
  background: #fff;
}
.form-field input:focus,
.form-field select:focus,
.form-field textarea:focus {
  outline: none;
  border-color: var(--color-primary);
  box-shadow: 0 0 0 3px rgba(var(--color-primary-rgb), 0.1);
}
.form-field textarea {
  resize: vertical;
  min-height: 120px;
}

.form-consent-fieldset {
  border: 1px solid var(--color-border);
  border-radius: var(--radius);
  padding: 24px;
  margin-bottom: 24px;
  background: rgba(var(--color-primary-rgb), 0.02);
}
.form-consent-legend {
  color: var(--color-primary);
  font-weight: 700;
  font-size: 1rem;
  padding: 0 8px;
}
.form-consent-item {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  margin-bottom: 16px;
  cursor: pointer;
}
.form-consent-item:last-child {
  margin-bottom: 0;
}
.consent-checkbox {
  width: 20px;
  height: 20px;
  margin-top: 2px;
  flex-shrink: 0;
  accent-color: var(--color-primary);
  cursor: pointer;
}
.consent-label {
  font-size: 0.9rem;
  line-height: 1.6;
  color: var(--color-text);
}
.consent-label strong {
  color: var(--color-primary);
}
.consent-label a {
  color: var(--color-accent);
  text-decoration: underline;
}
.form-consent-required .consent-label::after {
  content: ' *';
  color: var(--color-accent);
}
.required-star {
  color: var(--color-accent);
}

.btn-submit {
  width: 100%;
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  color: #fff;
  padding: 16px 32px;
  border: none;
  border-radius: var(--radius);
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 700;
  cursor: pointer;
  transition: all var(--transition);
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.btn-submit:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

@media (max-width: 900px) {
  .contact-grid {
    grid-template-columns: 1fr;
    gap: 40px;
  }
}
</style>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">›</li>
      <li aria-current="page">Contact</li>
    </ol>
  </div>
</nav>

<!-- Hero -->
<section class="contact-hero">
  <div class="container">
    <h1>Get in Touch with Y-Not Handyman & Remodel</h1>
    <p class="hero-answer">Ready to tackle your home project? Fill out the form below or give us a call. We typically respond within 1 business day with a free, no-obligation estimate.</p>
  </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
  <div class="container">
    <div class="contact-grid">
      <!-- Contact Info -->
      <div class="contact-info">
        <h2>Let's Talk About Your Project</h2>
        <p>Whether you need a quick repair or a full remodel, we're here to help. Reach out by phone, email, or the contact form—we'll get back to you fast with answers and a free estimate.</p>

        <div class="contact-methods">
          <div class="contact-method">
            <div class="contact-method-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </div>
            <div class="contact-method-text">
              <h3>Phone</h3>
              <a href="tel:<?php echo $phoneRaw; ?>"><?php echo htmlspecialchars($phone); ?></a>
            </div>
          </div>

          <div class="contact-method">
            <div class="contact-method-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            </div>
            <div class="contact-method-text">
              <h3>Email</h3>
              <a href="mailto:<?php echo $email; ?>"><?php echo htmlspecialchars($email); ?></a>
            </div>
          </div>

          <div class="contact-method">
            <div class="contact-method-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div class="contact-method-text">
              <h3>Service Area</h3>
              <span>St. George, Washington, Hurricane, Santa Clara, Ivins, Leeds</span>
            </div>
          </div>
        </div>

        <div class="business-hours">
          <h3>Business Hours</h3>
          <p><?php echo htmlspecialchars($businessHours); ?></p>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="contact-form-card">
        <h2>Request Your Free Estimate</h2>
        <span class="form-subtitle">Fill out the form below and we'll get back to you within 1 business day.</span>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="p1-form">
          <!-- Hidden honeypot -->
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">

          <!-- Hidden form fields -->
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <?php echo p1_attribution_fields('contact'); ?>
          <input type="hidden" name="consent_version" value="<?php echo htmlspecialchars($consentVersion); ?>">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

          <!-- Name -->
          <div class="form-field">
            <label for="contact-name">Your Name <span class="required-star">*</span></label>
            <input type="text" id="contact-name" name="name" autocomplete="name" required>
          </div>

          <!-- Phone -->
          <div class="form-field">
            <label for="contact-phone">Phone <span class="required-star">*</span></label>
            <input type="tel" id="contact-phone" name="phone" autocomplete="tel" required>
          </div>

          <!-- Email -->
          <div class="form-field">
            <label for="contact-email">Email <span class="required-star">*</span></label>
            <input type="email" id="contact-email" name="email" autocomplete="email" required>
          </div>

          <!-- Service -->
          <div class="form-field">
            <label for="contact-service">Service Needed</label>
            <select id="contact-service" name="service">
              <option value="">Select a service</option>
              <?php foreach ($services as $svc): ?>
              <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
              <?php endforeach; ?>
              <option value="Other">Other</option>
            </select>
          </div>

          <!-- Message -->
          <div class="form-field">
            <label for="contact-message">Project Details</label>
            <textarea id="contact-message" name="message" placeholder="Tell us about your project—what needs to be done, timeline, any specific concerns..."></textarea>
          </div>

          <!-- TCPA Consent — THREE separate checkboxes (REQUIRED per legal-compliance.md) -->
          <fieldset class="form-consent-fieldset">
            <legend class="form-consent-legend">Communication Consent</legend>

            <!-- Email opt-in (optional) -->
            <label class="form-consent-item">
              <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label">
                <strong>Email updates (optional):</strong> I agree to receive emails from
                <?php echo htmlspecialchars($siteName); ?> about my inquiry and services. I can unsubscribe anytime. Message frequency varies.
              </span>
            </label>

            <!-- SMS opt-in (optional) -->
            <label class="form-consent-item">
              <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label">
                <strong>SMS/Text messages (optional):</strong> I agree to receive texts from
                <?php echo htmlspecialchars($siteName); ?> at the number I provided. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help. <strong>Consent is not a condition of purchase.</strong>
              </span>
            </label>

            <!-- Terms acceptance (REQUIRED) -->
            <label class="form-consent-item form-consent-required">
              <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
              <span class="consent-label">
                I have read and agree to the <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a> and <a href="/terms/" target="_blank" rel="noopener">Terms of Service</a>.
              </span>
            </label>
          </fieldset>

          <button type="submit" class="btn-submit">Send My Request</button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
