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

        .highlight-box { background: #e8f4f8; border-left: 4px solid var(--college-blue); padding: 20px; margin: 20px 0; border-radius: 4px; }
        .highlight-box h4 { color: var(--college-blue); margin-bottom: 10px; }
        .highlight-box p { text-align: justify; color: #555; }

        h3 { color: var(--college-blue); margin: 20px 0 15px 0; }
        p { text-align: justify; line-height: 1.8; color: #555; margin-bottom: 15px; }
        ul { margin: 15px 0 15px 30px; }
        ul li { margin-bottom: 10px; text-align: justify; }

        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline-item {
            margin: 30px 0;
            padding-left: 40px;
            position: relative;
        }

        .timeline-item:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 20px;
            background: var(--college-blue);
            border: 3px solid white;
            border-radius: 50%;
            box-shadow: 0 0 0 2px var(--college-blue);
        }

        .timeline-item h4 {
            color: var(--college-blue);
            font-size: 1.1rem;
            margin-bottom: 8px;
        }

        .timeline-item p {
            color: #666;
            font-size: 0.95rem;
        }

        @media (max-width: 1200px) { .container { grid-template-columns: 3fr 1fr; gap: 25px; padding: 30px 20px; } }
        @media (max-width: 992px) { .container { grid-template-columns: 1fr; gap: 20px; padding: 25px 15px; } footer { grid-template-columns: 1fr 1fr !important; } }
        @media (max-width: 768px) { .container { grid-template-columns: 1fr; padding: 20px 10px; gap: 15px; } .page-title { font-size: 1.6rem; } .content-block { padding: 15px; } footer { grid-template-columns: 1fr !important; } }
        @media (max-width: 576px) { .container { grid-template-columns: 1fr; padding: 15px 8px; gap: 10px; } .page-title { font-size: 1.3rem; } .content-block { padding: 12px; } }
    </style>
@endpush

@section('content')

    <div class="container">
        <main>
            <div class="content-block">
                <h1 class="page-title">About IQAC</h1>

                <h3>What is IQAC?</h3>
                <p>The Internal Quality Assurance Cell (IQAC) is a pivotal institutional mechanism established to ensure continuous quality enhancement and institutional development. At St. Joseph's College, IQAC operates as an autonomous body dedicated to monitoring, evaluating, and fostering quality in all aspects of college functioning.</p>

                <div class="highlight-box">
                    <h4>Key Responsibility</h4>
                    <p>IQAC serves as the quality auditor of the institution, working proactively to implement quality assurance policies and procedures. It ensures that the college maintains and enhances its academic standards while adhering to regulatory and accreditation requirements.</p>
                </div>

                <h3>Establishment and Recognition</h3>
                <p>IQAC was established in accordance with the NAAC guidelines and UGC directives to promote quality consciousness in higher educational institutions. At St. Joseph's College, IQAC functions as an integrative agency that brings together all stakeholders to work towards institutional excellence.</p>

                <h3>Organizational Structure</h3>
                <p>IQAC is headed by the Coordinator, supported by a diverse committee comprising:</p>
                <ul>
                    <li>Principal (Ex-officio Chairperson)</li>
                    <li>IQAC Coordinator</li>
                    <li>Faculty representatives from different departments</li>
                    <li>Administrative staff representatives</li>
                    <li>Student representatives</li>
                    <li>Alumni representatives</li>
                    <li>External stakeholders and employers</li>
                </ul>

                <h3>Strategic Initiatives</h3>
                <p>IQAC implements strategic initiatives to enhance institutional quality:</p>
                <ul>
                    <li><strong>Quality Assurance Reviews:</strong> Regular assessments of academic programs, course design, and delivery methodologies</li>
                    <li><strong>Feedback Systems:</strong> Structured mechanisms to gather feedback from all stakeholders and implement improvements</li>
                    <li><strong>Faculty Development:</strong> Continuous professional development programs for faculty enhancement</li>
                    <li><strong>Learning Outcome Assessment:</strong> Systematic evaluation of student learning outcomes and competencies</li>
                    <li><strong>Research Promotion:</strong> Initiatives to encourage research and innovation among faculty</li>
                    <li><strong>Accreditation Support:</strong> Coordination and support for NAAC and other accreditation processes</li>
                </ul>

                <h3>Milestones and Achievements</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <h4>2010 - Establishment</h4>
                        <p>IQAC was formally established at St. Joseph's College as a quality assurance mechanism.</p>
                    </div>
                    <div class="timeline-item">
                        <h4>2015 - First NAAC Accreditation</h4>
                        <p>Successful completion of first NAAC assessment with positive outcomes.</p>
                    </div>
                    <div class="timeline-item">
                        <h4>2020 - Re-accreditation</h4>
                        <p>Achieved re-accreditation demonstrating continuous quality improvement.</p>
                    </div>
                    <div class="timeline-item">
                        <h4>2023 - Recent Initiatives</h4>
                        <p>Implementation of advanced quality monitoring systems and digital initiatives.</p>
                    </div>
                </div>

                <h3>Quality Policies and Procedures</h3>
                <p>IQAC operates under a comprehensive framework of quality policies that ensure:</p>
                <ul>
                    <li>Transparency and accountability in institutional functioning</li>
                    <li>Equitable access to quality education for all students</li>
                    <li>Ethical standards in teaching, research, and administration</li>
                    <li>Continuous improvement in all institutional processes</li>
                    <li>Compliance with national and international quality standards</li>
                </ul>

                <h3>Stakeholder Engagement</h3>
                <p>IQAC believes in the collaborative approach to quality assurance. It actively engages with all stakeholders including students, faculty, staff, parents, alumni, and employers to gather feedback and insights for institutional improvement. Regular meetings, surveys, and consultations ensure that the voice of all stakeholders is heard and addressed.</p>
            </div>
        </main>

        <aside class="sidebar">
            <div class="sidebar-section">
                <h3 class="sidebar-title"><i class="fas fa-cog"></i> IQAC Menu</h3>
                <ul class="sidebar-links">
                    <li><a href="{{ route('iqac.index') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="{{ route('iqac.about') }}" class="active-link"><i class="fas fa-info-circle"></i> About IQAC</a></li>
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
