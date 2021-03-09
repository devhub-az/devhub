FROM node:15-alpine as builder

WORKDIR /app

COPY ./package.json ./yarn.lock ./
RUN yarn install && yarn cache clean

COPY ./ ./

RUN yarn prod

FROM php:8.0-fpm-alpine

# Install dependencies
RUN apk update && apk add --no-cache zip mysql-client libzip-dev make nano parallel

## Install extensions
RUN docker-php-ext-install zip pdo_mysql exif

RUN mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini

WORKDIR /var/www

COPY ./ ./

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quit

# Install packages
RUN composer install --no-dev

RUN rm -rf /root/.composer/cache

COPY --from=builder /app/public ./public

COPY .docker/production/php/Makefile ./Makefile

RUN make install
