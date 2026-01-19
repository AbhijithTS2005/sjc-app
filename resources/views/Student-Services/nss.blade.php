@extends('layouts.app')

@push('styles')
    <style>
        :root {
            --college-blue: #003366;
            --light-gray: #f2f5f8;
            --border-gray: #d1d5db;
        }

        .page-container {
            font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            display: flex;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .content-column {
            flex: 3;
        }

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
            top: calc(var(--header-height, 120px) + 20px);
            z-index: 1;
        }

        .sidebar-title {
            color: var(--college-blue);
            font-size: 1.8rem;
            font-weight: 600;
            padding: 20px 25px 5px 25px;
            margin: 0;
            font-family: 'Merriweather', Georgia, serif;
        }

        .sidebar-underline {
            height: 3px;
            background-color: var(--college-blue);
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
            color: var(--college-blue);
            padding-left: 30px;
        }

        .sidebar-menu a.active {
            background-color: var(--college-blue);
            color: white;
            font-weight: 600;
            padding-left: 30px;
        }

        .section-header {
            color: var(--college-blue);
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Merriweather', Georgia, serif;
        }

        .section-header::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background-color: var(--college-blue);
            margin-top: 10px;
            border-radius: 2px;
        }

        .content-text {
            color: #333;
            font-size: 1.05rem;
            line-height: 1.8;
            text-align: justify;
            margin-bottom: 25px;
        }

        .action-btn {
            display: inline-block;
            background-color: var(--college-blue);
            color: white;
            padding: 12px 30px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            margin-top: 15px;
        }

        .action-btn:hover {
            background-color: #002244;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 51, 102, 0.2);
        }

        @media (max-width: 1200px) {
            .page-container {
                gap: 30px;
                padding: 30px 15px;
            }

            .sidebar-column {
                min-width: 250px;
            }

            .sidebar-title {
                font-size: 1.6rem;
                padding: 15px 20px 5px 20px;
            }

            .sidebar-menu a {
                padding: 10px 20px;
                font-size: 0.95rem;
            }

            .section-header {
                font-size: 2rem;
            }

            .content-text {
                font-size: 0.98rem;
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

            .sidebar-title {
                font-size: 1.4rem;
            }

            .sidebar-menu a {
                padding: 10px 20px;
                font-size: 0.9rem;
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
                padding: 12px 15px 3px 15px;
            }

            .sidebar-underline {
                margin-left: 15px;
                width: 30%;
            }

            .sidebar-menu a {
                padding: 8px 15px;
                font-size: 0.85rem;
            }

            .sidebar-menu a:hover {
                padding-left: 20px;
            }

            .action-btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }

            .content-text {
                font-size: 0.9rem;
                line-height: 1.5;
            }
        }

        @media (max-width: 576px) {
            .page-container {
                padding: 10px;
            }

            .section-header {
                font-size: 1.3rem;
                margin-bottom: 12px;
            }

            .sidebar-box {
                margin-bottom: 15px;
            }

            .sidebar-title {
                font-size: 1rem;
                padding: 10px 12px 2px 12px;
            }

            .sidebar-underline {
                margin-left: 12px;
            }

            .sidebar-menu a {
                padding: 7px 12px;
                font-size: 0.8rem;
            }

            .sidebar-menu a:hover,
            .sidebar-menu a.active {
                padding-left: 15px;
            }

            .action-btn {
                padding: 8px 16px;
                font-size: 0.85rem;
            }

            .content-text {
                font-size: 0.85rem;
                line-height: 1.4;
            }
        }

        @media (max-width: 480px) {
            .page-container {
                padding: 8px;
            }

            .section-header {
                font-size: 1.1rem;
                margin-bottom: 10px;
            }

            .sidebar-title {
                font-size: 0.95rem;
                padding: 8px 10px 2px 10px;
            }

            .sidebar-menu {
                max-height: 300px;
                overflow-y: auto;
            }

            .sidebar-menu a {
                padding: 6px 10px;
                font-size: 0.75rem;
            }

            .action-btn {
                padding: 7px 14px;
                font-size: 0.8rem;
                width: 100%;
            }

            .content-text {
                font-size: 0.8rem;
                line-height: 1.3;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-container">
        <div class="content-column">
            <h1 class="section-header">National Service Scheme (NSS)</h1>
            
            <p class="content-text">
                The National Service Scheme (NSS) at St. Joseph's College Moolamattom is dedicated to fostering social responsibility and community engagement among students. Through various initiatives and community service programs, NSS aims to develop the personality of students through community engagement.
            </p>

            <p class="content-text">
                Our NSS unit organizes regular activities focused on environmental conservation, health and hygiene awareness, education support, and disaster relief. Students participate actively in community development projects that make a tangible difference in the lives of people around us.
            </p>

            <a href="#" class="action-btn">
                <i class="fas fa-file-pdf"></i> View NSS Document
            </a>
        </div>

        <div class="sidebar-column">
            <div class="sidebar-box">
                <h3 class="sidebar-title">Student Services</h3>
                <div class="sidebar-underline"></div>
                
                <ul class="sidebar-menu">
                    <li><a href="{{ route('student-services.nss') }}" class="{{ Route::is('student-services.nss') ? 'active' : '' }}">NSS</a></li>
                    <li><a href="{{ route('student-services.ncc') }}" class="{{ Route::is('student-services.ncc') ? 'active' : '' }}">NCC</a></li>
                    <li><a href="{{ route('student-services.placement') }}" class="{{ Route::is('student-services.placement') ? 'active' : '' }}">Placement Cell</a></li>
                    <li><a href="{{ route('student-services.mentoring') }}" class="{{ Route::is('student-services.mentoring') ? 'active' : '' }}">Mentoring</a></li>
                    <li><a href="{{ route('student-services.grc') }}" class="{{ Route::is('student-services.grc') ? 'active' : '' }}">GRC</a></li>
                    <li><a href="{{ route('student-services.endowments') }}" class="{{ Route::is('student-services.endowments') ? 'active' : '' }}">Endowments</a></li>
                    <li><a href="{{ route('student-services.clubs') }}" class="{{ Route::is('student-services.clubs') ? 'active' : '' }}">Clubs</a></li>
                    <li><a href="{{ route('student-services.asap') }}" class="{{ Route::is('student-services.asap') ? 'active' : '' }}">ASAP</a></li>
                    <li><a href="{{ route('student-services.anti-ragging') }}" class="{{ Route::is('student-services.anti-ragging') ? 'active' : '' }}">Anti-Ragging</a></li>
                    <li><a href="{{ route('student-services.pta') }}" class="{{ Route::is('student-services.pta') ? 'active' : '' }}">PTA</a></li>
                    <li><a href="{{ route('student-services.scholarship') }}" class="{{ Route::is('student-services.scholarship') ? 'active' : '' }}">Scholarship</a></li>
                    <li><a href="{{ route('student-services.sc-st-obc') }}" class="{{ Route::is('student-services.sc-st-obc') ? 'active' : '' }}">SC/ST/OBC Cell</a></li>
                    <li><a href="{{ route('student-services.students-aid') }}" class="{{ Route::is('student-services.students-aid') ? 'active' : '' }}">Students Aid Fund</a></li>
                    <li><a href="{{ route('student-services.union') }}" class="{{ Route::is('student-services.union') ? 'active' : '' }}">Union</a></li>
                    <li><a href="{{ route('student-services.women') }}" class="{{ Route::is('student-services.women') ? 'active' : '' }}">Women Cell</a></li>
                    <li><a href="{{ route('student-services.wws') }}" class="{{ Route::is('student-services.wws') ? 'active' : '' }}">WWS</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection