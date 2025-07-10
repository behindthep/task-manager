start:
	php artisan serve --host 0.0.0.0 --port 8000

start-frontend:
	npm run dev

setup:
	composer install
	cp -n .env.example .env
	php artisan key:gen --ansi
	php artisan migrate:refresh --force
	php artisan db:seed --force
	npm ci
	npm run build

migrate:
	php artisan migrate

console:
	php artisan tinker

log:
	tail -f storage/logs/laravel.log

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml

test-coverage-text:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-text

lint:
	composer exec --verbose phpcs -- app tests
	composer exec --verbose phpstan

lint-fix:
	composer exec --verbose phpcbf -- app tests

BUILD_ARGS:= --build-arg UID=$(shell id -u) --build-arg GID=$(shell id -u)

compose-up:
	docker compose up --abort-on-container-exit

compose-up-db:
	docker compose up db -d

compose-test:
	docker compose run --rm web make test

compose-lint:
	docker compose run --rm web composer exec --verbose phpcs -- app tests

compose-bash:
	docker compose run --rm web bash

compose-setup: compose-build
	docker compose run --rm web make setup

compose-build:
	docker compose build ${BUILD_ARGS}
	docker image prune -f

compose-db:
	docker compose exec db psql -U postgres

compose-down:
	docker compose down -v --remove-orphans

compose-stop:
	docker compose stop

compose-restart:
	docker compose restart

make ci:
	docker compose -f docker-compose.ci.yml -p task-manager-ci build ${BUILD_ARGS}
	docker compose -f docker-compose.ci.yml -p task-manager-ci run web make setup
	docker compose -f docker-compose.ci.yml -p task-manager-ci up --abort-on-container-exit
	docker compose -f docker-compose.ci.yml -p task-manager-ci down -v --remove-orphans

ci-lint:
	composer exec --verbose phpcs -- app tests
