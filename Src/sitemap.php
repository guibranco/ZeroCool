<?php
require_once __DIR__ . '/functions.php';

header('Content-Type: application/xml; charset=utf-8');
header('X-Robots-Tag: noindex');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Portfolio homepage
echo "  <url>\n";
echo "    <loc>" . htmlspecialchars(PORTFOLIO_BASE, ENT_XML1, 'UTF-8') . "</loc>\n";
echo "    <changefreq>weekly</changefreq>\n";
echo "    <priority>1.0</priority>\n";
echo "  </url>\n";

// Project pages
foreach (getProjectSlugs() as $slug) {
    $url = SITE_BASE . $slug . '/';
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($url, ENT_XML1, 'UTF-8') . "</loc>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.7</priority>\n";
    echo "  </url>\n";
}

echo "</urlset>\n";
