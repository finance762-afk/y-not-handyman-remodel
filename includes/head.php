<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- SEO meta tags -->
  <title><?php echo htmlspecialchars($pageTitle ?? "$siteName | $tagline"); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($metaDescription ?? "Y-Not Handyman & Remodel provides professional handyman services and home remodeling in St. George, UT. Licensed, insured, and locally owned since 2020. Free estimates available."); ?>">
  <?php if (isset($noindex) && $noindex): ?>
  <meta name="robots" content="noindex, nofollow">
  <?php endif; ?>

  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl ?? $siteUrl); ?>">

  <!-- Open Graph tags -->
  <meta property="og:type" content="<?php echo $ogType ?? 'website'; ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($ogTitle ?? $pageTitle ?? "$siteName | $tagline"); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($ogDescription ?? $metaDescription ?? "Y-Not Handyman & Remodel provides professional handyman services and home remodeling in St. George, UT. Licensed, insured, and locally owned since 2020."); ?>">
  <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl ?? $siteUrl); ?>">
  <meta property="og:image" content="<?php echo $ogImage ?? $siteUrl . '/assets/images/logo-mark.png'; ?>">
  <meta property="og:site_name" content="<?php echo htmlspecialchars($siteName); ?>">
  <meta property="og:locale" content="en_US">

  <!-- Favicons -->
  <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">

  <!-- Fonts: self-hosted (v6.2 — NO Google Fonts CDN) -->
  <!-- Preload above-the-fold heading face only -->
  <link rel="preload" href="/assets/fonts/bricolage-grotesque.woff2" as="font" type="font/woff2" crossorigin>

  <!-- Critical CSS: inline above-the-fold subset (v6.3) -->
  <style><?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/critical.css'; ?></style>

  <!-- Main stylesheet: async load (v6.3) -->
  <link rel="preload" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>"></noscript>

  <?php if (isset($heroPreload) && !empty($heroPreload)): ?>
  <!-- Hero image preload (v6.3 — AVIF with fetchpriority=high) -->
  <link rel="preload" as="image" type="image/avif" imagesrcset="<?php echo htmlspecialchars($heroPreload['srcset']); ?>" imagesizes="<?php echo htmlspecialchars($heroPreload['sizes']); ?>" fetchpriority="high">
  <?php endif; ?>

  <!-- Google Analytics (placeholder — replaced post-launch) -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalyticsId; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?php echo $googleAnalyticsId; ?>');
  </script> -->

  <!-- JSON-LD Schema: LocalBusiness -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "@id": "<?php echo $siteUrl; ?>#organization",
    "name": "<?php echo htmlspecialchars($siteName); ?>",
    "url": "<?php echo $siteUrl; ?>",
    "logo": "<?php echo $siteUrl; ?>/assets/images/logo-mark.png",
    "image": "<?php echo $siteUrl; ?>/assets/images/logo-mark.png",
    "description": "Y-Not Handyman & Remodel is a local handyman and remodeling contractor serving St. George, UT and surrounding areas. We provide professional home repair, remodeling, drywall, painting, door installation, and general handyman services.",
    "telephone": "<?php echo $phoneRaw; ?>",
    "email": "<?php echo $email; ?>",
    "address": {
      "@type": "PostalAddress",
      <?php if ($addressPublic): ?>
      "streetAddress": "<?php echo htmlspecialchars($address['street']); ?>",
      <?php endif; ?>
      "addressLocality": "<?php echo htmlspecialchars($address['city']); ?>",
      "addressRegion": "<?php echo htmlspecialchars($address['state']); ?>",
      "postalCode": "<?php echo htmlspecialchars($address['zip']); ?>",
      "addressCountry": "US"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": "37.0965",
      "longitude": "-113.5684"
    },
    "areaServed": [
      <?php foreach ($serviceAreas as $idx => $area): ?>
      {
        "@type": "City",
        "name": "<?php echo htmlspecialchars($area); ?>, Utah"
      }<?php if ($idx < count($serviceAreas) - 1): ?>,<?php endif; ?>
      <?php endforeach; ?>
    ],
    "openingHours": "Mo-Fr 09:00-17:00",
    "priceRange": "$$",
    "hasMap": "<?php echo $gbpUrl; ?>",
    "sameAs": [
      "<?php echo $gbpUrl; ?>"
    ]
  }
  </script>

  <?php if (isset($schemaMarkup) && !empty($schemaMarkup)): ?>
  <!-- Page-specific schema -->
  <script type="application/ld+json">
  <?php echo $schemaMarkup; ?>
  </script>
  <?php endif; ?>
</head>
<body>
