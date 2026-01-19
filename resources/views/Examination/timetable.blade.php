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

        .timetable-download {
            background: #e8f4f8;
            border-left: 4px solid #003366;
            padding: 15px 20px;
            margin: 15px 0;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .timetable-item {
            flex: 1;
        }

        .timetable-item h4 {
            color: #003366;
            margin: 0 0 5px 0;
            font-weight: 600;
        }

        .timetable-item p {
            margin: 0;
            color: #555;
            font-size: 0.9rem;
        }

        .download-btn {
            background: #003366;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .download-btn:hover {
            background: #002147;
            transform: translateY(-2px);
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

            .timetable-download {
                flex-direction: column;
                gap: 15px;
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
        <h2 class="section-header">Examination Timetable</h2>
        <div class="header-underline"></div>

        <div class="content-text">
            <p>
                The examination timetables for different semesters and programs are available below. 
                Please download your specific timetable and note all the examination dates and times carefully.
            </p>
        </div>

        <div class="timetable-download">
            <div class="timetable-item">
                <h4>1st Semester Timetable</h4>
                <p>Theory Examination - Odd Semester 2024-2025</p>
            </div>
            <a href="#" class="download-btn"><i class="fas fa-download"></i> Download</a>
        </div>

        <div class="timetable-download">
            <div class="timetable-item">
                <h4>2nd Semester Timetable</h4>
                <p>Theory Examination - Even Semester 2024-2025</p>
            </div>
            <a href="#" class="download-btn"><i class="fas fa-download"></i> Download</a>
        </div>

        <div class="timetable-download">
            <div class="timetable-item">
                <h4>3rd Semester Timetable</h4>
                <p>Theory Examination - Odd Semester 2024-2025</p>
            </div>
            <a href="#" class="download-btn"><i class="fas fa-download"></i> Download</a>
        </div>

        <div class="timetable-download">
            <div class="timetable-item">
                <h4>4th Semester Timetable</h4>
                <p>Theory Examination - Even Semester 2024-2025</p>
            </div>
            <a href="#" class="download-btn"><i class="fas fa-download"></i> Download</a>
        </div>

        <div class="content-text" style="margin-top: 30px;">
            <h3 style="color: #003366; margin-bottom: 15px;">Important Instructions</h3>
            <ul style="margin-left: 20px;">
                <li style="margin-bottom: 10px;">Check your timetable carefully and note all examination dates and times</li>
                <li style="margin-bottom: 10px;">Arrive 15 minutes before your examination starts</li>
                <li style="margin-bottom: 10px;">Bring your admit card and valid ID proof</li>
                <li style="margin-bottom: 10px;">Any discrepancy should be reported to the Academic Office immediately</li>
            </ul>
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
