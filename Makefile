start:
	php artisan serve --host 0.0.0.0 --port 8000

start-frontend:
	npm run dev

setup:
	cp -n .env.example .env || true
	composer install
	npm ci
	php artisan key:generate
	php artisan migrate:fresh --seed
	php artisan config:cache
	npm run build

clear:
	php artisan config:clear
	php artisan view:clear

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

compose: compose-clear compose-setup compose-start

compose-clear:
	docker-compose down -v --remove-orphans || true

compose-build:
	docker-compose build --build-arg UID=$(shell id -u) --build-arg GID=$(shell id -u)

compose-setup: compose-build
	docker-compose run --rm app make setup

compose-start:
	docker-compose up --abort-on-container-exit

compose-bash:
	docker-compose run --rm app bash

compose-test:
	docker-compose run app make test

compose-lint:
	docker-compose run app make lint

compose-db:
	docker-compose exec db psql -U postgres

ci:
	docker-compose -f docker-compose.yml -p task-manager-ci build --build-arg UID=$(shell id -u) --build-arg GID=$(shell id -u)
	docker-compose -f docker-compose.yml -p task-manager-ci run app make setup
	docker-compose -f docker-compose.yml -p task-manager-ci up --abort-on-container-exit
	docker-compose -f docker-compose.yml -p task-manager-ci down -v --remove-orphans
