# task-manager

[![PHP CI](https://github.com/behindthep/task-manager/actions/workflows/phpci.yml/badge.svg)](https://github.com/behindthep/task-manager/actions/workflows/phpci.yml)

## 1 Initialization

```bash
composer create-project --prefer-dist laravel/laravel task-manager
```

## 2 Check

```bash
npm install

make lint-fix
make lint

make test
make test-coverage

make start-frontend
make start
```

## 3 Authentication

```bash
php artisan breeze:install
```

## 4 Localization

```bash
php artisan lang:publish
```

## 5 CRUD

```bash
php artisan make:model TaskStatus --all
php artisan make:model Label --all
php artisan make:model Task --all

make migrate
make seed

php artisan make:test Controllers/TaskStatusControllerTest
```

## 6 Documentation

https://scribe.knuckles.wtf/laravel/

```bash
php artisan scribe:generate
```
