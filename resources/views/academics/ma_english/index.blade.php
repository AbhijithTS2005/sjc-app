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
    
    @media (max-width: 1200px) { .container { grid-template-columns: 3fr 1fr; gap: 25px; padding: 30px 20px; } }
    @media (max-width: 992px) { .container { grid-template-columns: 1fr; gap: 20px; padding: 25px 15px; } }
    @media (max-width: 768px) { .container { grid-template-columns: 1fr; padding: 20px 10px; gap: 15px; } .page-title { font-size: 1.6rem; } .content-block { padding: 15px; } }
    @media (max-width: 576px) { .container { grid-template-columns: 1fr; padding: 15px 8px; gap: 10px; } .page-title { font-size: 1.3rem; } .content-block { padding: 12px; } }
</style>
@endpush

@section('content')

    <div class="container">
        <main>
            <div class="content-block">
                <div class="course-header">
                    <h1>M.A English</h1>
                </div>
                
                <p>
                    The M.A English program is a comprehensive postgraduate degree focusing on literature, language, and cultural studies. Students explore diverse literary traditions, critical theories, and linguistic concepts while developing advanced research and analytical skills.
                </p>
                
                <div class="info-box">
                    <h3 style="color: var(--college-blue); margin-bottom: 10px;">Duration & Structure</h3>
                    <p>2-year postgraduate program with 4 semesters including coursework, seminars, and dissertation.</p>
                </div>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Specialization Areas</h3>
                <ul style="margin-left: 20px;">
                    <li>British and American Literature</li>
                    <li>Indian Literature and Regional Languages</li>
                    <li>Literary Theory and Criticism</li>
                    <li>Linguistics and Language Studies</li>
                    <li>Cultural Studies and Humanities</li>
                    <li>Creative Writing and Communication</li>
                </ul>
                
                <div class="info-box">
                    <h3 style="color: var(--college-blue); margin-bottom: 10px;">Research & Dissertation</h3>
                    <p>Students undertake original research on literary topics under faculty supervision, culminating in a dissertation that contributes to literary scholarship and critical understanding.</p>
                </div>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Career Prospects</h3>
                <p>Graduates pursue careers as academics, writers, journalists, content developers, cultural critics, or proceed to PhD programs in literature, linguistics, or related humanities disciplines.</p>
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
