FROM php:8.0-fpm-alpine

WORKDIR /var/www

# Install dependencies
RUN apk update && apk add --no-cache zip libzip-dev make

## Install extensions
RUN docker-php-ext-install zip pdo_mysql exif

RUN mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini

# Folders chmod
COPY --chown=www-data:www-data . /var/www/

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quit

RUN composer install

RUN rm -rf /root/.composer/cache

# Install node js
RUN apk add --no-cache --update nodejs npm

COPY ./.docker/production/php/Makefile ./Makefile

RUN make install
