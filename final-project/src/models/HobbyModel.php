<?php

use Portfolio\HobbyQuery;
use Portfolio\HobbyItemQuery;

class HobbyModel {
  public static function create() {
    return new HobbyModel();
  }

  private function parseIterable($iterable) {
    $first = $iterable[0];
    
    if ($first === ';') {
      return explode(';', substr($iterable, 1));
    }
    return $iterable;
  }
  public function getByName($name) {
    $hobby= HobbyQuery::create()
      ->filterByName($name)
      ->findOne();

    $hobbyItems = HobbyItemQuery::create()
      ->filterByHobby($hobby)
      ->orderById()
      ->find();

    $parsedItems = [];
    
    foreach ($hobbyItems as $s) {
      $parsedItem = array(
        'year' => $s->getYear(),
        'description' => $s->getDescription(),
        'footer' => $s->getFooter()
      );
      array_push($parsedItems, $parsedItem); 
    }


    $hobbyData = [
      'title' => $hobby->getTitle(),
      'description' => $hobby->getDescription(),
      'listing' => $parsedItems
    ];

    return $hobbyData;

//      'html' => [
//        'title' => 'Hypertext Markdown Language',
//        'description' => 'Budowanie responsywnych stron "O mnie" w HTML to moje ulubione zajęcie. Czasem, gdy nie mam co robić, po prostu odpalam edytor i zaczynam pisać od zera.',
//        'listing' => [
//          [
//            'year' => 'Rok 2017',
//            'description' => ' Udział w kursie z JFTT na 5 semestrze pozwolił mi posiąść wiedzę, która dała mi umiejętność stworzenia kompilatora
//            HTML. Moja świadomość HTML\'a wzrosła kilkukrotnie!',
//            'footer' => 'HTML compiler'
//          ],
//          [
//            'year' => 'Rok 2016',
//            'description' => 'W sieci trafiłem na artykuł, w którym polecono mi udział w wyzwaniu polegającym na pisaniu po jednej stronie
//             w HTML dziennie. Udało się - choć nie bez poświęceń. Zwięczeniem wyzwania było napisanie w pełni responsywnego
//             serwisu wiadomości 31 grudnia. Pamiętam jak dokładnie o 23:58 wysłałem ostateczną wersję do jury.',
//            'footer' => 'HTML - page a day challenge'
//          ],
//          [
//            'year' => 'Rok 2015',
//            'description' => 'Pierwsza strona napisana w HTMLu, już wtedy wiedziałem, że ten język to coś. Intuicyjny, prosty, zwięzły.
//            To było coś! ',
//            'footer' => 'Dlaczego nie zacząłem wcześniej?'
//          ]
//        ]
//      ]
  } 
}

