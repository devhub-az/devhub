init: docker-down docker-pull docker-build composer-update yarn-install docker-up env key storage passport migrate
up: composer-update docker-up yarn-watch
down: docker-down
restart: down up

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build --pull

optimize:
	docker-compose run --rm php php artisan optimize

composer-install:
	docker-compose run --rm php composer install

composer-update:
	docker-compose run --rm php composer update

yarn-install:
	docker-compose run --rm php yarn install

yarn-upgrade:
	docker-compose run --rm php yarn upgrade

passport:
	docker-compose run --rm php php artisan passport:keys

yarn-watch:
	docker-compose run php yarn watch

env:
	docker-compose run --rm php php -r "file_exists('.env') || copy('.env.example', '.env');"

stop-watch:
	docker stop yarn-watch

storage:
	docker-compose run --rm php php artisan storage:link

key:
	docker-compose run --rm php php artisan key:generate

migrate:
	docker-compose run --rm php php artisan migrate --seed

migrate-fresh:
	docker-compose run --rm php php artisan migrate:fresh --seed

try-build:
	REGISTRY=127.0.0.1 IMAGE_TAG=0 make build

build: build-docker

build-docker:
	docker --log-level=debug build --pull --file=Dockerfile --tag=${REGISTRY}:${IMAGE_TAG} .

push:
	docker push ${REGISTRY}/php:${IMAGE_TAG}
