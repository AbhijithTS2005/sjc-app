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
                    <h1>Syllabus & Course Details - @deptDisplay($dept)</h1>
                </div>

                <p>The Data Science program curriculum is designed to provide students with a strong foundation in mathematics, statistics, programming, and machine learning, along with practical skills in data analysis and visualization.</p>

                <div class="syllabus-section">
                    <h3>Semester 1</h3>
                    <ul class="course-list">
                        <li><strong>Mathematics for Data Science</strong><br>Linear algebra, calculus, probability, and statistics fundamentals.</li>
                        <li><strong>Introduction to Programming</strong><br>Python programming basics, data structures, and algorithms.</li>
                        <li><strong>Database Management Systems</strong><br>SQL, NoSQL databases, and data modeling.</li>
                        <li><strong>Communication Skills</strong><br>English communication and technical writing.</li>
                    </ul>
                </div>

                <div class="syllabus-section">
                    <h3>Semester 2</h3>
                    <ul class="course-list">
                        <li><strong>Statistics for Data Science</strong><br>Descriptive statistics, inferential statistics, and hypothesis testing.</li>
                        <li><strong>Data Structures and Algorithms</strong><br>Advanced programming concepts and algorithm design.</li>
                        <li><strong>Web Technologies</strong><br>HTML, CSS, JavaScript, and web development frameworks.</li>
                        <li><strong>Environmental Science</strong><br>Environmental studies and sustainability.</li>
                    </ul>
                </div>

                <div class="syllabus-section">
                    <h3>Semester 3</h3>
                    <ul class="course-list">
                        <li><strong>Machine Learning</strong><br>Supervised and unsupervised learning algorithms.</li>
                        <li><strong>Data Visualization</strong><br>Tools like Tableau, Power BI, and matplotlib for data visualization.</li>
                        <li><strong>Big Data Technologies</strong><br>Hadoop, Spark, and distributed computing.</li>
                        <li><strong>Operating Systems</strong><br>OS concepts, Linux, and system administration.</li>
                    </ul>
                </div>

                <div class="syllabus-section">
                    <h3>Semester 4</h3>
                    <ul class="course-list">
                        <li><strong>Deep Learning</strong><br>Neural networks, CNN, RNN, and TensorFlow/PyTorch.</li>
                        <li><strong>Data Mining</strong><br>Data preprocessing, pattern discovery, and mining techniques.</li>
                        <li><strong>Cloud Computing</strong><br>AWS, Azure, and cloud-based data solutions.</li>
                        <li><strong>Project Management</strong><br>Agile methodologies and software project management.</li>
                    </ul>
                </div>

                <div class="syllabus-section">
                    <h3>Semester 5</h3>
                    <ul class="course-list">
                        <li><strong>Natural Language Processing</strong><br>Text analysis, sentiment analysis, and language models.</li>
                        <li><strong>Time Series Analysis</strong><br>Forecasting, ARIMA models, and temporal data analysis.</li>
                        <li><strong>Ethics in Data Science</strong><br>Data privacy, bias, and ethical considerations.</li>
                        <li><strong>Internship/Project</strong><br>Industry internship or major project work.</li>
                    </ul>
                </div>

                <div class="syllabus-section">
                    <h3>Semester 6</h3>
                    <ul class="course-list">
                        <li><strong>Advanced Machine Learning</strong><br>Ensemble methods, reinforcement learning, and advanced algorithms.</li>
                        <li><strong>Data Science Capstone Project</strong><br>Real-world problem solving using data science techniques.</li>
                        <li><strong>Elective Course</strong><br>Specialized topics based on student interest.</li>
                        <li><strong>Soft Skills Development</strong><br>Leadership, teamwork, and career development.</li>
                    </ul>
                </div>

                <div class="eligibility-box">
                    <h3 style="color:var(--college-blue); margin-bottom:10px;">Course Structure</h3>
                    <p>The program includes theory classes, practical lab sessions, workshops, and industry projects. Students are encouraged to participate in research activities and internships for hands-on experience.</p>
                </div>
            </div>
        </main>

                @include('partials.department-sidebar', ['dept' => $dept])

    </div>

@endsection