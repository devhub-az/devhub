FROM php:8.0-fpm-alpine

WORKDIR /var/www

# Install dependencies
RUN apk update && apk add --no-cache zip libzip-dev

## Install extensions
RUN docker-php-ext-install opcache zip pdo_mysql exif

RUN mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini
COPY .docker/php /usr/local/etc/php/conf.d

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quit

# Folders chmod
COPY --chown=www-data:www-data . /var/www/

# Install node js
RUN apk add --no-cache --update nodejs npm

# Install yarn
RUN npm --global install yarn
