# Multi-Platform Deployment Guide

This Laravel application is configured to work on any hosting platform including InfinityFree, GoDaddy, Hostinger, Bluehost, and local development.

## Quick Start for Any Platform

### Step 1: Prepare Environment File

1. Copy `.env.example` to `.env` on the server
2. Fill in your platform's database credentials:
   ```env
   DB_HOST=your_db_host
   DB_DATABASE=your_db_name
   DB_USERNAME=your_db_user
   DB_PASSWORD=your_db_password
   ```

3. Leave `APP_URL` empty to auto-detect, or set it explicitly:
   ```env
   APP_URL=https://yourdomain.com
   ```

### Step 2: File Structure Upload

The app requires a specific folder structure on your server:

```
Server Root (usually /home or /root)
├── public_html (or htdocs/)
│   ├── index.php
│   ├── .htaccess
│   ├── build/
│   ├── images/
│   └── ...rest of public files
│
├── app/ (one level up from public_html)
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── composer.json
├── composer.lock
└── ...etc
```

**Upload Instructions:**
- Upload contents of `public/` folder → `public_html/` or `htdocs/`
- Upload all other Laravel folders one level up from web root

### Step 3: Run Database Migrations

Via SSH/Terminal:

```bash
cd /path/to/laravel/root
php artisan migrate --force
php artisan cache:clear
php artisan config:clear
```

---

## Platform-Specific Instructions

### InfinityFree

1. **File Manager Setup:**
   - Extract public folder contents to `htdocs/`
   - Upload Laravel files to parent directory

2. **Database:**
   - Get MySQL credentials from InfinityFree panel
   - Create database via control panel
   - Update `.env` with credentials

3. **Run Commands (via Terminal):**
   ```bash
   php artisan migrate --force
   ```

4. **Environment Settings:**
   ```env
   APP_ENV=production
   APP_DEBUG=false
   DB_HOST=localhost
   ```

---

### GoDaddy

1. **File Manager Setup:**
   - Upload public folder to `public_html/`
   - Upload other Laravel files to parent directory

2. **Database:**
   - Use GoDaddy's database management tool
   - Create MySQL database and user
   - Update `.env`

3. **SSH Commands:**
   ```bash
   php artisan migrate --force
   php artisan optimize
   ```

4. **Environment:**
   ```env
   APP_ENV=production
   APP_DEBUG=false
   ```

---

### Hostinger

1. **File Structure:** Same as GoDaddy
2. **Database:** Hostinger control panel → Databases
3. **SSH:** Connect and run migrations
4. **.env** settings: Same as production

---

### Local Development

1. **Setup:**
   ```bash
   composer install
   php artisan key:generate
   php artisan migrate
   php artisan serve
   ```

2. **.env settings:**
   ```env
   APP_ENV=local
   APP_DEBUG=true
   DB_HOST=127.0.0.1
   ```

---

## Auto-Detection Features

The application automatically detects:
- **Domain/Platform** based on hostname
- **Protocol** (HTTP/HTTPS) based on connection
- **Appropriate drivers** (cache, session) for the platform

### Manual Configuration

If auto-detection doesn't work, explicitly set in `.env`:

```env
APP_URL=https://example.com
APP_ENV=production
APP_DEBUG=false
```

---

## Troubleshooting

### Still Getting HTTP 500 Error?

1. **Check error logs:**
   ```bash
   tail -f storage/logs/laravel.log
   ```

2. **Clear application cache:**
   ```bash
   php artisan cache:clear
   php artisan config:clear
   ```

3. **Fix permissions:**
   ```bash
   chmod -R 775 storage/
   chmod -R 775 bootstrap/cache/
   ```

4. **Check PHP version:**
   ```bash
   php -v
   # Should be PHP 8.2 or higher
   ```

5. **Verify database connection:**
   ```bash
   php artisan db:table users
   ```

### Common Issues

| Issue | Solution |
|-------|----------|
| 500 error on load | Check storage/logs/laravel.log |
| Database connection error | Verify DB credentials in .env |
| Migrations failed | Ensure database exists and user has privileges |
| Permission denied on storage | Run `chmod -R 775 storage/` |
| White screen | Enable APP_DEBUG=true temporarily to see errors |

---

## Post-Deployment Checklist

- [ ] Database migrations completed
- [ ] .env file created with correct credentials
- [ ] Storage folder has write permissions
- [ ] Public folder is web root
- [ ] APP_DEBUG set to false
- [ ] APP_ENV set to production
- [ ] Logs are accessible and not full
- [ ] Cache is cleared
- [ ] Configuration is cached (optional): `php artisan config:cache`

---

## Additional Resources

- [Laravel Deployment](https://laravel.com/docs/11.x/deployment)
- [Platform Configuration](config/platforms.php)
- [Environment Variables](.env.example)
