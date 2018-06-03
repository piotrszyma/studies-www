<?php
  require_once('PageInterface.php');

  abstract class BasePage
  {
    private $head;

    protected function setHead($title, $scripts = '', $styles = '')
    {
      $this->head = '<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/assets/grid.css">
        <link rel="stylesheet" href="/assets/css/index.css">
        ' . $styles . '
        <script type="text/x-mathjax-config">
          MathJax.Hub.Config({
            tex2jax: {inlineMath: [["$","$"],["\\\\(","\\\\)"]]}
          });
        </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML-full"> </script>
        ' . $scripts . '
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
      <div class="row footer">
        <div class="col-1">
          <span>Naciśnij <a class="link" href="/">tu</a>, aby powrócić do strony głównej</span></div>
        </div>
    </div>
</body>
HTML;
    }
  }
