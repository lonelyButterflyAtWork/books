<h1>Jak uruchomić aplikację lokalnie?</h1>
<h3> Co będzie potrzebne? </h3>
<p>Potrzebny będzie: xampp z bazą MySQL, composer oraz możliwość użycia komend npm</p>
<h3> Postawienie i uruchomienie aplikacji </h3>
<ol>
    <li>Sklonuj repozytorium do folderu htdocs w folderze xamppa</li>
    <li>Uruchom Apatche oraz MySQL na xamppie</li>
    <li>Stwórz bazę danych MySQL np. w panelu localhost/phpmyadmin</li>
    <li>Zmień nazwę pliku z .env.example na .env oraz ustaw dane do stworzonej przed chwilą bazie danych</li>
    <li>Uruchom komendę <strong>composer install</strong> w terminalu w katalogu głównym projektu</li>
    <li>Uruchom komendę <strong>php artisan key:generate</strong> w terminalu w katalogu głównym projektu</li>
    <li>Uruchom komendę <strong>npm install</strong> w terminalu w katalogu głównym projektu</li>
    <li>Uruchom komendę <strong>php artisan migrate</strong> w terminalu w katalogu głównym projektu</li>
    <li>Uruchom komendę <strong>php artisan serve</strong> w terminalu w katalogu głównym projektu</li>
</ol>
<p>Aplikacja powinna być dostępna pod adresem, który wyświetli się w terminalu (domyślnie http://localhost:8000)</p>

