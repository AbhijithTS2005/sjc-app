@extends('layouts.app')

@push('styles')
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f4f4f4; color: #333; line-height: 1.6; }
        .container { max-width: 1200px; margin: 0 auto; padding: 40px 20px; }
        .content-block { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); margin-bottom: 30px; }
        .page-title { color: var(--college-blue); font-size: 2.5rem; border-bottom: 3px solid var(--accent-gold); padding-bottom: 20px; margin-bottom: 30px; }
        .section-title { color: var(--college-blue); font-size: 1.8rem; margin: 30px 0 20px 0; border-left: 5px solid var(--accent-gold); padding-left: 15px; }
        .info-box { background: #e8f4f8; border-left: 4px solid var(--college-blue); padding: 20px; margin: 20px 0; border-radius: 4px; }
        p { text-align: justify; line-height: 1.8; color: #555; margin-bottom: 15px; }
        .gallery-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin: 30px 0; }
        .gallery-item { position: relative; overflow: hidden; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: all 0.3s; background: #f0f0f0; min-height: 250px; display: flex; align-items: center; justify-content: center; }
        .gallery-item:hover { transform: scale(1.05); box-shadow: 0 8px 16px rgba(0,0,0,0.2); }
        .gallery-item img { width: 100%; height: 100%; object-fit: cover; }
        .gallery-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, var(--college-blue) 0%, #1a4d7a 100%); color: white; font-size: 3rem; }
        .gallery-caption { position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.7); color: white; padding: 15px; transform: translateY(100%); transition: transform 0.3s; }
        .gallery-item:hover .gallery-caption { transform: translateY(0); }
        .category-tabs { display: flex; gap: 10px; flex-wrap: wrap; margin: 20px 0; justify-content: center; }
        .tab-btn { padding: 10px 20px; background: #f0f0f0; border: 2px solid var(--college-blue); color: var(--college-blue); border-radius: 20px; cursor: pointer; transition: all 0.3s; font-weight: 600; }
        .tab-btn.active { background: var(--college-blue); color: white; }
        .tab-btn:hover { background: var(--college-blue); color: white; }
        .highlight { background: #fff9e6; padding: 15px; border-radius: 4px; margin: 20px 0; border-left: 4px solid var(--accent-gold); }
        .btn { display: inline-block; background: var(--college-blue); color: white; padding: 12px 25px; border-radius: 4px; text-decoration: none; transition: all 0.3s; margin: 10px 10px 10px 0; }
        .btn:hover { background: #002244; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.2); }
        @media (max-width: 768px) { .page-title { font-size: 1.8rem; } .section-title { font-size: 1.4rem; } .content-block { padding: 20px; } .gallery-container { grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); } }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="content-block">
            <h1 class="page-title"><i class="fas fa-images"></i> Gallery</h1>

            <div class="info-box">
                <p>Explore the vibrant campus life of St. Joseph's College through our photo gallery. From academics to sports, cultural events to infrastructure, witness the diverse facets of our institution.</p>
            </div>

            <h2 class="section-title">Browse by Category</h2>
            <div class="category-tabs">
                <button class="tab-btn active" onclick="filterGallery('all')"><i class="fas fa-th"></i> All</button>
                <button class="tab-btn" onclick="filterGallery('campus')"><i class="fas fa-building"></i> Campus</button>
                <button class="tab-btn" onclick="filterGallery('academics')"><i class="fas fa-book"></i> Academics</button>
                <button class="tab-btn" onclick="filterGallery('events')"><i class="fas fa-calendar"></i> Events</button>
                <button class="tab-btn" onclick="filterGallery('sports')"><i class="fas fa-football-ball"></i> Sports</button>
                <button class="tab-btn" onclick="filterGallery('culture')"><i class="fas fa-music"></i> Cultural</button>
            </div>

            <h2 class="section-title">Campus Highlights</h2>
            <div class="gallery-container" id="galleryContainer">
                <!-- Gallery Item 1 -->
                <div class="gallery-item" data-category="campus">
                    <div class="gallery-placeholder"><i class="fas fa-university"></i></div>
                    <div class="gallery-caption">Main Campus Building</div>
                </div>

                <!-- Gallery Item 2 -->
                <div class="gallery-item" data-category="academics">
                    <div class="gallery-placeholder"><i class="fas fa-microscope"></i></div>
                    <div class="gallery-caption">Science Laboratory</div>
                </div>

                <!-- Gallery Item 3 -->
                <div class="gallery-item" data-category="campus">
                    <div class="gallery-placeholder"><i class="fas fa-tree"></i></div>
                    <div class="gallery-caption">Campus Garden</div>
                </div>

                <!-- Gallery Item 4 -->
                <div class="gallery-item" data-category="academics">
                    <div class="gallery-placeholder"><i class="fas fa-chalkboard-user"></i></div>
                    <div class="gallery-caption">Classroom Session</div>
                </div>

                <!-- Gallery Item 5 -->
                <div class="gallery-item" data-category="sports">
                    <div class="gallery-placeholder"><i class="fas fa-basketball"></i></div>
                    <div class="gallery-caption">Sports Complex</div>
                </div>

                <!-- Gallery Item 6 -->
                <div class="gallery-item" data-category="events">
                    <div class="gallery-placeholder"><i class="fas fa-graduation-cap"></i></div>
                    <div class="gallery-caption">Graduation Ceremony</div>
                </div>

                <!-- Gallery Item 7 -->
                <div class="gallery-item" data-category="culture">
                    <div class="gallery-placeholder"><i class="fas fa-music"></i></div>
                    <div class="gallery-caption">Cultural Festival</div>
                </div>

                <!-- Gallery Item 8 -->
                <div class="gallery-item" data-category="campus">
                    <div class="gallery-placeholder"><i class="fas fa-book-reader"></i></div>
                    <div class="gallery-caption">Library</div>
                </div>

                <!-- Gallery Item 9 -->
                <div class="gallery-item" data-category="events">
                    <div class="gallery-placeholder"><i class="fas fa-users"></i></div>
                    <div class="gallery-caption">College Assembly</div>
                </div>

                <!-- Gallery Item 10 -->
                <div class="gallery-item" data-category="sports">
                    <div class="gallery-placeholder"><i class="fas fa-volleyball-ball"></i></div>
                    <div class="gallery-caption">Sports Tournament</div>
                </div>

                <!-- Gallery Item 11 -->
                <div class="gallery-item" data-category="culture">
                    <div class="gallery-placeholder"><i class="fas fa-theater-masks"></i></div>
                    <div class="gallery-caption">Cultural Program</div>
                </div>

                <!-- Gallery Item 12 -->
                <div class="gallery-item" data-category="academics">
                    <div class="gallery-placeholder"><i class="fas fa-computer"></i></div>
                    <div class="gallery-caption">Computer Lab</div>
                </div>
            </div>

            <h2 class="section-title">About Our Facilities</h2>
            <p>St. Joseph's College boasts world-class facilities spread across its verdant campus. Our infrastructure supports academic excellence, sports development, and holistic student growth. From modern classrooms and well-equipped laboratories to recreational facilities and hostel accommodations, we provide an environment conducive to learning and personal development.</p>

            <h2 class="section-title">Student Life at SJC</h2>
            <p>Our gallery showcases the vibrant life on campus - from rigorous academic sessions to exciting sports competitions, from cultural celebrations to social service initiatives. Every photograph captures a moment that represents our commitment to developing well-rounded individuals who can contribute meaningfully to society.</p>

            <h2 class="section-title">Campus Events & Programs</h2>
            <ul style="margin: 15px 0 15px 30px;">
                <li><strong>Orientation Programs:</strong> Welcoming new students to the college community</li>
                <li><strong>Academic Seminars:</strong> Expert lectures and knowledge-sharing sessions</li>
                <li><strong>Sports Meet:</strong> Annual inter-class and inter-departmental competitions</li>
                <li><strong>Cultural Festival:</strong> Celebrating diverse talents and traditions</li>
                <li><strong>Graduation Ceremony:</strong> Honoring academic achievements</li>
                <li><strong>Social Service:</strong> Community engagement and welfare initiatives</li>
                <li><strong>Research Symposia:</strong> Showcasing student and faculty research</li>
                <li><strong>Technical Workshops:</strong> Hands-on training in specialized skills</li>
            </ul>

            <div class="highlight">
                <h4><i class="fas fa-camera"></i> Share Your Moments</h4>
                <p>If you have any photographs from college events or campus life that you'd like to share with us, please contact our Public Relations Office. We regularly update our gallery with new pictures from ongoing events and activities.</p>
            </div>

            <h2 class="section-title">Media & Press</h2>
            <p>For high-resolution images for publication, press inquiries, or media coverage requests, please contact our Public Relations and Communications Office.</p>

            <a href="mailto:pr@college.ac.in" class="btn"><i class="fas fa-envelope"></i> Contact PR Office</a>
            <a href="{{ route('home') }}" class="btn"><i class="fas fa-arrow-left"></i> Back to Home</a>
        </div>
    </div>

    <script>
        function filterGallery(category) {
            // Update active button
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            // Filter gallery items
            const items = document.querySelectorAll('.gallery-item');
            items.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
@endsection
