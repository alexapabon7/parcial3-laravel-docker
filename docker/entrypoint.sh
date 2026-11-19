#!/bin/sh
set -e

[ -f .env ] || cp .env.example .env

# Pone en .env los valores que vienen del docker-compose
set_env() {
  if grep -q "^$1=" .env; then
    sed -i "s|^$1=.*|$1=$2|" .env
  else
    echo "$1=$2" >> .env
  fi
}

set_env DB_CONNECTION "${DB_CONNECTION:-mysql}"
set_env DB_HOST "${DB_HOST:-db}"
set_env DB_PORT "${DB_PORT:-3306}"
set_env DB_DATABASE "${DB_DATABASE:-parcial}"
set_env DB_USERNAME "${DB_USERNAME:-laravel}"
set_env DB_PASSWORD "${DB_PASSWORD:-secret}"
set_env SESSION_DRIVER "${SESSION_DRIVER:-file}"
set_env CACHE_STORE "${CACHE_STORE:-file}"

grep -q '^APP_KEY=.\+' .env || php artisan key:generate --force

php artisan migrate --force --seed
exec php artisan serve --host=0.0.0.0 --port=8000