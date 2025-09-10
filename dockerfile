FROM php:8.2-apache

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql mysqli

ADD index.php /var/www/html/
ADD style.css /var/www/html/

EXPOSE 80