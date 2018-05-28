<?php
  /**
   * Created by PhpStorm.
   * User: thompson
   * Date: 4/9/18
   * Time: 4:17 PM
   */

  interface PageInterface {
    public static function createInstance($url);
    public function getHead();
    public function getBody();
  }
