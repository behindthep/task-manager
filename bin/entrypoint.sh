#!/bin/bash
set -e

php artisan migrate --force

USER_COUNT=$(php artisan tinker --execute="echo \App\Models\User::count();")

if [ "$USER_COUNT" -eq 0 ]; then
  echo "Users table is empty, running seeders..."
  php artisan db:seed --force
else
  echo "Users table has data, skipping seeders."
fi

php artisan serve --host=0.0.0.0 --port=$PORT
