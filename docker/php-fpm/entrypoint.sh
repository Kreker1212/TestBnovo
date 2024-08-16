#!/bin/bash
set -e

echo "Running composer install..."
composer install

echo "Running artisan migrate..."
php artisan migrate

echo "Starting PHP-FPM..."
php-fpm
