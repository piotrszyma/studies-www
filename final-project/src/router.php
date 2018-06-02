<?php
  require_once('./pages/HomePage.php');
  require_once('./pages/SemesterPage.php');
  require_once('./pages/HobbyPage.php');
  require_once('./pages/CoursePage.php');
  require_once('./json/OpinionJson.php');

  function getPageOrRedirect($url) {
    if ($url === '/') {
      return HomePage::createInstance($url);
    } else if(preg_match('/^\/terms\/([1-5])-semester/', $url, $matches)) {
      return SemesterPage::createInstance($url);
    } else if($url === '/interests/html') {
      return HobbyPage::createInstance($url);
    } else if(preg_match('/^\/course\/(\d+)/', $url, $matches)) {
      try {
        return CoursePage::createInstance($url);
      } catch(Exception $e) {
        redirectToHome();
      }
    // ====================
    //  JSON API sections
    // ====================
    } else if(preg_match('/^\/opinion\/(\d+)/', $url, $matches)) {
      try {
        return OpinionJson::createInstance($matches[1]);
      } catch(Exception $e) {
        redirectToHome();
      } 
    // ====================
    // Static pages section
    // ====================
    } else if($url === '/game/snake') {
      include('./assets/game/snake.html');
      die();
    } else {
      redirectToHome();
    }
  }

  function redirectToHome() {
      header("Location: /");
      die();
  }
