## **VIP Tec**

You can check out live demo from [here](http:/viptec./minlwinkyaw.com/)

## **Requirements**

1. PHP, 7.4.3 or above
2. Composer
3. Linux, MacOS (Didn't Test On Windows using setup command but can be installed easily)

## **How To Install**
* `git clone` this project and enter to the folder
* Create Database
* Create `.env`
* Copy `.env.example` to `.env`
* Create a Database, Then add database information to the .env file. `DB_DATABASE` for database name, `DB_USERNAME` for Database username and `DB_PASSWORD` for Database Password
* To use Google Analytics add view id to .env as `ANALYTICS_VIEW_ID`
* Then import service account json file to  `storge/private` folder as `service-account.json` filename.
* run `php artisan setup:install` or `make install` if you have make in your computer

php artisan setup:install includes all the migrations and seeding dummy data.

To access admin page, go to `/login`. In live demo site click [here](http://viptec.minlwinkyaw.com/login). Email is `minlwinkyaw@gmail.com` and password is `password` and you can also use Facebook to login.
