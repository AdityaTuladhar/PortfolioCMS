##Steps to follow
- Create a database locally named `portfolio_details` utf8mb4_general_ci ( make sure xampp version is not above 7.5 as it might not be compatible with laravel 8 )
- Download composer https://getcomposer.org/download/
- Pull Laravel/php project from git provider.
- Rename `.env.example` file to `.env`inside your project root and fill the database information also change DB_DATABASE value to   
  `portfolio_details`.
  (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install```
- Run `php artisan key:generate` 
- Run `php artisan migrate`
- Run `php artisan db:seed --class=DetailsSeeder` to run seeders
- Run `php artisan storage:link`
- Run `php artisan serve`

- For home page go to localhost:8000
- For CMS dashboard go to localhost:8000/dashboard/details

-Main Home Page
![photo1](https://user-images.githubusercontent.com/45659367/233794697-7dc56335-0499-4a6f-bdd1-2a0f5f75ed83.jpg)

-CMS Dashboard Page
![image3](https://user-images.githubusercontent.com/45659367/233890082-0f4d51db-4a0a-4b44-9c30-4492ce6a6497.PNG)
