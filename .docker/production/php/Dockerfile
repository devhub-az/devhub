FROM php:8.0-fpm-alpine

RUN apk update && apk add --no-cache \
    zip \
    libzip-dev \
    mysql-client \
    pcre-dev ${PHPIZE_DEPS} \
    make \
    shadow \
    bash \
    tzdata \
    nano \
    pcre-dev ${PHPIZE_DEPS} \
    nodejs npm \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && docker-php-ext-install zip pdo_mysql exif opcache \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quit \
    && npm --global install yarn \
    && rm -rf /var/cache/apk/* /tmp/* /var/tmp/*

RUN mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini

COPY ./.docker/production/php/local.ini $PHP_INI_DIR/conf.d
COPY ./.docker/production/php/xlaravel.pool.conf /usr/local/etc/php-fpm.d/

COPY --chown=www-data:www-data . /var/www/

WORKDIR /var/www

RUN composer install --no-dev

RUN rm -rf /root/.composer/cache

RUN yarn install && yarn cache clean

RUN yarn prod

COPY .docker/production/php/Makefile ./Makefile

RUN make install

ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data
