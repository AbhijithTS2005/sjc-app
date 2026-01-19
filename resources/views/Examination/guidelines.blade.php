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

        .guideline-box {
            background: #f8f9fa;
            border-left: 4px solid #003366;
            padding: 15px 20px;
            margin: 15px 0;
            border-radius: 4px;
        }

        .guideline-box h4 {
            color: #003366;
            margin: 0 0 10px 0;
            font-weight: 600;
        }

        .guideline-box ul {
            margin: 0;
            padding-left: 20px;
        }

        .guideline-box li {
            margin-bottom: 8px;
            color: #555;
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
        <h2 class="section-header">Examination Guidelines</h2>
        <div class="header-underline"></div>

        <div class="content-text">
            <p>
                All students appearing for examinations are required to follow these guidelines strictly. 
                Violation of any guideline may result in disciplinary action.
            </p>
        </div>

        <div class="guideline-box">
            <h4>📋 Eligibility Criteria</h4>
            <ul>
                <li>Student must have a minimum attendance of 75% in the course</li>
                <li>All internal assessments must be completed</li>
                <li>No outstanding dues with the college</li>
                <li>Exam fee must be paid before the application deadline</li>
            </ul>
        </div>

        <div class="guideline-box">
            <h4>🎫 Documents Required</h4>
            <ul>
                <li>Valid Student ID Card (Must carry original)</li>
                <li>Admit Card (Download from student portal)</li>
                <li>Any other valid government-issued ID</li>
                <li>Blue or black ballpoint pen</li>
            </ul>
        </div>

        <div class="guideline-box">
            <h4>⏰ Examination Hall Rules</h4>
            <ul>
                <li>Arrive at least 15 minutes before exam start time</li>
                <li>Mobile phones and electronic devices are strictly prohibited</li>
                <li>No talking or communication during the examination</li>
                <li>Write only on the answer sheet provided</li>
                <li>Do not tear or damage the answer sheet</li>
            </ul>
        </div>

        <div class="guideline-box">
            <h4>⛔ Misconduct & Malpractice</h4>
            <ul>
                <li>Copying or helping others to copy will be treated as malpractice</li>
                <li>Bringing unauthorized materials is strictly prohibited</li>
                <li>Any malpractice will result in failure and disciplinary action</li>
                <li>Students involved in misconduct may be rusticated</li>
            </ul>
        </div>

        <div class="guideline-box">
            <h4>📝 Special Circumstances</h4>
            <ul>
                <li>Students with medical conditions must inform the exam office with medical certificate</li>
                <li>Extra time may be granted to students with disabilities as per university norms</li>
                <li>Separate examination hall may be arranged if required</li>
                <li>Contact the Academic Office for any special accommodations needed</li>
            </ul>
        </div>

        <div class="guideline-box">
            <h4>📞 Important Contacts</h4>
            <ul>
                <li>Academic Office: exam@sjcmoolamattom.edu.in</li>
                <li>Office Phone: Available upon request</li>
                <li>Office Hours: 9:00 AM to 4:00 PM (Monday to Friday)</li>
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
