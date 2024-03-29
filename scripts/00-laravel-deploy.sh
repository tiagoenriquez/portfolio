#!/usr/bin/env bash
echo "Running composer"
composer update
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html
composer validate

echo "Clearing caches..."
php artisan optimize:clear

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

ls

echo "done deploying"