FROM php:7.4-apache

RUN apt-get update && apt-get install -y vim
RUN docker-php-ext-install mysqli pdo pdo_mysql;
RUN a2enmod rewrite;
RUN service apache2 restart;

