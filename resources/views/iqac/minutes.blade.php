@extends('layouts.app')

@push('styles')
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f4f4f4; color: #333; line-height: 1.6; }
        .container { display: grid; grid-template-columns: 3fr 1.2fr; gap: 30px; padding: 40px; max-width: 1500px; margin: 0 auto; }
        .content-block { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .page-title { color: var(--college-blue); font-size: 2rem; border-bottom: 2px solid var(--accent-gold); padding-bottom: 15px; margin-bottom: 25px; }
        .sidebar { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border: 1px solid #e0e0e0; }
        .sidebar-section { margin-bottom: 30px; }
        .sidebar-title { font-size: 1.2rem; font-weight: 700; color: var(--college-blue); margin-bottom: 15px; border-bottom: 2px solid var(--accent-gold); padding-bottom: 5px; }
        .sidebar-links { list-style: none; padding: 0; }
        .sidebar-links li { margin-bottom: 8px; }
        .sidebar-links a { display: block; padding: 8px 12px; border-radius: 4px; transition: all 0.3s ease; font-size: 0.95rem; text-decoration: none; color: #333; }
        .sidebar-links a:hover { background: var(--college-blue); color: #fff; transform: translateX(5px); }
        .active-link { color: var(--college-blue) !important; font-weight: bold; }
        h3 { color: var(--college-blue); margin: 20px 0 15px 0; }
        p { text-align: justify; line-height: 1.8; color: #555; margin-bottom: 15px; }
        ul { margin: 15px 0 15px 30px; }
        ul li { margin-bottom: 10px; text-align: justify; }
        .info-box { background: #e8f4f8; border-left: 4px solid var(--college-blue); padding: 15px; margin: 20px 0; border-radius: 4px; }
        @media (max-width: 1200px) { .container { grid-template-columns: 3fr 1fr; } }
        @media (max-width: 992px) { .container { grid-template-columns: 1fr; } footer { grid-template-columns: 1fr 1fr !important; } }
        @media (max-width: 768px) { footer { grid-template-columns: 1fr !important; } }
    </style>
@endpush

@section('content')
    <div class="container">
        <main>
            <div class="content-block">
                <h1 class="page-title">IQAC Meeting Minutes</h1>
                
                <div class="info-box">
                    <p>Meeting minutes document the discussions, decisions, and action items from IQAC committee meetings. These records provide transparency and accountability in quality assurance processes.</p>
                </div>

                <h3>About Meeting Minutes</h3>
                <p>IQAC conducts bi-monthly meetings to review institutional quality metrics, discuss improvement strategies, and coordinate quality enhancement activities. Meeting minutes serve as official records of these deliberations.</p>

                <h3>Meeting Minutes Archives</h3>
                <p>Recent IQAC meeting minutes are available below:</p>
                <ul>
                    <li><a href="#">IQAC Meeting Minutes - January 2026</a></li>
                    <li><a href="#">IQAC Meeting Minutes - November 2025</a></li>
                    <li><a href="#">IQAC Meeting Minutes - September 2025</a></li>
                    <li><a href="#">IQAC Meeting Minutes - July 2025</a></li>
                    <li><a href="#">IQAC Meeting Minutes - May 2025</a></li>
                </ul>

                <h3>Meeting Schedule</h3>
                <p>IQAC meets bi-monthly for regular discussions and quarterly for comprehensive reviews. Special meetings are convened as needed for accreditation and emergent quality matters.</p>

                <h3>Agenda Items Typically Covered</h3>
                <ul>
                    <li>Review of institutional quality metrics</li>
                    <li>Academic performance analysis</li>
                    <li>Student feedback and satisfaction</li>
                    <li>Faculty development initiatives</li>
                    <li>Research and innovation updates</li>
                    <li>Infrastructure and resource assessment</li>
                    <li>Accreditation preparation</li>
                    <li>Quality improvement action plans</li>
                </ul>

                <h3>How to Access Minutes</h3>
                <p>Official meeting minutes are maintained by the IQAC office and can be accessed through:</p>
                <ul>
                    <li>IQAC Office (Main Building, First Floor)</li>
                    <li>Email: iqac@college.ac.in</li>
                    <li>College Administration</li>
                </ul>
            </div>
        </main>

        <aside class="sidebar">
            <div class="sidebar-section">
                <h3 class="sidebar-title"><i class="fas fa-cog"></i> IQAC Menu</h3>
                <ul class="sidebar-links">
                    <li><a href="{{ route('iqac.index') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="{{ route('iqac.about') }}"><i class="fas fa-info-circle"></i> About IQAC</a></li>
                    <li><a href="{{ route('iqac.committee') }}"><i class="fas fa-users"></i> Committee</a></li>
                    <li><a href="{{ route('iqac.objectives') }}"><i class="fas fa-bullseye"></i> Objectives</a></li>
                    <li><a href="{{ route('iqac.documents') }}"><i class="fas fa-file-pdf"></i> AQAR</a></li>
                    <li><a href="{{ route('iqac.ssr') }}"><i class="fas fa-file-alt"></i> SSR</a></li>
                    <li><a href="{{ route('iqac.iiqa') }}"><i class="fas fa-check-circle"></i> IIQA</a></li>
                    <li><a href="{{ route('iqac.minutes') }}" class="active-link"><i class="fas fa-clipboard-list"></i> Minutes</a></li>
                    <li><a href="{{ route('iqac.reports') }}"><i class="fas fa-chart-bar"></i> Reports</a></li>
                    <li><a href="{{ route('iqac.feedback') }}"><i class="fas fa-comment-dots"></i> Feedback</a></li>
                    <li><a href="{{ route('iqac.best-practices') }}"><i class="fas fa-star"></i> Best Practices</a></li>
                    <li><a href="{{ route('iqac.aaa') }}"><i class="fas fa-graduation-cap"></i> AAA</a></li>
                    <li><a href="{{ route('iqac.po-pso-co') }}"><i class="fas fa-tasks"></i> PO/PSO/CO</a></li>
                </ul>
            </div>
        </aside>
    </div>
@endsection
