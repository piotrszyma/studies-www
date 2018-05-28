<?php
  require_once('PageInterface.php');
  require_once('BasePage.php');
  require_once(__DIR__ . '/../mocks/MockHobbies.php');

  class HobbyPage extends BasePage implements PageInterface
  {
    private $name;
    private $header;
    private $description;
    private $listing;

    public function setName($name)
    {
      $this->name = $name;
    }


    public function setHeader($name, $title, $description)
    {
      $this->header = <<<HEADER
      <div class="row">
        <div class="col-1 header">
          <h1>$name</h1>
          <h2>$title</h2>
          <h3>$description</h3>
        </div>
      </div>
HEADER;
    }

    public function setDescription($description)
    {
      $this->description = <<<DESCRIPTION
    <div class="row">
      <div class="col-1 description">
        $description
      </div>
    </div>
DESCRIPTION;
    }

    public function setListing($items)
    {
      $items_html = array_reduce($items, function ($prev, $curr) {
        $year = $curr['year'];
        $description = $curr['description'];
        $footer = $curr['footer'];

        $curr_html = <<<ITEM
      <div class="row">
        <div class="col-1 listing filled">
          <h3 class="header">$year</h3>
          <div class="content">
            <p>
              $description
            </p>
          </div>
          <h3 class="footer">
            $footer
          </h3>
        </div>
      </div>
ITEM;

        return $prev . $curr_html;
      }, '');

      $this->listing = $items_html;
    }

    public static function createInstance($url)
    {
      preg_match(
        "/\/interests\/(?P<hobbyName>\S+)/",
        $url,
        $matched
      );

      $name = $matched['hobbyName'];
      $data = MockHobbies::getHobbyDataByName($name);

      $page = new HobbyPage();

      $page->setName($name);
      $page->setHead($data['title']);
      $page->setHeader(
        'Piotr Szyma',
        'Student Informatyki WPPT',
        'Budowanie stron w HTMLu'
      );
      $page->setDescription($data['description']);
      $page->setListing($data['listing']);

      return $page;
    }

    public function getBodyContent()
    {
      return <<<CONTENT
        $this->header
        $this->description
        $this->listing
CONTENT;
    }
  }