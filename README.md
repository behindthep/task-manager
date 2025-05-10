# task-manager

### Github Actions and code Climate:
[![PHP CI](https://github.com/behindthep/task-manager/actions/workflows/phpci.yaml/badge.svg)](https://github.com/behindthep/task-manager/actions/workflows/phpci.yaml)

[![codecov](https://codecov.io/gh/behindthep/task-manager/branch/main/graph/badge.svg?token=F9TUPCSZVM)](https://codecov.io/gh/behindthep/task-manager)
[![Maintainability](https://api.codeclimate.com/v1/badges/bcf77b10f0c78a903440/maintainability)](https://codeclimate.com/github/artengin/php-project-57/maintainability) 
[![Test Coverage](https://api.codeclimate.com/v1/badges/bcf77b10f0c78a903440/test_coverage)](https://codeclimate.com/github/artengin/php-project-57/test_coverage)

### Setup

```bash
make setup
make start
```

### See what fields are in the table:

```php
App\Models\Task::first()->toArray();
```

```bash
# 1
composer create-project --prefer-dist laravel/laravel task-manager

# 2
php artisan make:model Task --migration
make migrate

# 3
php artisan make:controller TaskController --resource --model Task

# маршруты будут включать идентификатор родительского ресурса
php artisan make:controller TaskCommentController --resource --model TaskComment --parent Task

# 4
php artisan make:request Task/StoreRequest
php artisan make:request Task/UpdateRequest

# 5
php artisan lang:publish

# 6
# Создает новый класс наполнения базы данных.
php artisan make:seeder TasksTableSeeder

# 7
php artisan make:test UserTest --unit

# 8
php artisan make:exception <name>

# 9
# Шаблоны и маршруты для логина и регистрации.
php artisan make:auth

# 10
php artisan make:policy TaskPolicy --model Task

# 11
php artisan make:provider RiakServiceProvider

# 12
php artisan make:component Alert

# 13
php artisan make:factory PostFactory


php artisan route:list
```
