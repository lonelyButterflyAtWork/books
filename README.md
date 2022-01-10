<h1>Jak uruchomić aplikację lokalnie?</h1>
<h3> Co będzie potrzebne? </h3>
<p>Potrzebny będzie: xampp z bazą MySQL, composer oraz możliwość użycia komend npm</p>
<h3> Postawienie i uruchomienie aplikacji </h3>
<ol>
    <li>Sklonuj repozytorium do folderu htdocs w folderze xamppa</li>
    <li>Uruchom apatch oraz MySQL na xamppie</li>
    <li>Stwórz bazę danych MySQL np. w panelu localhost/phpmyadmin</li>
    <li>Zmień nazwę pliku z .env.example na .env oraz ustaw dane do stworzonej przed chwilą bazie danych</li>
    <li>Uruchom komendę composer install w terminalu w katalogu głównym projektu</li>
    <li>Uruchom komendę php artisan key:generate w terminalu w katalogu głównym projektu</li>
    <li>Uruchom komendę npm install w terminalu w katalogu głównym projektu</li>
    <li>Uruchom komendę php artisan migrate w terminalu w katalogu głównym projektu</li>
    <li>Uruchom komendę php artisan serve w terminalu w katalogu głównym projektu</li>
</ol>
<p>Aplikacja powinna być dostępna pod adresem, który wyświetli sie w erminalu (defaultowo http://localhost:8000)</p>

