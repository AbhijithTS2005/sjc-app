@extends('layouts.app')

@section('content')
<style>
        :root {
            --college-blue: #003366;
            --accent-gold: #ffcc00;
            --light-gray: #f8f9fa;
            --text-dark: #333;
        }

        .login-page-wrapper {
            background: linear-gradient(135deg, var(--college-blue) 0%, #004d99 100%);
            min-height: calc(100vh - 250px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
        }

        .login-header {
            text-align: center;
            color: white;
            margin-bottom: 40px;
        }

        .college-logo {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .college-logo i {
            font-size: 2.2rem;
            color: var(--college-blue);
        }

        .login-header h1 {
            font-size: 1.6rem;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .login-header p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .login-card {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
        }

        .admin-badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--college-blue), #004d99);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 15px;
            margin-left: 50%;
            transform: translateX(-50%);
        }

        .login-card h2 {
            color: var(--college-blue);
            font-size: 1.4rem;
            margin-bottom: 8px;
            text-align: center;
        }

        .login-subtitle {
            text-align: center;
            color: #666;
            font-size: 0.85rem;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: var(--college-blue);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: all 0.3s;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--college-blue);
            box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin: 15px 0;
            font-size: 0.9rem;
        }

        .checkbox-group input {
            width: auto;
            margin-right: 8px;
            cursor: pointer;
        }

        .checkbox-group label {
            margin: 0;
            cursor: pointer;
            font-weight: normal;
            color: #666;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, var(--college-blue), #004d99);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 51, 102, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #dc3545;
            font-size: 0.9rem;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .back-link a {
            color: var(--college-blue);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        .help-section {
            background: var(--light-gray);
            padding: 15px;
            border-radius: 6px;
            margin-top: 20px;
            border-left: 4px solid var(--accent-gold);
        }

        .help-section p {
            font-size: 0.8rem;
            color: #666;
            margin: 6px 0;
        }

        .help-section strong {
            color: var(--college-blue);
        }

            .login-header p {
                font-size: 0.85rem;
            }

            .form-group input {
                padding: 10px 12px;
                font-size: 0.9rem;
            }

            .submit-btn {
                padding: 10px;
                font-size: 0.95rem;
            }
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

<div class="login-page-wrapper">
    <div class="login-container">
        <div class="login-header">
            <div class="college-logo">
                <i class="fas fa-calendar-check"></i>
            </div>
            <h1>Events Manage Portal</h1>
            <p>St. Joseph's College</p>
        </div>

        <div class="login-card">
            <div style="text-align: center;">
                <span class="admin-badge">
                    <i class="fas fa-shield-alt"></i> Event Manage Login
                </span>
            </div>

            <h2>Welcome</h2>
            <p class="login-subtitle">Manage college events and activities</p>

            @if($errors->any())
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <input type="hidden" name="login_from" value="events">

                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i> Email Address
                    </label>
                    <input 
                        type="text" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="Enter your email"
                        required 
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me for 30 days</label>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-sign-in-alt"></i> Sign In to Admin Panel
                </button>
            </form>

            <div class="help-section">
                <p><strong><i class="fas fa-info-circle"></i> First Time?</strong></p>
                <p>Contact the IT Department for admin credentials.</p>
                <p style="margin-top: 8px;"><strong>Features:</strong> Manage events, validate data, publish to homepage</p>
            </div>

            <div class="back-link">
                <a href="{{ route('login.in') }}">
                    <i class="fas fa-arrow-left"></i> Back to Login Options
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
