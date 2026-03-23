<?php
$baseDir = "/home/zerocool/public_html/";
$siteBase = "https://zerocool.com.br/";
$forbidden = array("cgi-bin", "inovacao", "portfolio", "static", ".htpasswds", ".well-known");

$projects = array();
$o = opendir($baseDir);

while ($item = readdir($o)) {
    if (
        is_dir($baseDir . $item) &&
        $item != "." &&
        $item != ".." &&
        !in_array($item, $forbidden)
    ) {
        $normalized = strtolower($item);
        $projects[$normalized] = $siteBase . $item . "/";
    }
}

closedir($o);
ksort($projects);

header("Content-Type: application/xml; charset=utf-8");
header("X-Robots-Tag: noindex");

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

echo "  <url>\n";
echo "    <loc>" . htmlspecialchars($siteBase, ENT_XML1, "UTF-8") . "/portfolio</loc>\n";
echo "    <changefreq>weekly</changefreq>\n";
echo "    <priority>1.0</priority>\n";
echo "  </url>\n";

foreach ($projects as $slug => $url) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($url, ENT_XML1, "UTF-8") . "</loc>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.7</priority>\n";
    echo "  </url>\n";
}

echo "</urlset>\n";
