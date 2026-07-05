<?php
require_once __DIR__ . '/functions.php';

$utm = '?utm_source=zerocool&utm_medium=projects&utm_campaign=old_portfolio';
$projects = getProjects($utm);

$description = "Portfolio of Guilherme Branco Stracini, senior software engineer, with professional life, experiences, skills, hobbies, and contact information.";

$socialLinks = [
    "facebook"      => "https://www.facebook.com/guilherme.stracini",
    "github"        => "https://github.com/guibranco",
    "instagram"     => "https://www.instagram.com/gui.stracini",
    "linkedin"      => "https://www.linkedin.com/in/guilhermestracini",
    "pinterest"     => "https://pinterest.com/guibranco/",
    "soundcloud"    => "https://soundcloud.com/guilherme-stracini",
    "stackoverflow" => "https://stackoverflow.com/users/1890220/guilherme-branco-stracini",
    "twitter"       => "https://www.twitter.com/GuiBranco",
    "whatsapp"      => "https://api.whatsapp.com/send/?phone=5511972659788&text=Hello%2C+Guilherme%21",
    "wordpress"     => "https://blog.guilhermebranco.com.br",
    "youtube"       => "https://www.youtube.com/@GuilhermeBrancoStracini",
];
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
    <meta property="og:image" content="<?php echo PORTFOLIO_BASE; ?>imagens/icone.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="250" />
    <meta property="og:image:height" content="250" />
    <meta property="og:type" content="website" />
    <meta property="fb:app_id" content="290252964970555" />
    <meta property="fb:admins" content="1614826774" />
    <base href="<?php echo PORTFOLIO_BASE; ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="styles.css?<?php echo filemtime('styles.css'); ?>">
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
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v25.0&appId=290252964970555"></script>

    <header>
      <div class="social-links">
        <?php foreach ($socialLinks as $social => $link): ?>
        <a href="<?php echo $link; ?>" rel="noopener"
           title="Guilherme Branco Stracini on <?php echo ucwords($social); ?>"
           target="_blank">
          <img src="imagens/<?php echo $social; ?>.png"
               width="20" height="20"
               alt="<?php echo ucwords($social); ?>" />
        </a>
        <?php endforeach; ?>
      </div>
    </header>

    <section class="featured">
      <h2>Explore More</h2>
      <div class="featured-links">
        <a href="https://blog.guilhermebranco.com.br" target="_blank" rel="noopener">
          <img src="imagens/wordpress.png" alt=""> Blog
        </a>
        <a href="https://guilherme.stracini.com.br/blog" target="_blank" rel="noopener">
          <img src="imagens/github.png" alt=""> Blog (Tecnologia &amp; Viagens)
        </a>
        <a href="https://guilhermebranco.com.br" target="_blank" rel="noopener">
          <img src="imagens/guilhermestraccini.png" alt=""> New Portfolio
        </a>
        <a href="https://bot.straccini.com" target="_blank" rel="noopener">
          <img src="imagens/gstraccini-bot.png" alt=""> GitHub bot
        </a>
      </div>
    </section>

    <div class="facebook-widget fb-page" data-href="https://www.facebook.com/guilhermebrancostracini" data-tabs="timeline" data-width="300" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/guilhermebrancostracini" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/guilhermebrancostracini">Guilherme Branco Stracini</a></blockquote></div>


    <main>
      <div class="section-group">
        <div class="section-header">
          <h2 class="section-title">Hosted Projects</h2>
          <p class="section-subtitle">Deployed on shared hosting</p>
        </div>
        <section class="projects-container">
          <?php foreach ($projects as $project):
              $name = ucwords(str_replace('_', ' ', str_replace('-', ' ', $project['name'])));
              if (strlen($name) <= 3) {
                  $name = strtoupper($name);
              }
          ?>
          <article class="project-card">
            <div class="project-image-wrapper">
              <img loading="lazy"
                   src="<?php echo htmlspecialchars($project['screenshot'], ENT_QUOTES, 'UTF-8'); ?>"
                   alt="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?> screenshot"
                   class="project-image">
            </div>
            <div class="project-body">
              <h2 class="project-name"><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></h2>
              <p class="project-description"><?php echo htmlspecialchars($project['description'], ENT_QUOTES, 'UTF-8'); ?></p>
              <a href="<?php echo htmlspecialchars($project['url'], ENT_QUOTES, 'UTF-8'); ?>"
                 class="project-link"
                 target="_blank"
                 rel="noopener">View Project</a>
            </div>
          </article>
          <?php endforeach; ?>
        </section>
      </div>

      <?php
          $githubSites = getGitHubPagesSites();
          $ownerPriority = ['guibranco' => 1.0, 'guilhermestracini' => 0.9, 'apibr' => 0.8];
          $byOwner = [];
          foreach ($githubSites as $site) {
              $byOwner[$site['owner']][] = $site;
          }
          uksort($byOwner, function (string $a, string $b) use ($ownerPriority): int {
              $pa = $ownerPriority[$a] ?? 0.5;
              $pb = $ownerPriority[$b] ?? 0.5;
              return $pb <=> $pa ?: strcmp($a, $b);
          });
      ?>
      <?php if (!empty($byOwner)): ?>
      <div class="section-divider"></div>
      <div class="section-group">
        <div class="section-header section-header--github">
          <h2 class="section-title">GitHub Pages</h2>
          <p class="section-subtitle">Open source projects published via GitHub Pages</p>
        </div>
        <?php foreach ($byOwner as $owner => $ownerSites):
            $ownerSlug = preg_replace('/[^a-zA-Z0-9_-]/', '-', $owner);
        ?>
        <div class="owner-group" data-owner="<?php echo htmlspecialchars($owner, ENT_QUOTES, 'UTF-8'); ?>">
          <div class="owner-header">
            <a href="https://github.com/<?php echo htmlspecialchars($owner, ENT_QUOTES, 'UTF-8'); ?>"
               class="owner-link"
               target="_blank"
               rel="noopener">
              <img src="https://github.com/<?php echo htmlspecialchars($owner, ENT_QUOTES, 'UTF-8'); ?>.png?size=40"
                   class="owner-avatar"
                   alt="<?php echo htmlspecialchars($owner, ENT_QUOTES, 'UTF-8'); ?>"
                   loading="lazy">
              <h3 class="owner-name"><?php echo htmlspecialchars($owner, ENT_QUOTES, 'UTF-8'); ?></h3>
            </a>
            <span class="owner-count"><?php echo count($ownerSites); ?></span>
            <button type="button"
                    class="owner-toggle"
                    aria-expanded="false"
                    aria-controls="owner-panel-<?php echo $ownerSlug; ?>"
                    aria-label="Toggle <?php echo htmlspecialchars($owner, ENT_QUOTES, 'UTF-8'); ?> projects">
              <svg class="owner-chevron" width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
          <div class="owner-panel" id="owner-panel-<?php echo $ownerSlug; ?>" hidden>
          <section class="projects-container">
            <?php foreach ($ownerSites as $site):
                $siteName    = htmlspecialchars($site['name'], ENT_QUOTES, 'UTF-8');
                $siteDesc    = htmlspecialchars($site['description'] ?? '', ENT_QUOTES, 'UTF-8');
                $siteHome    = htmlspecialchars($site['homepage'], ENT_QUOTES, 'UTF-8');
                $siteRepo    = htmlspecialchars($site['html_url'], ENT_QUOTES, 'UTF-8');
                $ogImage     = !empty($site['og_image'])
                    ? htmlspecialchars(PORTFOLIO_BASE . 'imagens/github-pages/' . $site['og_image'], ENT_QUOTES, 'UTF-8')
                    : htmlspecialchars('https://opengraph.githubassets.com/1/' . $site['owner'] . '/' . $site['name'], ENT_QUOTES, 'UTF-8');
                $displayName = ucwords(str_replace(['-', '_'], ' ', $site['name']));
                if (strlen($displayName) <= 3) {
                    $displayName = strtoupper($displayName);
                }
            ?>
            <article class="project-card project-card--github">
              <div class="project-image-wrapper">
                <img loading="lazy"
                     src="<?php echo $ogImage; ?>"
                     alt="<?php echo $siteName; ?> preview"
                     class="project-image">
              </div>
              <div class="project-body">
                <h2 class="project-name"><?php echo htmlspecialchars($displayName, ENT_QUOTES, 'UTF-8'); ?></h2>
                <p class="project-description"><?php echo $siteDesc ?: '&mdash;'; ?></p>
                <div class="project-links">
                  <a href="<?php echo $siteHome; ?>"
                     class="project-link"
                     target="_blank"
                     rel="noopener">Visit Site</a>
                  <?php if (!empty($site['private'])): ?>
                  <span class="project-link project-link--private" title="Private repository">
                    <svg width="13" height="13" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="M4 5V4a4 4 0 0 1 8 0v1h1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1Zm2 0h4V4a2 2 0 0 0-4 0v1ZM8 9a1 1 0 0 0-1 1v1a1 1 0 0 0 2 0v-1a1 1 0 0 0-1-1Z"/></svg>
                    Private
                  </span>
                  <?php else: ?>
                  <a href="<?php echo $siteRepo; ?>"
                     class="project-link project-link--repo"
                     target="_blank"
                     rel="noopener">Repository</a>
                  <?php endif; ?>
                </div>
              </div>
            </article>
            <?php endforeach; ?>
          </section>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </main>

    <footer>
      <span>Developed by</span>
      <a href="https://guibranco.github.io/?utm_campaign=project&utm_media=zerocool+portfolio&utm_source=zerocool.com.br"
         target="_blank" rel="noopener noreferrer">
        <img src="https://guibranco.github.io/photo.png"
             alt="Guilherme Branco Stracini"
             class="avatar" loading="lazy">
      </a>
      <a href="https://guibranco.github.io/?utm_campaign=project&utm_media=zerocool+portfolio&utm_source=zerocool.com.br"
         target="_blank" rel="noopener noreferrer">Guilherme Branco Stracini</a>
      <span>· Repository</span>
      <a href="https://github.com/guibranco/zerocool" target="_blank" rel="noopener noreferrer">
        <svg class="gh-icon" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <title>GitHub</title>
          <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
        </svg>
        zerocool
      </a>
    </footer>

    <script>
      (function () {
        var STORAGE_KEY = 'zerocool.githubAccountsOpen';

        function loadOpenState() {
          try {
            return JSON.parse(localStorage.getItem(STORAGE_KEY)) || {};
          } catch (e) {
            return {};
          }
        }

        function saveOpenState(state) {
          try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(state));
          } catch (e) {
            // localStorage unavailable (e.g. private browsing) - state just won't persist
          }
        }

        document.addEventListener('DOMContentLoaded', function () {
          var openState = loadOpenState();

          document.querySelectorAll('.owner-group').forEach(function (group) {
            var owner = group.dataset.owner;
            var header = group.querySelector('.owner-header');
            var toggle = group.querySelector('.owner-toggle');
            var panel = group.querySelector('.owner-panel');
            if (!header || !toggle || !panel) {
              return;
            }

            function setOpen(isOpen) {
              panel.hidden = !isOpen;
              toggle.setAttribute('aria-expanded', String(isOpen));
              group.classList.toggle('is-open', isOpen);
            }

            setOpen(!!openState[owner]);

            header.addEventListener('click', function (event) {
              if (event.target.closest('.owner-link')) {
                return;
              }
              var isOpen = panel.hidden;
              setOpen(isOpen);
              openState[owner] = isOpen;
              saveOpenState(openState);
            });
          });
        });
      })();
    </script>
  </body>
</html>
