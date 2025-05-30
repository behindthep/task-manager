start:
	php artisan serve

start-frontend:
	npm run dev

setup:
	composer install
	cp -n .env.example .env
	php artisan key:generate
	php artisan config:cache
	npm ci
	npm run build
	touch database/database.sqlite
	make migrate
	make seed

migrate:
	php artisan migrate

rollback:
	php artisan migrate:rollback

seed:
	php artisan db:seed

console:
	php artisan tinker

lint:
	composer exec -- phpcs --standard=PSR12 app tests

lint-fix:
	composer exec -- phpcbf --standard=PSR12 app tests

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml
