@extends('layouts.app')
@include('partials.department-sidebar-css')
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
    
    .content-block { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
    .page-title { color: var(--college-blue); font-size: 2rem; border-bottom: 2px solid var(--accent-gold); padding-bottom: 15px; margin-bottom: 25px; }
    
    .issue-item { background: #f8f9fa; padding: 15px; margin: 15px 0; border-left: 4px solid var(--college-blue); border-radius: 4px; }
    .issue-item strong { color: var(--college-blue); }
    
    .sidebar { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border: 1px solid #e0e0e0; }
    .sidebar-section { margin-bottom: 30px; }
    .sidebar-title { font-size: 1.2rem; font-weight: 700; color: var(--college-blue); margin-bottom: 15px; border-bottom: 2px solid var(--accent-gold); padding-bottom: 5px; }
    .sidebar-links { list-style: none; padding: 0; }
    .sidebar-links li { margin-bottom: 8px; }
    .sidebar-links a { display: block; padding: 8px 12px; border-radius: 4px; transition: all 0.3s ease; font-size: 0.95rem; }
    .sidebar-links a:hover { background: var(--college-blue); color: #fff; transform: translateX(5px); }
    .sidebar-links a i { margin-right: 8px; width: 16px; }
    
    @media (max-width: 1200px) { 
        .container { 
            grid-template-columns: 3fr 1fr; 
            gap: 25px; 
            padding: 30px 20px; 
        } 
    }

    @media (max-width: 992px) { 
        .container { 
            grid-template-columns: 1fr; 
            gap: 20px; 
            padding: 25px 15px; 
        } 
    }

    @media (max-width: 768px) {
        .container {
            grid-template-columns: 1fr;
            padding: 20px 10px;
            gap: 15px;
        }
        .page-title {
            font-size: 1.6rem;
        }
        .content-block {
            padding: 15px;
        }
        .issue-item {
            padding: 12px;
            margin: 12px 0;
        }
    }

    @media (max-width: 576px) {
        .container {
            grid-template-columns: 1fr;
            padding: 15px 8px;
            gap: 10px;
        }
        .page-title {
            font-size: 1.3rem;
        }
        .content-block {
            padding: 12px;
        }
        .issue-item {
            padding: 10px;
            margin: 10px 0;
            font-size: 0.9rem;
        }
        h3 {
            font-size: 1.1rem;
        }
    }
</style>
@endpush

@section('content')

    <div class="container">
        <main>
            <div class="content-block">
                <h1 class="page-title">Magazine</h1>
                
                <p>The department publishes an annual magazine featuring articles, research highlights, student achievements, faculty contributions, and departmental news.</p>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Current & Past Issues</h3>
                
                <div class="issue-item">
                    <strong>Latest Issue:</strong> The most recent edition featuring cutting-edge research, student success stories, and faculty achievements.
                </div>
                
                <div class="issue-item">
                    <strong>Archive:</strong> Complete archive of previous issues available for download and reference.
                </div>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Magazine Content</h3>
                <ul style="margin-left: 20px; margin-top: 10px;">
                    <li>Faculty research highlights</li>
                    <li>Student achievement stories</li>
                    <li>Academic and co-curricular activities</li>
                    <li>Alumni updates and success stories</li>
                    <li>Department news and announcements</li>
                    <li>Interview with eminent personalities</li>
                </ul>
                
                <p style="margin-top: 20px;"><em>For copies of the magazine or to submit articles for publication, please contact the department office.</em></p>
            </div>
        </main>

        
                @include('partials.department-sidebar', ['dept' => $dept, 'page' => 'magazine'])

    </div>

@endsection
