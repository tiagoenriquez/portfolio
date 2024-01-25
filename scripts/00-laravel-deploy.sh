#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html
composer self-update

echo "Clearing caches..."
php artisan optimize:clear

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "done deploying"