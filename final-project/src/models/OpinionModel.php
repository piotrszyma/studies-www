<?php

use Portfolio\OpinionQuery;
use Portfolio\SemesterItemQuery;

class CourseModel {
  public static function create() {
    return new CourseModel();
  }

  private function parseIterable($iterable) {
    $first = $iterable[0];
    
    if ($first === ';') {
      return explode(';', substr($iterable, 1));
    }
    return $iterable;
  }
  public function getById($id) {
    var_dump($id);
    $course = OpinionQuery::create();
    $parsedItems = [];
    
    foreach ($courseItems as $s) {
      $parsedItem = array(
        'name' => $s->getName(),
        'knowledge' => $this->parseIterable($s->getKnowledge()),
        'questions' => $this->parseIterable($s->getQuestions()),
        'id' => $s->getId()
      );
      array_push($parsedItems, $parsedItem); 
    }


    $courseData = [
      'about' => $course->getAbout(),
      'subjects' => $parsedItems
    ];

    return $courseData;
  } 
}

