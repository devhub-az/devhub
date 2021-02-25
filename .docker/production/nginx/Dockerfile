FROM node:14-alpine as builder

WORKDIR /app

COPY ./package.json ./yarn.lock ./
RUN yarn install && yarn cache clean

COPY ./ ./

RUN yarn prod

FROM nginx:1.19-alpine

COPY ./.docker/production/common/nginx/snippets /etc/nginx/snippets
COPY ./.docker/production/nginx/prod.conf /etc/nginx/conf.d/default.conf

COPY --from=builder app/public /var/www/public

RUN rm -rf /app

HEALTHCHECK --interval=5s --timeout=3s --start-period=1s CMD curl --fail http://127.0.0.1/health || exit 1
