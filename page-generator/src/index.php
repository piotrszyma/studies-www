<?php
  require_once('./pages/router.php');

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
