<?php

  abstract class AbstractPage
  {
    private $header;
    private $body;
    private $footer;

    /**
     * @return mixed
     */
    private function getHead()
    {
      return file_get_contents(
        './../common/head.php',
        FILE_USE_INCLUDE_PATH
      );
    }

    private function getBody()
    {
      return $this->header .
             $this->body .
             $this->footer;
    }
  }
