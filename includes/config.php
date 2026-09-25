<?php
/**
 * includes/config.php — site-wide variables for Y-Not Handyman & Remodel.
 * Sourced from build-plan.json (Phase 1 scaffold). Included at the top of every
 * page BEFORE any output. Colors are the framework.css scaffold defaults and are
 * finalized from logo analysis in Phase 2 (design.colors.extracted_from_logo).
 */

/* ---- Identity ------------------------------------------------------------ */
$slug            = 'y-not-handyman-remodel';          // MUST equal build directory name
$siteName        = 'Y-Not Handyman & Remodel';
$tagline         = 'Handyman & Remodeling in St. George, UT';
$industry        = 'handyman';
$tier            = 'standard';
$ownerName       = 'Tony Pomikala';

/* ---- Domain / URLs ------------------------------------------------------- */
// No production_domain in build-plan.json → default to the preview host.
$domain          = 'y-not-handyman-remodel.pageone.cloud';
$siteUrl         = 'https://' . $domain;              // always a valid absolute URL
// NOTE: $canonicalUrl is NOT set here — each page sets its own before head.php.

/* ---- Contact ------------------------------------------------------------- */
$phone           = '(801) 833-1588';
$phoneRaw        = '+18018331588';                    // for tel: / sms: links
$phoneSecondary  = '';
$email           = 'y.nothm70@gmail.com';

$address = [
    'street' => '1840 W 1100 N, Unit 12',
    'city'   => 'St. George',
    'state'  => 'UT',
    'zip'    => '84770',
];
$addressPublic   = false;                             // build-plan address_public=false — do not display street publicly

$businessHours   = 'Mon–Fri 9:00 AM–5:00 PM';

/* ---- SEO keywords -------------------------------------------------------- */
$primaryKeyword     = 'handyman St. George UT';
$secondaryKeywords  = [
    'home remodeling St. George',
    'drywall repair St. George',
    'remodeling contractor near me',
];

/* ---- Services ------------------------------------------------------------ */
// name, description (stub — copywriter finalizes), keywords, slug
$services = [
    [
        'name'        => 'Handyman Services',
        'slug'        => 'handyman-services',
        'description' => 'General handyman work and small home repairs across St. George, UT.',
        'keywords'    => 'handyman services St. George UT',
    ],
    [
        'name'        => 'Home Remodeling',
        'slug'        => 'home-remodeling',
        'description' => 'Kitchen, bath, and whole-home remodeling for St. George homeowners.',
        'keywords'    => 'home remodeling St. George UT',
    ],
    [
        'name'        => 'Drywall Repair',
        'slug'        => 'drywall-repair',
        'description' => 'Drywall patching, texture matching, and finishing in St. George, UT.',
        'keywords'    => 'drywall repair St. George UT',
    ],
    [
        'name'        => 'Door Installation',
        'slug'        => 'door-installation',
        'description' => 'Interior and exterior door installation and replacement in St. George.',
        'keywords'    => 'door installation St. George UT',
    ],
    [
        'name'        => 'Caulking & Weatherproofing',
        'slug'        => 'caulking-weatherproofing',
        'description' => 'Sealing, caulking, and weatherproofing to protect St. George homes.',
        'keywords'    => 'caulking & weatherproofing St. George UT',
    ],
    [
        'name'        => 'Interior Painting',
        'slug'        => 'interior-painting',
        'description' => 'Clean, precise interior painting for rooms and full interiors in St. George.',
        'keywords'    => 'interior painting St. George UT',
    ],
    [
        'name'        => 'Basic Plumbing & Fixture Installation',
        'slug'        => 'basic-plumbing-fixture-installation',
        'description' => 'Faucet, fixture, and basic plumbing installation for St. George homes.',
        'keywords'    => 'basic plumbing & fixture installation St. George UT',
    ],
    [
        'name'        => 'Home Maintenance & Repairs',
        'slug'        => 'home-maintenance-repairs',
        'description' => 'Ongoing home maintenance and repair work throughout St. George, UT.',
        'keywords'    => 'home maintenance & repairs St. George UT',
    ],
];

/* ---- Service areas ------------------------------------------------------- */
$serviceAreas = [
    'St. George',
    'Washington',
    'Hurricane',
    'Santa Clara',
    'Ivins',
    'Leeds',
];

/* ---- Social / analytics -------------------------------------------------- */
$socialLinks        = [];                             // none provided in intake
$googleAnalyticsId  = 'G-XXXXXXXXXX';                 // placeholder — replaced post-launch

/* ---- Brand colors (scaffold defaults — finalized from logo in Phase 2) --- */
$colors = [
    'primary'   => '#1f2428',
    'secondary' => '#5a6570',
    'accent'    => '#c8461a',
];

/* ---- Business facts ------------------------------------------------------ */
$yearEstablished = 2020;
$yearsInBusiness = 6;
$reviewCount     = 11;                                // real GBP data
$reviewRating    = 5.0;                               // real GBP data

$usps = [
    '5.0-star Google rating from 11 reviews',
    'In business since 2020',
    'Locally owned in St. George, Utah',
];

$differentiators = [
    'Locally-owned and operated with deep community roots in St. George',
    'Transparent, upfront pricing with no hidden fees or surprise charges',
    'Prompt scheduling and clear communication',
    'Comprehensive service range from minor repairs to full remodels',
];

/* ---- Google Business Profile -------------------------------------------- */
$gbpPlaceId       = 'ChIJCeywCKNFyoARDSbMDhHeo8o';
$gbpUrl           = 'https://www.google.com/maps/place/?q=place_id:ChIJCeywCKNFyoARDSbMDhHeo8o';
$gbpMapEmbed      = null;                             // none provided
$directionsUrl    = 'https://www.google.com/maps/dir/?api=1&destination=place_id:ChIJCeywCKNFyoARDSbMDhHeo8o';
$reviewRequestUrl = 'https://search.google.com/local/writereview?placeid=ChIJCeywCKNFyoARDSbMDhHeo8o';

/* ---- Assets / cache ------------------------------------------------------ */
$cssVersion = '1';                                    // SINGLE source of the framework.css cache-bust — bump on every framework.css change; pages MUST NOT set their own

/* ---- Forms --------------------------------------------------------------- */
$formAction     = 'https://db.pageone.cloud/functions/v1/leads/y-not-handyman-remodel';
$consentVersion = 'v2.1';                             // TCPA consent record version

/* ---- Lead attribution (v6.3) — MUST be last; sets first-touch cookie ----- */
require_once __DIR__ . '/attribution.php';
