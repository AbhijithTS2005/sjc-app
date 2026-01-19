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


    {{-- Header provided by layouts.app --}}

    <div class="container">
        
        <main>
            <div class="dept-banner">
            </div>

            <div class="content-block">
                <div class="dept-header">
                    <h1>Program Outcomes (PO, PSO, CO) - B.Com Department</h1>
                </div>

                <p>
                    The B.Com program is designed to achieve specific learning outcomes that prepare students for successful careers in commerce and business. These outcomes are categorized into Program Outcomes (PO), Program Specific Outcomes (PSO), and Course Outcomes (CO).
                </p>

                <div class="outcome-section">
                    <h3 class="outcome-title">Program Outcomes (PO)</h3>
                    <ul class="outcome-list">
                        <li class="outcome-item">
                            <div class="outcome-code">PO1:</div>
                            <p>Demonstrate knowledge of accounting principles and financial management.</p>
                        </li>
                        <li class="outcome-item">
                            <div class="outcome-code">PO2:</div>
                            <p>Apply business laws and regulations in commercial contexts.</p>
                        </li>
                        <li class="outcome-item">
                            <div class="outcome-code">PO3:</div>
                            <p>Develop entrepreneurial skills and business acumen.</p>
                        </li>
                        <li class="outcome-item">
                            <div class="outcome-code">PO4:</div>
                            <p>Use technology effectively in business operations.</p>
                        </li>
                    </ul>
                </div>

                <div class="outcome-section">
                    <h3 class="outcome-title">Program Specific Outcomes (PSO)</h3>
                    <ul class="outcome-list">
                        <li class="outcome-item">
                            <div class="outcome-code">PSO1:</div>
                            <p>Analyze financial statements and make informed business decisions.</p>
                        </li>
                        <li class="outcome-item">
                            <div class="outcome-code">PSO2:</div>
                            <p>Design marketing strategies for various business scenarios.</p>
                        </li>
                        <li class="outcome-item">
                            <div class="outcome-code">PSO3:</div>
                            <p>Implement ethical practices in business operations.</p>
                        </li>
                    </ul>
                </div>

                <div class="outcome-section">
                    <h3 class="outcome-title">Course Outcomes (CO) - Sample</h3>
                    <ul class="outcome-list">
                        <li class="outcome-item">
                            <div class="outcome-code">CO1:</div>
                            <p>Understand basic accounting concepts and prepare financial statements.</p>
                        </li>
                        <li class="outcome-item">
                            <div class="outcome-code">CO2:</div>
                            <p>Apply statistical methods to business data analysis.</p>
                        </li>
                        <li class="outcome-item">
                            <div class="outcome-code">CO3:</div>
                            <p>Communicate effectively in professional business environments.</p>
                        </li>
                    </ul>
                </div>

                <div class="eligibility-box">
                    <h3 style="color:var(--college-blue); margin-bottom:10px;">Assessment</h3>
                    <p>Student progress is continuously assessed through assignments, projects, presentations, and examinations aligned with these outcomes.</p>
                </div>
            </div>
        </main>

                @include('partials.department-sidebar', ['dept' => $dept])

    </div>

@endsection