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

RUN apk add --no-cache pcre-dev ${PHPIZE_DEPS}

RUN pecl install redis \
    && docker-php-ext-enable redis

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./.docker/develop/php/local.ini $PHP_INI_DIR/conf.d
COPY ./.docker/develop/php/xlaravel.pool.conf /usr/local/etc/php-fpm.d/

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quit

# Install node js
RUN apk add --no-cache --update nodejs npm

# Install yarn
RUN npm --global install yarn

# Configure non-root user.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

WORKDIR /var/www
