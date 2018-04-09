<?php
  require_once('PageInterface.php');
  require_once('BasePage.php');


  class HobbyPage extends BasePage implements PageInterface {
    private $name;

    public function setName($name)
    {
      $this->name = $name;
    }

    public static function createInstance($url)
    {
      preg_match(
        "/\/terms\/(?P<hobbyName>\d+)/",
        $url,
        $matched);
      $name = $matched['hobbyName'];
      $page = new HobbyPage();
      $page->setHead('HTML lover');
      $page->setName($name);


      return $page;
    }

    public function getBody()
    {
      return $this->name;
    }
  }