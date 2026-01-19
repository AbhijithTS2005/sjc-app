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
    
    .info-box { background: #f8f9fa; border-left: 4px solid var(--college-blue); padding: 15px; margin: 15px 0; border-radius: 4px; }
    
    .sidebar { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border: 1px solid #e0e0e0; }
    .sidebar-section { margin-bottom: 30px; }
    .sidebar-title { font-size: 1.2rem; font-weight: 700; color: var(--college-blue); margin-bottom: 15px; border-bottom: 2px solid var(--accent-gold); padding-bottom: 5px; }
    .sidebar-links { list-style: none; padding: 0; }
    .sidebar-links li { margin-bottom: 8px; }
    .sidebar-links a { display: block; padding: 8px 12px; border-radius: 4px; transition: all 0.3s ease; font-size: 0.95rem; }
    .sidebar-links a:hover { background: var(--college-blue); color: #fff; transform: translateX(5px); }
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
                <h1 class="page-title">Placement & Internships</h1>
                
                <p>Our department is committed to assisting students in securing excellent placement opportunities and internships with leading organizations.</p>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Placement Highlights</h3>
                <div class="info-box">
                    <strong>Average Package:</strong> Competitive salary packages offered by top recruiters
                </div>
                <div class="info-box">
                    <strong>Placement Rate:</strong> High placement percentage with diverse career options
                </div>
                <div class="info-box">
                    <strong>Top Recruiters:</strong> Reputed national and international organizations
                </div>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Internship Programs</h3>
                <p>The department facilitates internship opportunities during summer breaks and academic sessions. Students gain practical experience working with industry professionals and research institutions.</p>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Career Services</h3>
                <ul style="margin-left: 20px; margin-top: 10px;">
                    <li>Resume and interview preparation</li>
                    <li>Career counseling and guidance</li>
                    <li>Industry networking events</li>
                    <li>Skill development workshops</li>
                </ul>
            </div>
        </main>

        
                @include('partials.department-sidebar', ['dept' => $dept, 'page' => 'placementinternships'])

    </div>

@endsection
