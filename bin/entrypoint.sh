#!/bin/bash
set -e

# Запускаем миграции
php artisan migrate --force

# Проверяем, есть ли записи в таблице users
USER_COUNT=$(php artisan tinker --execute="echo \App\Models\User::count();")

if [ "$USER_COUNT" -eq 0 ]; then
  echo "Users table is empty, running seeders..."
  php artisan db:seed --force
else
  echo "Users table has data, skipping seeders."
fi

# Запускаем сервер
php artisan serve --host=0.0.0.0 --port=$PORT
