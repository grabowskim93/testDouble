FROM php:8.0.5-fpm-alpine

WORKDIR /var/www/html

COPY --from=composer:2.0 /usr/bin/composer /usr/local/bin/composer

SHELL ["/bin/bash", "-c"]
RUN echo I am now using bash!

USER root
