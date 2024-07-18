<?php
$baseDir = "/home/zerocool/public_html/";
$o = opendir($baseDir);
$forbidden = array("cgi-bin", "inovacao", "portfolio", "static", ".htpasswds", ".well-known");
$projects = array();
while ($item = readdir($o)) {
    if (is_dir($baseDir . $item) && $item != "." && $item != ".." && !in_array($item, $forbidden)) {
        $projects[] = $item;
    }
}
closedir($o);
sort($projects);
$utm = "?utm_source=zerocool&utm_medium=projects&utm_campaign=old_portfolio";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Guilherme Branco Stracini - Senior Software Engineer</title>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Portfolio of Guilherme Branco Stracini, senior software engineer, with professional life, experiences, skills, hobbies, and contact information." />
    <meta property="og:url" content="https://zerocool.com.br/" />
    <meta property="og:title" content="Guilherme Branco Stracini - Senior Software Engineer" />
    <meta property="og:site_name" content="Guilherme Branco Stracini - Senior Software Engineer" />
    <meta property="og:description"
        content="Portfolio of Guilherme Branco Stracini, senior software engineer, with professional life, experiences, skills, hobbies, and contact information." />
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
                    <li>
                        <a href="https://www.twitter.com/GuiBranco" rel="noopener" title="GuiBranco on Twitter"
                            target="_blank">
                            <img src="imagens/twitter.png" width="24" height="24" alt="GuiBranco on Twitter" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/guilherme.stracini" rel="noopener"
                            title="Guilherme Branco Stracini on Facebook" target="_blank">
                            <img src="imagens/facebook.png" width="24" height="24"
                                alt="Guilherme Branco Stracini on Facebook" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/@GuilhermeBrancoStracini" rel="noopener"
                            title="Canal @GuilhermeBrancoStracini on Youtube" target="_blank">
                            <img src="imagens/youtube.png" width="24" height="24"
                                alt="Canal @GuilhermeBrancoStracini on Youtube" />
                        </a>
                    </li>
                    <li>
                        <a href="https://pinterest.com/guibranco/" rel="noopener"
                            title="Guilherme Branco Stracini on Pinterest" target="_blank">
                            <img src="imagens/pinterest.png" width="24" height="24"
                                alt="Guilherme Branco Stracini on Pinterest" />
                        </a>
                    </li>
                    <li>
                        <a href="https://soundcloud.com/guilherme-stracini" rel="noopener"
                            title="Guilherme Branco Stracini on SoundCloud" target="_blank">
                            <img src="imagens/soundcloud.png" width="24" height="24"
                                alt="Guilherme Branco Stracini on SoundCloud" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/guilhermestracini/" rel="noopener"
                            title="Guilherme Branco Stracini on LinkedIn" target="_blank">
                            <img src="imagens/linkedin.png" width="24" height="24"
                                alt="Guilherme Branco Stracini on LinkedIn" />
                        </a>
                    </li>
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

        <div class="fb-page" data-href="https://www.facebook.com/guilhermebrancostracini" data-tabs="timeline"
            data-width="" data-height="" data-small-header="false" data-adapt-container-width="true"
            data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/guilhermebrancostracini" class="fb-xfbml-parse-ignore"><a
                    href="https://www.facebook.com/guilhermebrancostracini">Guilherme Branco Stracini</a></blockquote>
        </div>
    </div>
</body>

</html>
