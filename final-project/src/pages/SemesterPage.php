<?php
  require_once(__DIR__ . '/../mocks/MockSemesters.php');
  require_once(__DIR__ . '/../models/SemesterModel.php');

  class SemesterPage extends BasePage implements PageInterface
  {
    private $semesterId;
    private $header;
    private $subjects;

    public function __construct($semesterId)
    {
      $this->semesterId = $semesterId;
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

    public function setSubjects($subjects)
    {
      $subjects_html = [];

      foreach ($subjects as $subject) {
        $name = $subject['name'];
        $id = $subject['id'];
        $questions = $subject['questions'];
        $knowledge_html = array_reduce($subject['knowledge'], function ($prev, $curr) {
          return $prev . '<li>' . $curr . '</li>';
        }, '');

        array_push($subjects_html,
          '
              <div class="row">
      <div class="col-1 title">
        <span class="name">' . $name . '</span>
        <span class="title__opinions">
          <a href="../course/' . $id .'">
            <div>Sprawdź opinie</div>
          </a>
        </span>
      </div>
    </div>
    <div class="row">
      <div class="col-1 listing filled">
        <h3 class="header">Czego się dowiedziałem?</h3>
        <div class="content">
          <ol>
            ' . $knowledge_html . '
          </ol>
        </div>
      </div>
      <div class="col-1 description filled">
        <h3 class="header emphasis">Czego warto się douczyć?</h3>
        <div class="content emphasis">
          <p>
            ' . $questions . '
          </p>
        </div>
      </div>
    </div>
          ');
      }


      $this->subjects = implode($subjects_html);
    }

    public static function createInstance($url)
    {
      preg_match(
        "/\/terms\/(?P<semesterId>\d+)\-semester/",
        $url,
        $matched);

      $semester_data = SemesterModel::create()->getByNumber($matched['semesterId']);

      $page = new SemesterPage($matched['semesterId']);
      $page->setHead($matched['semesterId'] . ' semester', '', '<link href="/assets/css/semester.css" rel="stylesheet">');
      $page->setHeader('Piotr Szyma', 'Student Informatyki WPPT', $semester_data['about']);
      $page->setSubjects($semester_data['subjects']);

      return $page;
    }

    public function getBodyContent()
    {
      return <<<BODY
        $this->header
        $this->subjects
BODY;

    }
  }
