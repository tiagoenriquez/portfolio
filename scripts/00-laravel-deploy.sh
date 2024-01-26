#!/usr/bin/env bash
composer self-update
echo "Running composer"
composer global require hirak/prestissimo
composer install
composer validate

echo "Clearing caches..."
php artisan optimize:clear

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

ls

echo "done deploying"