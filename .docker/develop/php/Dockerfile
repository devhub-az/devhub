# Here we are going to install PHP extension requirements that did not come
# with the default PHP container. This will be necessary for Laravel and Swoole.
FROM php:8.0-cli-alpine3.13 as php-base

WORKDIR /var/www

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
    nodejs npm

RUN pecl install redis

RUN docker-php-ext-enable redis \
    && docker-php-ext-install zip pdo_mysql exif opcache pcntl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quit \
    && npm --global install yarn \
    && rm -rf /var/cache/apk/* /tmp/* /var/tmp/*

RUN apk add --no-cache --virtual php_dependencies $PHPIZE_DEPS && \
    apk add --no-cache libstdc++ && \
    docker-php-ext-install bcmath ctype pdo_mysql pcntl && \
    pecl install swoole && \
    docker-php-ext-enable swoole && \
    apk del php_dependencies && \
    chown -R www-data:www-data /var/www


# This stage is so that we can build up everything that doesn't require Laravel
# so as to not bust the caching for those items.
FROM php-base as octane-base
    # This really shouldn't be modified, so we aren't advertising the env variable.
    # It allows us to globally install chokidar without modifying the Laravel package.json.
ENV NODE_PATH "/home/www-data/.npm-global/lib/node_modules"

RUN apk add --no-cache nodejs npm && \
    mkdir "/home/www-data/.npm-global/" && \
    npm config set prefix "/home/www-data/.npm-global/" && \
    npm install -g chokidar

# This is our final container. We will copy over our built version of Laravel.
FROM octane-base

USER www-data

# Allow the user to specify Swoole options via ENV variables.
ENV SWOOLE_MAX_REQUESTS "500"
ENV SWOOLE_TASK_WORKERS "auto"
ENV SWOOLE_WATCH $true
ENV SWOOLE_WORKERS "auto"

# Expose the ports that Octane is using.
EXPOSE 8000

# Run Swoole
CMD if [[ -z $SWOOLE_WATCH ]] ; then \
    php artisan octane:start --server="swoole" --host="0.0.0.0" --workers=${SWOOLE_WORKERS} --task-workers=${SWOOLE_TASK_WORKERS} --max-requests=${SWOOLE_MAX_REQUESTS} ; \
else \
    php artisan octane:start --server="swoole" --host="0.0.0.0" --workers=${SWOOLE_WORKERS} --task-workers=${SWOOLE_TASK_WORKERS} --max-requests=${SWOOLE_MAX_REQUESTS} --watch ; \
fi

# Check the health status using the Octane status command.
HEALTHCHECK CMD php artisan octane:status --server="swoole"
