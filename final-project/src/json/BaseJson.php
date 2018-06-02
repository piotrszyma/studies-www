<?php
class BaseJson {
  public function __construct() {
    header("Content-Type: application/json");
  }

  private function respondOk($data) {
    echo json_encode([ 'success' => true, 'data' => $data  ]);
    die();
  }

  private function respondError() {
    echo json_encode([ 'success' => false  ]);
    die();
  }
}
