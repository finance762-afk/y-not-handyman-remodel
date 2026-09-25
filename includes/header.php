<!-- Skip to content accessibility link -->
<a href="#main-content" class="skip-link">Skip to main content</a>

<!-- Site Header -->
<header class="site-header" data-header>
  <nav class="navbar navbar-inner container-wide" aria-label="Main navigation">
    <a href="/" class="logo-link" aria-label="<?php echo htmlspecialchars($siteName); ?> Home">
      <img src="/assets/images/logo-mark.png" alt="<?php echo htmlspecialchars($siteName); ?> logo" class="site-logo logo--square" width="96" height="96">
    </a>

    <!-- Desktop Navigation -->
    <ul class="navbar-links">
      <li><a href="/" <?php if ($currentPage === 'home'): ?>aria-current="page"<?php endif; ?>>Home</a></li>

      <!-- Services dropdown -->
      <li class="has-dropdown">
        <button type="button" class="dropdown-toggle" aria-expanded="false" aria-haspopup="true">
          Services
          <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </button>
        <ul class="dropdown" role="menu" style="display:none">
          <?php foreach ($services as $navSvc): ?>
          <li role="none">
            <a href="/services/<?php echo htmlspecialchars($navSvc['slug']); ?>/" role="menuitem" <?php if ($currentPage === $navSvc['slug']): ?>aria-current="page"<?php endif; ?>>
              <?php echo htmlspecialchars($navSvc['name']); ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </li>

      <li><a href="/about/" <?php if ($currentPage === 'about'): ?>aria-current="page"<?php endif; ?>>About</a></li>
      <li><a href="/contact/" <?php if ($currentPage === 'contact'): ?>aria-current="page"<?php endif; ?>>Contact</a></li>
    </ul>

    <!-- Desktop CTA -->
    <div class="navbar-cta">
      <a href="tel:<?php echo $phoneRaw; ?>" class="phone-link">
        <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <?php echo htmlspecialchars($phone); ?>
      </a>
      <a href="/#estimate" class="btn-primary">Free Estimate</a>
    </div>

    <!-- Mobile hamburger -->
    <button type="button" class="hamburger" aria-expanded="false" aria-label="Toggle navigation menu" aria-controls="mobile-menu">
      <span class="hamburger-line"></span>
      <span class="hamburger-line"></span>
      <span class="hamburger-line"></span>
    </button>
  </nav>
</header>

<!-- Mobile full-screen menu (outside header per v7 scaffold rules) -->
<div class="mobile-menu" id="mobile-menu" aria-hidden="true">
  <div class="mobile-menu-inner">
    <ul class="mobile-menu-links">
      <li><a href="/" <?php if ($currentPage === 'home'): ?>aria-current="page"<?php endif; ?>>Home</a></li>

      <!-- Services submenu -->
      <li class="mobile-submenu-header">Services</li>
      <?php foreach ($services as $navSvc): ?>
      <li class="mobile-submenu-item">
        <a href="/services/<?php echo htmlspecialchars($navSvc['slug']); ?>/" <?php if ($currentPage === $navSvc['slug']): ?>aria-current="page"<?php endif; ?>>
          <?php echo htmlspecialchars($navSvc['name']); ?>
        </a>
      </li>
      <?php endforeach; ?>

      <li><a href="/about/" <?php if ($currentPage === 'about'): ?>aria-current="page"<?php endif; ?>>About</a></li>
      <li><a href="/contact/" <?php if ($currentPage === 'contact'): ?>aria-current="page"<?php endif; ?>>Contact</a></li>
    </ul>

    <div class="mobile-menu-cta">
      <a href="tel:<?php echo $phoneRaw; ?>" class="btn-primary btn-block">
        <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        Call Now
      </a>
      <a href="/#estimate" class="btn-secondary btn-block">Free Estimate</a>
    </div>
  </div>
</div>

<!-- Main content wrapper -->
<main id="main-content">
