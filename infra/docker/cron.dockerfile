FROM php:7.2-cli-alpine

RUN apk update \
    && apk add zlib-dev \
    && docker-php-ext-install pdo_mysql zip

RUN crontab -l | { cat; echo "* * * * * php /var/www/artisan schedule:run >> /dev/null 2>&1"; } | crontab -

CMD ["crond", "-f", "-l", "8"]