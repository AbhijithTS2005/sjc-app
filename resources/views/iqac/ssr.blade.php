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
                <h1 class="page-title">Self Study Report (SSR)</h1>
                
                <div class="info-box">
                    <p>The Self Study Report (SSR) is a comprehensive institutional document prepared by IQAC for NAAC accreditation assessment. It provides a detailed analysis of the college's compliance with quality standards.</p>
                </div>

                <h3>What is SSR?</h3>
                <p>The Self Study Report is a comprehensive self-evaluation document prepared by the institution to assess its strengths, weaknesses, and performance against NAAC criteria. It serves as the primary document for NAAC peer team assessment.</p>

                <h3>SSR Criteria</h3>
                <p>The SSR is evaluated based on 7 criteria:</p>
                <ul>
                    <li><strong>Criterion 1:</strong> Curricular Aspects</li>
                    <li><strong>Criterion 2:</strong> Teaching, Learning and Evaluation</li>
                    <li><strong>Criterion 3:</strong> Research, Innovations and Extension</li>
                    <li><strong>Criterion 4:</strong> Infrastructure and Learning Resources</li>
                    <li><strong>Criterion 5:</strong> Student Support and Progression</li>
                    <li><strong>Criterion 6:</strong> Governance, Leadership and Management</li>
                    <li><strong>Criterion 7:</strong> Institutional Values and Best Practices</li>
                </ul>

                <h3>Current SSR Documents</h3>
                <p>The latest Self Study Reports are available below:</p>
                <ul>
                    <li><a href="#">SSR 2022 - NAAC Accreditation Cycle 2</a></li>
                    <li><a href="#">SSR 2017 - NAAC Accreditation Cycle 1</a></li>
                </ul>

                <h3>SSR Preparation Process</h3>
                <p>The preparation of SSR involves:</p>
                <ul>
                    <li>Comprehensive data collection and analysis</li>
                    <li>Departmental consultations and feedback</li>
                    <li>Stakeholder engagement</li>
                    <li>Documentation and evidence gathering</li>
                    <li>Quality assurance review</li>
                    <li>Final compilation and submission</li>
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
                    <li><a href="{{ route('iqac.ssr') }}" class="active-link"><i class="fas fa-file-alt"></i> SSR</a></li>
                    <li><a href="{{ route('iqac.iiqa') }}"><i class="fas fa-check-circle"></i> IIQA</a></li>
                    <li><a href="{{ route('iqac.minutes') }}"><i class="fas fa-clipboard-list"></i> Minutes</a></li>
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
