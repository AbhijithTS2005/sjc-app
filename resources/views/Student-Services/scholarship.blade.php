@extends('layouts.app')

@push('styles')
    <style>
        :root {
            --college-blue: #003366;
            --light-gray: #f2f5f8;
        }

        .page-container {
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


            .content-column { order: 1; }
        }

        @media (max-width: 1200px) {
            .page-container { gap: 30px; padding: 30px 15px; }
            .section-header { font-size: 2rem; }
            .sidebar-title { font-size: 1.6rem; }
            .sidebar-menu a { font-size: 0.95rem; }
        }

        @media (max-width: 992px) {
            .page-container { flex-direction: column; padding: 20px; gap: 20px; }
            .sidebar-column { order: 2; min-width: 100%; }
            .content-column { order: 1; }
            .sidebar-box { position: static; }
            .section-header { font-size: 1.8rem; }
            .sidebar-title { font-size: 1.4rem; }
        }

        @media (max-width: 768px) {
            .page-container { padding: 15px; gap: 15px; }
            .section-header { font-size: 1.5rem; margin-bottom: 15px; }
            .sidebar-title { font-size: 1.2rem; }
            .sidebar-menu a { padding: 8px 15px; font-size: 0.85rem; }
            .action-btn { font-size: 0.9rem; }
            .content-text { font-size: 0.9rem; }
        }

        @media (max-width: 576px) {
            .page-container { padding: 10px; }
            .section-header { font-size: 1.3rem; }
            .sidebar-title { font-size: 1rem; }
            .sidebar-menu a { padding: 7px 12px; font-size: 0.8rem; }
            .content-text { font-size: 0.85rem; }
        }

        @media (max-width: 480px) {
            .page-container { padding: 8px; }
            .section-header { font-size: 1.1rem; }
            .sidebar-title { font-size: 0.95rem; }
            .sidebar-menu { max-height: 300px; overflow-y: auto; }
            .sidebar-menu a { padding: 6px 10px; font-size: 0.75rem; }
            .action-btn { padding: 7px 14px; width: 100%; }
            .content-text { font-size: 0.8rem; }
        }
    </style>
@endpush

@section('content')
    <div class="page-container">
        <div class="content-column">
            <h1 class="section-header">Scholarship Portal</h1>
            
            <p class="content-text">
                The Scholarship Portal provides information about various scholarship opportunities available to students. It helps students identify and apply for scholarships based on their eligibility criteria and academic performance.
            </p>

            <a href="#" class="action-btn">
                <i class="fas fa-file-pdf"></i> View Document
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
                    <li><a href="{{ route('student-services.clubs') }}" class="{{ Route::is('student-services.clubs') ? 'active' : '' }}">Clubs & Forums</a></li>
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
