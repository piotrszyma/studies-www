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
    
    return array(
      'name' => $course->getName()
    );

  } 
}

