<?php

  // setup the autoloading
  require_once '/scripts/vendor/autoload.php';
  require_once './generated-conf/config.php';

  require_once('./router.php');

  $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
  $page = getPageOrRedirect($request_uri[0]);
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php
        echo $page->getHead();
        echo $page->getBody();
    ?>
    </html>

<?php
