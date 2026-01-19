@extends('layouts.app')

@push('styles')
    <style>
        :root {
            --college-navy: #002147;
            --college-blue: #0056b3;
            --light-gray: #f2f5f8;
            --border-gray: #d1d5db;
            --text-dark: #333333;
            --header-height: 80px;
        }

        /* Use site heading/body font matching Home page */
        .page-container { font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; }
        .section-header, .sidebar-title { font-family: 'Merriweather', Georgia, serif; }

        /* Removed 'body' styles as they conflict with Layout */

        .page-container {
            display: flex;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px; /* Applied padding here instead of body */
        }

        /* --- LEFT COLUMN: MAIN CONTENT --- */
        .content-column {
            flex: 3;
            text-align: left;
        }

        .founder-hero-img {
            width: 100%;
            height: auto;
            background: linear-gradient(to bottom, #ffffff, #eef6fc);
            margin-bottom: 30px;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #eee;
        }

        .founder-hero-img img {
            width: 100%;
            max-height: 450px;
            object-fit: contain; 
            display: block;
        }

        .section-header {
            color: var(--college-blue);
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 5px;
            position: relative;
            display: inline-block;
        }

        .header-underline {
            width: 100%;
            height: 3px;
            background-color: var(--college-blue);
            margin-bottom: 25px;
            border-bottom: 1px solid var(--border-gray);
        }

        .bio-text p {
            margin-bottom: 20px;
            text-align: justify;
            font-size: 1.05rem;
            color: #444;
        }

        /* --- RIGHT COLUMN: SIDEBAR --- */
        .sidebar-column {
            flex: 1;
            min-width: 280px;
        }
        .sidebar-box {
            background-color: var(--light-gray);
            border-radius: 4px;
            padding: 0;
            border: 1px solid #e2e8f0;
            position: sticky;
            top: calc(var(--header-height) + 20px);
            
            /* Lower the z-index so the menu can overlap it */
            z-index: 1 !important; 
        }

        .sidebar-title {
            color: var(--college-blue);
            font-size: 1.8rem;
            font-weight: 600;
            padding: 20px 25px 5px 25px;
            margin: 0;
        }

        .sidebar-underline {
            height: 3px;
            background-color: var(--college-navy);
            width: 40%; 
            margin-left: 25px;
            margin-bottom: 15px;
            border-bottom: 1px solid #cbd5e1;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            border-bottom: 1px solid #e2e8f0;
        }

        .sidebar-menu li:last-child {
            border-bottom: none;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 25px;
            text-decoration: none;
            color: #555;
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        .sidebar-menu a:hover {
            background-color: #e2eaf2;
            color: var(--college-blue);
            padding-left: 30px;
        }

        .sidebar-menu a.active {
            background-color: var(--college-blue);
            color: white;
            font-weight: 600;
            padding-left: 30px;
        }


            .content-column { order: 1; }
        }

        @media (max-width: 1200px) {
            .page-container { gap: 30px; padding: 30px 15px; }
            .section-header { font-size: 2rem; }
        }

        @media (max-width: 992px) {
            .page-container { flex-direction: column; padding: 20px; gap: 20px; }
            .sidebar-column { order: 2; min-width: 100%; }
            .content-column { order: 1; }
            .sidebar-box { position: static; }
            .section-header { font-size: 1.8rem; }
        }

        @media (max-width: 768px) {
            .page-container { padding: 15px; gap: 15px; }
            .section-header { font-size: 1.5rem; margin-bottom: 15px; }
            .sidebar-title { font-size: 1.2rem; }
            .sidebar-menu a { padding: 8px 15px; font-size: 0.85rem; }
            .content-text { font-size: 0.9rem; }
        }

        @media (max-width: 576px) {
            .page-container { padding: 10px; }
            .section-header { font-size: 1.3rem; }
            .sidebar-menu a { padding: 7px 12px; font-size: 0.8rem; }
            .content-text { font-size: 0.85rem; }
        }

        @media (max-width: 480px) {
            .page-container { padding: 8px; }
            .section-header { font-size: 1.1rem; }
            .sidebar-menu a { padding: 6px 10px; font-size: 0.75rem; }
            .content-text { font-size: 0.8rem; }
        }
    </style>
@endpush

@section('content')
<div class="page-container">
    <div class="content-column">
        <div class="founder-hero-img">
            <img src="{{ asset('images/white.png.jpeg') }}" alt="St. Kuriakose Elias Chavara">
        </div>

        <h2 class="section-header">HISTORY</h2>
        <div class="header-underline"></div>

        <div class="bio-text">
            <p>
              St. Joseph’s College started as a junior college affiliated with the University of Kerala in 1981. The institution owes an immense debt of gratitude to Rev. Frs. Melanius CMI and Colombiere CMI, the founding fathers of the institution, and also to Fr. Clerus CMI, who, in his capacity as the Education Councillor, did yeoman service in the initial stages of the institution.
              Rev. Dr.Thomas V. Kalarickal, CMI, was the first principal of the college. Being a psychologist and a broad-minded educationalist, he felt the pulse of the newborn institution keenly and helped it grow, lavishing on it all the care and concern it required.
              Rev. Fr. Aloysius CMI was appointed as the principal in March 1983. He continued to be at the helm until 1990, for seven years. It was evidently a period of consistent growth for the institution, and it emerged as one of the best colleges for pre-degree results under Mahatma Gandhi University.
              Rev. Fr. K. C. Chandy, CMI, became the principal of the college in 1990, and he continued in the office until 1996, for a period of six years. In his tenure as the principal of the college, he laboured hard to make the college a prestigious institution. The college was upgraded with the start of a graduation course in chemistry in 1991. The B.A. degree course in Economics was started in 1993, and the B.B.M. degree course in 1995. Fr. K. C. Chandy constructed the college library, auditorium, various laboratories, and the rest house for the girl students.
             </p>
            <p>Rev. Dr. Emmanuel Jose Joseph CMI took charge as the principal of the college in 1996.
                 He was ably assisted by the then bursar, Rev. Fr.Jacob Poriyath, CMI. They served the institution for six years.
                  They had vision and foresight and devoted themselves to providing the institution with the infrastructure it had so far lacked. Academically, the college also made deep strides during its tenure. B. Sc. Physics (V) Applied Electronics was started in 1998. The college was elevated to the status of a senior college in 1999 with the start of M. Sc. Chemistry. In 2001, B. A. English (V) Copy Editor was started. 
                He also took the initial steps to secure the recognition of the UGC for the college.
            </p>
            <p>
                Rev. Dr. C. J. Paul, CMI, took charge as the principal of the college in April 2002.
                 He was ably assisted by the then bursar, Rev. Fr. Thomas George, CMI. 
                They laboured incessantly to usher in a culture of quality and excellence at the institution. 
                They installed an EPBAX system and brought out a newsletter called Throbs to ensure the smooth flow of information on campus. 
                The academic front witnessed a breathtaking metamorphosis under their leadership. 
                The college was included under 2(f) and 12-B of the UGC Act, which paved the way for UGC aid for the college and faculty improvement programs for the staff.
                 The development of the Department of Chemistry into a Research Center, the start of self-financing courses in M.A. Economics and B.Com., the introduction of UGC-sponsored career-oriented add-on courses, and the start of out-of-reach programs and extension services to help the local community were all remarkable events that took place in their tenure. However, the greatest and most memorable achievement of Rev. Dr. C.J. 
                Paul, CMI, was the NAAC accreditation of the college in 2005 with a B+ (78 points) grade.
            </p>
            <p>
                Rev. Fr. Thomas Maliyackal, CMI, took charge as the principal of the college in June 2005. With a view to making the college academically more relevant and career-oriented, he introduced several coaching sessions with the aid of the UGC.
                 A postgraduate course in M.S.W. was started in August 2005 in the self-financing stream.
                 The institution remembers him gratefully as a man destined to govern it during a very turbulent period of its history.
             </p>
             <p>
                Rev. Dr. Gilson John CMI was appointed the principal of the college in 2009. He ably led the college in its second cycle of NAAC accreditation in January 2012, in which the college was accorded a high B grade with 2.82 points.
                Dr. George V. Thomas was appointed the principal of the college, and he was, in fact, the first layman to serve the college in that position. During his tenure, the institution underwent its third cycle of NAAC accreditation, and it was crowned with an A grade of 3.12 points. 
                Dr. George V. Thomas retired in 2019 after two years of service as principal.
            </p>
            <p>
                Dr. Saju M. Sebastian was appointed principal of the institution in 2019, and he retired in 2020. He laboured much to run the institution during the dreaded COVID-19 pandemic, when it was hardly possible to conduct the usual regular classes for the students.
                Dr. Ebey P. Koshy assumed office as principal in 2020, and he served the institution for a year. He tried his utmost to run the institution during the pandemic period by arranging online classes for the students.
                Dr. Sabukkutty M.G. served the institution as principal from 2021 to 2023. During his tenure, it was possible to start a five-year integrated M.Sc. programme in computer science and data science. Another remarkable event during his tenure was the laying of the foundation for a new administrative block in 2022.
                Rev. Dr. Thomas George, CMI, was appointed principal of the institution in 2023. Being a committed educationalist, a broad-minded psychologist, and a research guide in sports science who pledged to take the institution to greater heights of excellence.
            </p>
        </div>
    </div>

    <div class="sidebar-column">
        <div class="sidebar-box">
            <h3 class="sidebar-title">About Us</h3>
            <div class="sidebar-underline"></div>
            
            <ul class="sidebar-menu">
                <li><a href="{{ route('anthem') }}" class="{{ Route::is('anthem') ? 'active' : '' }}">Anthem</a></li>
                <li><a href="{{ route('profile') }}" class="{{ Route::is('profile') ? 'active' : '' }}">Profile</a></li>
                <li><a href="{{ route('founder') }}" class="{{ Route::is('founder') ? 'active' : '' }}">Founder</a></li> 
                <li><a href="{{ route('administration') }}" class="{{ Route::is('administration') ? 'active' : '' }}">Administration</a></li>
                <li><a href="{{ route('history') }}" class="{{ Route::is('history') ? 'active' : '' }}">History</a></li>
                <li><a href="{{ route('vision') }}" class="{{ Route::is('vision') ? 'active' : '' }}">Vision</a></li>
                <li><a href="{{ route('principal') }}" class="{{ Route::is('principal') ? 'active' : '' }}">Principal</a></li>
                 <li><a href="{{ route('rules') }}" class="{{ Route::is('rules') ? 'active' : '' }}">Our Rules</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection