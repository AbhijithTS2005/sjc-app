@extends('layouts.app')
@include('partials.department-sidebar-css')

@push('styles')
<style> 
        /* --- COPY OF YOUR EXISTING STYLES --- */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f4f4f4; color: #333; line-height: 1.6; background-image: radial-gradient(circle, rgba(0,51,102,0.05) 1px, transparent 1px); background-size: 30px 30px; }

        a { text-decoration: none; color: inherit; transition: all 0.3s ease; }
        
        /* Header styles are provided by layouts.app */

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

        /* --- LEFT COLUMN STYLES (Specific to Dept Page) --- */
        .dept-banner {
            width: 100%;
            height: 350px;
            background-color: #ddd;
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
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,51,102,0.4), rgba(240,173,78,0.2));
            pointer-events: none;
            z-index: 1;
        }
        .dept-banner:hover { transform: scale(1.02); }
        .banner-slideshow {
            display: flex;
            width: 300%;
            height: 100%;
            animation: slide 15s infinite linear;
        }
        .banner-slideshow img {
            width: 33.33%;
            height: 100%;
            object-fit: cover;
        }
        @keyframes slide {
            0% { transform: translateX(0%); }
            33.33% { transform: translateX(-33.33%); }
            66.66% { transform: translateX(-66.66%); }
            100% { transform: translateX(-66.66%); }
        }

        .dept-header {
            border-bottom: 2px solid var(--college-blue);
            padding-bottom: 10px;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease-out 0.8s both;
        }
        
        .dept-header h1 { color: var(--college-blue); font-size: 2rem; }

        .content-block {
            background: white;
            padding: 30px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: justify;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            animation: fadeInUp 1s ease-out 1s both;
        }

        .eligibility-box {
            background: linear-gradient(135deg, #eef2f7, #d9e4f0);
            border-left: 5px solid var(--accent-gold);
            padding: 20px;
            margin-top: 20px;
            border-radius: 0 8px 8px 0;
            animation: slideInLeft 1s ease-out 1.2s both;
        }

        /* --- RIGHT SIDEBAR STYLES --- */
        
        
        
        .sidebar-links a:hover {
            background: var(--college-blue);
            color: #fff;
            transform: translateX(5px);
        }
        .sidebar-links a i {
            margin-right: 8px;
            width: 16px;
        }

        /* Highlight the active link if needed */
        .active-link { color: var(--college-blue) !important; font-weight: bold; }


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
            .dept-banner {
                height: 280px;
            }
            .dept-header h1 { font-size: 1.6rem; }
            .content-block {
                padding: 20px;
                margin-bottom: 15px;
            }
            }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
                padding: 20px 10px;
                gap: 15px;
            }
            .dept-banner {
                height: 240px;
                margin-bottom: 20px;
            }
            .dept-header h1 { 
                font-size: 1.4rem;
                margin-bottom: 15px;
            }
            .content-block {
                padding: 15px;
                margin-bottom: 15px;
            }
            .content-block p {
                font-size: 0.95rem;
                text-align: left;
            }
            .eligibility-box {
                padding: 15px;
                margin-top: 15px;
                font-size: 0.9rem;
            }
            .eligibility-box h3 {
                font-size: 1rem;
            }
            
        }

        @media (max-width: 576px) {
            .container {
                grid-template-columns: 1fr;
                padding: 15px;
                gap: 10px;
            }
            .dept-banner {
                height: 200px;
                margin-bottom: 15px;
            }
            .banner-slideshow img {
                width: 33.33%;
            }
            .dept-header h1 { 
                font-size: 1.2rem;
                margin-bottom: 10px;
            }
            .content-block {
                padding: 12px;
                margin-bottom: 12px;
                border-radius: 6px;
            }
            .content-block p {
                font-size: 0.85rem;
                line-height: 1.4;
                text-align: left;
            }
            .eligibility-box {
                padding: 12px;
                margin-top: 10px;
                font-size: 0.8rem;
                border-left-width: 4px;
            }
            .eligibility-box h3 {
                font-size: 0.95rem;
                margin-bottom: 8px;
            }
            
            
            .sidebar-links a i {
                margin-right: 6px;
            }
        }

        @media (max-width: 480px) {
            .container {
                grid-template-columns: 1fr;
                padding: 10px;
                gap: 8px;
            }
            .dept-banner {
                height: 180px;
                margin-bottom: 10px;
                border-radius: 6px;
            }
            .dept-header h1 { 
                font-size: 1.1rem;
                margin-bottom: 8px;
            }
            .content-block {
                padding: 10px;
                margin-bottom: 10px;
            }
            .content-block p {
                font-size: 0.8rem;
                line-height: 1.3;
            }
            .eligibility-box {
                padding: 10px;
                margin-top: 8px;
                font-size: 0.75rem;
            }
            .eligibility-box h3 {
                font-size: 0.9rem;
                margin-bottom: 6px;
            }
            
        }
    </style>
@endpush

@section('content')

    {{-- Header provided by layouts.app --}}

    <div class="container">
        
        <main>
            <div class="dept-banner">
                <div class="banner-slideshow">
                    <img src="https://images.unsplash.com/photo-1509228468518-180dd4864904?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&h=400&q=80" alt="Mathematics Classroom">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&h=400&q=80" alt="Mathematical Equations">
                    <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&h=400&q=80" alt="Geometry and Shapes">
                </div>
            </div>

            <div class="content-block">
                <div class="dept-header">
                    <h1>Department of @deptDisplay($dept)</h1>
                </div>

                <p>
                    The Department of Mathematics is committed to providing a strong foundation in mathematical sciences, fostering analytical thinking and problem-solving skills. We offer comprehensive programs that integrate pure and applied mathematics, preparing students for careers in research, education, industry, and technology. Our state-of-the-art facilities include computer labs with mathematical software, a well-equipped library, and modern classrooms designed for interactive learning.
                </p>
                <br>
                <p>
                    Students are encouraged to participate in mathematics competitions, research projects, and internships at leading institutions. The department regularly organizes seminars, workshops on advanced topics, and mathematics festivals to enhance learning and innovation.
                </p>

                <div class="eligibility-box">
                    <h3 style="color:var(--college-blue); margin-bottom:10px;">Eligibility criteria</h3>
                    <p>Candidates must have passed Higher Secondary Examination with Mathematics as one of the subjects or an equivalent examination recognized by the University.</p>
                </div>
            </div>
        </main>

        @include('partials.department-sidebar', ['dept' => $dept])

    </div>

@endsection