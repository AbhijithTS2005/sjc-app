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

        .notification-box {
            background: #f8f9fa;
            border-left: 4px solid #003366;
            padding: 15px 20px;
            margin: 15px 0;
            border-radius: 4px;
        }

        .notification-date {
            color: #003366;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .notification-title {
            color: #333;
            font-weight: 600;
            margin: 8px 0;
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

        @media (max-width: 1200px) {
            .page-container {
                gap: 30px;
                padding: 30px 15px;
            }
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
        }
    </style>
@endpush

@section('content')
<div class="page-container">
    <div class="content-column">
        <h2 class="section-header">Exam Notifications</h2>
        <div class="header-underline"></div>

        <div class="content-text">
            <p>
                Stay updated with the latest examination notifications and announcements. All important notices 
                related to examinations will be published here. Students are advised to check this section regularly.
            </p>
        </div>

        <div class="notification-box">
            <div class="notification-date">📅 January 10, 2025</div>
            <div class="notification-title">Odd Semester Examination Results Announced</div>
            <p style="margin: 8px 0; color: #555;">The results for the odd semester (1st and 3rd semester) examinations have been announced. Students can check their results from the student portal.</p>
        </div>

        <div class="notification-box">
            <div class="notification-date">📅 January 5, 2025</div>
            <div class="notification-title">Exam Timetable Published - Odd Semester</div>
            <p style="margin: 8px 0; color: #555;">The detailed timetable for the odd semester examinations is now available. Please download and check your examination schedule carefully.</p>
        </div>

        <div class="notification-box">
            <div class="notification-date">📅 December 28, 2024</div>
            <div class="notification-title">Practical Examination Completed</div>
            <p style="margin: 8px 0; color: #555;">The practical examinations for odd semester have been completed successfully. Marks will be updated shortly in the student portal.</p>
        </div>

        <div class="notification-box">
            <div class="notification-date">📅 December 15, 2024</div>
            <div class="notification-title">Theory Examination Completed - Odd Semester</div>
            <p style="margin: 8px 0; color: #555;">Theory examinations for odd semester (1st and 3rd semester) have been completed. Thank you for your participation.</p>
        </div>

        <div class="notification-box">
            <div class="notification-date">📅 November 10, 2024</div>
            <div class="notification-title">Examination Application Deadline Extended</div>
            <p style="margin: 8px 0; color: #555;">Due to technical issues, the examination application deadline has been extended to November 15, 2024. Students are requested to apply before the new deadline.</p>
        </div>

        <div class="notification-box">
            <div class="notification-date">📅 November 1, 2024</div>
            <div class="notification-title">Odd Semester Examination Application Open</div>
            <p style="margin: 8px 0; color: #555;">The application window for odd semester examinations is now open. Students can submit their applications through the examination portal.</p>
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
