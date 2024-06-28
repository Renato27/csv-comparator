FROM php:8.0-apache

RUN docker-php-ext-install pdo pdo_mysql

COPY public/ /var/www/html/
COPY src/ /var/www/src/

RUN chown -R www-data:www-data /var/www/html /var/www/src
RUN chmod -R 755 /var/www/html /var/www/src

EXPOSE 80
