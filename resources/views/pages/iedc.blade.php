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
        .feature-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin: 30px 0; }
        .feature-card { background: #f9f9f9; padding: 25px; border-radius: 8px; border-top: 4px solid var(--college-blue); transition: all 0.3s; }
        .feature-card:hover { box-shadow: 0 6px 15px rgba(0,0,0,0.15); transform: translateY(-3px); }
        .feature-card h4 { color: var(--college-blue); margin-bottom: 12px; display: flex; align-items: center; gap: 10px; }
        .highlight { background: #fff9e6; padding: 15px; border-radius: 4px; margin: 20px 0; border-left: 4px solid var(--accent-gold); }
        .btn { display: inline-block; background: var(--college-blue); color: white; padding: 12px 25px; border-radius: 4px; text-decoration: none; transition: all 0.3s; margin: 10px 10px 10px 0; }
        .btn:hover { background: #002244; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.2); }
        @media (max-width: 768px) { .page-title { font-size: 1.8rem; } .section-title { font-size: 1.4rem; } .content-block { padding: 20px; } }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="content-block">
            <h1 class="page-title"><i class="fas fa-lightbulb"></i> IEDC - Innovation & Entrepreneurship</h1>

            <div class="info-box">
                <h4>Innovation and Entrepreneurship Development Cell (IEDC)</h4>
                <p>St. Joseph's College's IEDC is a dedicated cell focused on fostering an entrepreneurial mindset among students and faculty. We provide comprehensive support, mentorship, and resources to nurture innovation and help aspiring entrepreneurs transform their ideas into viable business ventures.</p>
            </div>

            <h2 class="section-title">Our Mission</h2>
            <p>To create a vibrant ecosystem that encourages creativity, innovation, and entrepreneurial spirit among students and faculty members, enabling them to contribute to social and economic development through new ventures and sustainable business models.</p>

            <h2 class="section-title">Core Functions</h2>
            <div class="feature-grid">
                <div class="feature-card">
                    <h4><i class="fas fa-bulb"></i> Idea Incubation</h4>
                    <p>We help students develop and refine their business ideas through brainstorming sessions, workshops, and expert consultations.</p>
                </div>
                <div class="feature-card">
                    <h4><i class="fas fa-graduation-cap"></i> Training & Workshops</h4>
                    <p>Regular training programs on business planning, finance, marketing, and legal aspects of starting a venture.</p>
                </div>
                <div class="feature-card">
                    <h4><i class="fas fa-network-wired"></i> Networking & Mentorship</h4>
                    <p>Connect with successful entrepreneurs, business leaders, and investors for guidance and partnership opportunities.</p>
                </div>
                <div class="feature-card">
                    <h4><i class="fas fa-money-bill-wave"></i> Funding Assistance</h4>
                    <p>Guidance on accessing seed funding, government grants, and investment opportunities for startups.</p>
                </div>
                <div class="feature-card">
                    <h4><i class="fas fa-tools"></i> Resource Support</h4>
                    <p>Access to facilities, infrastructure, and resources needed to develop and test your business ideas.</p>
                </div>
                <div class="feature-card">
                    <h4><i class="fas fa-chart-line"></i> Business Development</h4>
                    <p>Ongoing support in scaling your venture, market expansion, and sustainable growth strategies.</p>
                </div>
            </div>

            <h2 class="section-title">IEDC Programs & Activities</h2>

            <h3 style="color: var(--college-blue); margin-top: 20px; margin-bottom: 15px;">Entrepreneurship Awareness Programs</h3>
            <ul>
                <li>Entrepreneurship awareness lectures and seminars</li>
                <li>Success stories from alumni entrepreneurs</li>
                <li>Industry expert talks on emerging opportunities</li>
                <li>Student competitions and hackathons</li>
                <li>Startup showcases and pitch events</li>
            </ul>

            <h3 style="color: var(--college-blue); margin-top: 20px; margin-bottom: 15px;">Business Plan Development</h3>
            <ul>
                <li>Business plan writing workshops</li>
                <li>Market research and feasibility analysis</li>
                <li>Financial planning and projection sessions</li>
                <li>Prototype development support</li>
                <li>Mentored business plan competitions</li>
            </ul>

            <h3 style="color: var(--college-blue); margin-top: 20px; margin-bottom: 15px;">Incubation Support</h3>
            <ul>
                <li>Pre-incubation mentoring and guidance</li>
                <li>Startup registration and formalization assistance</li>
                <li>Legal and compliance support</li>
                <li>Office space and workspace access</li>
                <li>Technology and infrastructure support</li>
            </ul>

            <h2 class="section-title">Success Stories</h2>
            <p>Several student ventures have emerged from our IEDC, demonstrating the potential of our ecosystem:</p>
            <ul>
                <li><strong>TechSolutions:</strong> IoT-based solutions for agriculture - now operating across multiple states</li>
                <li><strong>EcoPackaging:</strong> Sustainable packaging solutions - working with major corporations</li>
                <li><strong>SkillHub:</strong> Online skill development platform - serving thousands of learners</li>
                <li><strong>GreenEnergy:</strong> Renewable energy consulting - partnering with government agencies</li>
                <li><strong>HealthTech:</strong> Digital health monitoring system - pilot phase with hospitals</li>
            </ul>

            <h2 class="section-title">Partnerships & Collaborations</h2>
            <p>IEDC works closely with:</p>
            <ul>
                <li>Government agencies and MSME development boards</li>
                <li>Angel investors and venture capital firms</li>
                <li>Industry associations and chambers of commerce</li>
                <li>Other educational institutions and startup ecosystems</li>
                <li>Corporate sponsors and mentors</li>
            </ul>

            <h2 class="section-title">Eligibility & How to Join</h2>
            <div class="info-box">
                <h4>Who Can Participate?</h4>
                <p><strong>Students:</strong> All undergraduate and postgraduate students with entrepreneurial ideas or interests can participate. <strong>Faculty:</strong> Faculty members interested in commercializing research or developing new ventures are also welcome. <strong>Alumni:</strong> Our alumni entrepreneurs can access networking and mentoring support.</p>
            </div>

            <h2 class="section-title">Registration & Support</h2>
            <p>To get involved with IEDC, you can:</p>
            <ul>
                <li>Register your startup idea through the IEDC portal</li>
                <li>Attend orientation sessions and awareness programs</li>
                <li>Connect with mentors and entrepreneurs</li>
                <li>Apply for incubation support</li>
                <li>Participate in competitions and events</li>
            </ul>

            <div class="highlight">
                <h4><i class="fas fa-rocket"></i> Transform Your Idea into Reality</h4>
                <p>The IEDC at St. Joseph's College is committed to supporting you in your entrepreneurial journey. Whether you're at the ideation stage or ready to launch your venture, we have the expertise, mentorship, and resources to help you succeed.</p>
            </div>

            <a href="mailto:iedc@college.ac.in" class="btn"><i class="fas fa-envelope"></i> Contact IEDC</a>
            <a href="#" class="btn"><i class="fas fa-arrow-right"></i> Startup Portal</a>
        </div>
    </div>
@endsection
