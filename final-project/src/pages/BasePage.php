<?php
  require_once('PageInterface.php');

  abstract class BasePage
  {
    private $head;

    protected function setHead($title)
    {
      $this->head = '<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/assets/grid.css">
        <link rel="stylesheet" href="/assets/css/index.css">
        <title>' . $title . '</title>
      </head>';
    }

    public function getHead()
    {
      return $this->head;
    }

    public function getBodyContent()
    {
      throw new Exception("Not implemented yet");
    }

    public function getBody()
    {
      $content = $this->getBodyContent();

      return <<<HTML
<body>
    <div class="container">
        $content
      <div class="row">
        <div class="col-1 back">
            <div class="button">
              <a href="/">
                <span>Powrót</span>
              </a>
            </div>
        </div>
      </div>
    </div>
</body>
HTML;
    }
  }
