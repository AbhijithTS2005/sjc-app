#!/bin/bash
set -e

# Create .env file from environment variables
echo "APP_NAME=\"${APP_NAME:-Laravel}\"" > .env
echo "APP_ENV=${APP_ENV:-production}" >> .env
echo "APP_KEY=${APP_KEY}" >> .env
echo "APP_DEBUG=${APP_DEBUG:-false}" >> .env
echo "APP_URL=${RENDER_EXTERNAL_URL:-http://localhost}" >> .env
echo "LOG_CHANNEL=${LOG_CHANNEL:-stderr}" >> .env
echo "DB_CONNECTION=${DB_CONNECTION:-pgsql}" >> .env
echo "DB_HOST=${DB_HOST}" >> .env
echo "DB_PORT=${DB_PORT:-5432}" >> .env
echo "DB_DATABASE=${DB_DATABASE}" >> .env
echo "DB_USERNAME=${DB_USERNAME}" >> .env
echo "DB_PASSWORD=${DB_PASSWORD}" >> .env
echo "CACHE_STORE=${CACHE_STORE:-file}" >> .env
echo "SESSION_DRIVER=${SESSION_DRIVER:-file}" >> .env

# Clear any cached config
php artisan config:clear

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force

# Start Apache
exec apache2-foreground
