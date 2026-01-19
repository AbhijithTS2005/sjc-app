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

        .application-section {
            background: #f8f9fa;
            border-left: 4px solid #003366;
            padding: 20px;
            margin: 15px 0;
            border-radius: 4px;
        }

        .application-section h4 {
            color: #003366;
            margin-top: 0;
            font-weight: 600;
        }

        .app-btn {
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
            margin-top: 10px;
        }

        .app-btn:hover {
            background: #002147;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
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
        <h2 class="section-header">Examination Application</h2>
        <div class="header-underline"></div>

        <div class="content-text">
            <p>
                Students must apply for examinations within the specified deadline. The application form is available 
                online through the student portal. Ensure all details are entered correctly before submission.
            </p>
        </div>

        <div class="application-section">
            <h4>🔗 Apply for Odd Semester Examination 2024-2025</h4>
            <p>
                Applications for the odd semester (1st and 3rd semester) examinations are currently closed. 
                The next application window for even semester examinations will open in March 2025.
            </p>
            <button class="app-btn" disabled style="opacity: 0.6; cursor: not-allowed;">Application Closed</button>
        </div>

        <div class="application-section">
            <h4>📋 How to Apply</h4>
            <ol style="margin: 10px 0;">
                <li>Log in to your student portal using your registration number and password</li>
                <li>Navigate to the "Examination" section</li>
                <li>Click on "Apply for Examination"</li>
                <li>Select the semester and courses you want to appear in</li>
                <li>Verify all details and submit the application</li>
                <li>Pay the examination fee as per the college guidelines</li>
                <li>Take a screenshot of the application confirmation for your records</li>
            </ol>
        </div>

        <div class="application-section">
            <h4>⚠️ Important Deadlines</h4>
            <p>
                <strong>Even Semester (2nd & 4th): March 2025</strong><br>
                Application Open: March 1 - March 15, 2025<br>
                Late Application: March 16 - March 20, 2025 (with late fee)<br>
                <br>
                <strong>Odd Semester (1st & 3rd): September 2025</strong><br>
                Application Open: September 1 - September 15, 2025<br>
                Late Application: September 16 - September 20, 2025 (with late fee)
            </p>
        </div>

        <div class="application-section">
            <h4>💳 Examination Fee</h4>
            <p>
                The examination fee is applicable to all candidates appearing for the examination. 
                The fee structure is as follows:
            </p>
            <ul style="margin: 10px 0 10px 20px;">
                <li>Regular Students: ₹500 per semester</li>
                <li>Late Application: ₹750 per semester (additional ₹250 late fee)</li>
                <li>Payment Mode: Online transfer to college account</li>
            </ul>
        </div>

        <div class="application-section">
            <h4>❓ Frequently Asked Questions</h4>
            <p><strong>Q: Can I change my registered courses after submitting the application?</strong><br>
            A: No, once submitted, the application cannot be modified. You must withdraw and reapply if changes are needed.</p>
            <p><strong>Q: What if I miss the application deadline?</strong><br>
            A: Late applications will be accepted until the late deadline with an additional fee. After that, you cannot appear for the examination.</p>
            <p><strong>Q: How will I receive my admit card?</strong><br>
            A: The admit card will be available for download from the student portal 7 days before the examination.</p>
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
