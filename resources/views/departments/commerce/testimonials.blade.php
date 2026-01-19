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
    
    .testimonial {
        background: #f8f9fa;
        padding: 20px;
        margin: 20px 0;
        border-left: 4px solid var(--college-blue);
        border-radius: 4px;
        font-style: italic;
    }
    
    .testimonial-author {
        font-weight: bold;
        color: var(--college-blue);
        margin-top: 10px;
        font-style: normal;
    }
    
    .sidebar { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border: 1px solid #e0e0e0; }
    .sidebar-section { margin-bottom: 30px; }
    .sidebar-title { font-size: 1.2rem; font-weight: 700; color: var(--college-blue); margin-bottom: 15px; border-bottom: 2px solid var(--accent-gold); padding-bottom: 5px; }
    .sidebar-links { list-style: none; padding: 0; }
    .sidebar-links li { margin-bottom: 8px; }
    .sidebar-links a { display: block; padding: 8px 12px; border-radius: 4px; transition: all 0.3s ease; font-size: 0.95rem; }
    .sidebar-links a:hover { background: var(--college-blue); color: #fff; transform: translateX(5px); }
    .sidebar-links a i { margin-right: 8px; width: 16px; }
    
    @media (max-width: 992px) { .container { grid-template-columns: 1fr; gap: 20px; padding: 25px 15px; } }
</style>
@endpush

@section('content')

    <div class="container">
        <main>
            <div class="content-block">
                <h1 class="page-title">Testimonials</h1>
                
                <p>Read what our students, alumni, and partners have to say about the department and their experiences with our programs.</p>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Student Testimonials</h3>
                
                <div class="testimonial">
                    "The department provided me with excellent education and mentorship. The faculty are highly experienced and supportive, and the curriculum is well-designed to meet industry standards."
                    <div class="testimonial-author">- Student Name, Batch 2023</div>
                </div>
                
                <div class="testimonial">
                    "I have gained invaluable knowledge and skills during my time here. The hands-on learning approach and modern facilities have prepared me well for my career."
                    <div class="testimonial-author">- Student Name, Batch 2022</div>
                </div>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Alumni Testimonials</h3>
                
                <div class="testimonial">
                    "My experience in the department was transformative. The education I received has been instrumental in my professional success."
                    <div class="testimonial-author">- Alumni Name, Batch 2020</div>
                </div>
                
                <div class="testimonial">
                    "The department's emphasis on practical learning and industry connections helped me secure excellent placement opportunities."
                    <div class="testimonial-author">- Alumni Name, Batch 2019</div>
                </div>
                
                <h3 style="color: var(--college-blue); margin: 20px 0 15px 0;">Industry Partner Feedback</h3>
                
                <div class="testimonial">
                    "We are impressed with the quality of students graduating from this department. They are well-prepared and bring fresh perspectives to our organization."
                    <div class="testimonial-author">- Partner Organization</div>
                </div>
                
                <p style="margin-top: 20px;"><em>We are always looking for testimonials from students, alumni, and partners. Please contact the department office to share your experience.</em></p>
            </div>
        </main>

        
                @include('partials.department-sidebar', ['dept' => $dept, 'page' => 'testimonials'])

    </div>

@endsection
