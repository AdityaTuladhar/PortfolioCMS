##Steps to follow
- Create a database locally named `portfolio_details` utf8mb4_general_ci ( make sure xampp version is not above 7.5 as it might not be compatible with laravel 8 )
- Download composer https://getcomposer.org/download/
- Pull Laravel/php project from git provider.
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
  (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install```
- Run `php artisan key:generate` 
- Run `php artisan migrate`
- Run `php artisan db:seed --class=DetailsSeeder` to run seeders
- Run `php artisan storage:link`
- Run `php artisan serve`
