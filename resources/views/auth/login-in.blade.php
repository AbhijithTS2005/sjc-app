<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - St. Joseph's College</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --college-blue: #003366;
            --accent-gold: #ffcc00;
            --light-gray: #f8f9fa;
            --text-dark: #333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--college-blue) 0%, #004d99 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 500px;
        }

        .login-header {
            text-align: center;
            color: white;
            margin-bottom: 40px;
        }

        .college-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .college-logo i {
            font-size: 2.5rem;
            color: var(--college-blue);
        }

        .login-header h1 {
            font-size: 1.8rem;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .login-header p {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .login-card {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            margin-bottom: 30px;
        }

        .login-card h2 {
            color: var(--college-blue);
            font-size: 1.5rem;
            margin-bottom: 10px;
            text-align: center;
        }

        .login-subtitle {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }

        .login-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .login-option {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            text-decoration: none;
            color: var(--text-dark);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .login-option:hover {
            border-color: var(--college-blue);
            background: var(--light-gray);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 51, 102, 0.15);
        }

        .login-option-icon {
            font-size: 2.5rem;
            color: var(--college-blue);
            margin-bottom: 12px;
        }

        .login-option-text {
            font-size: 1.1rem;
            font-weight: 600;
            text-align: center;
        }

        .login-option-desc {
            font-size: 0.75rem;
            color: #999;
            margin-top: 6px;
            text-align: center;
        }

        .footer-text {
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.85rem;
            margin-top: 20px;
        }

        .footer-text a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-bottom: 2px solid var(--accent-gold);
        }

        .footer-text a:hover {
            opacity: 0.9;
        }

            .login-header h1 {
                font-size: 1.5rem;
            }

            .login-option {
                padding: 25px 15px;
            }

            .login-option-icon {
                font-size: 2rem;
            }

            .login-option-text {
                font-size: 1rem;
            }
        }

        .divider {
            text-align: center;
            margin: 20px 0;
            color: #999;
            font-size: 0.9rem;
        }

        .college-info {
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
            margin-top: 30px;
        }

        @media (max-width: 1200px) {
            .auth-container { padding: 30px 15px; }
            .form-title, .form-group label { font-size: 1.1rem; }
        }

        @media (max-width: 992px) {
            .auth-container { max-width: 90%; padding: 20px; }
        }

        @media (max-width: 768px) {
            .auth-container { max-width: 100%; padding: 15px; }
            .form-title { font-size: 1.5rem; }
            input, button { font-size: 1rem; padding: 10px; }
        }

        @media (max-width: 576px) {
            .auth-container { padding: 10px; }
            .form-title { font-size: 1.3rem; }
            input, button { font-size: 0.9rem; padding: 8px; }
        }

        @media (max-width: 480px) {
            .auth-container { padding: 8px; }
            .form-title { font-size: 1.1rem; }
            input, button { font-size: 0.8rem; padding: 6px; }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-header">
            <div class="college-logo">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <h1>St. Joseph's College</h1>
            <p>Moolamattom</p>
        </div>

        <div class="login-card">
            <h2>Welcome Back</h2>
            <p class="login-subtitle">Choose your login type to continue</p>

            <div class="login-options">
                <a href="{{ route('faculty.login') }}" class="login-option">
                    <div class="login-option-icon">
                        <i class="fas fa-chalkboard-user"></i>
                    </div>
                    <div class="login-option-text">Faculty</div>
                    <div class="login-option-desc">Faculty Portal</div>
                </a>

                <a href="{{ route('events.login') }}" class="login-option">
                    <div class="login-option-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="login-option-text">Events</div>
                    <div class="login-option-desc">Admin Panel</div>
                </a>
            </div>
        </div>

        <div class="college-info">
            <p>© 2026 St. Joseph's College, Moolamattom</p>
            <p style="margin-top: 8px;">An Institution Managed by CMI Fathers</p>
        </div>
    </div>

</body>
</html>
