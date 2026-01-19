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
        h4 { color: var(--college-blue); margin: 15px 0 10px 0; }
        p { text-align: justify; line-height: 1.8; color: #555; margin-bottom: 15px; }
        ul { margin: 15px 0 15px 30px; }
        ul li { margin-bottom: 10px; text-align: justify; }
        .info-box { background: #e8f4f8; border-left: 4px solid var(--college-blue); padding: 15px; margin: 20px 0; border-radius: 4px; }
        .outcome-card { background: #f9f9f9; padding: 20px; margin: 15px 0; border-left: 4px solid var(--accent-gold); border-radius: 4px; }
        @media (max-width: 1200px) { .container { grid-template-columns: 3fr 1fr; } }
        @media (max-width: 992px) { .container { grid-template-columns: 1fr; } }
    </style>
@endpush

@section('content')
    <div class="container">
        <main>
            <div class="content-block">
                <h1 class="page-title">Program Outcomes (PO), Program Specific Outcomes (PSO) & Course Outcomes (CO)</h1>
                
                <div class="info-box">
                    <p>Clearly defined and documented Program Outcomes (PO), Program Specific Outcomes (PSO), and Course Outcomes (CO) are essential for curriculum design, teaching-learning, and assessment in higher education.</p>
                </div>

                <h3>Understanding Outcomes</h3>
                
                <div class="outcome-card">
                    <h4>Program Outcomes (PO)</h4>
                    <p>Program Outcomes describe the skills, knowledge, and attitudes that students are expected to develop by completing their academic program. POs are broad statements that apply to all undergraduate or postgraduate programs.</p>
                </div>

                <div class="outcome-card">
                    <h4>Program Specific Outcomes (PSO)</h4>
                    <p>Program Specific Outcomes are outcomes that are unique to a specific program and reflect the discipline-specific knowledge and competencies. PSOs complement POs and provide program-specific focus.</p>
                </div>

                <div class="outcome-card">
                    <h4>Course Outcomes (CO)</h4>
                    <p>Course Outcomes are specific, measurable learning objectives for individual courses. COs detail what students should be able to do upon completion of each course and support attainment of POs and PSOs.</p>
                </div>

                <h3>Generic Program Outcomes (PO)</h3>
                <ul>
                    <li><strong>PO1 - Knowledge:</strong> Acquire, understand, and apply domain knowledge and theory</li>
                    <li><strong>PO2 - Problem Solving:</strong> Identify, formulate, and solve problems using domain knowledge</li>
                    <li><strong>PO3 - Design and Development:</strong> Design solutions and develop systems for identified problems</li>
                    <li><strong>PO4 - Investigation:</strong> Conduct investigations to answer research questions</li>
                    <li><strong>PO5 - Modern Tools:</strong> Use modern tools and techniques for domain applications</li>
                    <li><strong>PO6 - Project Management:</strong> Manage projects and demonstrate professional responsibility</li>
                    <li><strong>PO7 - Environment and Sustainability:</strong> Understand impact of solutions on society and environment</li>
                    <li><strong>PO8 - Ethics:</strong> Apply ethical principles in professional practice</li>
                    <li><strong>PO9 - Communication:</strong> Communicate ideas and information effectively</li>
                    <li><strong>PO10 - Teamwork:</strong> Function effectively in diverse teams and leadership roles</li>
                    <li><strong>PO11 - Lifelong Learning:</strong> Engage in continuous professional development</li>
                    <li><strong>PO12 - Competency:</strong> Develop domain-specific competencies and soft skills</li>
                </ul>

                <h3>Program Specific Outcomes (PSO)</h3>
                <p>Examples of PSOs for different programs:</p>

                <h4>B.Sc Physics</h4>
                <ul>
                    <li>Understand fundamental principles of classical and quantum mechanics</li>
                    <li>Conduct physics experiments and analyze experimental data</li>
                    <li>Apply physics concepts to real-world problems</li>
                </ul>

                <h4>B.Com Finance & Taxation</h4>
                <ul>
                    <li>Understand principles of accounting and financial management</li>
                    <li>Apply taxation laws and compliance procedures</li>
                    <li>Prepare financial statements and conduct financial analysis</li>
                </ul>

                <h4>M.A English</h4>
                <ul>
                    <li>Engage in advanced literary analysis and interpretation</li>
                    <li>Conduct research in linguistics and literary studies</li>
                    <li>Develop professional communication and writing skills</li>
                </ul>

                <h3>Course Outcomes - Examples</h3>
                <p><strong>Course: Calculus I (B.Sc Mathematics)</strong></p>
                <ul>
                    <li>CO1: Understand the concept of limits and continuity</li>
                    <li>CO2: Master differentiation techniques and applications</li>
                    <li>CO3: Understand integration methods and applications</li>
                    <li>CO4: Apply calculus to solve real-world problems</li>
                </ul>

                <p><strong>Course: Principles of Microeconomics (B.Com)</strong></p>
                <ul>
                    <li>CO1: Understand basic economic concepts and principles</li>
                    <li>CO2: Analyze consumer behavior and demand theory</li>
                    <li>CO3: Understand production and cost analysis</li>
                    <li>CO4: Apply microeconomic principles to business decisions</li>
                </ul>

                <h3>Mapping of CO to PO/PSO</h3>
                <p>Each course outcome is mapped to relevant Program Outcomes and Program Specific Outcomes to ensure alignment and systematic development of competencies.</p>

                <h3>Outcome Attainment and Assessment</h3>
                <p>Assessment methods for measuring outcome attainment:</p>
                <ul>
                    <li>Continuous Assessment (CA) through assignments and projects</li>
                    <li>Mid-semester examinations</li>
                    <li>End-semester examinations</li>
                    <li>Practical/Lab work and viva</li>
                    <li>Presentation and seminar performance</li>
                    <li>Portfolio evaluation</li>
                    <li>Capstone projects</li>
                </ul>

                <h3>Documents and Resources</h3>
                <p>Program Outcomes, PSOs, and Course Outcomes documents:</p>
                <ul>
                    <li><a href="#">PO/PSO/CO Framework Document</a></li>
                    <li><a href="#">Department-wise PO/PSO Documents</a></li>
                    <li><a href="#">Course Outcome Mapping Documents</a></li>
                    <li><a href="#">Outcome Attainment Reports</a></li>
                    <li><a href="#">Assessment Rubrics and Guidelines</a></li>
                </ul>

                <h3>Implementation and Review</h3>
                <p>PO/PSO/CO are implemented and reviewed through:</p>
                <ul>
                    <li>Regular curriculum review meetings</li>
                    <li>Stakeholder feedback collection</li>
                    <li>Learning outcome assessment</li>
                    <li>Annual departmental reviews</li>
                    <li>Continuous improvement initiatives</li>
                    <li>Accreditation and external reviews</li>
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
                    <li><a href="{{ route('iqac.aaa') }}"><i class="fas fa-graduation-cap"></i> AAA</a></li>
                    <li><a href="{{ route('iqac.po-pso-co') }}" class="active-link"><i class="fas fa-tasks"></i> PO/PSO/CO</a></li>
                </ul>
            </div>
        </aside>
    </div>
@endsection
