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
        .practice-card { background: #f9f9f9; padding: 20px; margin: 15px 0; border-left: 4px solid var(--accent-gold); border-radius: 4px; }
        .practice-card h4 { color: var(--college-blue); margin-bottom: 10px; }
        @media (max-width: 1200px) { .container { grid-template-columns: 3fr 1fr; } }
        @media (max-width: 992px) { .container { grid-template-columns: 1fr; } }
    </style>
@endpush

@section('content')
    <div class="container">
        <main>
            <div class="content-block">
                <h1 class="page-title">Best Practices</h1>
                
                <div class="info-box">
                    <p>Best Practices are innovative and exemplary institutional initiatives that have demonstrated positive impact on quality, efficiency, and effectiveness. These practices serve as models for continuous improvement.</p>
                </div>

                <h3>What are Best Practices?</h3>
                <p>Best Practices refer to proven methodologies, processes, or strategies that have been effective in improving institutional outcomes. These practices are documented, shared, and adapted across departments to promote institutional excellence.</p>

                <h3>Criteria for Best Practices</h3>
                <p>A practice is considered "best" when it:</p>
                <ul>
                    <li>Demonstrates measurable positive outcomes</li>
                    <li>Is innovative and creative</li>
                    <li>Can be sustained and scaled</li>
                    <li>Addresses institutional challenges</li>
                    <li>Involves stakeholder participation</li>
                    <li>Is documented and replicable</li>
                    <li>Has institutional support and resources</li>
                </ul>

                <h3>College Best Practices</h3>

                <div class="practice-card">
                    <h4>Mentoring Program for Student Success</h4>
                    <p>Structured mentoring program pairing senior students with freshers, focusing on academic progress, personality development, and career guidance. Has resulted in improved student retention and satisfaction.</p>
                </div>

                <div class="practice-card">
                    <h4>Industry-Institute Collaboration</h4>
                    <p>Regular interaction with industry partners for curriculum design, student internships, and placement opportunities. Ensures relevance of education to industry requirements.</p>
                </div>

                <div class="practice-card">
                    <h4>Research & Innovation Cell</h4>
                    <p>Dedicated support for faculty and student research projects including funding, mentoring, and publication assistance. Promotes research culture in the institution.</p>
                </div>

                <div class="practice-card">
                    <h4>Quality Feedback Integration</h4>
                    <p>Systematic collection and analysis of stakeholder feedback with rapid implementation of suggested improvements. Creates a responsive institutional culture.</p>
                </div>

                <div class="practice-card">
                    <h4>Faculty Development Programs</h4>
                    <p>Regular workshops and training programs for faculty development covering pedagogy, research, technology, and soft skills. Enhances teaching quality and professional competence.</p>
                </div>

                <div class="practice-card">
                    <h4>Green Campus Initiative</h4>
                    <p>Comprehensive sustainability program including rainwater harvesting, waste management, energy conservation, and environmental awareness. Promotes ecological responsibility.</p>
                </div>

                <h3>Documentation and Sharing</h3>
                <p>Best practices are documented through:</p>
                <ul>
                    <li>Detailed case studies</li>
                    <li>Implementation guides</li>
                    <li>Success metrics and outcomes</li>
                    <li>Stakeholder testimonials</li>
                    <li>Photos and videos</li>
                </ul>

                <h3>Impact of Best Practices</h3>
                <p>Implementation of best practices has led to:</p>
                <ul>
                    <li>Improved student learning outcomes</li>
                    <li>Enhanced faculty satisfaction and engagement</li>
                    <li>Better institutional efficiency</li>
                    <li>Increased stakeholder engagement</li>
                    <li>Higher accreditation ratings</li>
                    <li>Institutional reputation enhancement</li>
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
                    <li><a href="{{ route('iqac.best-practices') }}" class="active-link"><i class="fas fa-star"></i> Best Practices</a></li>
                    <li><a href="{{ route('iqac.aaa') }}"><i class="fas fa-graduation-cap"></i> AAA</a></li>
                    <li><a href="{{ route('iqac.po-pso-co') }}"><i class="fas fa-tasks"></i> PO/PSO/CO</a></li>
                </ul>
            </div>
        </aside>
    </div>
@endsection
