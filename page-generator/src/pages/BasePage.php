<?php
  require_once('PageInterface.php');

  class BasePage
  {
    private $head;

    protected function setHead($title)
    {
      $this->head = '<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/assets/style.css">
        <link rel="stylesheet" href="/assets/grid.css">
        <title>' . $title . '</title>
      </head>';
    }

    public function getHead()
    {
      return $this->head;
    }
  }