<?php
  require_once('./pages/HomePage.php');
  require_once('./pages/SemesterPage.php');
  require_once('./pages/HobbyPage.php');

  function getPageOrRedirect($url) {
    if ($url === '/') {
      return HomePage::createInstance($url);
    } else if(preg_match('/\/terms\/([1-5])-semester/', $url, $matches)) {
      return SemesterPage::createInstance($url);
    } else if($url === '/interests/html') {
      return HobbyPage::createInstance($url);
    } else if($url === '/game/snake') {
      include('./assets/game/snake.html');
      die();
    } else {
      header("Location: /");
      die();
    }
  }
