<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * 404 Error Page — Y-Not Handyman & Remodel (Phase 5)
 * ------------------------------------------------------------------ */

$currentPage = '404';
$noindex     = true;  // Do not index error pages

$pageTitle       = 'Page Not Found | Y-Not Handyman & Remodel';
$pageDescription = 'The page you\'re looking for can\'t be found. Return to our homepage or contact us for assistance.';
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/404';
$ogImage         = $siteUrl . '/assets/images/logo-mark.png';

http_response_code(404);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* 404 page-specific styles */
.error-page {
  min-height: 70vh;
  display: flex;
  align-items: center;
  padding: 80px 0;
  background: var(--color-bg-alt);
}
.error-content {
  text-align: center;
  max-width: 600px;
  margin: 0 auto;
}
.error-code {
  font-size: clamp(4rem, 15vw, 8rem);
  font-weight: 900;
  color: var(--color-primary);
  line-height: 1;
  margin-bottom: 1rem;
  opacity: 0.2;
}
.error-content h1 {
  color: var(--color-primary);
  font-size: clamp(1.75rem, 5vw, 2.5rem);
  margin-bottom: 1rem;
  text-wrap: balance;
}
.error-content p {
  color: var(--color-text);
  font-size: 1.1rem;
  line-height: 1.6;
  margin-bottom: 2rem;
}
.error-links {
  display: flex;
  flex-direction: column;
  gap: 16px;
  max-width: 400px;
  margin: 0 auto 3rem;
}
.error-link {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 16px 20px;
  background: #fff;
  border: 2px solid var(--color-border);
  border-radius: var(--radius);
  text-decoration: none;
  color: var(--color-text);
  transition: all var(--transition);
}
.error-link:hover {
  border-color: var(--color-primary);
  background: var(--color-bg-alt);
  transform: translateX(4px);
}
.error-link-text {
  display: flex;
  align-items: center;
  gap: 12px;
}
.error-link-icon {
  width: 24px;
  height: 24px;
  color: var(--color-accent);
}
.error-link-arrow {
  width: 20px;
  height: 20px;
  color: var(--color-text-light);
  transition: transform var(--transition);
}
.error-link:hover .error-link-arrow {
  transform: translateX(4px);
}

.error-cta {
  margin-top: 3rem;
}
.error-cta h2 {
  color: var(--color-primary);
  font-size: 1.5rem;
  margin-bottom: 1rem;
}
.error-cta p {
  color: var(--color-text-light);
  margin-bottom: 1.5rem;
}
.cta-buttons {
  display: flex;
  gap: 16px;
  justify-content: center;
  flex-wrap: wrap;
}
.btn-primary {
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  color: #fff;
  padding: 14px 28px;
  border-radius: var(--radius);
  text-decoration: none;
  font-weight: 700;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all var(--transition);
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}
.btn-secondary {
  background: #fff;
  color: var(--color-primary);
  padding: 14px 28px;
  border: 2px solid var(--color-primary);
  border-radius: var(--radius);
  text-decoration: none;
  font-weight: 700;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all var(--transition);
}
.btn-secondary:hover {
  background: var(--color-bg-alt);
  transform: translateY(-2px);
}
</style>

<section class="error-page">
  <div class="container">
    <div class="error-content">
      <div class="error-code">404</div>
      <h1>Page Not Found</h1>
      <p>Sorry, we can't find the page you're looking for. It may have been moved, deleted, or the URL might be incorrect.</p>

      <div class="error-links">
        <a href="/" class="error-link">
          <span class="error-link-text">
            <svg class="error-link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            Back to Homepage
          </span>
          <svg class="error-link-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </a>

        <a href="/services/" class="error-link">
          <span class="error-link-text">
            <svg class="error-link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
            View Our Services
          </span>
          <svg class="error-link-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </a>

        <a href="/about/" class="error-link">
          <span class="error-link-text">
            <svg class="error-link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            About Us
          </span>
          <svg class="error-link-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </a>

        <a href="/contact/" class="error-link">
          <span class="error-link-text">
            <svg class="error-link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            Contact Us
          </span>
          <svg class="error-link-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </a>
      </div>

      <div class="error-cta">
        <h2>Need Help with a Home Project?</h2>
        <p>Don't let a broken link stop you from getting the help you need.</p>
        <div class="cta-buttons">
          <a href="/contact/" class="btn-primary">
            Get Free Estimate
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </a>
          <a href="tel:<?php echo $phoneRaw; ?>" class="btn-secondary">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            Call <?php echo htmlspecialchars($phone); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
