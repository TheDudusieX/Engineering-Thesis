<?php

return [
    'register' => [
        'title' => 'Rejestracja',
        'name' => 'Imię',
        'surname' => 'Nazwisko',
        'email' => 'E-mail',
        'phone' => 'Nr telefonu',
        'password' => 'Hasło',
        'password-confirm' => 'Potwierdź hasło',
        'register' => 'Zarejestruj się',
        'orchestraname' => 'Nazwa orkiestry',
        'text' => 'Rejestracja tylko dla osób, które reprezentują orkiestrę',
        'warning' => 'UWAGA!',
        'headquarter' => 'Siedziba'
    ],

    'reset' => [
        'reset' => 'Resetuj hasło',
        'link' => 'Wyślij link resetujący hasło',
    ],

    'dashboard' => [
        'title' => 'Tytuł',
        'main' => 'Strona Główna',
        'review' => 'Bieżące przeglądy',
        'reviewadd' => 'Dodaj Przegląd',
        'reviewedit' => 'Edytuj Przegląd',
        'endreview' => 'Zakończone przeglądy',
        'cancelreview' => 'Anulowane przeglądy',
        'myreview' => 'Moje Przeglądy',
        'profile' => 'Profil',
        'harmonogram' => "Harmonogram",
        'jury' => 'Powołaj Jury',
        'juryadd' => 'Dodaj kandydata Jury do systemu',
        'candidatsJury' => 'Kandydaci do Jury w systemie',
        'rate' => 'Oceń występy',
        'reviewsIndex' => 'Przeglądy, do których jesteś powołany',
        'acceptPerformance' => 'Zaakceptuj zakończone występy',
        'orchestrasIndex' => 'Orkiestry, których występy nie zostały ocenione',
        'rate' => 'Oceń występ orkiestry'
    ],
    
    'profile' => [
        'edit' => 'Edycja profilu',
        'numberofmembers' => 'Liczba członków',
        'bandmaster' => 'Kapelmistrz',
        'president' => 'Prezes',
        'description' => 'Opis/Osiągnięcia',
        'save' => 'Zapisz',
        'change' => 'Zmień hasło',
    ],

    'login' => [
        'title' => 'Logowanie',
        'email' => 'Adres Email',
        'password' => 'Hasło',
        'rememberme' => 'Pamiętaj mnie',
        'login' => 'Zaloguj',
        'forgotpassowrd' => 'Przypomnij hasło',
        'logout' => 'Wyloguj',
        'error' => 'Podane dane są błędne. Podaj poprawny login i hasło',
    ],

    'password' => [
        'text' => 'Wprowadź stare hasło, aby zmienić je na nowe.',
        'password' => 'Stare hasło',
        'newpassword' => 'Nowe hasło',
        'confirmpassword' => 'Potwierdź nowe hasło',
        'change' => 'Zmień hasło',
        'cancel' => 'Anuluj'
    ],

    'toast' => [
        'success' => 'Zaktualizowano dane',
        'successpassword' => 'Zmieniono hasło',
        'dangerpassword' => 'Nie udało się zmienić hasła',
        'successReview' => 'Zapisano na przegląd',
        'dangerReview' => 'Nie udało się zapisać na przegląd',
        'successAdd' => 'Dodano przegląd',
    ],

    'review' => [
        'title' => 'Przeglądy',
        'titleAdd' => 'Dodaj przegląd',
        'add' => 'Dodaj',
        'save' => 'Zapisz',
        'cancel' => 'Anuluj',
        'name' => 'Nazwa przeglądu',
        'maximumNumberOfMembers' => 'Limit zapisanych orkiestr',
        'currentNumberOfMembers' => 'Liczba zapisanych orkiestr',
        'term' => 'Termin',
        'startTime' => 'Godzina rozpoczęcia',
        'place' => 'Miejsce',
        'organizer' => 'Organizator',
        'deadline' => 'Termin zapisów do',
        'information' => 'Informacje',
        'back' => 'Powrót',
        'filters' => 'Filtry',
        'search' => 'Wyszukaj przegląd po przedziale dat',
        'data' => 'Dane orkiestry',
        'signUp' => 'Zapisz się',
        'signOut' => 'Wypisz się',
        'schedule' => 'Harmonogram',
        'scheduleinfo' => 'Harmonogram przeglądu:',
        'scheduleStart' => 'Rozpoczęcie o godzinie:',
        'members' => 'Liczba uczestników',
        'details' => 'Szczegóły',
        'summaryinfo' => "Szczegóły zakończonego przeglądu",
        'summaryPlace' => "Miejsce:",
        'jury' => "Skład Jury:",
        'summary' => "Szczegóły",
    ],

    'myReview' => [
        'title' => 'Moje przeglądy',
        'addSchedule' => 'Dodaj harmonogram',
        'addScheduleDesc' => ' - Stwórz harmonogram występów konkursowych w twoim przeglądzie.',
        'editSchedule' => 'Edytuj harmonogram',
        'editScheduleDesc' => ' - Edytuj harmonogram występów konkursowych w twoim przeglądzie.',
        'edit' => 'Edytuj przegląd',
        'ended' => 'Zakończ przegląd',
        'delete' => 'Usuń przegląd',
        'reportedOrchestras' => 'Orkiestry zgłoszone do przeglądu',
        'acceptedOrchestras' => 'Orkiestry zaakceptowane do przeglądu',
        'jury' => 'Powołaj Jury',
        'juryDesc' => ' - Wybierz członków jury z listy lub dodaj nowych do systemu.',
        'done' => 'Zatwierdź zakończone występy',
        'doneDesc' => ' - Zatwierdź zakończone występy orkiestr biorących udział w twoim przeglądzie.',
        'info' => 'Informacje o przeglądzie',
        'info2' => 'Tabela przedstawia orkiestry biorące udział w przeglądzie oraz jurorów powołanych. Wewnątrz tabeli
        widać, który juror ocenił występ orkiestry.',
        'accept' => 'Zaakceptuj',
        'accepted' => ' Zatwierdź',
        'deny' => 'Odrzuć',
        'time' => 'Godzina występu',
        'ifEnded' => 'Czy występ się zakończył?',
        'description' => 'Czy na pewno chcesz usunąć przegląd?',
        'accepted_Orchestra' => 'Zaakceptowano orkiestrę',
        'rejected_Orchestra' => 'Odrzucono orkiestrę',
        'editJury' => 'Edytuj powołane Jury',
        'juryUpdated' => 'Edytowano skład jury',
        'editJuryDesc' => ' - Wybierz członków jury z listy lub dodaj nowych do systemu.',
        'rated' => 'Oceniono',
        'notRated' => 'Nie oceniono',
        'points' => 'Suma punktów'
    ],

    'home' => [
        'title' => 'Przeglądy i Festiwale',
        'shortcut' => 'PiF',
        'title1' => 'Co znajdziesz na stronie?',
        'title2' => 'Informacje o rejestracji',
        'title3' => 'Informacje ogólne',
        'text' => 'Zapoznaj się z przeglądami i festiwalami orkiestr dętych z całej Polski lub
                    zarejestruj się jeśli chcesz ogłosić przegląd orkiestry, której jesteś członkiem.',
        'text1' => 'Na stronie znajdziesz przeglądy oraz festiwale orkiestr dętych dodane przez użytkowników zarejestrowanych.',
        'text2' => 'Rejestracja przeznaczona jest dla osób, które są członkami orkiestry lub pełnią w niej funkcje zarządcze.',
        'text3' => 'Osoby zalogowane mają dostęp do najważniejszych funkcji systemu m. in. ogłoszenie przeglądu oraz ułożenie do niego harmonogramu.
                    Osoby niezalogowane mogą wyświetlać wszystkie przeglądy (bieżące, zakończone i anulowane).',
        'more' => 'Dowiedz się więcej o przeglądach',
        'moreInfo' => 'Przechodząc na stronę z przeglądami orkiestr zobaczysz niezbędne informacje na
        temat każdego z nich ogłoszonego na stronie.'
    ],

    'jury' => [
        'orchestras' => 'Wyświetl orkiestry',
        'choose' => 'Wybierz ocenę'
    ]
];