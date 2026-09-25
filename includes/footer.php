</main>

<!-- Site Footer -->
<footer class="site-footer">
  <div class="footer-top">
    <div class="container">
      <div class="footer-grid">
        <!-- Column 1: Logo & About -->
        <div class="footer-col footer-about">
          <img src="/assets/images/logo-mark.png" alt="<?php echo htmlspecialchars($siteName); ?> logo" class="footer-logo" width="80" height="56">
          <p class="footer-tagline"><?php echo htmlspecialchars($tagline); ?></p>
          <p class="footer-description">Locally owned and operated handyman and remodeling contractor serving St. George and surrounding communities since 2020.</p>

          <div class="footer-badges">
            <div class="trust-badge">
              <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              Licensed & Insured
            </div>
            <div class="trust-badge">
              <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M2 12h20"/><circle cx="12" cy="12" r="10"/></svg>
              Est. <?php echo $yearEstablished; ?>
            </div>
            <div class="trust-badge">
              <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
              Free Estimates
            </div>
          </div>
        </div>

        <!-- Column 2: Services -->
        <div class="footer-col footer-services">
          <h3 class="footer-heading">Our Services</h3>
          <ul class="footer-links">
            <?php
            $footerServices = array_slice($services, 0, 5);
            foreach ($footerServices as $footSvc):
            ?>
            <li><a href="/services/<?php echo htmlspecialchars($footSvc['slug']); ?>/"><?php echo htmlspecialchars($footSvc['name']); ?></a></li>
            <?php endforeach; ?>
            <?php if (count($services) > 5): ?>
            <li><a href="/services/" class="view-all">View All Services →</a></li>
            <?php endif; ?>
          </ul>
        </div>

        <!-- Column 3: Quick Links -->
        <div class="footer-col footer-links">
          <h3 class="footer-heading">Quick Links</h3>
          <ul class="footer-links">
            <li><a href="/about/">About Us</a></li>
            <li><a href="/contact/">Contact</a></li>
            <li><a href="/services/">All Services</a></li>
            <li><a href="<?php echo htmlspecialchars($gbpUrl); ?>" target="_blank" rel="noopener">Leave a Review</a></li>
          </ul>
        </div>

        <!-- Column 4: Contact -->
        <div class="footer-col footer-contact">
          <h3 class="footer-heading">Get In Touch</h3>
          <div class="footer-contact-info">
            <a href="tel:<?php echo $phoneRaw; ?>" class="footer-contact-item">
              <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              <?php echo htmlspecialchars($phone); ?>
            </a>

            <a href="mailto:<?php echo $email; ?>" class="footer-contact-item">
              <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
              <?php echo htmlspecialchars($email); ?>
            </a>

            <div class="footer-contact-item">
              <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
              <span>
                <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?> <?php echo htmlspecialchars($address['zip']); ?>
              </span>
            </div>

            <div class="footer-contact-item">
              <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <span><?php echo htmlspecialchars($businessHours); ?></span>
            </div>
          </div>

          <a href="/#estimate" class="btn-secondary btn-footer">Get Free Estimate</a>
        </div>
      </div>
    </div>
  </div>

  <!-- AEO Entity Block -->
  <div class="footer-entity" itemscope itemtype="https://schema.org/LocalBusiness">
    <div class="container">
      <meta itemprop="name" content="<?php echo htmlspecialchars($siteName); ?>">
      <meta itemprop="url" content="<?php echo $siteUrl; ?>">
      <meta itemprop="telephone" content="<?php echo $phoneRaw; ?>">
      <p>
        <strong><?php echo htmlspecialchars($siteName); ?></strong> is a licensed and insured handyman and remodeling contractor based in <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?>.
        Since <?php echo $yearEstablished; ?>, we've been providing professional home repair, remodeling, drywall, painting, and general handyman services to homeowners throughout St. George and surrounding communities including Washington, Hurricane, Santa Clara, Ivins, and Leeds.
        Our team specializes in delivering quality craftsmanship with transparent pricing and reliable service.
        Contact us at <?php echo htmlspecialchars($phone); ?> for your free estimate.
      </p>
    </div>
  </div>

  <!-- Footer Legal Row (MANDATORY per legal-compliance.md) -->
  <div class="footer-legal-row">
    <div class="container">
      <nav aria-label="Legal">
        <a href="/privacy-policy/">Privacy Policy</a>
        <span class="footer-legal-divider">|</span>
        <a href="/terms/">Terms of Service</a>
        <span class="footer-legal-divider">|</span>
        <a href="/cookie-policy/">Cookie Policy</a>
        <span class="footer-legal-divider">|</span>
        <a href="/accessibility/">Accessibility</a>
        <span class="footer-legal-divider">|</span>
        <a href="/privacy-policy/#ccpa-rights">Do Not Sell or Share My Personal Information</a>
        <span class="footer-legal-divider">|</span>
        <a href="/sitemap.xml">Sitemap</a>
      </nav>
    </div>
  </div>

  <!-- Footer Bottom Bar -->
  <div class="footer-bottom-bar">
    <div class="container">
      <p class="copyright">&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName); ?>. All rights reserved.</p>
      <p class="credit">
        <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">Web Design &amp; Hosting by Page One Insights, LLC</a>
      </p>
    </div>
  </div>

  <!-- Verified Local Partner Badge (v6.3 — include ONCE, last in footer) -->
  <?php include __DIR__ . '/partner-badge.php'; ?>
</footer>

<!-- Estimate dialog (opened by any [data-open-estimate]; wired in main.js) -->
<dialog class="estimate-dialog" id="estimate-dialog" aria-labelledby="estimate-dialog-title">
  <div class="dialog-head">
    <div>
      <h3 id="estimate-dialog-title">Get a free estimate</h3>
      <p class="footnote">We reply the same day.</p>
    </div>
    <button type="button" class="dialog-close" aria-label="Close" data-close-estimate>
      <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
    </button>
  </div>
  <div class="dialog-body">
    <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="p1-form">
      <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
      <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
      <?php echo p1_attribution_fields('dialog'); ?>
      <input type="hidden" name="consent_version" value="<?php echo htmlspecialchars($consentVersion); ?>">
      <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

      <div class="form-grid">
        <div class="field">
          <label for="dlg-name">Your Name</label>
          <input id="dlg-name" type="text" name="name" autocomplete="name" required>
        </div>
        <div class="field">
          <label for="dlg-phone">Phone</label>
          <input id="dlg-phone" type="tel" name="phone" autocomplete="tel" required>
        </div>
        <div class="field">
          <label for="dlg-email">Email</label>
          <input id="dlg-email" type="email" name="email" autocomplete="email" required>
        </div>
        <div class="field">
          <label for="dlg-service">Service Needed</label>
          <select id="dlg-service" name="service">
            <option value="">Select a service</option>
            <?php foreach ($services as $dlgOpt): ?>
            <option value="<?php echo htmlspecialchars($dlgOpt['name']); ?>"><?php echo htmlspecialchars($dlgOpt['name']); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="field full">
          <label for="dlg-message">Project Details</label>
          <textarea id="dlg-message" name="message" rows="3" placeholder="Tell us what you need done."></textarea>
        </div>
      </div>

      <fieldset class="form-consent-fieldset">
        <legend class="form-consent-legend">Communication Consent</legend>

        <label class="form-consent-item">
          <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
          <span class="consent-label">
            <strong>Email updates (optional):</strong> I agree to receive emails from
            <?php echo htmlspecialchars($siteName); ?> about my inquiry and services. I can unsubscribe anytime. Message frequency varies.
          </span>
        </label>

        <label class="form-consent-item">
          <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
          <span class="consent-label">
            <strong>SMS/Text messages (optional):</strong> I agree to receive texts from
            <?php echo htmlspecialchars($siteName); ?> at the number I provided. Message and data rates may apply. Reply STOP to unsubscribe. <strong>Consent is not a condition of purchase.</strong>
          </span>
        </label>

        <label class="form-consent-item form-consent-required">
          <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
          <span class="consent-label">
            I have read and agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span>
          </span>
        </label>
      </fieldset>

      <button type="submit" class="btn btn-primary btn-lg btn-block">Send my request</button>
    </form>
  </div>
</dialog>

<!-- Cookie bar (slim, appears after first scroll; dismissal persisted in main.js) -->
<div class="cookie-bar" id="cookie-bar" role="region" aria-label="Cookie notice">
  <p>We use cookies to improve your experience and understand site traffic. See our <a href="/cookie-policy/">Cookie Policy</a>.</p>
  <button type="button">Got it</button>
</div>

<!-- Back to top button -->
<button type="button" class="back-to-top" aria-label="Back to top">
  <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
</button>

<!-- Mobile sticky CTA bar (visible below 768px) -->
<div class="mobile-cta-bar">
  <a href="tel:<?php echo $phoneRaw; ?>" class="mobile-cta-btn mobile-cta-phone">
    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
    <span>Call Now</span>
  </a>
  <a href="/#estimate" class="mobile-cta-btn mobile-cta-estimate">
    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>
    <span>Free Estimate</span>
  </a>
</div>

<!-- Scripts: all defer (v6.3) -->
<script src="/assets/js/main.js" defer></script>

<!-- Back-to-top functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const backToTop = document.querySelector('.back-to-top');
  if (backToTop) {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 600) {
        backToTop.classList.add('visible');
      } else {
        backToTop.classList.remove('visible');
      }
    });

    backToTop.addEventListener('click', function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
});
</script>

</body>
</html>
