<?php
$baseDir = "/home/zerocool/public_html/";
$o = opendir($baseDir);
$forbidden = array("cgi-bin", "inovacao", "portfolio", "static", ".htpasswds", ".well-known");
$projects = array();
while ($item = readdir($o)) {
    if (
        is_dir($baseDir . $item) &&
        $item != "." &&
        $item != ".." &&
        !in_array($item, $forbidden)
    ) {
        $projects[strtolower($item)] = $item;
    }
}
closedir($o);
ksort($projects);
$utm = "?utm_source=zerocool&utm_medium=projects&utm_campaign=old_portfolio";
$description = "Portfolio of Guilherme Branco Stracini, senior software engineer, with professional life, experiences, skills, hobbies, and contact information.";

$socialLinks = array(
    "github" => "https://github.com/guibranco",
    "twitter" => "https://www.twitter.com/GuiBranco",
    "facebook" => "https://www.facebook.com/guilherme.stracini",
    "youtube" => "https://www.youtube.com/@GuilhermeBrancoStracini",
    "pinterest" => "https://pinterest.com/guibranco/",
    "soundcloud" => "https://soundcloud.com/guilherme-stracini",
    "linkedin" => "https://www.linkedin.com/in/guilhermestracini",
    "stackoverflow" => "https://stackoverflow.com/users/1890220/guilherme-branco-stracini",
    "instagram" => "https://www.instagram.com/guilhermebrancostracini",
    "whatsapp" => "https://api.whatsapp.com/send/?phone=5511972659788&text=Hello%2C+Guilherme%21"
);
ksort($socialLinks);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Guilherme Branco Stracini - Senior Software Engineer</title>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo $description; ?>" />
    <meta property="og:url" content="https://zerocool.com.br/" />
    <meta property="og:title" content="Guilherme Branco Stracini - Senior Software Engineer" />
    <meta property="og:site_name" content="Guilherme Branco Stracini - Senior Software Engineer" />
    <meta property="og:description" content="<?php echo $description; ?>" />
    <meta property="og:image" content="https://zerocool.com.br/portfolio/imagens/icone.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="250" />
    <meta property="og:image:height" content="250" />
    <meta property="og:type" content="website" />
    <meta property="fb:app_id" content="290252964970555" />
    <meta property="fb:admins" content="1614826774" />
    <base href="https://zerocool.com.br/portfolio/" />
    <link rel="stylesheet" type="text/css" href="styles.css?update=<?php echo filemtime("styles.css"); ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4KQXFWPLV8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-4KQXFWPLV8');
    </script>
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v20.0&appId=290252964970555"
        nonce="mLVu8wYS"></script>
    <div id="header">
        <div id="top">
            <div id="socialLinks">
                <ul>
                    <?php
                    foreach ($socialLinks as $social => $link) {
                        echo "<li>\n";
                        echo "<a href='" . $link . "' rel='noopener' title='Guilherme Branco Stracini on " . ucwords($social) . "' target='_blank'>\n";
                        echo "<img src='imagens/" . $social . ".png' width='24' height='24' alt='Guilherme Branco Stracini on " . ucwords($social) . "' />\n";
                        echo "</a>\n";
                        echo "</li>\n";
                    }
?>
                </ul>
            </div>
        </div>
    </div>
    <div id="content">
        <div id="projects">
            <h1>Projects</h1>
            <div class="links">
                <?php
                foreach ($projects as $project) {
                    $name = ucwords(str_replace("_", " ", str_replace("-", " ", $project)));
                    if (strlen($name) <= 3) {
                        $name = strtoupper($name);
                    }
                    echo "<a href='https://guilhermebranco.com.br/" . $project . "/" . $utm . "'>" . $name . "</a><br />\n";
                }
?>
            </div>
        </div>

        <div id="boxes">
            <div id="free-sms">
                <a href="https://guilhermebranco.com.br/sms/<?php echo $utm; ?>">Free SMS sending</a>
            </div>

            <div id="personal">
                <a href="https://guilhermebranco.com.br/<?php echo $utm; ?>">Portfolio</a> <br />
                <a href="https://blog.guilhermebranco.com.br/<?php echo $utm; ?>">Blog</a> <br />
            </div>

        </div>
        <div id="facebook">
            <div class="fb-page" data-href="https://www.facebook.com/guilhermebrancostracini" data-tabs="timeline"
                data-width="" data-height="" data-small-header="false" data-adapt-container-width="true"
                data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/guilhermebrancostracini" class="fb-xfbml-parse-ignore"><a
                        href="https://www.facebook.com/guilhermebrancostracini">Guilherme Branco Stracini</a>
                </blockquote>
            </div>
        </div>
    </div>

    <footer>Developed by <a href="https://guibranco.github.io/?utm_campaign=project&amp;utm_media=zerocool+portfolio&amp;utm_source=zerocool.com.br" target="_blank" rel="noopener noreferrer"><img src="https://guibranco.github.io/photo.png" alt="Guilherme Branco Stracini" class="image-rounded image-responsive" loading="lazy" style="width: 24px; height: 44px;"></a> <a href="https://guibranco.github.io/?utm_campaign=project&amp;utm_media=zerocool+portfolio&amp;utm_source=zerocool.com.br" target="_blank" rel="noopener noreferrer">Guilherme Branco Stracini</a> | Repository <a href="https://github.com/ApiBR/vagas-aggregator-ui"><svg height="32px" fill="#FFFFFF" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>GitHub</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path></svg></a> <a href="https://github.com/guibranco/zerocool">GitHub</a></footer>
</body>

</html>
