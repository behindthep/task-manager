start:
	php artisan serve --host 0.0.0.0 --port 8000

start-frontend:
	npm run dev

setup:
	composer install
	cp -n .env.example .env
	php artisan key:gen --ansi
	php artisan migrate --force
	php artisan db:seed --force
	npm ci
	npm run build
	make ide-helper

db-prepare:
	php artisan migrate:refresh --force

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

clear:
	php artisan view:clear
#	php artisan optimize:clear

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

compose-logs:
	docker compose logs -f

compose-db:
	docker compose exec db psql -U postgres

compose-migrate:
	docker compose up -d
	docker compose exec web php artisan migrate

# Stop containers, save data
compose-stop:
	docker compose stop

# Delete containers, networks, and volumes (-v)
compose-down:
	docker compose down -v --remove-orphans

compose-restart:
	docker compose restart

make ci:
	docker compose -f docker-compose.ci.yml build ${BUILD_ARGS}
	docker compose -f docker-compose.ci.yml run web make setup
	docker compose -f docker-compose.ci.yml up --abort-on-container-exit
	docker compose -f docker-compose.ci.yml down -v --remove-orphans

ci-lint:
	composer exec --verbose phpcs -- app tests

ide-helper:
	php artisan ide-helper:eloquent
	php artisan ide-helper:gen
	php artisan ide-helper:mod -n
