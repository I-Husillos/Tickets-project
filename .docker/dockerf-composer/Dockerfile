FROM composer:latest

COPY ./src /var/www/html

WORKDIR /var/www/html


CMD ["sh", "-c", "composer install && composer update"]

