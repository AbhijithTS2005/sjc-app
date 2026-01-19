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

        h3 { color: var(--college-blue); margin: 25px 0 15px 0; font-size: 1.3rem; }
        h4 { color: var(--college-blue); margin: 15px 0 10px 0; font-size: 1.1rem; }
        p { text-align: justify; line-height: 1.8; color: #555; margin-bottom: 15px; }
        ul { margin: 15px 0 15px 30px; }
        ul li { margin-bottom: 10px; text-align: justify; }

        .objective-card {
            background: linear-gradient(135deg, #f5f9fb 0%, #e8f4f8 100%);
            border: 1px solid #d0e8f2;
            border-left: 4px solid var(--college-blue);
            padding: 20px;
            margin: 20px 0;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .objective-card:hover {
            box-shadow: 0 5px 15px rgba(0, 51, 102, 0.1);
            transform: translateY(-3px);
        }

        .objective-card h4 {
            margin-top: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .objective-icon {
            font-size: 1.3rem;
            color: var(--college-blue);
        }

        .function-box {
            background: #f9f9f9;
            border-left: 4px solid var(--accent-gold);
            padding: 15px;
            margin: 12px 0;
            border-radius: 4px;
        }

        .function-box strong {
            color: var(--college-blue);
        }

        .strategy-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin: 20px 0;
        }

        .strategy-item {
            background: #f0f8ff;
            padding: 18px;
            border-radius: 6px;
            border: 1px solid #c5e1f5;
        }

        .strategy-item h5 {
            color: var(--college-blue);
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .strategy-item p {
            font-size: 0.95rem;
            color: #666;
            margin: 0;
        }

        .highlight-banner {
            background: linear-gradient(90deg, var(--college-blue) 0%, #1a4d7a 100%);
            color: white;
            padding: 20px;
            border-radius: 6px;
            margin: 20px 0;
        }

        .highlight-banner h4 {
            color: white;
            margin-top: 0;
        }

        .highlight-banner p {
            color: #e8f4f8;
            text-align: left;
        }

        @media (max-width: 1200px) { .container { grid-template-columns: 3fr 1fr; gap: 25px; padding: 30px 20px; } }
        @media (max-width: 992px) { .container { grid-template-columns: 1fr; gap: 20px; padding: 25px 15px; } .strategy-grid { grid-template-columns: 1fr; } footer { grid-template-columns: 1fr 1fr !important; } }
        @media (max-width: 768px) { .container { grid-template-columns: 1fr; padding: 20px 10px; gap: 15px; } .page-title { font-size: 1.6rem; } .content-block { padding: 15px; } footer { grid-template-columns: 1fr !important; } }
        @media (max-width: 576px) { .container { grid-template-columns: 1fr; padding: 15px 8px; gap: 10px; } .page-title { font-size: 1.3rem; } .content-block { padding: 12px; } }
    </style>
@endpush

@section('content')

    <div class="container">
        <main>
            <div class="content-block">
                <h1 class="page-title">IQAC Objectives & Functions</h1>

                <h3>Overview</h3>
                <p>The Internal Quality Assurance Cell is established with a comprehensive set of objectives and functions aimed at ensuring institutional excellence, continuous improvement, and accountability. IQAC serves as the backbone of the college's quality management system.</p>

                <h3>Core Objectives</h3>

                <div class="objective-card">
                    <h4><span class="objective-icon">🎯</span> Quality Assurance & Monitoring</h4>
                    <p>To establish and maintain systematic mechanisms for continuous monitoring, evaluation, and documentation of the institution's performance across all academic and administrative dimensions. This includes regular audits, assessments, and benchmarking against national and international standards.</p>
                </div>

                <div class="objective-card">
                    <h4><span class="objective-icon">📚</span> Academic Excellence</h4>
                    <p>To ensure the delivery of high-quality education through effective curriculum design, innovative teaching methodologies, and assessment of student learning outcomes. IQAC promotes evidence-based improvements in teaching and learning practices.</p>
                </div>

                <div class="objective-card">
                    <h4><span class="objective-icon">🔍</span> Accreditation & Compliance</h4>
                    <p>To facilitate the institution's accreditation processes, including NAAC assessment, and ensure compliance with regulatory requirements and standards set by UGC, KSHEC, and other relevant bodies. Maintaining accreditation status and improving grades is a key objective.</p>
                </div>

                <div class="objective-card">
                    <h4><span class="objective-icon">💬</span> Stakeholder Engagement</h4>
                    <p>To establish robust feedback mechanisms from all stakeholders including students, faculty, staff, parents, alumni, and employers. Incorporating stakeholder feedback into institutional planning and decision-making ensures institutional relevance and responsiveness.</p>
                </div>

                <div class="objective-card">
                    <h4><span class="objective-icon">📈</span> Institutional Development</h4>
                    <p>To support institutional planning, strategic development, and resource optimization. IQAC facilitates data-driven decision making and contributes to the formulation of institutional policies and initiatives.</p>
                </div>

                <div class="objective-card">
                    <h4><span class="objective-icon">🚀</span> Research & Innovation</h4>
                    <p>To promote a culture of research, innovation, and scholarship among faculty and students. IQAC supports research initiatives, facilitates collaboration, and encourages publication and dissemination of research findings.</p>
                </div>

                <h3>Key Functions of IQAC</h3>

                <div class="function-box">
                    <strong>📋 Academic Planning & Coordination:</strong> Facilitate academic planning processes, coordinate with departments on curriculum design, course outcomes, and learning objectives. Ensure alignment with institutional vision and external standards.
                </div>

                <div class="function-box">
                    <strong>📊 Data Collection & Analysis:</strong> Collect, compile, and analyze institutional data related to academic performance, admission, graduation, employment, research output, and other relevant metrics. Prepare comprehensive reports for decision making.
                </div>

                <div class="function-box">
                    <strong>📝 AQAR Preparation:</strong> Prepare Annual Quality Assurance Reports (AQAR) documenting institutional performance, quality initiatives, achievements, and action plans. Submit AQAR to NAAC and other regulatory bodies as required.
                </div>

                <div class="function-box">
                    <strong>🎓 Feedback & Assessment:</strong> Conduct student satisfaction surveys, feedback collection from employers and alumni. Implement mechanism for learning outcome assessment. Analyze feedback and develop action plans for improvement.
                </div>

                <div class="function-box">
                    <strong>👥 Faculty Development:</strong> Coordinate faculty development programs, workshops, seminars, and training sessions to enhance teaching effectiveness, research capabilities, and professional competencies.
                </div>

                <div class="function-box">
                    <strong>🏆 Quality Enhancement Initiatives:</strong> Identify areas for improvement, develop and implement quality enhancement strategies. Monitor effectiveness of initiatives and modify approaches based on results.
                </div>

                <div class="function-box">
                    <strong>📚 Documentation & Records:</strong> Maintain comprehensive documentation of all quality assurance activities, policies, procedures, and decisions. Ensure accessibility of records for audits and assessments.
                </div>

                <div class="function-box">
                    <strong>🤝 Department Coordination:</strong> Work closely with academic departments to support their quality improvement efforts, facilitate departmental assessments, and coordinate implementation of quality enhancement strategies at departmental level.
                </div>

                <div class="function-box">
                    <strong>💻 Best Practices & Benchmarking:</strong> Identify and disseminate best practices in teaching, learning, research, and administration. Conduct benchmarking exercises with peer institutions to identify areas of excellence and improvement.
                </div>

                <div class="function-box">
                    <strong>🔗 External Liaison:</strong> Maintain liaison with NAAC, UGC, university, and other regulatory bodies. Participate in accreditation processes and other external quality assessments.
                </div>

                <h3>Strategic Functions & Activities</h3>

                <div class="strategy-grid">
                    <div class="strategy-item">
                        <h5>Teaching & Learning Excellence</h5>
                        <p>Promote innovative pedagogies, conduct teaching effectiveness surveys, support curriculum redesign, and facilitate adoption of student-centric learning approaches.</p>
                    </div>
                    <div class="strategy-item">
                        <h5>Research & Scholarly Activity</h5>
                        <p>Encourage and monitor research activities, facilitate research collaborations, support publication in peer-reviewed journals, and promote research ethics.</p>
                    </div>
                    <div class="strategy-item">
                        <h5>Student Success & Outcomes</h5>
                        <p>Track student learning outcomes, assess competency development, monitor placement and higher education statistics, and support student success initiatives.</p>
                    </div>
                    <div class="strategy-item">
                        <h5>Infrastructure & Resources</h5>
                        <p>Assess adequacy of physical infrastructure, library resources, technology, and support services. Recommend enhancements to support academic excellence.</p>
                    </div>
                    <div class="strategy-item">
                        <h5>Administrative Efficiency</h5>
                        <p>Review administrative processes, recommend improvements, support digitization initiatives, and enhance operational efficiency.</p>
                    </div>
                    <div class="strategy-item">
                        <h5>Community Engagement</h5>
                        <p>Monitor extension activities, evaluate community impact, assess social responsibility initiatives, and enhance stakeholder relationships.</p>
                    </div>
                </div>

                <div class="highlight-banner">
                    <h4>Quality Assurance Framework</h4>
                    <p>IQAC operates within a comprehensive quality assurance framework that includes regular monitoring, periodic evaluation, stakeholder feedback, external assessment, and continuous improvement based on evidence-based decision making. All activities are guided by institutional policies and national standards.</p>
                </div>

                <h3>Quality Metrics & Key Performance Indicators (KPIs)</h3>
                <p>IQAC tracks and monitors various institutional KPIs including:</p>
                <ul>
                    <li>Academic performance metrics (pass rates, CGPA distribution, learning outcomes)</li>
                    <li>Student satisfaction and feedback scores</li>
                    <li>Faculty development and professional activities</li>
                    <li>Research output and publications</li>
                    <li>Student placement statistics and employment outcomes</li>
                    <li>Infrastructure utilization and adequacy</li>
                    <li>Administrative efficiency and service quality</li>
                    <li>Community engagement and extension activities</li>
                </ul>

                <h3>Continuous Improvement Cycle</h3>
                <p>IQAC follows a continuous improvement cycle that includes:</p>
                <ol style="margin-left: 30px;">
                    <li><strong>Plan:</strong> Develop quality objectives, strategies, and action plans</li>
                    <li><strong>Do:</strong> Implement quality initiatives and activities</li>
                    <li><strong>Check:</strong> Monitor progress, collect data, analyze results</li>
                    <li><strong>Act:</strong> Make improvements based on findings, adjust plans as needed</li>
                </ol>

                <h3>Annual Timeline for IQAC Activities</h3>
                <p>IQAC operates on an academic calendar with key activities scheduled throughout the year:</p>
                <ul>
                    <li><strong>June - July:</strong> Planning for the academic year, orientation of committee members</li>
                    <li><strong>August - October:</strong> Data collection, feedback surveys, departmental assessments</li>
                    <li><strong>November - December:</strong> Analysis of data, preparation of progress reports</li>
                    <li><strong>January - February:</strong> AQAR preparation and submission</li>
                    <li><strong>March - May:</strong> Review of annual performance, planning for next cycle</li>
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
                    <li><a href="{{ route('iqac.objectives') }}" class="active-link"><i class="fas fa-bullseye"></i> Objectives</a></li>
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
