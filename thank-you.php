<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Thank You — Y-Not Handyman & Remodel (Phase 5)
 * ------------------------------------------------------------------ */

$currentPage = 'thank-you';
$noindex     = true;  // Do not index thank-you pages

$pageTitle       = 'Thank You | Y-Not Handyman & Remodel';
$metaDescription = 'Thank you for contacting Y-Not Handyman & Remodel. We\'ll be in touch shortly with your free estimate.';
$canonicalUrl    = $siteUrl . '/thank-you';
$ogImage         = $siteUrl . '/assets/images/logo-mark.png';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* Thank-you page-specific styles */
.thank-you-page {
  min-height: 70vh;
  display: flex;
  align-items: center;
  padding: 80px 0;
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  position: relative;
  overflow: hidden;
}
.thank-you-page::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><filter id="noise"><feTurbulence type="fractalNoise" baseFrequency="0.9" numOctaves="4" /></filter></defs><rect width="100" height="100" filter="url(%23noise)" opacity="0.05"/></svg>');
  opacity: 0.3;
}
.thank-you-content {
  position: relative;
  z-index: 2;
  text-align: center;
  max-width: 700px;
  margin: 0 auto;
}
.success-icon {
  width: 80px;
  height: 80px;
  margin: 0 auto 2rem;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  backdrop-filter: blur(10px);
  box-shadow: 0 8px 32px rgba(0,0,0,0.1);
}
.thank-you-content h1 {
  color: #fff;
  font-size: clamp(2rem, 5vw, 3rem);
  margin-bottom: 1rem;
  text-wrap: balance;
}
.thank-you-content p {
  color: rgba(255, 255, 255, 0.95);
  font-size: 1.15rem;
  line-height: 1.6;
  margin-bottom: 2rem;
}
.what-next {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(10px);
  border-radius: var(--radius-lg);
  padding: 2rem;
  margin: 3rem 0;
  border: 1px solid rgba(255, 255, 255, 0.2);
}
.what-next h2 {
  color: #fff;
  font-size: 1.5rem;
  margin-bottom: 1.5rem;
}
.next-steps {
  display: flex;
  flex-direction: column;
  gap: 16px;
  text-align: left;
}
.next-step {
  display: flex;
  align-items: flex-start;
  gap: 16px;
  padding: 16px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: var(--radius);
  border-left: 4px solid rgba(255, 255, 255, 0.4);
}
.step-number {
  flex-shrink: 0;
  width: 32px;
  height: 32px;
  background: rgba(255, 255, 255, 0.9);
  color: var(--color-primary);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 900;
  font-size: 1rem;
}
.step-text {
  color: rgba(255, 255, 255, 0.95);
  line-height: 1.6;
}
.step-text strong {
  color: #fff;
  display: block;
  margin-bottom: 4px;
}

.cta-buttons {
  display: flex;
  gap: 16px;
  justify-content: center;
  flex-wrap: wrap;
  margin-top: 2rem;
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
  background: rgba(255, 255, 255, 0.15);
  transform: translateY(-2px);
}

.review-request {
  margin-top: 3rem;
  padding: 2rem;
  background: rgba(255, 255, 255, 0.1);
  border-radius: var(--radius);
  border: 1px solid rgba(255, 255, 255, 0.2);
}
.review-request p {
  font-size: 1rem;
  margin-bottom: 1rem;
}
.btn-review {
  background: rgba(255, 255, 255, 0.2);
  color: #fff;
  padding: 12px 24px;
  border: 2px solid rgba(255, 255, 255, 0.4);
  border-radius: var(--radius);
  font-weight: 700;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all var(--transition);
}
.btn-review:hover {
  background: rgba(255, 255, 255, 0.3);
  transform: translateY(-2px);
}
</style>

<section class="thank-you-page">
  <div class="container">
    <div class="thank-you-content">
      <div class="success-icon">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
      </div>

      <h1>Thank You for Reaching Out!</h1>
      <p>We've received your request and appreciate you considering Y-Not Handyman & Remodel for your project. We'll review your information and get back to you within 1 business day with your free, no-obligation estimate.</p>

      <div class="what-next">
        <h2>What Happens Next?</h2>
        <div class="next-steps">
          <div class="next-step">
            <div class="step-number">1</div>
            <div class="step-text">
              <strong>We Review Your Request</strong>
              Owner Tony Pomikala personally reviews every inquiry to make sure we understand exactly what you need done.
            </div>
          </div>

          <div class="next-step">
            <div class="step-number">2</div>
            <div class="step-text">
              <strong>We Contact You Within 1 Business Day</strong>
              We'll reach out by phone or email (based on your preference) to discuss your project and schedule a time to see the work in person if needed.
            </div>
          </div>

          <div class="next-step">
            <div class="step-number">3</div>
            <div class="step-text">
              <strong>You Get a Free, Written Estimate</strong>
              We provide a clear, itemized quote with no hidden fees—just honest pricing for quality work you can count on.
            </div>
          </div>
        </div>
      </div>

      <div class="cta-buttons">
        <a href="/" class="btn-white">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Back to Homepage
        </a>
        <a href="/services/" class="btn-outline-white">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
          View Our Services
        </a>
      </div>

      <div class="review-request">
        <p><strong>Already a happy customer?</strong> We'd love to hear about your experience!</p>
        <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" class="btn-review" target="_blank" rel="noopener">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          Leave Us a Google Review
        </a>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
