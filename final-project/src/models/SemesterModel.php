<?php

use Portfolio\SemesterQuery;
use Portfolio\SemesterItemQuery;

class SemesterModel {
  public static function create() {
    return new SemesterModel();
  }

  private function parseIterable($iterable) {
    $first = $iterable[0];
    
    if ($first === ';') {
      return explode(';', substr($iterable, 1));
    }
    return $iterable;
  }
  public function getByNumber($number) {
    $semester = SemesterQuery::create()
      ->filterByNumber($number)
      ->findOne();

    $semesterItems = SemesterItemQuery::create()
      ->filterBySemester($semester)
      ->orderById()
      ->find();

    $parsedItems = [];
    
    foreach ($semesterItems as $s) {
      $parsedItem = array(
        'name' => $s->getName(),
        'knowledge' => $this->parseIterable($s->getKnowledge()),
        'questions' => $this->parseIterable($s->getQuestions())
      );
      array_push($parsedItems, $parsedItem); 
    }


    $semesterData = [
      'about' => $semester->getAbout(),
      'subjects' => $parsedItems
    ];

    return $semesterData;
  } 
}

