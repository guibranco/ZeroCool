<?php

$_isLocal = !is_dir('/home/zerocool/public_html/');

define('BASE_DIR',            $_isLocal ? __DIR__ . '/' : '/home/zerocool/public_html/');
define('SITE_BASE',           'https://zerocool.com.br/');
define('PORTFOLIO_BASE',      'https://zerocool.com.br/portfolio/');
define('SCREENSHOT_DIR',      $_isLocal ? BASE_DIR . 'imagens/screenshots/' : BASE_DIR . 'portfolio/imagens/screenshots/');
define('SCREENSHOT_URL_BASE', PORTFOLIO_BASE . 'imagens/screenshots/');

$FORBIDDEN = ['cgi-bin', 'inovacao', 'portfolio', 'static', '.htpasswds', '.well-known'];

/**
 * Scans the public_html base directory and returns a sorted list of project slugs,
 * excluding forbidden directories.
 *
 * @return string[] Sorted array of normalized (lowercase) directory names.
 */
function getProjectSlugs(): array {
    global $FORBIDDEN;

    $slugs = [];
    $handle = opendir(BASE_DIR);

    while ($item = readdir($handle)) {
        if (
            is_dir(BASE_DIR . $item) &&
            $item !== '.' &&
            $item !== '..' &&
            !in_array($item, $FORBIDDEN)
        ) {
            $slugs[] = strtolower($item);
        }
    }

    closedir($handle);
    sort($slugs);

    return $slugs;
}

/**
 * Loads GitHub Pages sites from the pre-generated JSON file.
 *
 * @return array<array{name: string, description: string, html_url: string, homepage: string, owner: string}>
 */
function getGitHubPagesSites(): array {
    $jsonFile = __DIR__ . '/github-sites.json';
    if (!file_exists($jsonFile)) {
        return [];
    }
    $data = json_decode(file_get_contents($jsonFile), true);
    return is_array($data) ? $data : [];
}

/**
 * Builds the full projects array with screenshot, description, name and URL,
 * as needed by index.php.
 *
 * @return array<string, array{screenshot: string, description: string, name: string, url: string}>
 */
function getProjects(string $utm): array {
    $projects = [];

    foreach (getProjectSlugs() as $slug) {
        $screenshotFile = SCREENSHOT_DIR . $slug . '.png';
        $screenshotUrl  = SCREENSHOT_URL_BASE . $slug . '.png';

        if (file_exists($screenshotFile)) {
            $image = $screenshotUrl . '?v=' . filemtime($screenshotFile);
        } else {
            $image = 'https://picsum.photos/seed/' . urlencode($slug . time()) . '/300';
        }

        $projects[$slug] = [
            'screenshot'  => $image,
            'description' => $slug,
            'name'        => $slug,
            'url'         => 'https://guilhermebranco.com.br/' . $slug . '/' . $utm,
        ];
    }

    ksort($projects);

    return $projects;
}
