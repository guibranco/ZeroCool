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
                    echo "<a href='https://guilhermebranco.com.br/" . $project . "/" . $utm . "'>" . ucwords(str_replace("_", " ", $project)) . "</a><br />\n";
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
</body>

</html>
