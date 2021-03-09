FROM php:8.0-fpm-alpine

# Install dependencies
RUN apk update && apk add --no-cache \
    zip \
    libzip-dev \
    mysql-client \
    make \
    bash \
    nano

## Install extensions
RUN docker-php-ext-install zip pdo_mysql exif

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini
COPY ./.docker/develop/php/local.ini $PHP_INI_DIR/conf.d

COPY .docker/common/wait-for-it.sh /usr/local/bin/wait-for-it
RUN chmod 555 /usr/local/bin/wait-for-it

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quit

# Install node js
RUN apk add --no-cache --update nodejs npm

# Install yarn
RUN npm --global install yarn

WORKDIR /var/www
