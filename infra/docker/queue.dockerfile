FROM php:7.2-cli-alpine

RUN apk update \
    && apk add zlib-dev \
    && docker-php-ext-install pdo_mysql zip

CMD php artisan queue:work
