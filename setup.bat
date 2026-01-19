#!/bin/bash

# Windows batch version - save as setup.bat

@echo off
color 0A
title St. Joseph's College - Laravel Setup

echo.
echo ====================================
echo  St. Joseph's College - Laravel Setup
echo ====================================
echo.

REM Check if .env exists
if not exist .env (
    echo Creating .env from .env.example...
    copy .env.example .env
    echo.
    echo ! IMPORTANT: Update .env with your database credentials
    echo.
    pause
)

REM Clear caches
echo Clearing application cache...
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
echo Cache cleared
echo.

REM Run migrations
echo Running database migrations...
php artisan migrate --force
echo Migrations completed
echo.

REM Set permissions (Windows specific)
echo Setting folder permissions...
icacls storage /grant:r %username%:F /t >nul 2>&1
icacls bootstrap\cache /grant:r %username%:F /t >nul 2>&1
echo Permissions set
echo.

echo.
echo ====================================
echo        Setup Complete!
echo ====================================
echo.
echo Next Steps:
echo 1. Verify .env database credentials
echo 2. Test: php artisan db:table users
echo 3. Visit your domain
echo.
echo Documentation: See DEPLOYMENT.md
echo.
pause
