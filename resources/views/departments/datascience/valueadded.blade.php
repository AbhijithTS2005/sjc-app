@extends('layouts.app')
@include('partials.department-sidebar-css')

@push('styles')
<style> 
        /* --- COPY OF YOUR EXISTING STYLES --- */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f4f4f4; color: #333; line-height: 1.6; background-image: radial-gradient(circle, rgba(0,51,102,0.05) 1px, transparent 1px); background-size: 30px 30px; }

        a { text-decoration: none; color: inherit; transition: all 0.3s ease; }
        
        /* Keyframes for animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes zoomIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        
        /* --- LAYOUT GRID --- */
        .container {
            display: grid;
            grid-template-columns: 3fr 1.2fr; /* Left Content | Right Sidebar */
            gap: 30px;
            padding: 40px;
            max-width: 1500px;
            margin: 0 auto;
            min-height: 80vh;
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        /* --- LEFT COLUMN STYLES --- */
        .dept-banner {
            width: 100%;
            height: 350px;
            background-color: #ddd;
            background-image: url('https://via.placeholder.com/1000x400/003366/ffffff?text=Academic+Calendar');
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            margin-bottom: 25px;
            border: 1px solid #ccc;
            position: relative;
            overflow: hidden;
            animation: zoomIn 1s ease-out 0.6s both;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: transform 0.3s ease;
        }
        .dept-banner::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(0,51,102,0.4), rgba(240,173,78,0.2));
            pointer-events: none;
            z-index: 1;
        }
        .dept-banner:hover { transform: scale(1.02); }

        .dept-header {
            border-bottom: 2px solid var(--college-blue);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .dept-header h1 {
            color: var(--college-blue);
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0;
        }

        .content-block {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 25px;
            animation: fadeInUp 1s ease-out 0.8s both;
        }
        .content-block p {
            margin-bottom: 15px;
            font-size: 1.05rem;
            text-align: justify;
        }

        .eligibility-box {
            background: #f8f9fa;
            border-left: 4px solid var(--accent-gold);
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 4px;
        }

        .calendar-item {
            background: #f8f9fa;
            border-left: 4px solid var(--college-blue);
            padding: 15px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .calendar-date {
            font-weight: bold;
            color: var(--college-blue);
        }

        /* --- RIGHT SIDEBAR STYLES --- */
        
        
        
        .sidebar-links a:hover, .active-link {
            background: var(--college-blue) !important;
            color: #fff !important;
            transform: translateX(5px);
        }
        .sidebar-links a i { margin-right: 8px; width: 16px; }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .container {
                grid-template-columns: 3fr 1fr;
                gap: 25px;
                padding: 30px 20px;
            }
            .dept-header h1 { font-size: 1.8rem; }
        }

        @media (max-width: 992px) {
            .container {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 25px 15px;
            }
            .dept-header h1 { font-size: 1.6rem; }
            .content-block { padding: 20px; }
            }

        @media (max-width: 768px) {
            .container { padding: 20px 10px; gap: 15px; }
            .dept-header h1 { font-size: 1.4rem; margin-bottom: 15px; }
            .content-block { padding: 15px; }
            .content-block p { font-size: 0.95rem; }
            
        }

        @media (max-width: 576px) {
            .container { padding: 15px; gap: 10px; }
            .dept-header h1 { font-size: 1.2rem; margin-bottom: 10px; }
            .content-block { padding: 12px; }
            .content-block p { font-size: 0.85rem; }
            
            th, td { padding: 5px; }
        }

        @media (max-width: 480px) {
            .container { padding: 10px; gap: 8px; }
            .dept-header h1 { font-size: 1.1rem; margin-bottom: 8px; }
            .content-block { padding: 10px; }
            .content-block p { font-size: 0.8rem; }
            
            table thead { display: none; }
            table tr { display: block; margin-bottom: 10px; }
            table td { display: block; text-align: right; padding: 5px; }
        }
    </style>
@endpush

@section('content')



    <div class="container">
        
        <main>
            <div class="dept-banner"></div>

            <div class="content-block">
                <div class="dept-header">
                    <h1>Value Added Programs - @deptDisplay($dept)</h1>
                </div>

                <p>The Data Science department offers various value-added programs to enhance students' skills and employability. These programs provide additional certifications, industry exposure, and practical training beyond the regular curriculum.</p>

                <div class="program-section">
                    <h3>Certification Programs</h3>
                    <ul class="program-list">
                        <li><strong>AWS Certified Cloud Practitioner</strong><br>Training and certification in cloud computing fundamentals and AWS services.</li>
                        <li><strong>Google Data Analytics Professional Certificate</strong><br>Comprehensive program covering data analysis tools and techniques.</li>
                        <li><strong>Microsoft Azure AI Fundamentals</strong><br>Introduction to AI concepts and Azure AI services.</li>
                        <li><strong>Tableau Desktop Specialist</strong><br>Data visualization and dashboard creation using Tableau.</li>
                    </ul>
                </div>

                <div class="program-section">
                    <h3>Industry Skill Development</h3>
                    <ul class="program-list">
                        <li><strong>Python for Data Science Bootcamp</strong><br>Intensive training in Python programming for data analysis and machine learning.</li>
                        <li><strong>Machine Learning with TensorFlow</strong><br>Hands-on experience with deep learning frameworks and neural networks.</li>
                        <li><strong>Big Data with Hadoop and Spark</strong><br>Processing large datasets using distributed computing technologies.</li>
                        <li><strong>Data Engineering Fundamentals</strong><br>Building data pipelines and ETL processes for real-world applications.</li>
                    </ul>
                </div>

                <div class="program-section">
                    <h3>Soft Skills and Career Development</h3>
                    <ul class="program-list">
                        <li><strong>Data Storytelling and Communication</strong><br>Presenting data insights effectively to technical and non-technical audiences.</li>
                        <li><strong>Resume Building and Interview Preparation</strong><br>Career guidance, resume writing, and mock interviews for data science roles.</li>
                        <li><strong>Project Management in Data Science</strong><br>Agile methodologies and project management tools for data projects.</li>
                        <li><strong>Entrepreneurship in Data Science</strong><br>Starting data-driven businesses and freelancing opportunities.</li>
                    </ul>
                </div>

                <div class="program-section">
                    <h3>Internship and Industry Connect</h3>
                    <ul class="program-list">
                        <li><strong>Summer Internship Program</strong><br>3-month internships with leading tech companies and data analytics firms.</li>
                        <li><strong>Industry Mentorship Program</strong><br>One-on-one mentoring by data science professionals from industry.</li>
                        <li><strong>Guest Lectures and Workshops</strong><br>Regular sessions with industry experts and thought leaders.</li>
                        <li><strong>Alumni Network Access</strong><br>Connect with successful alumni working in data science roles.</li>
                    </ul>
                </div>

                <div class="eligibility-box">
                    <h3 style="color:var(--college-blue); margin-bottom:10px;">Program Benefits</h3>
                    <p>These value-added programs are designed to bridge the gap between academic learning and industry requirements. Students receive certificates upon successful completion, which enhance their resume and job prospects in the competitive data science market.</p>
                </div>
            </div>
        </main>

                @include('partials.department-sidebar', ['dept' => $dept])

    </div>

@endsection