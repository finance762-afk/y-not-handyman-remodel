<?php
/**
 * sitemap.php — Dynamic XML sitemap for Y-Not Handyman & Remodel.
 * Builds the page list from config.php ($services, $serviceAreas) plus static pages.
 * .htaccess rewrites /sitemap.xml to this file, so external URLs still say /sitemap.xml.
 *
 * NEVER create a static sitemap.xml — it goes stale and shadows the rewrite.
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// Set XML header
header('Content-Type: application/xml; charset=utf-8');

// Build timestamp
$now = date('c');

// Start XML
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

  <!-- Homepage -->
  <url>
    <loc><?php echo $siteUrl; ?>/</loc>
    <lastmod><?php echo $now; ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>

  <!-- Services main listing -->
  <url>
    <loc><?php echo $siteUrl; ?>/services/</loc>
    <lastmod><?php echo $now; ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>

  <!-- Individual service pages (built from config.php $services array) -->
  <?php foreach ($services as $service): if (!servicePageExists($service['slug'])) continue; ?>
  <url>
    <loc><?php echo $siteUrl; ?>/services/<?php echo $service['slug']; ?>/</loc>
    <lastmod><?php echo $now; ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <?php endforeach; ?>

  <!-- Service Area landing page (Standard tier — single landing page) -->
  <url>
    <loc><?php echo $siteUrl; ?>/service-area/</loc>
    <lastmod><?php echo $now; ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>

  <!-- About page -->
  <url>
    <loc><?php echo $siteUrl; ?>/about/</loc>
    <lastmod><?php echo $now; ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>

  <!-- Contact page -->
  <url>
    <loc><?php echo $siteUrl; ?>/contact/</loc>
    <lastmod><?php echo $now; ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>

  <!-- Legal/compliance pages (REQUIRED per v6.1 CLAUDE.md) -->
  <url>
    <loc><?php echo $siteUrl; ?>/privacy-policy/</loc>
    <lastmod><?php echo $now; ?></lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.3</priority>
  </url>

  <url>
    <loc><?php echo $siteUrl; ?>/terms/</loc>
    <lastmod><?php echo $now; ?></lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.3</priority>
  </url>

  <url>
    <loc><?php echo $siteUrl; ?>/cookie-policy/</loc>
    <lastmod><?php echo $now; ?></lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.3</priority>
  </url>

  <url>
    <loc><?php echo $siteUrl; ?>/accessibility/</loc>
    <lastmod><?php echo $now; ?></lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.3</priority>
  </url>

</urlset>
