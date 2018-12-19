FROM php:7.2-fpm-alpine

RUN apk update
RUN apk add --no-cache g++ make autoconf
RUN apk add --no-cache postgresql-libs postgresql-dev
RUN docker-php-ext-install pgsql pdo_pgsql
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug