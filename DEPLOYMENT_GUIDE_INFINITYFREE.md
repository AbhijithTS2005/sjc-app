# Deployment Guide for InfinityFree

This guide will help you manually deploy your Laravel application to InfinityFree.

> [!NOTE]
> **Why manual deployment?**
> As an AI, I cannot log in to your InfinityFree account or bypass security checks (CAPTCHAs, 2FA) required for direct upload. However, I have prepared the project so the manual process is as simple as possible.

## 1. Preparation (Already Done Locally)

I have added a `.htaccess` file to your project root `d:/sjc1/`. This file is crucial for InfinityFree because it redirects all traffic to the `public` folder, allowing you to upload your files directly to `htdocs`.

## 2. Database Export

Since `mysqldump` was not found in your terminal, please export your database using phpMyAdmin:

1. Open your local database manager (e.g., http://localhost/phpmyadmin).
2. Select your database (`sjc1`).
3. Click the **Export** tab.
4. Click **Go** (Quick export is fine).
5. Save the `.sql` file (e.g., `sjc1.sql`).

## 3. Preparing the Files

1. **Zip your project**: Select all files in `d:/sjc1/` **EXCEPT**:
    - `node_modules` (folder)
    - `.git` (folder, if hidden)
    - `tests` (folder)
2. Right-click -> "Compress to ZIP file". Name it `sjc1_deploy.zip`.

## 4. Uploading to InfinityFree

1. Log in to your InfinityFree Client Area.
2. Go to the **File Manager** (or use an FTP client like FileZilla).
3. Navigate into the `htdocs` folder.
4. **Delete** the default `index2.html` or `default.php` if present.
5. **Upload** your `sjc1_deploy.zip` file.
6. Right-click the uploaded zip and select **Extract** (Unzip).
    - _Note: If the file manager doesn't support unzipping, you will need to unzip locally and upload the unzipped files (excluding `node_modules`). This takes longer._

## 5. Configuration on Server

1. In the File Manager, find the `.env` file (you might need to "Show Hidden Files" in settings).
2. Edit `.env` with your InfinityFree database details (found in "Control Panel" -> "MySQL Databases"):

    ```ini
    APP_ENV=production
    APP_DEBUG=false
    APP_URL=http://your-domain.infinityfreeapp.com

    DB_CONNECTION=mysql
    DB_HOST=sqlXXX.infinityfree.com  <-- "MySQL Hostname" from Control Panel
    DB_DATABASE=EPOXZ_XXXXXX         <-- "Database Name"
    DB_USERNAME=epiz_XXXXXX          <-- "MySQL User Name"
    DB_PASSWORD=YOUR_VPOST_PASSWORD  <-- Your Hosting Account Password
    ```

3. Save the file.

## 6. Database Import

1. In InfinityFree Control Panel, go to **phpMyAdmin**.
2. Click **Connect Now** on your database.
3. Click the **Import** tab.
4. Choose the `sjc1.sql` file you exported earlier.
5. Click **Go**.

## 7. Final Check

Visit your website URL. It should load.

- If you see a "500 Error", check:
    - Permissions (folders `storage` and `bootstrap/cache` may need 777 permissions).
    - `.env` configuration (database password matches).
