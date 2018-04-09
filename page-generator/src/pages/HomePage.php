<?php
  require_once('PageInterface.php');
  require_once('BasePage.php');

  class HomePage extends BasePage implements PageInterface
  {
    private $header;
    private $description;
    private $links;

    private function setHeader($name, $about)
    {
      $this->header = <<<HEADER
<div class="row">
  <div class="col-1 header">
      <h1>$name</h1>
      <h2>$about</h2>
  </div>
</div>
HEADER;
    }

    private function setDescription($text, $link, $image)
    {
      $this->description = <<<DESCRIPTION
    <div class="row">
      <div class="col-3 description">
        <p>
            $text
        </p>
        <p>
          <a class="link"
             target="_blank"
             href="https://$link">$link</a>
        </p>
      </div>
      <div class="col-1 profile desktop">
        <img src="$image" alt="Moje zdjęcie">
      </div>
    </div>
DESCRIPTION;
    }

    private function setLinks($studies, $hobbies)
    {
      $studies_html = array_reduce($studies, function ($prev, $curr) {
        return $prev . '<li><a href="' . $curr['url'] . '">' . $curr['name'] . '</a></li>';
      }, "");


      $hobbies_html = array_reduce($hobbies, function ($prev, $curr) {
        if (substr($curr['url'], 0, 4) == 'http') {
          return $prev . '<li><a href="' . $curr['url'] . '" target="_blank">' . $curr['name'] . '</a></li>';
        } else {
          return $prev . '<li><a href="' . $curr['url'] . '">' . $curr['name'] . '</a></li>';
        }
      }, "");

      $this->links = '<div class="row">
            <div class="col-1 listing">
                <h2>Moja edukacja</h2>
                <ul>
                    ' . $studies_html . '
                </ul>
            </div>
            <div class="col-1 listing">
                <h2>Moje zainteresowania</h2>
                <ul>
                    ' . $hobbies_html . '
                </ul>
            </div>
        </div>';

    }

    public function getBody()
    {
      return <<<HTML
<body>
    <div class="container">
        $this->header
        $this->description
        $this->links
    </div>
</body>'
HTML;
    }

    public static function createInstance($url)
    {
      $page = new HomePage();
      $page->setHead('About page');
      $page->setHeader('Piotr Szyma', 'Student Informatyki WPPT');
      $page->setDescription(
        "Jestem entuzjastą informatyki pochodzącym z Częstochowy. Obecnie studiuję na Wydziale Podstawowych
          Problemów Techniki Politechniki Wrocławskiej.
          Jeśli chodzi o ulubione języki, to są nimi obecnie JavaScript i Python.
          Na swoim repozytorium na GitHubie publikuję moje rozwiązania list zadań ze studiów.",
        "github.com/piotrszyma",
        'assets/photo.jpeg'
      );

      $studies = array_map(function ($element) {
        return [
          'name' => $element . ' semestr',
          'url' => 'terms/' . $element . '-semester'
        ];
      }, [1, 2, 3, 4, 5]);

      $hobbies = array(
        [
          'url' => 'http://wmasg.pl/pl/profil/show/56069',
          'name' => 'Airsoft'
        ],
        [
          'url' => 'https://filmweb.pl/user/thompson2908',
          'name' => 'Kino'
        ],
        [
          'url' => 'https://www.last.fm/user/Thompson2908',
          'name' => 'Muzyka'
        ],
        [
          'url' => 'interests/html',
          'name' => 'HTML'
        ],
        [
          'url' => 'game/snake',
          'name' => 'Snake'
        ],

      );

      $page->setLinks(
        $studies,
        $hobbies
      );

      return $page;
    }
  }
