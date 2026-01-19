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

        /* Fonts */
        .page-container { font-family: 'Poppins', system-ui, -apple-system, sans-serif; }
        .section-header, .sidebar-title { font-family: 'Merriweather', Georgia, serif; }

        .page-container {
            display: flex;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* --- LEFT COLUMN: MAIN CONTENT --- */
        .content-column {
            flex: 3;
            min-width: 0; /* Prevents flex items from overflowing */
        }

        .section-header {
            color: var(--college-blue);
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
            display: inline-block;
        }

        .header-underline {
            width: 100px;
            height: 3px;
            background-color: var(--college-blue);
            margin-bottom: 30px;
        }

        /* Tabs Styling */
        .tab-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
        }

        .tab-btn {
            padding: 10px 25px;
            border-radius: 50px;
            border: 2px solid var(--college-blue);
            background: transparent;
            color: var(--college-blue);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .tab-btn.active {
            background: var(--college-blue);
            color: white;
        }

        .tab-btn:hover {
            background: var(--college-navy);
            border-color: var(--college-navy);
            color: white;
        }

        /* Profiles Grid */
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 30px;
        }

        .admin-card {
            text-align: center;
        }

        .admin-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-bottom: 5px solid var(--college-blue);
            margin-bottom: 15px;
        }

        .admin-name {
            color: var(--college-navy);
            font-weight: 700;
            margin-bottom: 2px;
            font-size: 1.1rem;
        }

        .admin-role {
            color: #666;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        .hidden { display: none; }

        /* --- RIGHT COLUMN: SIDEBAR --- */
        .sidebar-column {
            flex: 1;
            min-width: 280px;
        }

        .sidebar-box {
            background-color: var(--light-gray);
            border-radius: 8px;
            border: 1px solid var(--border-gray);
            position: sticky;
            top: 100px;
            z-index: 1;
        }

        .sidebar-title {
            color: var(--college-blue);
            padding: 20px 25px 5px;
            margin: 0;
        }

        .sidebar-underline {
            height: 3px;
            background-color: var(--college-navy);
            width: 50px;
            margin-left: 25px;
            margin-bottom: 15px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li { border-bottom: 1px solid #e2e8f0; }
        .sidebar-menu li:last-child { border-bottom: none; }

        .sidebar-menu a {
            display: block;
            padding: 12px 25px;
            text-decoration: none;
            color: #555;
            transition: all 0.2s ease;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: var(--college-blue);
            color: white;
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
        <h2 class="section-header">Administration</h2>
        <div class="header-underline"></div>

        <div class="tab-container">
            <button onclick="switchTab('mgmt')" id="btn-mgmt" class="tab-btn active">Management</button>
            <button onclick="switchTab('acad')" id="btn-acad" class="tab-btn">Academic Administration</button>
        </div>

        <div id="content-mgmt" class="admin-grid">
            <div class="admin-card">
                <img src="https://via.placeholder.com/200x250" alt="Manager">
                <p class="admin-name">Rev. Fr. Joseph K.</p>
                <p class="admin-role">Manager</p>
            </div>
            <div class="admin-card">
                <img src="https://via.placeholder.com/200x250" alt="Bursar">
                <p class="admin-name">Rev. Fr. Mathew P.</p>
                <p class="admin-role">Bursar</p>
            </div>
        </div>

        <div id="content-acad" class="admin-grid hidden">
            <div class="admin-card">
                <img src="https://via.placeholder.com/200x250" alt="Principal">
                <p class="admin-name">Dr. Sebastian George</p>
                <p class="admin-role">Principal</p>
            </div>
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

<script>
    function switchTab(type) {
        const mgmtContent = document.getElementById('content-mgmt');
        const acadContent = document.getElementById('content-acad');
        const mgmtBtn = document.getElementById('btn-mgmt');
        const acadBtn = document.getElementById('btn-acad');

        if (type === 'mgmt') {
            mgmtContent.classList.remove('hidden');
            acadContent.classList.add('hidden');
            mgmtBtn.classList.add('active');
            acadBtn.classList.remove('active');
        } else {
            acadContent.classList.remove('hidden');
            mgmtContent.classList.add('hidden');
            acadBtn.classList.add('active');
            mgmtBtn.classList.remove('active');
        }
    }
</script>
@endsection