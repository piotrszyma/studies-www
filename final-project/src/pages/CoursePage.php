<?php
  require_once('PageInterface.php');
  require_once('BasePage.php');
  require_once(__DIR__ . '/../mocks/MockHobbies.php');
  require_once(__DIR__ . '/../models/CourseModel.php');
  require_once(__DIR__ . '/../json/OpinionJson.php');

  class CoursePage extends BasePage implements PageInterface
  {
    public static $secret = 'aaaaasd';
    public static $captcha = [
      'Ile to 2 + 2 * 2?' => '6',
      'Co zwróci NaN === NaN?' => 'false',
      "Co zwróci 'foo' + + 'bar'?" => 'fooNaN',
    ];
    private $name;
    private $header;
    private $body;
    private $form;

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

    public function setForm()
    {
      $question = array_keys(CoursePage::$captcha)[rand(0, count(CoursePage::$captcha) - 1)]; 

      $hash = hash_hmac('ripemd160', $question, CoursePage::$secret);

      $this->form = '
      <div class="row dialog">
        <div class="col-1 form__wrapper">
          <h3 class="form__header">Dodaj własną opinię na temat przedmiotu</h3>
          <form class="form">
            <div class="form__item">
              <span>Imię:</span>
              <input data-type="field" name="name" placeholder="Wpisz tutaj swoje imię" required></input>
            </div>
            <div class="form__item">
              <span>Opinia:</span>
              <textarea data-type="field" name="comment" placeholder="Wpisz tutaj swoją opinię dotyczącą przedmiotu" required></textarea>
            </div>
            <div class="form__item">
              <span>Captcha:</span>
              <input data-type="field"
                     data-hash="'. $hash .'"
                     data-question="'.$question.'"
                     name="captcha" 
                     placeholder="'. $question .'"
                     required
              ></input>
            </div>
            <div class="form__submit">
              <button>Wyślij</button>
            </div>
          </form>
        </div>
      </div>';
    }

    public function setBody($course_id) {
      $this->body = '
      <div class="row body loading" data-course="'. $course_id .'">
        <div class="col">
          <div class="loading__spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      </div>';
    }

    public static function createInstance($url)
    {
      preg_match('/\/course\/(\d+)/', $url, $matches);
      $course_id = $matches[1];
      
      $data = CourseModel::create()->getById($course_id);
      if ($data === null) {
        throw new Exception("No such course");
      }
      
      $page = new CoursePage();
      $page->setName($data['name']);
      $page->setHead($data['name'],
        '<script src="/assets/js/course.js"></script>',
        '<link rel="stylesheet" href="/assets/css/course.min.css">'
      );
      $page->setHeader(
        $data['name'],
        'Opinie o przedmiocie',
        'Informatyka WPPT'
      );

      $page->setForm();
      $page->setBody($course_id);

      return $page;
    }

    public function getBodyContent()
    {
      return <<<CONTENT
        $this->header
        $this->body
        $this->form
CONTENT;
    }
  }
