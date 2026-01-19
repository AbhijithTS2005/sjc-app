@extends('layouts.app')

@push('styles')
    <style>
        /* --- General Reset & Variables --- */
        :root {
            --college-blue: #003366;
            --accent-gold: #ffcc00;
            --light-gray: #f8f9fa;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f4f4; color: #333; line-height: 1.6; }

        /* --- HERO SECTION --- */
        .hero-section {
            position: relative;
            width: 100%;
            height: 450px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            background: #000;
        }

        .hero-video {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            z-index: 1;
            opacity: 0.7;
        }

        .hero-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 2;
        }

        .hero-content {
            position: relative;
            z-index: 3;
            text-align: center;
            max-width: 900px;
            padding: 20px;
        }

        .hero-content h2 { font-size: 2.8rem; margin-bottom: 10px; text-shadow: 2px 2px 8px rgba(0,0,0,0.7); }
         
        /* Admission Popup */
        .admission-popup { 
            display: block; 
            position: fixed; 
            bottom: 70px !important; 
            right: 30px; 
            width: 280px; 
            background-color: rgba(255, 255, 255, 1); 
            border: 2px solid var(--college-blue); 
            border-radius: 12px; 
            padding: 25px; 
            box-shadow: 0 8px 25px rgba(0,0,0,0.3); 
            z-index: 1000; 
            text-align: center; 
            animation: popIn 0.9s ease-out; 
        }

        @keyframes popIn { 
            from { transform: translateY(20px); opacity: 0; } 
            to { transform: translateY(0); opacity: 1; } 
        }
        .popup-btn { display: inline-block; margin-top: 15px; background: var(--college-blue); color: white; padding: 8px 20px; border-radius: 20px; font-weight: 600; transition: background 0.3s; }
        .popup-btn:hover { background: #002244; }

        .close-btn { 
            position: absolute; 
            top: 0px; 
            right: 10px; 
            font-size: 1.8rem; 
            cursor: pointer; 
            color: #264170ff; 
        }
        
        /* --- MAIN LAYOUT --- */
        .container { 
            display: grid; 
            grid-template-columns: 1fr 380px; 
            gap: 30px; 
            padding: 40px; 
            max-width: 1400px; 
            margin: 0 auto; 
        }

        .section-box { background: white; border: 1px solid #ddd; padding: 20px; border-radius: 8px; margin-bottom: 25px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        
        .section-title { 
            font-size: 1.8rem; 
            color: var(--college-blue); 
            margin: 40px auto 20px auto;
            font-weight: bold;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            width: 100%;
        }

        .section-title::after {
            content: "";
            width: 60px;
            height: 4px;
            background: var(--accent-gold);
            margin-top: 10px;
            border-radius: 50px;
        }

        .college-description {
            background: white;
            padding: 35px;
            border-radius: 6px;
            border-left: 5px solid var(--college-blue);
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            max-width: 900px;
        }

        .college-description h2 { color: var(--college-blue); margin-bottom: 15px; font-size: 1.8rem; }
        .college-description p { font-size: 1.05rem; color: #444; line-height: 1.8; text-align: justify; }

        .college-features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .feature-item { 
            display: flex;
            align-items: center; 
            gap: 10px; 
            font-weight: 600; 
            color: var(--college-blue); 
        }
        /* Custom class to reduce the width of a specific section */
        .narrow-width-container {
            max-width: 900px; /* Adjust this number to your preferred width */
            margin: 0 auto;   /* Centers the section within the main content area */
        }
                
        .news-grid { 
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 20px; 
        }
        .news-card { 
            border: 1px solid #eee; 
            border-radius: 8px; overflow: hidden; 
            transition: 0.3s; 
            height: 470px;
         }
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
             }
        .news-card img { 
            width: 100%; 
            height: 320px; 
            object-fit: cover; 
        }
        .news-card-body { 
            padding: 15px; 
        }
        .news-date-badge { 
            background: var(--light-gray); 
            color: #666; font-size: 0.75rem;
            padding: 3px 8px; 
            border-radius: 4px; 
            display: inline-block; 
            margin-bottom: 10px; 
            font-weight: 600; 
        }
        .news-card h4 {
            font-size: 1rem; 
            color: var(--college-blue); 
            line-height: 2; 
            margin-bottom: 8px; 
        }
        .news-card p { 
            font-size: 0.85rem; 
            color: #555; 
        }

        .cal-box {
            background: #fff;
            border: 1px solid #ddd;
            min-width: 55px;
            height: 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .cal-day { font-size: 1.3rem; font-weight: 800; color: #333; line-height: 1; }
        .cal-month { font-size: 0.7rem; font-weight: 700; color: var(--college-blue); text-transform: uppercase; }

        .event-info h5 { font-size: 0.9rem; color: #333; margin-bottom: 4px; font-weight: 700; }
        .event-info small { color: var(--college-blue); font-weight: 600; font-size: 0.75rem; display: block; }
        
        .narrow-section { max-width: 1400px; margin: 0 auto; padding: 0 40px; }

        .bottom-track-container { 
            overflow: hidden; 
            white-space: nowrap; 
            padding: 20px 0; 
            position: relative;
            -webkit-mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
            mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
        }

        .bottom-track { display: inline-block; animation: scrollContinuous 25s linear infinite; }
        @keyframes scrollContinuous { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }

        .bottom-logo { height: 40px; margin: 0 40px; vertical-align: middle; filter: grayscale(100%); opacity: 0.7; transition: all 0.3s; }
        .bottom-logo:hover { filter: grayscale(0%); opacity: 1; transform: scale(1.1); }

        .testimonial-split-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 25px; }
        .testi-column { background: #fff; padding: 20px; border: 1px solid #eee; border-radius: 8px; min-height: 250px; display: flex; flex-direction: column; }
        .testi-header { margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center; }
        .testi-header h3 { font-size: 1.1rem; color: var(--college-blue); border-left: 4px solid var(--accent-gold); padding-left: 10px; }
        
        .carousel-wrapper { position: relative; overflow: hidden; flex-grow: 1; }
        .testi-slide { display: none; animation: fadeEffect 0.6s; }
        .testi-slide.active { display: block; }
        @keyframes fadeEffect { from {opacity: 0.4;} to {opacity: 1;} }

        .testi-content { background: #fcfcfc; padding: 20px; border-radius: 6px; border: 1px solid #f0f0f0; position: relative; }
        .testi-quote-icon { font-size: 1.5rem; color: #eee; position: absolute; top: 15px; right: 15px; }
        .testi-text { font-style: italic; font-size: 0.95rem; color: #555; margin-bottom: 20px; line-height: 1.6; min-height: 80px; }
        .testi-profile { display: flex; align-items: center; gap: 12px; border-top: 1px solid #eee; padding-top: 15px; }

        /* --- SIDEBAR SCROLLING --- */
        .events-scroll-container { height: 400px; overflow: hidden; padding: 10px 0; position: relative; background: #fff; border: 1px solid #ddd; border-radius: 8px; }
        .events-scroll-track { animation: scrollTextEvents 25s linear infinite; }
        .events-scroll-track:hover { animation-play-state: paused; }
        .event-scroll-item { padding: 15px 10px; border-bottom: 1px solid #eee; display: flex; flex-direction: column; gap: 5px; }
        .event-scroll-date { font-weight: 700; color: var(--college-blue); font-size: 0.85rem; }
        .event-scroll-title { color: #333; font-weight: 600; font-size: 0.9rem; line-height: 1.4; }
        @keyframes scrollTextEvents { 0% { transform: translateY(0); } 100% { transform: translateY(-50%); } }

        /* --- HORIZONTAL PHOTO SCROLLER --- */
        .small-photo-scroller { overflow: hidden; padding: 12px; min-height: 180px; display: flex; align-items: center; }
        .small-photo-track { display: flex; gap: 12px; width: max-content; animation: scrollHorizontal 30s linear infinite; }
        .small-photo-track:hover { animation-play-state: paused; }
        .small-photo-thumb { width: 220px; height: 140px; flex-shrink: 0; border-radius: 6px; overflow: hidden; position: relative; border: 1px solid #eee; }
        .small-photo-thumb img { width: 100%; height: 100%; object-fit: cover; }
        .small-photo-caption { position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.7); color: #fff; padding: 6px 8px; font-size: 0.75rem; text-align: center; }
        @keyframes scrollHorizontal { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }

        .testi-img { width: 50px; height: 50px; border-radius: 50%; object-fit: cover; border: 2px solid var(--college-blue); }
        .testi-info h5 { font-size: 0.95rem; color: var(--college-blue); margin-bottom: 2px; }
        .testi-info span { font-size: 0.8rem; color: #888; display: block; }

        .slider-controls { display: flex; gap: 10px; }
        .control-btn { background: var(--college-blue); color: white; border: none; width: 30px; height: 30px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background 0.3s; }
        .control-btn:hover { background: var(--accent-gold); }

        .read-more-btn { color: var(--college-blue); font-size: 0.9rem; font-weight: 700; text-decoration: none; }
        .read-more-btn:hover { text-decoration: underline; }
        /* Container for the one-row highlights */
        .highlights-scroll-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
        }

        /* The actual scrolling row */
        .highlights-row {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            gap: 15px;
            padding: 5px;
            flex: 1;
            /* Hide scrollbar for Chrome, Safari and Opera */
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        .highlights-row::-webkit-scrollbar {
            display: none;
        }

        /* Individual Highlight Card */
        .highlight-card {
            min-width: 180px;
            max-width: 180px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .highlight-card:hover {
            transform: translateY(-5px);
            border-color: var(--college-blue);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .highlight-card img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .highlight-card p {
            font-size: 0.8rem;
            font-weight: 600;
            color: #333;
            line-height: 1.3;
        }

        /* Scroll Buttons */
        .scroll-btn {
            background: var(--college-blue);
            color: white;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .scroll-btn:hover {
            background: #002244;
            transform: scale(1.1);
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .btn-left { }
        .btn-right { }

        .scroll-btn:hover {
            background: #002244;
        }

        @media (max-width: 1200px) {
            .container { gap: 20px; padding: 30px 15px; }
            .section-header { font-size: 1.8rem; }
        }

        @media (max-width: 992px) {
            .container { grid-template-columns: 1fr; padding: 20px; }
        }

        @media (max-width: 768px) {
            .container { padding: 15px; gap: 15px; }
            .section-header { font-size: 1.5rem; }
            .card { padding: 15px; }
        }

        @media (max-width: 576px) {
            .container { padding: 10px; }
            .section-header { font-size: 1.3rem; }
        }

        @media (max-width: 480px) {
            .container { padding: 8px; }
            .section-header { font-size: 1.1rem; }
        }
    </style>
@endpush

@section('content')

    <section class="hero-section">
        <video autoplay muted loop playsinline class="hero-video">
            <source src="https://stjosephscollegemoolamattom.ac.in/wp-content/uploads/2024/05/college_banner.mp4" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h2>Welcome to St. Joseph's College Moolamattom</h2>
            <p>An Institution Managed by CMI Fathers</p>
        </div>
    </section>

    <div class="container">
        <main class="content-area">
            <section class="college-description">
                <h2>St. Joseph's College Moolamattom</h2>
                <p>
                    Established in 1981, St. Joseph's College, Moolamattom, is a premier autonomous institution of higher education managed by the CMI Congregation. 
                    Nestled in the serene greenery of Arakkulam, our college is dedicated to providing holistic education...
                </p>
                <div class="college-features">
                    <div class="feature-item"><i class="fas fa-university"></i> Autonomous Status</div>
                    <div class="feature-item"><i class="fas fa-award"></i> NAAC Accredited</div>
                    <div class="feature-item"><i class="fas fa-leaf"></i> Eco-Friendly Campus</div>
                </div>
            </section>

           <div class="narrow-width-container">
            <section class="section-box">
                <div class="section-title">Upcoming Events</div>
                <div class="small-photo-scroller" id="home-upcoming-photo-section">
                    <div class="small-photo-track" id="home-upcoming-photo-track"></div>
                </div>
                 <div style="text-align:center; padding: 15px;">
                    <a href="#" class="read-more-btn">View All Events</a>
                </div>
            </section>
        </div>
        </main>

        <aside class="sidebar">
            <div class="section-box" style="padding: 0;">
                <div class="section-title" style="margin: 20px 0; font-size: 1.2rem;">Upcoming Events</div>
                <div class="events-scroll-container">
                    <div class="events-scroll-track" id="sidebar-events-text-track">
                        </div>
                </div>
                <div style="text-align:center; padding: 15px;">
                    <a href="#" class="read-more-btn">View All Events</a>
                </div>
            </div>
        </aside>
    </div>

    <div class="narrow-section">
        <div class="section-title">SJC News</div>
        <section class="section-box">
            <div class="news-grid">
                <div class="news-card">
                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=400" alt="News">
                    <div class="news-card-body">
                        <span class="news-date-badge">Dec 20, 2025</span>
                        <h4>Machine Learning Workshop</h4>
                        <p>Industry experts shared insights on automated testing and AI-driven operations...</p>
                    </div>
                </div>
                <div class="news-card">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=400" alt="News">
                    <div class="news-card-body">
                        <span class="news-date-badge">Dec 23, 2025</span>
                        <h4>Women Leaders Session</h4>
                        <p>The Department of Computer Science hosted a talk on empowering women in tech...</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="section-title">Our Top Recruiters</div>
        <section class="section-box">
            <div class="bottom-track-container">
                <div class="bottom-track">
                    <img src="{{ asset('images/companies/tcs-logo.svg') }}" class="bottom-logo" alt="TCS">
                    <img src="{{ asset('images/companies/infosys-logo.svg') }}" class="bottom-logo" alt="Infosys">
                    <img src="{{ asset('images/companies/wipro-logo.svg') }}" class="bottom-logo" alt="Wipro">
                    <img src="{{ asset('images/companies/cognizant-logo.svg') }}" class="bottom-logo" alt="Cognizant">
                    <img src="{{ asset('images/companies/ust-logo.svg') }}" class="bottom-logo" alt="UST Global">
                    <img src="{{ asset('images/companies/tcs-logo.svg') }}" class="bottom-logo" alt="TCS">
                    <img src="{{ asset('images/companies/infosys-logo.svg') }}" class="bottom-logo" alt="Infosys">
                    <img src="{{ asset('images/companies/wipro-logo.svg') }}" class="bottom-logo" alt="Wipro">
                    <img src="{{ asset('images/companies/cognizant-logo.svg') }}" class="bottom-logo" alt="Cognizant">
                    <img src="{{ asset('images/companies/ust-logo.svg') }}" class="bottom-logo" alt="UST Global">
                </div>
            </div>
        </section>

         <div class="section-title">Our Collaborations</div>
        <section class="section-box">
            <div class="bottom-track-container">
                <div class="bottom-track">
                    <img src="{{ asset('images/companies/tcs-logo.svg') }}" class="bottom-logo" alt="TCS">
                    <img src="{{ asset('images/companies/infosys-logo.svg') }}" class="bottom-logo" alt="Infosys">
                    <img src="{{ asset('images/companies/wipro-logo.svg') }}" class="bottom-logo" alt="Wipro">
                    <img src="{{ asset('images/companies/cognizant-logo.svg') }}" class="bottom-logo" alt="Cognizant">
                    <img src="{{ asset('images/companies/ust-logo.svg') }}" class="bottom-logo" alt="UST Global">
                    <img src="{{ asset('images/companies/tcs-logo.svg') }}" class="bottom-logo" alt="TCS">
                    <img src="{{ asset('images/companies/infosys-logo.svg') }}" class="bottom-logo" alt="Infosys">
                    <img src="{{ asset('images/companies/wipro-logo.svg') }}" class="bottom-logo" alt="Wipro">
                    <img src="{{ asset('images/companies/cognizant-logo.svg') }}" class="bottom-logo" alt="Cognizant">
                    <img src="{{ asset('images/companies/ust-logo.svg') }}" class="bottom-logo" alt="UST Global">
                </div>
            </div>
        </section>
      <div class="narrow-section">
        
                <div class="section-title">Institutional Highlights</div>
                <section class="section-box">
                <div class="highlights-scroll-wrapper">
                    <button class="scroll-btn btn-left" onclick="scrollHighlights(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    
                    <div class="highlights-row" id="highlightsRow">
                        <div class="highlight-card">
                            <img src="{{ asset('images/badges/naac-logo.svg') }}" alt="NAAC">
                            <p>A++ Grade by NAAC</p>
                        </div>
                        <div class="highlight-card">
                            <img src="{{ asset('images/badges/nirf-logo.svg') }}" alt="NIRF">
                            <p>NIRF 2025: 34th Rank</p>
                        </div>
                        <div class="highlight-card">
                            <img src="{{ asset('images/badges/unsdg-logo.svg') }}" alt="UNSDG">
                            <p>UNSDG Hub</p>
                        </div>
                        <div class="highlight-card">
                            <img src="{{ asset('images/badges/acbsp-logo.svg') }}" alt="ACBSP">
                            <p>Internationally Accredited ACBSP</p>
                        </div>
                        <div class="highlight-card">
                            <img src="{{ asset('images/badges/green-campus-logo.svg') }}" alt="Green Campus">
                            <p>Green Campus Gold Rating</p>
                        </div>
                        <div class="highlight-card">
                            <img src="{{ asset('images/badges/dbt-logo.svg') }}" alt="DBT Star">
                            <p>DBT STAR College</p>
                        </div>
                         <div class="highlight-card">
                            <img src="{{ asset('images/badges/dbt-logo.svg') }}" alt="DBT Star">
                            <p>DBT STAR College</p>
                        </div>
                            <div class="highlight-card">
                                <img src="{{ asset('images/badges/dbt-logo.svg') }}" alt="DBT Star">
                                <p>DBT STAR College</p>
                            </div>
                    </div>

                    <button class="scroll-btn btn-right" onclick="scrollHighlights(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </section>
        </div>

        <div class="testimonial-split-grid">
            <div class="testi-column">
                <div class="testi-header">
                    <h3>Alumni Voices</h3>
                    <div class="slider-controls">
                        <button class="control-btn" onclick="changeSlide('alumni', -1)"><i class="fas fa-chevron-left"></i></button>
                        <button class="control-btn" onclick="changeSlide('alumni', 1)"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
                <div class="carousel-wrapper" id="alumni-carousel">
                    <div class="testi-slide active">
                        <div class="testi-content">
                            <i class="fas fa-quote-right testi-quote-icon"></i>
                            <p class="testi-text">"The faculty at St. Joseph's molded my career. The Placement Cell provided excellent training."</p>
                            <div class="testi-profile">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" class="testi-img" alt="Alumni">
                                <div class="testi-info"><h5>Anjali Menon</h5><span>B.Com</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testi-column">
                <div class="testi-header">
                    <h3>Student Stories</h3>
                    <div class="slider-controls">
                        <button class="control-btn" onclick="changeSlide('student', -1)"><i class="fas fa-chevron-left"></i></button>
                        <button class="control-btn" onclick="changeSlide('student', 1)"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
                <div class="carousel-wrapper" id="student-carousel">
                    <div class="testi-slide active">
                        <div class="testi-content">
                            <i class="fas fa-quote-right testi-quote-icon"></i>
                            <p class="testi-text">"The campus atmosphere is vibrant. Every day brings a new learning opportunity."</p>
                            <div class="testi-profile">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="testi-img" alt="Student">
                                <div class="testi-info"><h5>Rahul Krishnan</h5><span>Data Science</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="admission-popup" id="admissionPopup">
        <span class="close-btn">&times;</span>
        <h3 style="color: var(--college-blue); margin-bottom: 10px;">Admissions 2026-27</h3>
        <p style="font-size: 0.9rem; color: #555;">Applications are invited for UG, PG, IP & Research programmes.</p>
        <a href="#" class="popup-btn">Apply Now</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Popup
            const popup = document.getElementById('admissionPopup');
            const closeBtn = document.querySelector('.close-btn');
            if(closeBtn) closeBtn.onclick = () => popup.style.display = 'none';

            const rawEvents = [
                { id: 1, title: 'Comquest 5.0', date: '2025-12-20', image: 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=400' },
                { id: 2, title: 'Annual Sports Meet', date: '2026-01-15', image: 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=400' },
                { id: 3, title: 'Job Fair 2026', date: '2026-03-01', image: 'https://images.unsplash.com/photo-1521791136064-7986c2920216?w=400' }
            ];

            // Sidebar text scroll
            const textTrack = document.getElementById('sidebar-events-text-track');
            if(textTrack) {
                const eventsHtml = rawEvents.map(e => `
                    <div class="event-scroll-item">
                        <div class="event-scroll-date">${e.date}</div>
                        <div class="event-scroll-title">${e.title}</div>
                    </div>
                `).join('');
                textTrack.innerHTML = eventsHtml + eventsHtml;
            }

            // Photo scroller
            const photoTrack = document.getElementById('home-upcoming-photo-track');
            if(photoTrack) {
                const photosHtml = rawEvents.map(e => `
                    <div class="small-photo-thumb">
                        <img src="${e.image}" alt="${e.title}">
                        <div class="small-photo-caption">${e.title} • ${e.date}</div>
                    </div>
                `).join('');
                photoTrack.innerHTML = photosHtml + photosHtml;
            }
        });

        let currentSlides = { alumni: 0, student: 0 };
        function changeSlide(type, direction) {
            const slides = document.querySelectorAll(`#${type}-carousel .testi-slide`);
            slides[currentSlides[type]].classList.remove('active');
            currentSlides[type] = (currentSlides[type] + direction + slides.length) % slides.length;
            slides[currentSlides[type]].classList.add('active');
        }

        function scrollHighlights(direction) {
            const row = document.getElementById('highlightsRow');
            if (row) {
                const scrollAmount = 220; // card width (200px) + gap (20px)
                row.scrollBy({
                    left: direction * scrollAmount,
                    behavior: 'smooth'
                });
            }
        }
    </script>
@endsection