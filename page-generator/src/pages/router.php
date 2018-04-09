<?php
  require_once('HomePage.php');
  require_once('SemesterPage.php');

  function getPageOrRedirect($url) {
    if ($url === '/') {
      return HomePage::createInstance($url);
    } else if(preg_match('/\/terms\/([1-5])-semester/', $url, $matches)) {
      return SemesterPage::createInstance($url);
    } else {
      header("Location: /");
      die();
    }
  }
