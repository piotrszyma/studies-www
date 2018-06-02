<?php

use Portfolio\OpinionQuery;

class OpinionJson {
  public function __construct() {
  }

  public static function createInstance($course_id) {
    header("Content-Type: application/json");

    $request_method = $_SERVER['REQUEST_METHOD'];

    $json_object = new OpinionJson();

    switch ($request_method) {
    case "GET":
      $json_object->handleGet($course_id);
      break;
    case "POST":
      $json_object->handlePost($course_id);
      break;
    default:
      break;
    }

    die();
  }

  public function handleGet($course_id) {
    $opinions = [
      [
        "id" => 1,
        "author" => "abc",
        "comment" => "dolor es",
        "created" => date('r'),
      ],
      [
        "id" => 2,
        "author" => "efg",
        "comment" => "lorem ipsum",
        "created" => date('r'),
      ],
    ];
  
    echo json_encode($opinions);
    die();
  }
}
