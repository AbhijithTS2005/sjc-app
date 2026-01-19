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
    
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin: 20px 0;
    }
    
    .gallery-item {
        background: #f8f9fa;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .gallery-item:hover { transform: translateY(-5px); box-shadow: 0 4px 12px rgba(0,0,0,0.2); }
    .gallery-item img { width: 100%; height: 200px; object-fit: cover; }
    .gallery-item-text { padding: 15px; }
    .gallery-item-text h4 { color: var(--college-blue); margin-bottom: 8px; }
    
    .sidebar { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border: 1px solid #e0e0e0; }
    .sidebar-section { margin-bottom: 30px; }
    .sidebar-title { font-size: 1.2rem; font-weight: 700; color: var(--college-blue); margin-bottom: 15px; border-bottom: 2px solid var(--accent-gold); padding-bottom: 5px; }
    .sidebar-links { list-style: none; padding: 0; }
    .sidebar-links li { margin-bottom: 8px; }
    .sidebar-links a { display: block; padding: 8px 12px; border-radius: 4px; transition: all 0.3s ease; font-size: 0.95rem; }
    .sidebar-links a:hover { background: var(--college-blue); color: #fff; transform: translateX(5px); }
    .sidebar-links a i { margin-right: 8px; width: 16px; }
    
    @media (max-width: 992px) {
        .container { grid-template-columns: 1fr; gap: 20px; padding: 25px 15px; }
        .gallery-grid { grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); }
    }
</style>
@endpush

@section('content')

    <div class="container">
        <main>
            <div class="content-block">
                <h1 class="page-title">Gallery</h1>
                
                <p>Explore our gallery showcasing the vibrant campus life, academic activities, events, and achievements of the department.</p>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Photo Gallery</h3>
                
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&h=300&q=60" alt="Campus Event">
                        <div class="gallery-item-text">
                            <h4>Campus Events</h4>
                            <p>Memorable departmental events and celebrations</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1427504494785-cdbe6f9f2c6d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&h=300&q=60" alt="Academic Activities">
                        <div class="gallery-item-text">
                            <h4>Academic Activities</h4>
                            <p>Classes, seminars, and workshops</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&h=300&q=60" alt="Student Achievements">
                        <div class="gallery-item-text">
                            <h4>Achievements</h4>
                            <p>Student accomplishments and awards</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1517836357463-d25ddfcbf042?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&h=300&q=60" alt="Campus Facilities">
                        <div class="gallery-item-text">
                            <h4>Facilities</h4>
                            <p>Modern laboratories and infrastructure</p>
                        </div>
                    </div>
                </div>
                
                <p style="margin-top: 20px;"><em>For more photos and videos, please visit our social media pages or contact the department office.</em></p>
            </div>
        </main>

        
                @include('partials.department-sidebar', ['dept' => $dept, 'page' => 'gallery'])

    </div>

@endsection
