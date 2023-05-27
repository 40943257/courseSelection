# Before start
## Clone the repository
    git clone https://github.com/40943257/courseSelection.git
## To forder
    cd courseSelection
## Use composer to install all dependencies 
    composer install
## Copy .env.example to .env
    cp .env.example .env
## Generate a new application key
    php artisan key:generate
## Create database
    php artisan migrate
## Use seed to save data to database
    php artisan db:seed
# start
    php artisan serve