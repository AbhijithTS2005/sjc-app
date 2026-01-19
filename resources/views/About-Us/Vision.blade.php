@extends('layouts.app')

@push('styles')
    <style>
        :root {
            --college-navy: #002147;
            --college-blue: #0056b3;
            --light-gray: #f2f5f8;
            --border-gray: #d1d5db;
            --text-dark: #333333;
            --header-height: 80px;
        }

        /* Use site heading/body font matching Home page */
        .page-container { font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; }
        .section-header, .sidebar-title { font-family: 'Merriweather', Georgia, serif; }

        /* Removed 'body' styles as they conflict with Layout */

        .page-container {
            display: flex;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px; /* Applied padding here instead of body */
        }

        /* --- LEFT COLUMN: MAIN CONTENT --- */
        .content-column {
            flex: 3;
            text-align: left;
        }

        .founder-hero-img {
            width: 100%;
            height: auto;
            background: linear-gradient(to bottom, #ffffff, #eef6fc);
            margin-bottom: 30px;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #eee;
        }

        .founder-hero-img img {
            width: 100%;
            max-height: 450px;
            object-fit: contain; 
            display: block;
        }

        .section-header {
            color: var(--college-blue);
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 5px;
            position: relative;
            display: inline-block;
        }

        .header-underline {
            width: 100%;
            height: 3px;
            background-color: var(--college-blue);
            margin-bottom: 25px;
            border-bottom: 1px solid var(--border-gray);
        }

        .bio-text p {
            margin-bottom: 20px;
            text-align: justify;
            font-size: 1.05rem;
            color: #444;
        }

        /* --- RIGHT COLUMN: SIDEBAR --- */
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
            
            /* Lower the z-index so the menu can overlap it */
            z-index: 1 !important; 
        }

        .sidebar-title {
            color: var(--college-blue);
            font-size: 1.8rem;
            font-weight: 600;
            padding: 20px 25px 5px 25px;
            margin: 0;
        }

        .sidebar-underline {
            height: 3px;
            background-color: var(--college-navy);
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


            .content-column { order: 1; }
        }

        @media (max-width: 1200px) {
            .page-container { gap: 30px; padding: 30px 15px; }
            .section-header { font-size: 2rem; }
        }

        @media (max-width: 992px) {
            .page-container { flex-direction: column; padding: 20px; gap: 20px; }
            .sidebar-column { order: 2; min-width: 100%; }
            .content-column { order: 1; }
            .sidebar-box { position: static; }
            .section-header { font-size: 1.8rem; }
        }

        @media (max-width: 768px) {
            .page-container { padding: 15px; gap: 15px; }
            .section-header { font-size: 1.5rem; margin-bottom: 15px; }
            .sidebar-title { font-size: 1.2rem; }
            .sidebar-menu a { padding: 8px 15px; font-size: 0.85rem; }
            .content-text { font-size: 0.9rem; }
        }

        @media (max-width: 576px) {
            .page-container { padding: 10px; }
            .section-header { font-size: 1.3rem; }
            .sidebar-menu a { padding: 7px 12px; font-size: 0.8rem; }
            .content-text { font-size: 0.85rem; }
        }

        @media (max-width: 480px) {
            .page-container { padding: 8px; }
            .section-header { font-size: 1.1rem; }
            .sidebar-menu a { padding: 6px 10px; font-size: 0.75rem; }
            .content-text { font-size: 0.8rem; }
        }
    </style>
@endpush

@section('content')
<div class="page-container">
    <div class="content-column">
        <div class="founder-hero-img">
            <img src="{{ asset('images/white.png.jpeg') }}" alt="St. Kuriakose Elias Chavara">
        </div>

        <h2 class="section-header">VISION & MISSION</h2>
        <div class="header-underline"></div>

        <div class="bio-text">
 <section>
                    <h2 class="text-xl font-bold text-gray-900 mb-3">Vision</h2>
                    <p class="leading-relaxed text-gray-700  pl-4">
                        Our vision of education is deeply rooted in the broad CMI vision of education which aims at producing intellectually competent, morally upright, socially committed and spiritually inspired men and women inculcating in them a genuine love of God and man and a deep respect for the cultural and spiritual heritage of India.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-gray-900 mb-3">Mission</h2>
                    <p class="leading-relaxed text-gray-700">
                        Keeping in close allegiance with the vision we profess, we intend to discharge the following functions which we consider to be the unique mission of our institution:
                    </p>
                </section>

                <section>
                    <ul class="space-y-4 list-disc pl-6 text-gray-700">
                        <li>To grow as a blessed institution that enables teachers and students to grow in the true love of knowledge and to mould its students as responsible citizens without prejudice or complexes and thereby create a just and humane society where dignity of the human person is respected, unjust social structures are challenged, cultural heritage of ahimsa, religious harmony and national integration are upheld and the poor and the marginalized are specially taken care of.</li>
                        <li>To prepare the youth of the 21st century by promoting international brotherhood, environmental conscience, gender justice and sense of harmony.</li>
                        
                    </ul>
                </section>

        </div>
    </div>

    <div class="sidebar-column">
        <div class="sidebar-box">
            <h3 class="sidebar-title">About Us</h3>
            <div class="sidebar-underline"></div>
            
            <ul class="sidebar-menu">
                <li><a href="{{ route('anthem') }}" class="{{ Route::is('anthem') ? 'active' : '' }}">Anthem</a></li>
                <li><a href="{{ route('profile') }}" class="{{ Route::is('profile') ? 'active' : '' }}">Profile</a></li>
                <li><a href="{{ route('founder') }}" class="{{ Route::is('founder') ? 'active' : '' }}">Founder</a></li> 
                <li><a href="{{ route('administration') }}" class="{{ Route::is('administration') ? 'active' : '' }}">Administration</a></li>
                <li><a href="{{ route('history') }}" class="{{ Route::is('history') ? 'active' : '' }}">History</a></li>
                <li><a href="{{ route('vision') }}" class="{{ Route::is('vision') ? 'active' : '' }}">Vision</a></li>
                <li><a href="{{ route('principal') }}" class="{{ Route::is('principal') ? 'active' : '' }}">Principal</a></li>
                 <li><a href="{{ route('rules') }}" class="{{ Route::is('rules') ? 'active' : '' }}">Our Rules</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection