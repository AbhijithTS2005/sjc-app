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
        min-height: 80vh;
    }
    
    .content-block {
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .course-header {
        border-bottom: 2px solid var(--college-blue);
        padding-bottom: 15px;
        margin-bottom: 20px;
    }
    
    .course-header h1 { 
        color: var(--college-blue); 
        font-size: 2rem; 
    }
    
    .info-box {
        background: linear-gradient(135deg, #eef2f7, #d9e4f0);
        border-left: 5px solid var(--college-blue);
        padding: 15px;
        margin: 15px 0;
        border-radius: 4px;
    }
    
    .sidebar {
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        border: 1px solid #e0e0e0;
    }
    
    .sidebar-section { margin-bottom: 30px; }
    .sidebar-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--college-blue);
        margin-bottom: 15px;
        border-bottom: 2px solid var(--accent-gold);
        padding-bottom: 5px;
    }
    
    .sidebar-links {
        list-style: none;
        padding: 0;
    }
    
    .sidebar-links li { margin-bottom: 8px; }
    .sidebar-links a {
        display: block;
        padding: 8px 12px;
        border-radius: 4px;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }
    
    .sidebar-links a:hover {
        background: var(--college-blue);
        color: #fff;
        transform: translateX(5px);
    }
    
    .sidebar-links a i { margin-right: 8px; width: 16px; }
    
    @media (max-width: 1200px) { 
        .container { gap: 20px; padding: 30px; }
        .course-header h1 { font-size: 1.8rem; }
    }
    
    @media (max-width: 992px) { 
        .container { grid-template-columns: 1fr; gap: 20px; padding: 25px 15px; }
        .content-block { padding: 20px; }
        .course-header h1 { font-size: 1.5rem; }
        .sidebar { padding: 20px; margin-top: 20px; }
    }
    
    @media (max-width: 768px) {
        .container { padding: 15px; gap: 15px; }
        .content-block { padding: 15px; }
        .course-header h1 { font-size: 1.3rem; margin-bottom: 10px; }
        .sidebar-title { font-size: 1rem; }
        .sidebar-links a { padding: 6px 10px; font-size: 0.9rem; }
        h3 { font-size: 1.1rem !important; }
        ul { margin-left: 15px !important; }
    }
    
    @media (max-width: 480px) {
        * { margin: 0; padding: 0; }
        .container { padding: 10px; gap: 10px; }
        .content-block { padding: 12px; border-radius: 4px; }
        .course-header { padding-bottom: 10px; margin-bottom: 15px; }
        .course-header h1 { font-size: 1.1rem; }
        .info-box { padding: 12px; margin: 10px 0; }
        .info-box h3 { font-size: 0.95rem; margin-bottom: 8px; }
        .info-box p { font-size: 0.85rem; }
        p { font-size: 0.9rem; line-height: 1.5; }
        h3 { font-size: 0.95rem !important; margin: 12px 0 8px 0 !important; }
        ul { margin-left: 12px !important; font-size: 0.9rem; }
        li { margin-bottom: 4px; }
        .sidebar { padding: 15px; margin-top: 15px; }
        .sidebar-title { font-size: 0.95rem; margin-bottom: 12px; }
        .sidebar-links li { margin-bottom: 6px; }
        .sidebar-links a { padding: 6px 8px; font-size: 0.85rem; }
        .sidebar-links a i { margin-right: 6px; width: 14px; }
    }
</style>
@endpush

@section('content')

    <div class="container">
        <main>
            <div class="content-block">
                <div class="course-header">
                    <h1>BBA (Aided)</h1>
                </div>
                
                <p>
                    The BBA (Aided) program is the premier business administration degree offered with significant institutional support and resources. Students receive comprehensive education in business management with emphasis on corporate governance, strategic management, and international business practices.
                </p>
                
                <div class="info-box">
                    <h3 style="color: var(--college-blue); margin-bottom: 10px;">Duration & Structure</h3>
                    <p>3-year undergraduate program with 6 semesters, delivered with premium infrastructure and faculty support.</p>
                </div>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Program Highlights</h3>
                <ul style="margin-left: 20px;">
                    <li>Comprehensive business management curriculum</li>
                    <li>Strategic management and business policy focus</li>
                    <li>Corporate training and internship programs</li>
                    <li>Industry partnerships and guest lectures</li>
                    <li>Case study analysis and business simulation</li>
                    <li>Premium faculty and learning infrastructure</li>
                </ul>
                
                <div class="info-box">
                    <h3 style="color: var(--college-blue); margin-bottom: 10px;">Placement & Support</h3>
                    <p>Dedicated placement support with tie-ups to leading corporations, management consulting firms, and financial institutions. Students receive mentoring and skill development programs.</p>
                </div>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Career Prospects</h3>
                <p>Graduates become Business Managers, Strategy Consultants, Corporate Leaders, Entrepreneurs, or Management Analysts in multinational corporations, startups, and consulting firms.</p>
            </div>
        </main>

        <aside class="sidebar">
            <div class="sidebar-section">
                <div class="sidebar-title">Course Information</div>
                <ul class="sidebar-links">
                    <li><a href="{{ route('academics.page', ['course' => $course, 'page' => 'academiccalender']) }}"><i class="fas fa-calendar"></i> Academic Calendar</a></li>
                    <li><a href="{{ route('academics.page', ['course' => $course, 'page' => 'syllabus']) }}"><i class="fas fa-book"></i> Syllabus & Courses</a></li>
                    <li><a href="{{ route('academics.page', ['course' => $course, 'page' => 'feestructure']) }}"><i class="fas fa-money-bill"></i> Fee Structure</a></li>
                    <li><a href="{{ route('academics.page', ['course' => $course, 'page' => 'outcomes']) }}"><i class="fas fa-lightbulb"></i> Outcomes</a></li>
                </ul>
            </div>
        </aside>
    </div>

@endsection
