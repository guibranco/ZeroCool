<?php

$campaign = "custom_domain";

if(isset($_SERVER["HTTP_REFERER"]))
    $campaign = urlencode($_SERVER["HTTP_REFERER"]);

exit(header("Location: https://guibranco.github.io/?utm_campaign=" . $campaign . "&utm_media=redirect&utm_source=" . $_SERVER["HTTP_HOST"], true, 301));
?>