start:
	php artisan serve

start-frontend:
	npm run dev

setup:
	composer install
	cp -n .env.example .env
	php artisan key:generate
	php artisan config:clear
	php artisan config:cache
	npm ci
	npm run build
	touch database/database.sqlite
	php artisan migrate
	php artisan db:seed

migrate:
	php artisan migrate

rollback:
	php artisan migrate:rollback

seed:
	php artisan db:seed

console:
	php artisan tinker

lint:
	composer exec --verbose phpcs -- app tests
	composer exec --verbose phpstan

lint-fix:
	composer exec --verbose phpcbf -- app tests

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml

test-coverage-text:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-text

# Собирает сервисы, описанные в конфигурационных файлах
# docker compose build

# docker compose up

# docker compose up -d

# docker compose logs -f

# # Если какой-то из сервисов завершит работу, остальные остановлены автоматически
# docker compose up --abort-on-container-exit

# # Запустит сервис application и выполнит внутри команду make install
# docker compose run application make install

# # запустить сервис и подключиться к нему с bash
# docker compose run application bash

# docker compose run --rm application bash

# docker compose down

# docker compose stop

# docker compose restart
