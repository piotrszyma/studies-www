<?php
  /**
   * Created by PhpStorm.
   * User: thompson
   * Date: 4/9/18
   * Time: 5:57 PM
   */

  class MockSemesters
  {
    public static function getSemesterDataById($semesterId)
    {
      $data = array(
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
      return $data[$semesterId];
    }
  }