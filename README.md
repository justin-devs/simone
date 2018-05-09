# Simone Laravel Site
##TODO
- TBA
## How to run:
1. git clone <repo>
1. In project directory, rename `.env.example` to `.env`
1. In `.env` update database settings to your database settings.
1. In PhpMyAdmin create the empty database you specified in `.env`
1. Run `composer install` in project directory.
1. Run `php artisan key:generate`
1. Run `php artisan migrate`
1. Run `php artisan db:seed`
1. In PhpMyAdmin select the database then the table `genres` and add a sample genre = `blog`
