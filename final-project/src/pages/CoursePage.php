<?php
  require_once('PageInterface.php');
  require_once('BasePage.php');
  require_once(__DIR__ . '/../mocks/MockHobbies.php');
  require_once(__DIR__ . '/../models/CourseModel.php');

  class CoursePage extends BasePage implements PageInterface
  {
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
      $page->setHead($data['name']);
      $page->setHeader(
        'Piotr Szyma',
        'Student Informatyki WPPT',
        $data['name']
      );

      return $page;
    }

    public function getBodyContent()
    {
      return <<<CONTENT
        $this->header
CONTENT;
    }
  }
