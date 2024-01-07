Do uruchomienia aplikacji ptrzebne jest:
Manager pakietów Npm wersja: 8.5.3,
Node.js wersja: 17.0.1
PHP wersja: 8.2.0 (cli)
Composer wersja: 2.4.2
Do stworzenia bazy danych wykorzystano XAMPP w wersji: 8.2.0

W celu uruchomienia aplikacji, należy zainstalować potrzebne redystrybucje pakietów komendami:
composer install
npm install
Trzeba zbudować pliki dla strony za pomocą komendy: npm run build,
następnie w utworzyc bazę danych o nazwie pracainzynierska i uzupełnic o strukture i dane za pomocą komendy: php artisan migrate:fresh --seed.

Należy z pliku .env.example stworzyc plik .env i uzupełnic go, umieścić 2 klucze potrzebne do Google Api Captcha
Po zainstalowaniu potrzebnego oprogramowania należy uruchomić serwer PHP za pomoca komendy:
php artisan serve

Gdy serwer jest uruchamiany na maszynie lokalnej należy dodatkowo podać host=<ip lokalne> oraz port=<port>.
