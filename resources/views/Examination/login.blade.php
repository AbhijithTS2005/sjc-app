@extends('layouts.app')

@push('styles')
    <style>
        :root {
            --college-navy: #002147;
            --college-blue: #0056b3;
            --light-gray: #f2f5f8;
            --border-gray: #d1d5db;
            --text-dark: #333333;
            --header-height: 120px;
        }

        .page-container {
            display: flex;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .content-column {
            flex: 3;
            text-align: left;
        }

        .section-header {
            color: #003366;
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 5px;
            font-family: 'Merriweather', Georgia, serif;
        }

        .header-underline {
            width: 100%;
            height: 3px;
            background-color: #003366;
            margin-bottom: 25px;
            border-bottom: 1px solid var(--border-gray);
        }

        .content-text {
            margin-bottom: 20px;
            text-align: justify;
            font-size: 1.05rem;
            color: #444;
            line-height: 1.8;
        }

        .login-box {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 30px;
            margin: 20px 0;
            box-shadow: 0 2px 8px rgba(0, 51, 102, 0.1);
        }

        .login-section {
            margin-bottom: 25px;
        }

        .login-section h3 {
            color: #003366;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .login-btn {
            display: inline-block;
            background: #003366;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            background: #002147;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
        }

        .info-box {
            background: #e8f4f8;
            border-left: 4px solid #003366;
            padding: 15px 20px;
            margin: 15px 0;
            border-radius: 4px;
        }

        /* SIDEBAR STYLES */
        .sidebar-column {
            flex: 1;
            min-width: 280px;
        }

        .sidebar-box {
            background-color: var(--light-gray);
            border-radius: 4px;
            padding: 0;
            border: 1px solid #e2e8f0;
            position: sticky;
            top: calc(var(--header-height) + 20px);
            z-index: 1 !important;
        }

        .sidebar-title {
            color: #003366;
            font-size: 1.8rem;
            font-weight: 600;
            padding: 20px 25px 5px 25px;
            margin: 0;
            font-family: 'Merriweather', Georgia, serif;
        }

        .sidebar-underline {
            height: 3px;
            background-color: #002147;
            width: 40%;
            margin-left: 25px;
            margin-bottom: 15px;
            border-bottom: 1px solid #cbd5e1;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            border-bottom: 1px solid #e2e8f0;
        }

        .sidebar-menu li:last-child {
            border-bottom: none;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 25px;
            text-decoration: none;
            color: #555;
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        .sidebar-menu a:hover {
            background-color: #e2eaf2;
            color: #003366;
            padding-left: 30px;
        }

        .sidebar-menu a.active {
            background-color: #003366;
            color: white;
            font-weight: 600;
            padding-left: 30px;
        }

        @media (max-width: 992px) {
            .page-container {
                flex-direction: column;
                padding: 20px;
                gap: 20px;
            }

            .sidebar-column {
                order: 2;
                min-width: 100%;
            }

            .sidebar-box {
                position: static;
            }

            .login-box {
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            .page-container {
                padding: 15px;
                gap: 15px;
            }

            .section-header {
                font-size: 1.5rem;
            }

            .sidebar-menu a {
                padding: 8px 15px;
                font-size: 0.85rem;
            }

            .content-text {
                font-size: 0.9rem;
            }

            .login-box {
                padding: 15px;
            }
        }
    </style>
@endpush

@section('content')
<div class="page-container">
    <div class="content-column">
        <h2 class="section-header">Examination Login</h2>
        <div class="header-underline"></div>

        <div class="content-text">
            <p>
                Access the examination portal to apply for examinations, download timetables, view admit cards, 
                and check examination-related announcements. Use your student credentials to log in.
            </p>
        </div>

        <div class="login-box">
            <div class="login-section">
                <h3>🔐 Student Portal Login</h3>
                <p style="color: #555; margin-bottom: 15px;">
                    Log in to the student portal to access all examination-related services. 
                    Your credentials are your registration number and password.
                </p>
                <a href="#" class="login-btn">Login to Student Portal</a>
            </div>

            <div class="login-section" style="border-top: 1px solid #e2e8f0; padding-top: 20px;">
                <h3>📝 Required Credentials</h3>
                <ul style="margin: 10px 0 10px 20px;">
                    <li><strong>Registration Number:</strong> Your 10-digit student ID</li>
                    <li><strong>Password:</strong> Your portal password (initially provided at registration)</li>
                </ul>
            </div>

            <div class="login-section" style="border-top: 1px solid #e2e8f0; padding-top: 20px;">
                <h3>❓ Forgot Password?</h3>
                <p style="color: #555; margin-bottom: 15px;">
                    If you forgot your password, click the "Forgot Password" link on the login page 
                    and follow the instructions to reset it. You will receive a reset link via email.
                </p>
                <a href="#" class="login-btn" style="background: #666;">Reset Password</a>
            </div>
        </div>

        <div class="info-box">
            <h4 style="margin-top: 0; color: #003366;">ℹ️ Portal Features</h4>
            <ul style="margin: 10px 0 10px 20px;">
                <li>Apply for examinations</li>
                <li>Download timetables and admit cards</li>
                <li>View examination results</li>
                <li>Check academic calendar</li>
                <li>Access exam-related notifications</li>
                <li>Update profile information</li>
            </ul>
        </div>

        <div class="info-box">
            <h4 style="margin-top: 0; color: #003366;">🛡️ Security Tips</h4>
            <ul style="margin: 10px 0 10px 20px;">
                <li>Always use a secure password (minimum 8 characters)</li>
                <li>Never share your login credentials with anyone</li>
                <li>Log out after completing your work</li>
                <li>Use only official college portals</li>
                <li>Beware of phishing emails asking for login details</li>
            </ul>
        </div>

        <div class="info-box">
            <h4 style="margin-top: 0; color: #003366;">📞 Technical Support</h4>
            <p style="margin: 10px 0;">
                If you face any technical issues while logging in or using the portal, 
                please contact the IT Support desk at <strong>itsupport@sjcmoolamattom.edu.in</strong> 
                or call the college during office hours.
            </p>
        </div>
    </div>

    <div class="sidebar-column">
        <div class="sidebar-box">
            <h3 class="sidebar-title">Examination</h3>
            <div class="sidebar-underline"></div>

            <ul class="sidebar-menu">
                <li><a href="{{ route('examination.overview') }}" class="{{ Route::is('examination.overview') ? 'active' : '' }}">Overview</a></li>
                <li><a href="{{ route('examination.calendar') }}" class="{{ Route::is('examination.calendar') ? 'active' : '' }}">Exam Calendar</a></li>
                <li><a href="{{ route('examination.notification') }}" class="{{ Route::is('examination.notification') ? 'active' : '' }}">Exam Notification</a></li>
                <li><a href="{{ route('examination.timetable') }}" class="{{ Route::is('examination.timetable') ? 'active' : '' }}">Timetable</a></li>
                <li><a href="{{ route('examination.guidelines') }}" class="{{ Route::is('examination.guidelines') ? 'active' : '' }}">Guidelines</a></li>
                <li><a href="{{ route('examination.application') }}" class="{{ Route::is('examination.application') ? 'active' : '' }}">Application</a></li>
                <li><a href="{{ route('examination.login') }}" class="{{ Route::is('examination.login') ? 'active' : '' }}">Login</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
