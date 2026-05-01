<?php
require_once __DIR__ . '/secrets.php';

$isCli = PHP_SAPI === 'cli';

if (!$isCli) {
    $provided = $_GET['token'] ?? '';
    if (!hash_equals(FETCH_TOKEN, $provided)) {
        http_response_code(403);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Forbidden']);
        exit;
    }
    header('Content-Type: application/json');
}

function fetchOgImage(string $owner, string $repo, string $cacheDir, bool $isCli): string
{
    $filename  = "{$owner}-{$repo}.png";
    $cachePath = $cacheDir . '/' . $filename;

    if (file_exists($cachePath)) {
        if ($isCli) echo "  [cache] {$filename}\n";
        return $filename;
    }

    $ch = curl_init("https://opengraph.githubassets.com/1/{$owner}/{$repo}");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT        => 15,
        CURLOPT_USERAGENT      => 'ZeroCool-Portfolio',
    ]);

    $data     = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200 && !empty($data)) {
        file_put_contents($cachePath, $data);
        if ($isCli) echo "  [fetch] {$filename}\n";
        return $filename;
    }

    if ($isCli) fwrite(STDERR, "  [error] {$owner}/{$repo}: HTTP {$httpCode}\n");
    return '';
}

$token  = GH_PAT;
$sites  = [];
$report = [];
$page   = 1;

if ($isCli) echo "Fetching repositories from GitHub API...\n";

do {
    $url = "https://api.github.com/user/repos?per_page=100&page={$page}&type=all";

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => [
            "Authorization: Bearer {$token}",
            "Accept: application/vnd.github+json",
            "X-GitHub-Api-Version: 2022-11-28",
            "User-Agent: ZeroCool-Portfolio",
        ],
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        if ($isCli) {
            fwrite(STDERR, "GitHub API error on page {$page}: HTTP {$httpCode}\n{$response}\n");
            exit(1);
        }
        http_response_code(500);
        echo json_encode(['error' => "GitHub API error: HTTP {$httpCode}"]);
        exit;
    }

    $repos = json_decode($response, true);

    if (!is_array($repos)) {
        if ($isCli) {
            fwrite(STDERR, "Invalid JSON response on page {$page}\n");
            exit(1);
        }
        http_response_code(500);
        echo json_encode(['error' => 'Invalid JSON response from GitHub API']);
        exit;
    }

    if ($isCli) echo "Page {$page}: fetched " . count($repos) . " repositories.\n";

    foreach ($repos as $repo) {
        $hasHomepage = !empty($repo['homepage']);
        $hasPages    = $repo['has_pages'] === true;

        $group = match (true) {
            $hasPages  && $hasHomepage  => 'has_pages && homepage',
            $hasPages  && !$hasHomepage => 'has_pages && no homepage',
            !$hasPages && $hasHomepage  => 'no has_pages && homepage',
            default                     => 'no has_pages && no homepage',
        };

        $report[] = [$repo['owner']['login'], $repo['name'], $group];

        if ($hasHomepage && $hasPages) {
            $sites[] = [
                'name'        => $repo['name'],
                'description' => $repo['description'] ?? '',
                'html_url'    => $repo['html_url'],
                'homepage'    => $repo['homepage'],
                'owner'       => $repo['owner']['login'],
                'private'     => $repo['private'] === true,
            ];
        } elseif ($isCli) {
            if ($hasHomepage && !$hasPages) {
                echo "  [skip] {$repo['full_name']} — has homepage ({$repo['homepage']}) but has_pages=false\n";
            } elseif ($hasPages && !$hasHomepage) {
                echo "  [skip] {$repo['full_name']} — has_pages=true but homepage is empty\n";
            }
        }
    }

    $page++;

} while (count($repos) === 100);

usort($sites, fn($a, $b) => strcmp($a['name'], $b['name']));

$cacheDir = __DIR__ . '/imagens/github-pages';
if (!is_dir($cacheDir)) {
    mkdir($cacheDir, 0755, true);
}

if ($isCli) echo "\nCaching OpenGraph images...\n";

foreach ($sites as &$site) {
    $site['og_image'] = fetchOgImage($site['owner'], $site['name'], $cacheDir, $isCli);
}
unset($site);

file_put_contents(
    __DIR__ . '/github-sites.json',
    json_encode($sites, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
);

if ($isCli) {
    $csvPath = dirname(__DIR__) . '/github-pages-report.csv';
    $fh = fopen($csvPath, 'w');
    fputcsv($fh, ['owner', 'name', 'group']);
    usort($report, fn($a, $b) => $a[2] <=> $b[2] ?: strcmp($a[0], $b[0]) ?: strcmp($a[1], $b[1]));
    foreach ($report as $row) {
        fputcsv($fh, $row);
    }
    fclose($fh);
    echo "\nCSV report written to github-pages-report.csv (" . count($report) . " repositories)\n";
    echo "Found " . count($sites) . " repositories with homepage URLs.\n";
    echo "Output written to github-sites.json\n";
} else {
    echo json_encode(['success' => true, 'count' => count($sites)]);
}
