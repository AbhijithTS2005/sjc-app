@extends('layouts.app')

@push('styles')
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f4f4f4; color: #333; line-height: 1.6; }
        .container { max-width: 1200px; margin: 0 auto; padding: 40px 20px; }
        .content-block { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); margin-bottom: 30px; }
        .page-title { color: var(--college-blue); font-size: 2.5rem; border-bottom: 3px solid var(--accent-gold); padding-bottom: 20px; margin-bottom: 30px; }
        .section-title { color: var(--college-blue); font-size: 1.8rem; margin: 30px 0 20px 0; border-left: 5px solid var(--accent-gold); padding-left: 15px; }
        .info-box { background: #e8f4f8; border-left: 4px solid var(--college-blue); padding: 20px; margin: 20px 0; border-radius: 4px; }
        .info-box h4 { color: var(--college-blue); margin-bottom: 10px; }
        p { text-align: justify; line-height: 1.8; color: #555; margin-bottom: 15px; }
        ul { margin: 15px 0 15px 30px; }
        ul li { margin-bottom: 10px; text-align: justify; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin: 30px 0; }
        .stat-card { background: linear-gradient(135deg, var(--college-blue) 0%, #1a4d7a 100%); color: white; padding: 25px; border-radius: 8px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.15); }
        .stat-number { font-size: 2.5rem; font-weight: bold; margin-bottom: 10px; }
        .stat-label { font-size: 1rem; color: #e0e0e0; }
        .highlight { background: #fff9e6; padding: 15px; border-radius: 4px; margin: 20px 0; border-left: 4px solid var(--accent-gold); }
        .btn { display: inline-block; background: var(--college-blue); color: white; padding: 12px 25px; border-radius: 4px; text-decoration: none; transition: all 0.3s; margin: 10px 10px 10px 0; }
        .btn:hover { background: #002244; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.2); }
        @media (max-width: 768px) { .page-title { font-size: 1.8rem; } .section-title { font-size: 1.4rem; } .content-block { padding: 20px; } }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="content-block">
            <h1 class="page-title"><i class="fas fa-database"></i> AISHE Portal</h1>

            <div class="info-box">
                <h4>All India Survey on Higher Education (AISHE)</h4>
                <p>AISHE is an annual survey conducted by the Ministry of Education to collect comprehensive data on higher education institutions across India. It provides a detailed picture of the higher education landscape including enrollment, faculty, infrastructure, and outcome metrics.</p>
            </div>

            <h2 class="section-title">About AISHE</h2>
            <p>The All India Survey on Higher Education (AISHE) is the largest source of information on the state of higher education in India. It captures comprehensive data on:</p>
            <ul>
                <li>Student enrollment and progression</li>
                <li>Faculty composition and qualifications</li>
                <li>Infrastructure and facilities</li>
                <li>Academic programs and courses offered</li>
                <li>Research output and publications</li>
                <li>International collaborations</li>
                <li>Examination results and pass rates</li>
                <li>Placement and career outcomes</li>
            </ul>

            <h2 class="section-title">St. Joseph's College AISHE Statistics</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">2500+</div>
                    <div class="stat-label">Total Students</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">200+</div>
                    <div class="stat-label">Faculty Members</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Departments</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">100+</div>
                    <div class="stat-label">Programs Offered</div>
                </div>
            </div>

            <h2 class="section-title">Student Enrollment</h2>
            <div class="info-box">
                <h4>Diverse Academic Offerings</h4>
                <p>St. Joseph's College offers a wide range of undergraduate, postgraduate, and research programs across science, arts, commerce, and management disciplines, attracting students from across India and abroad.</p>
            </div>

            <h2 class="section-title">Faculty Information</h2>
            <ul>
                <li><strong>Faculty Strength:</strong> Over 200 dedicated faculty members</li>
                <li><strong>Qualifications:</strong> Majority hold Ph.D. and advanced degrees</li>
                <li><strong>Research Active:</strong> Faculty engaged in ongoing research projects</li>
                <li><strong>Teaching Excellence:</strong> Regular faculty development and training</li>
                <li><strong>International Experience:</strong> Faculty with global academic exposure</li>
            </ul>

            <h2 class="section-title">Infrastructure & Facilities</h2>
            <ul>
                <li>Modern classrooms with audio-visual facilities</li>
                <li>Well-equipped laboratories for science and research</li>
                <li>Comprehensive library with digital resources</li>
                <li>Computer centers with high-speed internet connectivity</li>
                <li>Sports and recreation facilities</li>
                <li>Hostel accommodation for residential students</li>
                <li>Health and counseling services</li>
                <li>Cafeteria and food services</li>
            </ul>

            <h2 class="section-title">Academic Excellence Indicators</h2>
            <table style="width:100%; border-collapse: collapse; margin: 20px 0;">
                <thead>
                    <tr style="background: var(--college-blue); color: white;">
                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Metric</th>
                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">2024 Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="background: #f9f9f9;">
                        <td style="padding: 12px; border: 1px solid #ddd;">Pass Rate</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">92%</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; border: 1px solid #ddd;">Placement Rate</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">85%</td>
                    </tr>
                    <tr style="background: #f9f9f9;">
                        <td style="padding: 12px; border: 1px solid #ddd;">Publication Output</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">150+ Papers Annually</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; border: 1px solid #ddd;">Research Projects</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">40+ Ongoing</td>
                    </tr>
                </tbody>
            </table>

            <h2 class="section-title">AISHE Data Submission</h2>
            <div class="info-box">
                <h4>Compliance & Transparency</h4>
                <p>St. Joseph's College submits comprehensive and accurate data to AISHE every year, ensuring transparency and accountability. Our IQAC coordinates with all departments to ensure complete and timely submission of information to the AISHE portal.</p>
            </div>

            <h2 class="section-title">Accessing AISHE Data</h2>
            <p>Comprehensive AISHE data for St. Joseph's College and all Indian higher education institutions is available on the official AISHE portal. You can access detailed statistics, trends, and comparative analysis of our institution.</p>

            <div class="highlight">
                <h4><i class="fas fa-check-circle"></i> Data Transparency</h4>
                <p>We are committed to maintaining accurate records and transparent reporting of our institutional data. Our participation in AISHE reflects our commitment to quality assurance and accountability in higher education.</p>
            </div>

            <a href="{{ route('iqac.index') }}" class="btn"><i class="fas fa-arrow-right"></i> Quality Assurance Cell</a>
        </div>
    </div>
@endsection
