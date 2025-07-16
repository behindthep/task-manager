# task-manager

[![PHP CI](https://github.com/behindthep/task-manager/actions/workflows/phpci.yml/badge.svg)](https://github.com/behindthep/task-manager/actions/workflows/phpci.yml)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=behindthep_task-manager&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=behindthep_task-manager)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=behindthep_task-manager&metric=bugs)](https://sonarcloud.io/summary/new_code?id=behindthep_task-manager)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=behindthep_task-manager&metric=code_smells)](https://sonarcloud.io/summary/new_code?id=behindthep_task-manager)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=behindthep_task-manager&metric=coverage)](https://sonarcloud.io/summary/new_code?id=behindthep_task-manager)
[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=behindthep_task-manager&metric=duplicated_lines_density)](https://sonarcloud.io/summary/new_code?id=behindthep_task-manager)

### See deployed [Task Manager](https://laravel-project-wnty.onrender.com)

## Prerequisites

* Linux
* PHP >=8.2
* Xdebug
* Make
* Git
* Docker
* Laravel 12

## Setup

```bash
make compose-setup
```

## Start

```bash
make compose-up
```

## Run tests and linter

```bash
make compose-test
make compose-lint
```

## Development steps:

### 1 Initialization
```bash
composer create-project --prefer-dist laravel/laravel task-manager
```

### 2 Check
```bash
npm install

make lint-fix
make lint

make test
make test-coverage

make start-frontend
make start
```

### 3 Authentication
```bash
php artisan breeze:install
```

### 4 Localization
```bash
php artisan lang:publish
```

### 5 CRUD
```bash
php artisan make:model TaskStatus --all
php artisan make:model Label --all
php artisan make:model Task --all

make migrate
make seed

php artisan make:test Controllers/TaskStatusControllerTest
```

### 6 API Documentation

```bash
php artisan install:api
php artisan make:controller --api Api/TaskController

php artisan route:list --path=api
```
