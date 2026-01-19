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
                <h1 class="page-title">Stakeholder Feedback</h1>
                
                <div class="info-box">
                    <p>Feedback collection and analysis from all stakeholders is a key component of IQAC's quality assurance mechanisms. Stakeholder input drives institutional improvement initiatives.</p>
                </div>

                <h3>Feedback Collection Process</h3>
                <p>IQAC implements systematic feedback mechanisms to gather inputs from all stakeholders including students, faculty, staff, parents, alumni, and employers. This feedback is analyzed and used to inform institutional policies and improvement strategies.</p>

                <h3>Types of Feedback</h3>
                <ul>
                    <li><strong>Student Feedback:</strong> On teaching quality, curriculum, campus facilities, and student services</li>
                    <li><strong>Faculty Feedback:</strong> On institutional support, resources, and working conditions</li>
                    <li><strong>Staff Feedback:</strong> On administrative processes and workplace environment</li>
                    <li><strong>Alumni Feedback:</strong> On curriculum relevance and career outcomes</li>
                    <li><strong>Employer Feedback:</strong> On graduate competencies and skills</li>
                    <li><strong>Parent Feedback:</strong> On student development and institutional services</li>
                </ul>

                <h3>Feedback Mechanisms</h3>
                <p>Feedback is collected through:</p>
                <ul>
                    <li>Online survey forms</li>
                    <li>Focus group discussions</li>
                    <li>Personal interviews</li>
                    <li>Suggestion boxes</li>
                    <li>Email and other digital channels</li>
                    <li>Departmental meetings</li>
                </ul>

                <h3>Feedback Analysis and Action</h3>
                <p>Collected feedback is:</p>
                <ul>
                    <li>Compiled and categorized</li>
                    <li>Analyzed quantitatively and qualitatively</li>
                    <li>Shared with relevant departments</li>
                    <li>Incorporated into action plans</li>
                    <li>Monitored for implementation</li>
                    <li>Documented for accreditation purposes</li>
                </ul>

                <h3>Recent Feedback Survey Results</h3>
                <p>Latest feedback survey reports:</p>
                <ul>
                    <li><a href="#">Student Satisfaction Survey 2024 - Results</a></li>
                    <li><a href="#">Faculty Feedback Report 2024</a></li>
                    <li><a href="#">Alumni Feedback Survey 2024</a></li>
                    <li><a href="#">Employer Feedback Report 2024</a></li>
                </ul>

                <h3>Feedback Portal</h3>
                <p>Students and faculty can provide real-time feedback through our online feedback portal. Anonymous feedback is encouraged to ensure honest and constructive inputs.</p>
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
                    <li><a href="{{ route('iqac.feedback') }}" class="active-link"><i class="fas fa-comment-dots"></i> Feedback</a></li>
                    <li><a href="{{ route('iqac.best-practices') }}"><i class="fas fa-star"></i> Best Practices</a></li>
                    <li><a href="{{ route('iqac.aaa') }}"><i class="fas fa-graduation-cap"></i> AAA</a></li>
                    <li><a href="{{ route('iqac.po-pso-co') }}"><i class="fas fa-tasks"></i> PO/PSO/CO</a></li>
                </ul>
            </div>
        </aside>
    </div>
@endsection
