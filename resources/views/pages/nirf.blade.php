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
            <h1 class="page-title"><i class="fas fa-chart-line"></i> NIRF Ranking</h1>

            <div class="info-box">
                <h4>National Institutional Ranking Framework (NIRF)</h4>
                <p>St. Joseph's College is ranked by the National Institutional Ranking Framework (NIRF), established by the Ministry of Education. NIRF provides a comprehensive evaluation of institutions across multiple dimensions including teaching, research, governance, and internationalization.</p>
            </div>

            <h2 class="section-title">2025 NIRF Rankings</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">34</div>
                    <div class="stat-label">National Rank</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">Overall</div>
                    <div class="stat-label">Category</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">Top 50</div>
                    <div class="stat-label">Position</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">Tier 1</div>
                    <div class="stat-label">Classification</div>
                </div>
            </div>

            <h2 class="section-title">NIRF Ranking Criteria</h2>
            <p>NIRF evaluates institutions based on the following key parameters:</p>
            <ul>
                <li><strong>Teaching, Learning & Resources (30%):</strong> Faculty-to-student ratio, qualification of faculty, per-student expenditure, teaching quality indicators</li>
                <li><strong>Research and Professional Practice (30%):</strong> Research publications, Ph.D. awarded, research funding, research collaborations</li>
                <li><strong>Graduation Outcomes (20%):</strong> Placement statistics, salary package, entrepreneurship, social impact</li>
                <li><strong>Outreach and Inclusivity (10%):</strong> Diversity of student body, outreach programs, accessibility</li>
                <li><strong>Perception (10%):</strong> Academic and employer reputation, brand value</li>
            </ul>

            <h2 class="section-title">St. Joseph's College Performance</h2>
            <div class="info-box">
                <h4>Excellence Across Dimensions</h4>
                <p>St. Joseph's College has demonstrated consistent excellence across all NIRF evaluation parameters:</p>
            </div>

            <ul>
                <li><strong>Strong Faculty Base:</strong> Highly qualified faculty members with advanced degrees and research publications</li>
                <li><strong>Research Excellence:</strong> Active research programs with publications in peer-reviewed journals and international collaborations</li>
                <li><strong>Excellent Placement Records:</strong> High placement rates with competitive salaries for graduates</li>
                <li><strong>Quality Infrastructure:</strong> Modern facilities and learning resources supporting academic excellence</li>
                <li><strong>Student Support Systems:</strong> Comprehensive mentoring, career counseling, and personal development programs</li>
                <li><strong>Inclusive Campus:</strong> Welcoming environment for diverse students from various backgrounds</li>
            </ul>

            <h2 class="section-title">Historical NIRF Rankings</h2>
            <table style="width:100%; border-collapse: collapse; margin: 20px 0;">
                <thead>
                    <tr style="background: var(--college-blue); color: white;">
                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Year</th>
                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Rank</th>
                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Category</th>
                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Improvement</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="background: #f9f9f9;">
                        <td style="padding: 12px; border: 1px solid #ddd;">2025</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">34</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">Overall</td>
                        <td style="padding: 12px; border: 1px solid #ddd;"><span style="color: green;">↑ Improved</span></td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; border: 1px solid #ddd;">2024</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">45</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">Overall</td>
                        <td style="padding: 12px; border: 1px solid #ddd;"><span style="color: green;">↑ Improved</span></td>
                    </tr>
                    <tr style="background: #f9f9f9;">
                        <td style="padding: 12px; border: 1px solid #ddd;">2023</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">52</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">Overall</td>
                        <td style="padding: 12px; border: 1px solid #ddd;"><span style="color: green;">↑ Improved</span></td>
                    </tr>
                </tbody>
            </table>

            <h2 class="section-title">Quality Initiatives for Sustained Excellence</h2>
            <p>St. Joseph's College is committed to continuous improvement across all NIRF parameters through:</p>
            <ul>
                <li>Regular review and enhancement of academic programs</li>
                <li>Investment in research infrastructure and faculty development</li>
                <li>Strengthening industry-academia partnerships for better placements</li>
                <li>Promotion of innovation and entrepreneurship among students</li>
                <li>Expansion of international collaborations and student exchange programs</li>
                <li>Enhancement of campus facilities and support services</li>
            </ul>

            <div class="highlight">
                <h4><i class="fas fa-star"></i> Commitment to Excellence</h4>
                <p>Through our IQAC initiatives, we continue to work towards improving our NIRF ranking and maintaining our position among India's top institutions. We are dedicated to providing world-class education and fostering research excellence.</p>
            </div>

            <a href="{{ route('iqac.index') }}" class="btn"><i class="fas fa-arrow-right"></i> Learn more about our Quality Assurance</a>
        </div>
    </div>
@endsection
