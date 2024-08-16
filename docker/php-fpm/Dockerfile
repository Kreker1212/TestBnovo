FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip curl \
    libpq-dev

RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY ./ /var/www
WORKDIR /var/www

RUN chmod +x /var/www/docker/php-fpm/entrypoint.sh

ENTRYPOINT ["/var/www/docker/php-fpm/entrypoint.sh"]

EXPOSE 9000
