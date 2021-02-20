FROM nginx:1.19-alpine

COPY ./.docker/nginx/default.conf /etc/nginx/conf.d

WORKDIR /var/www

COPY ./public ./public
