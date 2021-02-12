init: docker-down docker-pull docker-build composer-update yarn-install key docker-up passport migrate
up: docker-up yarn-watch-d
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
	docker-compose run --rm php php artisan passport:install

yarn-watch-d:
	docker-compose run -d --name yarn-watch php yarn watch

yarn-watch:
	docker-compose run --rm php yarn watch

stop-watch:
	docker stop yarn-watch

key:
	docker-compose run --rm php php artisan key:generate

migrate:
	docker-compose run --rm php php artisan migrate --seed

migrate-fresh:
	docker-compose run --rm php php artisan migrate:fresh --seed
