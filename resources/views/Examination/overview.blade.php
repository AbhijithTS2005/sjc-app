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
            position: relative;
            display: inline-block;
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

            .section-header {
                font-size: 2rem;
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

            .content-column {
                order: 1;
            }

            .sidebar-box {
                position: static;
            }

            .section-header {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 768px) {
            .page-container {
                padding: 15px;
                gap: 15px;
            }

            .section-header {
                font-size: 1.5rem;
                margin-bottom: 15px;
            }

            .sidebar-title {
                font-size: 1.2rem;
            }

            .sidebar-menu a {
                padding: 8px 15px;
                font-size: 0.85rem;
            }

            .content-text {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .page-container {
                padding: 10px;
            }

            .section-header {
                font-size: 1.3rem;
            }

            .sidebar-menu a {
                padding: 7px 12px;
                font-size: 0.8rem;
            }

            .content-text {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            .page-container {
                padding: 8px;
            }

            .section-header {
                font-size: 1.1rem;
            }

            .sidebar-menu a {
                padding: 6px 10px;
                font-size: 0.75rem;
            }

            .content-text {
                font-size: 0.8rem;
            }
        }
    </style>
@endpush

@section('content')
<div class="page-container">
    <div class="content-column">
        <h2 class="section-header">Examination Overview</h2>
        <div class="header-underline"></div>

        <div class="content-text">
            <p>
                St. Joseph's College Moolamattom conducts examinations following strict academic standards and regulations. 
                Our examination system is designed to assess student learning outcomes comprehensively and fairly.
            </p>
        </div>

        <div class="content-text">
            <h3 style="color: #003366; margin-top: 25px; margin-bottom: 15px;">Examination System</h3>
            <p>
                The college follows a semester-based examination system. Examinations are conducted at the end of each semester 
                to evaluate student performance in both theory and practical components of their courses. All examinations are 
                governed by the regulations of the respective affiliating universities.
            </p>
        </div>

        <div class="content-text">
            <h3 style="color: #003366; margin-top: 25px; margin-bottom: 15px;">Important Information</h3>
            <ul style="margin-left: 20px; color: #444;">
                <li style="margin-bottom: 10px;">Students must maintain the required attendance to be eligible for examinations</li>
                <li style="margin-bottom: 10px;">Examination schedule and guidelines are published well in advance</li>
                <li style="margin-bottom: 10px;">Regular updates about exam notifications are available in the notification section</li>
                <li style="margin-bottom: 10px;">Timetables and guidelines must be referred before the examination</li>
                <li>Students can apply for examinations through the designated application portal</li>
            </ul>
        </div>

        <div class="content-text">
            <h3 style="color: #003366; margin-top: 25px; margin-bottom: 15px;">Accessing Examination Resources</h3>
            <p>
                Use the sidebar menu to navigate to different examination-related resources. Each section provides specific 
                information about examination schedules, guidelines, applications, and important notices. For any queries or concerns 
                regarding examinations, please contact the Academic Office.
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
