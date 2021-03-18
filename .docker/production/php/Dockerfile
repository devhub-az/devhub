FROM php:8.0-fpm-alpine

# Install dependencies
RUN apk update && apk add --no-cache \
     zip \
     libzip-dev \
     mysql-client \
     pcre-dev ${PHPIZE_DEPS} \
     make \
     shadow \
     bash \
     nano

## Install extensions
RUN docker-php-ext-install zip pdo_mysql exif opcache

RUN pecl install redis \
    && docker-php-ext-enable redis

RUN mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini

COPY ./.docker/production/php/local.ini $PHP_INI_DIR/conf.d
COPY ./.docker/production/php/xlaravel.pool.conf /usr/local/etc/php-fpm.d/

WORKDIR /var/www

COPY --chown=www-data:www-data . /var/www/

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quit

# Install packages
RUN composer install --no-dev

RUN rm -rf /root/.composer/cache

# Install node js
RUN apk add --no-cache --update nodejs npm

# Install yarn
RUN npm --global install yarn

RUN yarn install && yarn cache clean

RUN yarn prod

COPY .docker/production/php/Makefile ./Makefile

RUN make install

# Configure non-root user.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data
