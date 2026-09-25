<?php
/**
 * functions.php — Site utility functions for Y-Not Handyman & Remodel
 * Included at the top of every page after config.php
 */

/**
 * Check if a page is the currently active page
 *
 * @param string $page Page identifier to check
 * @return bool True if the page is active
 */
function isActivePage($page) {
    global $currentPage;
    return isset($currentPage) && $currentPage === $page;
}

/**
 * Format phone number for display
 * Converts raw phone number to (XXX) XXX-XXXX format
 *
 * @param string $phone Raw phone number
 * @return string Formatted phone number
 */
function formatPhone($phone) {
    // Remove all non-numeric characters
    $cleaned = preg_replace('/[^0-9]/', '', $phone);

    // Format as (XXX) XXX-XXXX
    if (strlen($cleaned) === 11 && substr($cleaned, 0, 1) === '1') {
        $cleaned = substr($cleaned, 1); // Remove leading 1
    }

    if (strlen($cleaned) === 10) {
        return sprintf('(%s) %s-%s',
            substr($cleaned, 0, 3),
            substr($cleaned, 3, 3),
            substr($cleaned, 6, 4)
        );
    }

    return $phone; // Return original if formatting fails
}

/**
 * Generate URL-safe slug from service name
 *
 * @param string $name Service name
 * @return string URL-safe slug
 */
function getServiceSlug($name) {
    $slug = strtolower($name);
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}

/**
 * Generate URL-safe slug from area/city name
 *
 * @param string $city City name
 * @return string URL-safe slug
 */
function getAreaSlug($city) {
    $slug = strtolower($city);
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}

/**
 * Generate Service schema markup
 *
 * @param array $service Service data array with name, description, keywords
 * @return string JSON-LD schema markup
 */
function generateServiceSchema($service) {
    global $siteName, $siteUrl, $address;

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service['name'],
        'description' => $service['description'],
        'provider' => [
            '@id' => $siteUrl . '#organization'
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => $address['city'] . ', ' . $address['state']
        ]
    ];

    return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

/**
 * Generate FAQPage schema markup
 *
 * @param array $faqs Array of FAQ items with 'q' and 'a' keys
 * @return string JSON-LD schema markup
 */
function generateFAQSchema($faqs) {
    $mainEntity = [];

    foreach ($faqs as $faq) {
        $mainEntity[] = [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a']
            ]
        ];
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $mainEntity
    ];

    return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

/**
 * Generate BreadcrumbList schema markup
 *
 * @param array $breadcrumbs Array of breadcrumb items with 'name' and 'url' keys
 * @return string JSON-LD schema markup
 */
function generateBreadcrumbSchema($breadcrumbs) {
    global $siteUrl;

    $itemListElement = [];

    foreach ($breadcrumbs as $index => $crumb) {
        $itemListElement[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $crumb['name'],
            'item' => $siteUrl . $crumb['url']
        ];
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $itemListElement
    ];

    return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

/**
 * Generate meta tags for SEO
 *
 * @param string $title Page title
 * @param string $description Meta description
 * @param string $canonical Canonical URL
 * @return array Meta tag data
 */
function generateMetaTags($title, $description, $canonical) {
    return [
        'title' => htmlspecialchars($title),
        'description' => htmlspecialchars($description),
        'canonical' => htmlspecialchars($canonical)
    ];
}

/**
 * Sanitize output for HTML display
 *
 * @param string $text Text to sanitize
 * @return string Sanitized text
 */
function escapeHtml($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Get service data by slug
 *
 * @param string $slug Service slug
 * @return array|null Service data or null if not found
 */
function getServiceBySlug($slug) {
    global $services;

    foreach ($services as $service) {
        if ($service['slug'] === $slug) {
            return $service;
        }
    }

    return null;
}

/**
 * Get current year for copyright
 *
 * @return string Current year
 */
function getCurrentYear() {
    return date('Y');
}

/**
 * Check if a service area page exists
 *
 * @param string $slug Area slug
 * @return bool True if page exists
 */
function areaPageExists($slug) {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/areas/' . $slug;
    return is_dir($path);
}

/**
 * Generate @graph schema wrapper for multiple schema types
 *
 * @param array $schemas Array of schema objects
 * @return string JSON-LD @graph schema markup
 */
function generateGraphSchema($schemas) {
    $schema = [
        '@context' => 'https://schema.org',
        '@graph' => $schemas
    ];

    return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}
