start:
	php artisan serve

start-frontend:
	npm run dev

setup:
	composer install
	cp -n .env.example .env
	npm ci
	npm run build

migrate:
	php artisan migrate

seed:
	php artisan db:seed

console:
	php artisan tinker

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml

lint:
	composer exec -- phpcs --standard=PSR12 app tests

lint-fix:
	composer exec -- phpcbf --standard=PSR12 app tests
