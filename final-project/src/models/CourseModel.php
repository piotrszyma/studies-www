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
    $course = SemesterItemQuery::create()->findPk($id);
    
    if ($course === null) {
      return null;
    }

    $opinions = OpinionQuery::create()->filterBySemesterItem($course);

    $parsedOpinions = [];

    foreach ($opinions as $o) {
      var_dump($opinion->getText());
    }

    return array(
      'name' => $course->getName(),
      'semester' => 'Semester name',
      'opinions' => []
    );

  } 
}

