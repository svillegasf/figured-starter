# Figured Starter

This is a starter for Laravel, running under Docker with MongoDB.
 
## Get started

To run, you need docker and docker compose & to be able to run bash scripts.  

a) cd to the working project directory and run

    ./start-app.sh

b) once all docker images are downloaded and initialised 

    ./init-app.sh

Wait for composer, yarn and Mongo setup to complete.
  
A basic laravel app should then be available at http://localhost:8080

## Copy .env file

    cp .env.example .env
    
## Running composer

    docker-compose exec app composer install
    
## Running laravel commands

Because we are running under an image called app we have to use docker-compose exec. For example:

    docker-compose exec app php artisan key:generate 

## Running laravel migrations

Run the seeds to have some example information:

    docker-compose exec app php artisan migrate 

## Running laravel seeds

Run the seeds to have some example information:

    docker-compose exec app php artisan db:seed 

## Running yarn

    docker-compose exec app yarn

## Running tests

As above, we need to run tests using exec, E.g.

    docker-compose exec app ./vendor/bin/phpunit

## Once the app is running

You can register yourself directly on the app, but there's an available admin user to test:

    email: chava@figured.com
    password: secret
