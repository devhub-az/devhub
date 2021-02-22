FROM node:14-alpine as builder

WORKDIR /app

COPY ./package.json ./yarn.lock ./
RUN yarn install && yarn cache clean

COPY ./ ./

RUN yarn prod

FROM nginx:1.19-alpine

COPY ./.docker/develop/nginx/default.conf /etc/nginx/conf.d/default.conf

COPY --from=builder app/public /var/www/public

RUN rm -rf /app
