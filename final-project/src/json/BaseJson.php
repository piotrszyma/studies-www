<?php
class BaseJson {
  public function __construct() {
    header("Content-Type: application/json");
  }

  protected function respondOk($data) {
    echo json_encode([ 'success' => true, 'data' => $data  ]);
    die();
  }

  protected function respondError() {
    echo json_encode([ 'success' => false  ]);
    die();
  }
}
