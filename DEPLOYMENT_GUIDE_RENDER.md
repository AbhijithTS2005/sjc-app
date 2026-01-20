# Deploying St. Joseph's College App to Render

This guide outlines how to deploy the application to Render using the `render.yaml` Blueprint.

## Prerequisites

1.  A [Render](https://render.com) account.
2.  The code pushed to a GitHub repository connected to your Render account.

## Deployment Steps

1.  **Log in to Render**.
2.  Click **New +** and select **Blueprint**.
3.  Connect your GitHub repository (`sjc-app`).
4.  Render will automatically detect the `render.yaml` file.
5.  **Service Name**: Ensure the service name matches or is unique.
6.  **Apply**: Click **Apply** to start the deployment.

## Configuration (Environment Variables)

The `render.yaml` automatically sets up the following services:

- **Web Service**: `sjc-app` (Laravel Application)
- **Database**: `sjc-db` (PostgreSQL)

### Important Notes

- **APP_KEY**: The `render.yaml` is configured to generate a secure `APP_KEY` automatically.
- **Database Connection**: The web service is configured to automatically connect to the PostgreSQL database.
    - It uses `DB_CONNECTION: pgsql`
    - It pulls the connection details (Host, Database, User, Password) directly from the `sjc-db` service variables.

    The `render.yaml` defines:
    - `POSTGRES_DB`: `sjc_db`
    - `POSTGRES_USER`: `sjc_user`

## Troubleshooting

- **Build Failures**: Check the logs. Common issues are missing dependencies in `package.json` or `composer.json`.
- **500 Error**:
    - Check if the database migration ran successfully (`php artisan migrate --force` in Build Command).
    - Verify `DB_CONNECTION` is `pgsql`.
