<?php

  // setup the autoloading
  require_once '/scripts/vendor/autoload.php';
  require_once './generated-conf/config.php';

  use Portfolio\Semester;

  $s = new Semester();
  $s->setAbout('Semester about');
  $s->save();
  
  $hobbies = array(
    'html' => [
      'title' => 'Hypertext Markdown Language',
      'description' => 'Budowanie responsywnych stron "O mnie" w HTML to moje ulubione zajęcie. Czasem, gdy nie mam co robić, po prostu odpalam edytor i zaczynam pisać od zera.',
      'listing' => [
        [
          'year' => 'Rok 2017',
          'description' => ' Udział w kursie z JFTT na 5 semestrze pozwolił mi posiąść wiedzę, która dała mi umiejętność stworzenia kompilatora
          HTML. Moja świadomość HTML\'a wzrosła kilkukrotnie!',
          'footer' => 'HTML compiler'
        ],
        [
          'year' => 'Rok 2016',
          'description' => 'W sieci trafiłem na artykuł, w którym polecono mi udział w wyzwaniu polegającym na pisaniu po jednej stronie
           w HTML dziennie. Udało się - choć nie bez poświęceń. Zwięczeniem wyzwania było napisanie w pełni responsywnego
           serwisu wiadomości 31 grudnia. Pamiętam jak dokładnie o 23:58 wysłałem ostateczną wersję do jury.',
          'footer' => 'HTML - page a day challenge'
        ],
        [
          'year' => 'Rok 2015',
          'description' => 'Pierwsza strona napisana w HTMLu, już wtedy wiedziałem, że ten język to coś. Intuicyjny, prosty, zwięzły.
          To było coś! ',
          'footer' => 'Dlaczego nie zacząłem wcześniej?'
        ]
      ]
    ]
  );

  $semesters = array(
    1 => [
      'about' => 'Studia: Semester 1 2015/2016',
      'subjects' => [
        [
          'name' => 'Analiza matematyczna 1',
          'knowledge' => [
            'Jak obsługiwać program Wolfram Alpha?',
            'Jak obliczyć całkę',
            'Poznałem osobę Krystiana Karczyńskiego'
          ],
          'questions' => 'Najlepiej byłoby regularnie, co kilka tygodni,
                          rozwiązać parę całek - 
                          w przeciwnym wypadku wszystkie metody całkowania wypadają z głowy.'
        ],
        [
          'name' => 'Logika i struktury formalne',
          'knowledge' => [
            'Poznałem wiele ciekawych zwrotów (spróbujmy to przeżyć, nie kupuję tego)',
            'Poznałem język matematyczny'
          ],
          'questions' => 'Rozwiązywać dużo problemów, żeby zbudować sprawność matematyczną.'
        ],
        [
          'name' => 'Algebra z geometrią analityczną',
          'knowledge' => [
            'Zarys RSA',
            'Kompresja obrazów',
            'Liczby zespolone',
            'Macierze',
            'Ciała, grupy, pierścienie',
          ],
          'questions' => 'Szczegóły i rozumienie poznanych matematycznych bytów.'
        ],
      ]
    ],
    2 => [
      'about' => 'Studia: Semester 2 2016',
      'subjects' => [
        [
          'name' => 'Fizyka',
          'knowledge' => [
            'Podstawy fizyki klasycznej'
          ],
          'questions' => 'Wciąż wiele założeń fizyki klasycznej jest dla mnie nieintuicyjnych'
        ],
        [
          'name' => 'Kurs programowania',
          'knowledge' => [
            'Programowanie zorientowane obiektowo',
            'Praktyczna wiedza'
          ],
          'questions' => 'Klasa abstrakcyjna czy interfejs - oto jest pytanie'
        ],
        [
          'name' => 'Problemy prawne informatyków',
          'knowledge' => [
            'Ogólna wiedza dotycząca problemów prawnych związanych z prowadzeniem działalności jako informatyk'
          ],
          'questions' => 'Praktyczne zastosowanie'
        ]
      ]
    ],
    3 => [
      'about' => 'Studia: Semester 3 2016/2017',
      'subjects' => [
        [
          'name' => 'Bazy danych',
          'knowledge' => [
            'Algebra relacji',
            'Normalizacja bazy danych'
          ],
          'questions' => 'Zaawansowane agregacje'
        ],
        [
          'name' => 'Technologie programowania',
          'knowledge' => [
            'Wzorce projektowania',
            'Projektowanie architektury',
            'Diagramy UML'
          ],
          'questions' => 'Praktyczne zastosowanie wzorców'
        ],
      ]
    ],
    4 => [
      'about' => 'Studia: Semester 4 2017',
      'subjects' => [
        [
          'name' => 'Języki i paradygmaty programowania',
          'knowledge' => [
            'Programowanie funkcyjne',
            'High order functions'
          ],
          'questions' => 'Prolog wydaje mi się nieintuicyjny, muszę go jeszcze podszkolić'
        ],
        [
          'name' => 'Algorytmy i struktury danych',
          'knowledge' => [
            'Poznałem wiele przydatnych struktur'
          ],
          'questions' => 'Programowanie dynamiczne.'
        ]
      ]
    ],
    5 => [
      'about' => 'Studia: Semester 5 2017/2018',
      'subjects' => [
        [
          'name' => 'Języki formalne',
          'knowledge' => [
            'Jak działa kompilator?',
            'Jak stworzyć kompilator',
            'Jak działają wyrażenia regularne'
          ],
          'questions' => 'Czy da się wyrobić większą intuicję?'
        ],
        [
          'name' => 'Kryptografia',
          'knowledge' => [
            'Poznałem, jakie matematyczne konstrukcje pozwalają na bezpieczne przesyłanie danych'
          ],
          'questions' => 'Wiem, że dużo jeszcze przede mną.'
        ],
        [
          'name' => 'Obliczenia naukowe',
          'knowledge' => [
            'Dowiedziałem się, jak trudną do okiełznania rzeczą jest arytmetyka zmiennoprzecinkowa, ale i jak sobie z nią radzić'
          ],
          'questions' => 'Czy w życiu będę kiedyś tworzył bibliotekę do obliczeń naukowych?'
        ]
      ]
    ]
  );
