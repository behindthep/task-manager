#!/bin/bash

set -e

php artisan migrate --force

USER_COUNT=$(php artisan tinker --execute="echo \App\Models\User::count();")

if [ "$USER_COUNT" -eq 0 ]; then
  php artisan migrate:fresh --force
  echo "No data in tables, running seeders..."
  php artisan db:seed --force
fi

php artisan serve --host=0.0.0.0 --port=$PORT
