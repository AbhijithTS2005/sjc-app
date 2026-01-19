#!/bin/bash

# Multi-Platform Laravel Setup Script
# Works on InfinityFree, GoDaddy, Hostinger, Bluehost, and local environments

echo "=== St. Joseph's College - Laravel Setup ==="
echo ""

# Check if .env exists
if [ ! -f .env ]; then
    echo "❌ .env file not found!"
    echo "📋 Creating .env from .env.example..."
    cp .env.example .env
    echo "✅ .env created. Please update with your database credentials."
    echo ""
fi

# Check PHP version
PHP_VERSION=$(php -v | head -1)
echo "📦 PHP Version: $PHP_VERSION"
echo ""

# Clear caches
echo "🧹 Clearing application cache..."
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
echo "✅ Cache cleared"
echo ""

# Run migrations
echo "🗂️  Running database migrations..."
php artisan migrate --force
echo "✅ Migrations completed"
echo ""

# Set permissions
echo "🔐 Setting folder permissions..."
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
echo "✅ Permissions set"
echo ""

# Detect platform
echo "🌐 Detecting hosting platform..."
if [[ "$HOSTNAME" == *"infinityfree"* ]]; then
    echo "✅ Detected: InfinityFree"
elif [[ "$HOSTNAME" == *"godaddy"* ]]; then
    echo "✅ Detected: GoDaddy"
elif [[ "$HOSTNAME" == *"hostinger"* ]]; then
    echo "✅ Detected: Hostinger"
else
    echo "ℹ️  Platform: Shared Hosting / Other"
fi
echo ""

echo "=== ✅ Setup Complete! ==="
echo ""
echo "📝 Next Steps:"
echo "1. Verify .env database credentials are correct"
echo "2. Test database connection: php artisan db:table users"
echo "3. Visit your domain to verify installation"
echo ""
echo "📚 Documentation: See DEPLOYMENT.md for more information"
