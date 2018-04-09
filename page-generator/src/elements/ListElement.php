<?php

  class ListElement implements ElementInterface
  {
    private $listElements;

    function __construct($listElements)
    {
      $this->listElements = $listElements;
    }

    public function render()
    {
      return 'List';
      // TODO: Implement render() method.
    }
  }