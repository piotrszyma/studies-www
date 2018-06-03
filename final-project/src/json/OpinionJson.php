<?php

use Portfolio\OpinionQuery;
use Portfolio\SemesterItemQuery;
use Portfolio\Opinion;


require_once(__DIR__ . '/../pages/CoursePage.php');
require_once 'BaseJson.php';

class OpinionJson extends BaseJson {
  public static function createInstance($course_id) {
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
    
    $si = SemesterItemQuery::create()->findPk($course_id);

    if ($si === null) {
      echo json_encode(['success' => false]);
      die();
    }

    $opinions = OpinionQuery::create()->filterBySemesterItem($si)->find();

    $response_data = [];

    foreach($opinions as $o) {
      $response_data[] = [
        'author' => $o->getAuthor(),
        'comment' => $o->getComment(),
        'created' => date_format($o->getCreated(), "Y-m-d H:i:s")
      ];
    }

    echo json_encode($response_data);
    die();
  }

  public function handlePost($course_id) {
    $payload = json_decode(file_get_contents('php://input'), true);

    $response = array();

    $captcha = $payload['captcha'];
    
    $user_hash = $captcha['hash'];
    $question = $captcha['question'];
    $user_answer = $captcha['value'];

    $expected_answer = CoursePage::$captcha[$question];
    $expected_hash = hash_hmac('ripemd160', $question, CoursePage::$secret);
    
    if ($user_answer !== $expected_answer) {
      $response['success'] = false;
      echo json_encode($response);
      die();
    }

    if ($user_hash !== $expected_hash) {
      $response['success'] = false;
      echo json_encode($response);
      die();
    }

    try {
      $si = SemesterItemQuery::create()->findPk($course_id);

      $o = new Opinion();
      $o->setAuthor($payload['name']['value']);
      $o->setComment($payload['comment']['value']);
      $o->setCreated(date('r'));
      $o->setSemesterItem($si);
      $o->save();

      $response['data'] = $payload;
      $response['success'] = true;
      echo json_encode($response);
    } catch(Exception $e) {
      $response['success'] = false;
      echo json_encode($response);
    }
    die(); 
  }
}
