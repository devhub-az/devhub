init: docker-down docker-build composer-install yarn-install docker-up env key storage passport migrate yarn-prod
up: docker-up
down: docker-down
prod: docker-up-prod
restart: down up
install: composer-install yarn-install
update: composer-update yarn-upgrade

docker-up:
	docker-compose up -d

docker-up-prod:
	IMAGE_TAG=latest docker-compose -f docker-compose-production.yml up -d

docker-build-prod:
	IMAGE_TAG=latest docker-compose -f docker-compose-production.yml build

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	DOCKER_BUILDKIT=1 COMPOSE_DOCKER_CLI_BUILD=1 docker-compose build --build-arg BUILDKIT_INLINE_CACHE=1 --pull

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

yarn-prod:
	docker-compose run --rm php yarn prod

passport:
	docker-compose run --rm php php artisan passport:keys

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
	REGISTRY=hose1021 IMAGE_TAG=0 make build

push-build-latest: push-build-latest-develop

push-build-latest-develop:
	docker push ${REGISTRY}/devhub:latest

docker-down-clear:
 	COMPOSE_PROJECT_NAME=devhub docker-compose -f docker-compose.yml down -v --remove-orphans

build: build-devhub build-devhub_mysql build-devhub_nginx

build-devhub:
	DOCKER_BUILDKIT=1 docker --log-level=debug build --pull --build-arg BUILDKIT_INLINE_CACHE=1 \
            --cache-from ${REGISTRY}/devhub:latest \
            --tag ${REGISTRY}/devhub:latest \
            --tag ${REGISTRY}/devhub:${IMAGE_TAG} \
            --file .docker/production/php/Dockerfile .
build-devhub_mysql:
	DOCKER_BUILDKIT=1 docker --log-level=debug build --pull --build-arg BUILDKIT_INLINE_CACHE=1 \
            --cache-from ${REGISTRY}/devhub_mysql:latest \
            --tag ${REGISTRY}/devhub_mysql:latest \
            --tag ${REGISTRY}/devhub_mysql:${IMAGE_TAG} \
            --file .docker/production/mysql/Dockerfile .

build-devhub_nginx:
	DOCKER_BUILDKIT=1 docker --log-level=debug build --pull --build-arg BUILDKIT_INLINE_CACHE=1 \
            --cache-from ${REGISTRY}/devhub_nginx:latest \
            --tag ${REGISTRY}/devhub_nginx:latest \
            --tag ${REGISTRY}/devhub_nginx:${IMAGE_TAG} \
            --file .docker/production/nginx/Dockerfile .

push:
	docker-compose push

deploy:
	ssh -o StrictHostKeyChecking=no deploy@${HOST} 'rm -rf devhub'
	ssh -o StrictHostKeyChecking=no deploy@${HOST} 'mkdir devhub'
	scp -o StrictHostKeyChecking=no docker-compose-production.yml deploy@${HOST}:devhub/docker-compose.yml
	ssh -o StrictHostKeyChecking=no deploy@${HOST} 'cd devhub && echo "COMPOSE_PROJECT_NAME=devhub" >> .env'
	ssh -o StrictHostKeyChecking=no deploy@${HOST} 'cd devhub && echo "REGISTRY=${REGISTRY}" >> .env'
	ssh -o StrictHostKeyChecking=no deploy@${HOST} 'cd devhub && echo "IMAGE_TAG=${IMAGE_TAG}" >> .env'
	ssh -o StrictHostKeyChecking=no deploy@${HOST} 'cd devhub && docker-compose pull'
	ssh -o StrictHostKeyChecking=no deploy@${HOST} 'cd devhub && docker-compose down'
	ssh -o StrictHostKeyChecking=no deploy@${HOST} 'cd devhub && docker volume rm devhub_public'
	ssh -o StrictHostKeyChecking=no deploy@${HOST} 'cd devhub && docker-compose up --build --remove-orphans -d'
