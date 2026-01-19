@extends('layouts.app')

@push('styles')
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f4f4f4; color: #333; line-height: 1.6; }

        .container {
            display: grid;
            grid-template-columns: 3fr 1.2fr;
            gap: 30px;
            padding: 40px;
            max-width: 1500px;
            margin: 0 auto;
        }

        .content-block { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .page-title { color: var(--college-blue); font-size: 2rem; border-bottom: 2px solid var(--accent-gold); padding-bottom: 15px; margin-bottom: 25px; }

        .sidebar { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border: 1px solid #e0e0e0; }
        .sidebar-section { margin-bottom: 30px; }
        .sidebar-title { font-size: 1.2rem; font-weight: 700; color: var(--college-blue); margin-bottom: 15px; border-bottom: 2px solid var(--accent-gold); padding-bottom: 5px; }
        .sidebar-links { list-style: none; padding: 0; }
        .sidebar-links li { margin-bottom: 8px; }
        .sidebar-links a { display: block; padding: 8px 12px; border-radius: 4px; transition: all 0.3s ease; font-size: 0.95rem; text-decoration: none; color: #333; }
        .sidebar-links a:hover { background: var(--college-blue); color: #fff; transform: translateX(5px); }
        .sidebar-links a i { margin-right: 8px; width: 16px; }
        .active-link { color: var(--college-blue) !important; font-weight: bold; }

        .iqac-intro { background: #f0f8ff; padding: 20px; border-left: 4px solid var(--college-blue); margin-bottom: 25px; border-radius: 4px; }
        .iqac-intro h3 { color: var(--college-blue); margin-bottom: 10px; }
        .iqac-intro p { text-align: justify; line-height: 1.8; color: #555; }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin: 25px 0;
        }

        .feature-card {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 6px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            border-color: var(--college-blue);
        }

        .feature-card h4 {
            color: var(--college-blue);
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .feature-card p {
            font-size: 0.9rem;
            color: #666;
            text-align: justify;
        }

        h3 { color: var(--college-blue); margin: 20px 0 15px 0; }
        p { text-align: justify; line-height: 1.8; color: #555; margin-bottom: 15px; }
        ul { margin: 15px 0 15px 30px; }
        ul li { margin-bottom: 10px; text-align: justify; }

        @media (max-width: 1200px) { .container { grid-template-columns: 3fr 1fr; gap: 25px; padding: 30px 20px; } }
        @media (max-width: 992px) { .container { grid-template-columns: 1fr; gap: 20px; padding: 25px 15px; } .features-grid { grid-template-columns: 1fr; } footer { grid-template-columns: 1fr 1fr !important; } }
        @media (max-width: 768px) { footer { grid-template-columns: 1fr !important; } }
        @media (max-width: 768px) { .container { grid-template-columns: 1fr; padding: 20px 10px; gap: 15px; } .page-title { font-size: 1.6rem; } .content-block { padding: 15px; } }
        @media (max-width: 576px) { .container { grid-template-columns: 1fr; padding: 15px 8px; gap: 10px; } .page-title { font-size: 1.3rem; } .content-block { padding: 12px; } }
    </style>
@endpush

@section('content')

    <div class="container">
        <main>
            <div class="content-block">
                <h1 class="page-title">IQAC - Internal Quality Assurance Cell</h1>

                <div class="iqac-intro">
                    <h3>About IQAC</h3>
                    <p>The Internal Quality Assurance Cell (IQAC) is a dedicated unit established to ensure continuous quality improvement in academic and administrative processes of the college. IQAC serves as a driving force for quality enhancement and institutional development through systematic approaches to teaching, learning, research, and overall institutional functioning.</p>
                </div>

                <h3>Vision</h3>
                <p>To establish St. Joseph's College as an institution of academic excellence, fostering quality education, research, and innovation while maintaining the highest standards of ethics and social responsibility.</p>

                <h3>Mission</h3>
                <p>The mission of IQAC is to:</p>
                <ul>
                    <li>Monitor, evaluate, and facilitate quality improvement in all academic and administrative processes</li>
                    <li>Promote a culture of continuous learning and professional development among faculty and staff</li>
                    <li>Ensure compliance with accreditation standards and quality benchmarks set by regulatory bodies</li>
                    <li>Conduct periodic reviews of institutional performance and develop strategies for enhancement</li>
                    <li>Foster stakeholder engagement and feedback mechanisms for institutional accountability</li>
                    <li>Promote research, innovation, and scholarship among faculty and students</li>
                </ul>

                <h3>Core Objectives</h3>
                <div class="features-grid">
                    <div class="feature-card">
                        <h4>Quality Monitoring</h4>
                        <p>Systematic monitoring and evaluation of academic programs, teaching methodologies, and learning outcomes to ensure institutional standards are maintained and exceeded.</p>
                    </div>
                    <div class="feature-card">
                        <h4>Accreditation Support</h4>
                        <p>Preparation and coordination of institutional accreditation processes, including NAAC assessment, to maintain and enhance the college's accreditation status.</p>
                    </div>
                    <div class="feature-card">
                        <h4>Feedback Mechanism</h4>
                        <p>Implementation of robust feedback systems from students, faculty, employers, and alumni to identify areas for improvement and develop action plans.</p>
                    </div>
                    <div class="feature-card">
                        <h4>Professional Development</h4>
                        <p>Coordination of faculty development programs, workshops, and training to enhance teaching effectiveness and professional competencies.</p>
                    </div>
                </div>

                <h3>Key Functions of IQAC</h3>
                <ul>
                    <li>Facilitate academic planning and institutional development</li>
                    <li>Conduct regular institutional assessments and prepare Annual Quality Assurance Reports (AQAR)</li>
                    <li>Develop and implement quality enhancement strategies</li>
                    <li>Coordinate with department heads for subject-specific quality improvement</li>
                    <li>Conduct student satisfaction surveys and learning outcome assessments</li>
                    <li>Organize seminars and workshops for faculty development</li>
                    <li>Maintain documentation and records related to quality assurance activities</li>
                    <li>Support research initiatives and innovation projects</li>
                </ul>
            </div>
        </main>

        <aside class="sidebar">
            <div class="sidebar-section">
                <h3 class="sidebar-title"><i class="fas fa-cog"></i> IQAC Menu</h3>
                <ul class="sidebar-links">
                    <li><a href="{{ route('iqac.index') }}" class="active-link"><i class="fas fa-home"></i> Home</a></li>
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
                    <li><a href="{{ route('iqac.aaa') }}"><i class="fas fa-graduation-cap"></i> AAA</a></li>
                    <li><a href="{{ route('iqac.po-pso-co') }}"><i class="fas fa-tasks"></i> PO/PSO/CO</a></li>
                </ul>
            </div>
        </aside>
    </div>

@endsection
