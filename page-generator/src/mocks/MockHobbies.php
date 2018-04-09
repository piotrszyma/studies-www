<?php
  /**
   * Created by PhpStorm.
   * User: thompson
   * Date: 4/9/18
   * Time: 5:57 PM
   */

  class MockHobbies
  {
    public static function getHobbyDataByName($hobbyName)
    {
      $data = array(
        'html' => [
          'title' => 'Hypertext Markdown Language'
        ]
      );
      return $data[$hobbyName];
    }
  }
