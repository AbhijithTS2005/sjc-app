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
                <h1 class="page-title">Academic Activities Audit (AAA)</h1>
                
                <div class="info-box">
                    <p>Academic Activities Audit is a systematic review of academic programs, teaching-learning processes, and student outcomes to ensure quality and effectiveness of academic delivery.</p>
                </div>

                <h3>Purpose of AAA</h3>
                <p>The Academic Activities Audit serves to:</p>
                <ul>
                    <li>Assess the effectiveness of academic programs</li>
                    <li>Evaluate teaching methodologies and learning outcomes</li>
                    <li>Review curriculum alignment with course objectives</li>
                    <li>Analyze student performance and progression</li>
                    <li>Identify gaps between intended and actual outcomes</li>
                    <li>Recommend improvements for academic excellence</li>
                    <li>Ensure compliance with academic standards</li>
                </ul>

                <h3>Scope of AAA</h3>
                <p>The audit covers:</p>
                <ul>
                    <li>Course design and curriculum</li>
                    <li>Teaching delivery and pedagogy</li>
                    <li>Assessment and evaluation methods</li>
                    <li>Learning resources and support</li>
                    <li>Student attendance and engagement</li>
                    <li>Academic performance analysis</li>
                    <li>Faculty professional development</li>
                    <li>Infrastructure and facilities</li>
                </ul>

                <h3>AAA Process</h3>
                <p>Academic Activities Audit follows these steps:</p>
                <ol style="margin-left: 30px;">
                    <li>Planning and preparation of audit schedule</li>
                    <li>Data collection from departments and courses</li>
                    <li>Document review and analysis</li>
                    <li>Student and faculty interviews/surveys</li>
                    <li>Facility and resource assessment</li>
                    <li>Compilation of audit findings</li>
                    <li>Recommendation development</li>
                    <li>Report preparation and presentation</li>
                </ol>

                <h3>Department-wise AAA</h3>
                <p>Periodic academic audit is conducted for all academic departments to assess:</p>
                <ul>
                    <li>Course delivery and coverage</li>
                    <li>Learning outcome attainment</li>
                    <li>Assessment practices</li>
                    <li>Student feedback and satisfaction</li>
                    <li>Research and scholarly activities</li>
                    <li>Industry interaction and placement</li>
                </ul>

                <h3>AAA Reports and Outcomes</h3>
                <p>Recent Academic Activities Audit reports:</p>
                <ul>
                    <li><a href="#">Department-wise AAA 2023-2024</a></li>
                    <li><a href="#">Academic Performance Analysis</a></li>
                    <li><a href="#">Learning Outcome Assessment Report</a></li>
                    <li><a href="#">Curriculum Review and Recommendations</a></li>
                </ul>

                <h3>Implementation of AAA Recommendations</h3>
                <p>Recommendations from AAA are implemented through:</p>
                <ul>
                    <li>Departmental action plans</li>
                    <li>Curriculum revision</li>
                    <li>Teaching methodology enhancement</li>
                    <li>Resource allocation</li>
                    <li>Faculty development programs</li>
                    <li>Student support services improvement</li>
                    <li>Regular monitoring and evaluation</li>
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
                    <li><a href="{{ route('iqac.minutes') }}"><i class="fas fa-clipboard-list"></i> Minutes</a></li>
                    <li><a href="{{ route('iqac.reports') }}"><i class="fas fa-chart-bar"></i> Reports</a></li>
                    <li><a href="{{ route('iqac.feedback') }}"><i class="fas fa-comment-dots"></i> Feedback</a></li>
                    <li><a href="{{ route('iqac.best-practices') }}"><i class="fas fa-star"></i> Best Practices</a></li>
                    <li><a href="{{ route('iqac.aaa') }}" class="active-link"><i class="fas fa-graduation-cap"></i> AAA</a></li>
                    <li><a href="{{ route('iqac.po-pso-co') }}"><i class="fas fa-tasks"></i> PO/PSO/CO</a></li>
                </ul>
            </div>
        </aside>
    </div>
@endsection
