## Installation


### INSTALLATION 1
###  Laravel sail (Docker)
When using docker

    ./vendor/bin/sail up -d

### Setup database with Laravel Sail(Docker)
Setup your database and seeding data for this application

    ./vendor/bin/sail artisan migrate --seed


### INSTALLATION OPTION 2 

### Via Composer
Require this package in your composer.json and install composer.

    composer install
  

### Setup database with Laravel composer
Setup your database and seeding data for this application
But you need configure your .env before running command below

    php artisan migrate --seed


### Available user
Use this user for testing application

    username : javenlim@straitsfinancial.com
    password : P@ssw0rd
