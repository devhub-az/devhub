FROM php:8-fpm-alpine

ENV USER=devhub
ENV APP=/var/www

RUN addgroup -S appgroup && adduser -u 1001 -S $USER -G appgroup

RUN apk update && apk add --no-cache \
    zip \
    libzip-dev \
    mysql-client \
    pcre-dev ${PHPIZE_DEPS} \
    make \
    shadow \
    bash \
    tzdata \
    nano

RUN pecl install redis \
    && docker-php-ext-enable redis

RUN docker-php-ext-install zip pdo_mysql exif opcache pcntl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quit

ENV TZ=Asia/Baku

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

#COPY ./.docker/develop/php/local.ini $PHP_INI_DIR/conf.d
#COPY ./.docker/develop/php/xlaravel.pool.conf /usr/local/etc/php-fpm.d/

WORKDIR $APP
USER $USER

#ARG PUID=1000
#ENV PUID ${PUID}
#ARG PGID=1000
#ENV PGID ${PGID}
#
#RUN groupmod -o -g ${PGID} www-data && \
#    usermod -o -u ${PUID} -g www-data www-data
