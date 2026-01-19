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
        .feature-card h4 { color: var(--college-blue); margin-bottom: 12px; }
        .highlight { background: #fff9e6; padding: 15px; border-radius: 4px; margin: 20px 0; border-left: 4px solid var(--accent-gold); }
        .btn { display: inline-block; background: var(--college-blue); color: white; padding: 12px 25px; border-radius: 4px; text-decoration: none; transition: all 0.3s; margin: 10px 10px 10px 0; }
        .btn:hover { background: #002244; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.2); }
        @media (max-width: 768px) { .page-title { font-size: 1.8rem; } .section-title { font-size: 1.4rem; } .content-block { padding: 20px; } }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="content-block">
            <h1 class="page-title"><i class="fas fa-rocket"></i> KSUM Partnership</h1>

            <div class="info-box">
                <h4>Kerala Startup Mission (KSUM)</h4>
                <p>St. Joseph's College is a proud partner of Kerala Startup Mission (KSUM), Kerala's flagship initiative to foster entrepreneurship and startup culture. Through this partnership, we provide our students and faculty with access to KSUM's resources, networks, and support ecosystem.</p>
            </div>

            <h2 class="section-title">About KSUM</h2>
            <p>Kerala Startup Mission is a non-profit organization that works to establish a world-class startup ecosystem in Kerala. KSUM provides mentorship, funding, co-working spaces, and networking opportunities to help entrepreneurs succeed and create innovative solutions for global challenges.</p>

            <h2 class="section-title">Partnership Benefits</h2>
            <div class="feature-grid">
                <div class="feature-card">
                    <h4><i class="fas fa-network-wired"></i> Networking Events</h4>
                    <p>Access to KSUM networking events, startup showcases, and investor meetings.</p>
                </div>
                <div class="feature-card">
                    <h4><i class="fas fa-book"></i> Training Programs</h4>
                    <p>Participation in KSUM training programs on various aspects of entrepreneurship.</p>
                </div>
                <div class="feature-card">
                    <h4><i class="fas fa-handshake"></i> Mentorship Access</h4>
                    <p>Connection with KSUM's mentor network of experienced entrepreneurs and investors.</p>
                </div>
                <div class="feature-card">
                    <h4><i class="fas fa-couch"></i> Co-working Spaces</h4>
                    <p>Access to KSUM's co-working and incubation centers across Kerala.</p>
                </div>
                <div class="feature-card">
                    <h4><i class="fas fa-money-bill-wave"></i> Funding Opportunities</h4>
                    <p>Information on funding schemes and investment opportunities through KSUM.</p>
                </div>
                <div class="feature-card">
                    <h4><i class="fas fa-globe"></i> International Connect</h4>
                    <p>Global partnerships and opportunities for market expansion.</p>
                </div>
            </div>

            <h2 class="section-title">KSUM Initiatives for Our Community</h2>

            <h3 style="color: var(--college-blue); margin-top: 20px; margin-bottom: 15px;">Student Entrepreneur Development</h3>
            <ul>
                <li>Startup bootcamps and acceleration programs</li>
                <li>Business idea competitions with prizes and funding</li>
                <li>Mentorship from successful entrepreneurs</li>
                <li>Pitch coaching and business plan development</li>
                <li>Access to prototype development facilities</li>
            </ul>

            <h3 style="color: var(--college-blue); margin-top: 20px; margin-bottom: 15px;">Faculty-led Innovation Projects</h3>
            <ul>
                <li>Research commercialization support</li>
                <li>Intellectual property protection guidance</li>
                <li>Spin-off venture development</li>
                <li>Technology transfer opportunities</li>
                <li>Collaboration with industry partners</li>
            </ul>

            <h3 style="color: var(--college-blue); margin-top: 20px; margin-bottom: 15px;">Alumni Startup Support</h3>
            <ul>
                <li>Continued mentorship and guidance</li>
                <li>Access to investor networks</li>
                <li>Growth and scaling support</li>
                <li>International business opportunities</li>
                <li>Industry partnerships and collaborations</li>
            </ul>

            <h2 class="section-title">Key Focus Areas</h2>
            <p>Through KSUM partnership, we focus on promoting startups in emerging sectors:</p>
            <ul>
                <li><strong>Technology:</strong> Software, AI, IoT, blockchain solutions</li>
                <li><strong>Healthcare:</strong> HealthTech, medical devices, wellness services</li>
                <li><strong>Sustainability:</strong> Green energy, waste management, conservation</li>
                <li><strong>Agriculture:</strong> AgriTech, precision farming, value addition</li>
                <li><strong>Fintech:</strong> Digital payments, financial inclusion, investment platforms</li>
                <li><strong>Education:</strong> EdTech, skill development, online learning</li>
            </ul>

            <h2 class="section-title">How to Access KSUM Resources</h2>
            <div class="info-box">
                <h4>Eligibility & Registration</h4>
                <p><strong>Students & Recent Graduates:</strong> Must have a viable business idea or early-stage startup. <strong>Faculty Researchers:</strong> Have research outcomes suitable for commercialization. <strong>Alumni Entrepreneurs:</strong> Already running a startup or planning to launch one.</p>
            </div>

            <h2 class="section-title">Registration Process</h2>
            <ol style="margin-left: 30px; margin-top: 15px;">
                <li>Register on KSUM platform (www.keralastartup.com)</li>
                <li>Complete your startup profile and idea description</li>
                <li>Attend orientation and training sessions</li>
                <li>Connect with mentors and investors</li>
                <li>Apply for specific programs or funding</li>
            </ol>

            <h2 class="section-title">Contact Information</h2>
            <div class="info-box">
                <h4>Connect with Our KSUM Liaison</h4>
                <p><strong>IEDC Coordinator:</strong> For startup idea development and mentorship<br>
                <strong>Email:</strong> iedc@college.ac.in<br>
                <strong>Phone:</strong> +91 8086800083<br>
                <strong>Office Hours:</strong> Monday-Friday, 10:00 AM - 4:00 PM</p>
            </div>

            <div class="highlight">
                <h4><i class="fas fa-star"></i> Building Kerala's Startup Ecosystem</h4>
                <p>Through our KSUM partnership, St. Joseph's College is actively contributing to Kerala's emergence as a startup and innovation hub. We believe that entrepreneurship and innovation are key drivers of economic growth and social development.</p>
            </div>

            <a href="https://www.keralastartup.com" target="_blank" class="btn"><i class="fas fa-external-link-alt"></i> Visit KSUM Website</a>
            <a href="#" class="btn"><i class="fas fa-arrow-right"></i> IEDC Contact</a>
        </div>
    </div>
@endsection
