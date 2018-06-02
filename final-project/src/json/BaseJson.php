<?php
class BaseJson {
  public function __construct() {
    header("Content-Type: application/json");
  }

  public static function createInstance($url) {
    die();
  }
}
