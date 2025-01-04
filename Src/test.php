<?php
$baseDir = "/home/zerocool/public_html/";
$utm = "?utm_source=zerocool&utm_medium=projects&utm_campaign=old_portfolio";
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
        $projects[strtolower($item)] = ["screenshot" => "https://picsum.photos/seed/".urlencode($item.time())."/300", "description" => $item, "name" => $item, "url" => "https://guilhermebranco.com.br/" . $item . "/" . $utm];
    }
}
closedir($o);
ksort($projects);

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
    "instagram" => "https://www.instagram.com/gui.stracini",
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
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4KQXFWPLV8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-4KQXFWPLV8');
    </script>
    <style>
    /* General styles */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    body {
      background-color: #666;
      color: #333;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    h1, h2, p, a {
      margin: 10px 0;
    }

    /* Header */
    header {
      background-color: #000;
      color: #fff;
      padding: 20px;
      text-align: center;
      position: relative;
      min-height: 80px;
    }
    .social-links {
      position: absolute;
      top: 20px;
      right: 20px;
      display: flex;
      gap: 10px;
    }
    .social-links a {
      color: #fff;
      text-decoration: none;
      font-size: 1.5em;
      transition: color 0.3s;
    }
    .social-links a:hover {
      color: orange;
    }

        /* Featured section */
        .featured {
            background-color: #FFD700;
            color: #000;
            text-align: center;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .featured a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #000;
            color: #FFD700;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }
        .featured a:hover {
            background-color: #FFD700;
            color: #000;
        }

    /* Facebook widget */
    .facebook-widget {
      position: fixed;
      top: 100px;
      right: 20px;
      width: 300px;
      height: 400px;
      background-color: #fff;
      border: 2px solid orange;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      z-index: 1000;
    }

    /* Main content */
    main {
      flex: 1;
      padding: 20px;
    }
    .projects-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      width: 84%;
    }
    .project-card {
      background-color: #fff;
      border: 2px solid orange;
      border-radius: 8px;
      padding: 15px;
      width: 300px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s;
    }
    .project-card:hover {
      transform: translateY(-5px);
    }
    .project-image {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .project-name {
      font-size: 1.3em;
      font-weight: bold;
      color: #333;
    }
    .project-description {
      font-size: 0.9em;
      color: #555;
    }
    .project-link {
      text-decoration: none;
      color: orange;
      font-weight: bold;
    }

    /* Footer */
    footer {
      background-color: #FFD700;
      color: #333;
      text-align: center;
      padding: 15px;
    }

        /* Footer */
footer {
  background-color: #FFD700;
  color: #333;
  text-align: center;
  padding: 15px;
  font-size: 16px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

/* Responsive adjustments */
@media (min-width: 768px) {
  footer {
    flex-direction: row; /* Horizontal layout for larger screens */
    justify-content: space-between;
    padding: 20px 40px;
    text-align: left;
  }

  footer div {
    margin: 0 15px;
  }
}

@media (max-width: 767px) {
  footer {
    font-size: 14px; /* Smaller font size for small screens */
    padding: 10px;
  }
}


        @media (max-width: 768px) {
  .facebook-widget {
    position: relative;
    top: auto;
    right: auto;
    margin: 20px auto;
    width: 100%;
    max-width: 300px; /* Keeps the original widget width */
  }
}
  </style>
  </head>
  <body>
    <header>
      <div class="social-links">
        <?php
                    foreach ($socialLinks as $social => $link) {
                        echo "<a href='" . $link . "' rel='noopener' title='Guilherme Branco Stracini on " . ucwords($social) . "' target='_blank'>\n";
                        echo "<img src='imagens/" . $social . ".png' width='24' height='24' alt='Guilherme Branco Stracini on " . ucwords($social) . "' />\n";
                        echo "</a>\n";
                    }
?>
      </div>
    </header>

    <!-- Featured section -->
    <section class="featured">
        <h2>Explore More</h2>
        <a href="https://blog.guilhermebranco.com.br" target="_blank" rel="noopener">Visit My Blog</a>
        <a href="https://guilhermebranco.com.br" target="_blank" rel="noopener">View My New Portfolio</a>
    </section>

    <!-- Facebook widget container -->
    <div class="facebook-widget">
      <iframe
        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fguilhermebrancostracini&tabs=timeline&width=300&height=400&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
        width="300"
        height="400"
        style="border:none; overflow:hidden"
        scrolling="no"
        frameborder="0"
        allowfullscreen="true"
        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
      </iframe>
    </div>

    <main>
      <section class="projects-container">
        <?php
foreach ($projects as $project) {
    // Assuming $project is an associative array with 'screenshot', 'name', 'description', and 'url' keys
    $name = ucwords(str_replace("_", " ", str_replace("-", " ", $project['name'])));
    if (strlen($name) <= 3) {
        $name = strtoupper($name);
    }
    echo "<div class='project-card'>\n";
    echo "  <img src='" . htmlspecialchars($project['screenshot'], ENT_QUOTES, 'UTF-8') . "' alt='Project Screenshot' class='project-image'>\n";
    echo "  <h2 class='project-name'>" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</h2>\n";
    echo "  <p class='project-description'>" . htmlspecialchars($project['description'], ENT_QUOTES, 'UTF-8') . "</p>\n";
    echo "  <a href='" . htmlspecialchars($project['url'], ENT_QUOTES, 'UTF-8') . "' class='project-link' target='_blank'>View Project</a>\n";
    echo "</div>\n";
}
?>

      </section>
    </main>

    <footer>Developed by <a
        href="https://guibranco.github.io/?utm_campaign=project&amp;utm_media=zerocool+portfolio&amp;utm_source=zerocool.com.br"
        target="_blank" rel="noopener noreferrer"><img
          src="https://guibranco.github.io/photo.png"
          alt="Guilherme Branco Stracini" class="image-rounded image-responsive"
          loading="lazy" style="width: 24px; height: 44px;"></a> <a
        href="https://guibranco.github.io/?utm_campaign=project&amp;utm_media=zerocool+portfolio&amp;utm_source=zerocool.com.br"
        target="_blank" rel="noopener noreferrer">Guilherme Branco Stracini</a>
      | Repository <a href="https://github.com/ApiBR/vagas-aggregator-ui"><svg
          height="32px" fill="#FFFFFF" role="img" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"><title>GitHub</title><path
            d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path></svg></a>
      <a href="https://github.com/guibranco/zerocool">GitHub</a></footer>
  </body>
</html>
