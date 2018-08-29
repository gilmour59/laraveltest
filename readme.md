#commands used
    
    -php artisan make:controller NameOfController
    -php artisan make:controller NameOfController --resource // --resource for ez CRUD addition
    -php artisan make:model NameOfModel -m // -m to generate migration files
    -php artisan make:auth
    -php artisan make:migration NameOfMigration
    

#Requirements

    1. Composer
    2. Node.Js

#Install Composer Dependencies

    -composer install

#Install node modules

    -npm install
    -npm run dev (for compilation of sass)
    -npm run watch (constantly watch the files to avoid running "npm run dev")

#Storage

    -php artisan storage:link
    
#Create Copy of .env from .env.example

    -cp .env.example .env
    -Fillout DB and APP
 
#Generate an app encryption key

    -php artisan key:generate

#Database

    -create Empty database and fill out the .env
    -php artisan migrate
