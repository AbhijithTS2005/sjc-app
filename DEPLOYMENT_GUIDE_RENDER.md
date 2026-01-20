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
- **Database**: `sjc-db` (MySQL)

### Important Notes

- **APP_KEY**: The `render.yaml` is configured to generate a secure `APP_KEY` automatically.
- **Database Connection**: The web service will automatically try to connect to the database. However, you might need to ensure the Laravel `.env` variables map correctly if Render doesn't set standard `DB_` vars automatically from the blueprint linking.
    - _Note_: Render Blueprints link services, but you may need to check the **Environment** tab of the Web Service after creation to verify `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` are populated. The `render.yaml` we created sets up the DB with specific user/db names, so Laravel needs those.

    The `render.yaml` defines:
    - `MYSQL_DATABASE`: `sjc_db`
    - `MYSQL_USER`: `sjc_user`

    You may need to manually add these to the **Web Service** environment variables if they are not automatically exposed:
    - `DB_HOST`: `sjc-db` (The name of the database service)
    - `DB_DATABASE`: `sjc_db`
    - `DB_USERNAME`: `sjc_user`
    - `DB_PASSWORD`: (Find this in the Database service settings/env vars)

## Troubleshooting

- **Build Failures**: Check the logs. Common issues are missing dependencies in `package.json` or `composer.json`.
- **500 Error**: Usually valid `APP_KEY` or Database connection issues. Check lines in logs.
