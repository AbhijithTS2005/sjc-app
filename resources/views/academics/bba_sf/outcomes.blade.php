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
    }
    
    .content-block {
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .page-title {
        color: var(--college-blue);
        font-size: 2rem;
        border-bottom: 2px solid var(--accent-gold);
        padding-bottom: 15px;
        margin-bottom: 25px;
    }
    
    .outcome-box {
        background: #f8f9fa;
        padding: 15px;
        margin: 15px 0;
        border-left: 4px solid var(--college-blue);
        border-radius: 4px;
    }
    
    .outcome-box h4 { color: var(--college-blue); margin-bottom: 8px; }
    
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
        .page-title { font-size: 1.8rem; }
    }
    
    @media (max-width: 992px) { 
        .container { grid-template-columns: 1fr; gap: 20px; padding: 25px 15px; }
        .content-block { padding: 20px; }
        .page-title { font-size: 1.5rem; }
        .sidebar { padding: 20px; margin-top: 20px; }
    }
    
    @media (max-width: 768px) {
        .container { padding: 15px; gap: 15px; }
        .content-block { padding: 15px; }
        .page-title { font-size: 1.3rem; margin-bottom: 10px; }
        .sidebar-title { font-size: 1rem; }
        .sidebar-links a { padding: 6px 10px; font-size: 0.9rem; }
        h3 { font-size: 1.1rem !important; }
        ul { margin-left: 15px !important; }
    }
    
    @media (max-width: 480px) {
        * { margin: 0; padding: 0; }
        .container { padding: 10px; gap: 10px; }
        .content-block { padding: 12px; border-radius: 4px; }
        .page-title { font-size: 1.1rem; margin-bottom: 10px; }
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
                <h1 class="page-title">Program Outcomes</h1>
                
                <p>The {{ ucfirst($course) }} program is designed to impart knowledge, skills, and competencies that prepare students for successful careers and further studies.</p>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Program Objectives (PO)</h3>
                <p>Our program aims to:</p>
                
                <div class="outcome-box">
                    <h4>Knowledge & Understanding</h4>
                    <p>Provide comprehensive knowledge of core concepts, principles, and theories in the discipline</p>
                </div>
                
                <div class="outcome-box">
                    <h4>Practical Skills</h4>
                    <p>Develop practical and applied skills through laboratory work, projects, and case studies</p>
                </div>
                
                <div class="outcome-box">
                    <h4>Problem Solving</h4>
                    <p>Enhance critical thinking and analytical abilities for solving real-world problems</p>
                </div>
                
                <div class="outcome-box">
                    <h4>Professional Competence</h4>
                    <p>Equip students with industry-relevant skills and professional competencies</p>
                </div>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Program Specific Outcomes (PSO)</h3>
                <p>Specialized learning outcomes specific to the {{ ucfirst($course) }} program including domain expertise and specialized skills.</p>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Course Outcomes (CO)</h3>
                <p>Individual course outcomes outline what students will be able to do after completing each course. These are mapped to program objectives and competency standards.</p>
                
                <p style="margin-top: 20px;"><em>For detailed course outcomes, please refer to individual course syllabi.</em></p>
            </div>
        </main>

        <aside class="sidebar">
            <div class="sidebar-section">
                <div class="sidebar-title">Course Pages</div>
                <ul class="sidebar-links">
                    <li><a href="{{ route('academics.home', ['course' => $course]) }}"><i class="fas fa-home"></i> Course Home</a></li>
                    <li><a href="{{ route('academics.page', ['course' => $course, 'page' => 'academiccalender']) }}"><i class="fas fa-calendar"></i> Academic Calendar</a></li>
                    <li><a href="{{ route('academics.page', ['course' => $course, 'page' => 'syllabus']) }}"><i class="fas fa-book"></i> Syllabus & Courses</a></li>
                    <li><a href="{{ route('academics.page', ['course' => $course, 'page' => 'feestructure']) }}"><i class="fas fa-money-bill"></i> Fee Structure</a></li>
                    <li><a href="{{ route('academics.page', ['course' => $course, 'page' => 'outcomes']) }}"><i class="fas fa-lightbulb"></i> Outcomes</a></li>
                </ul>
            </div>
        </aside>
    </div>

@endsection
