@extends('layouts.app')

@push('styles')
    <style>
        .page-container {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }

        .content-column {
            flex: 3;
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .sidebar-column {
            flex: 1;
        }

        .sidebar-menu {
            background: #f2f5f8;
            border-left: 4px solid var(--college-blue, #003366);
            border-radius: 8px;
            overflow: hidden;
            position: sticky;
            top: 100px;
        }

        .sidebar-menu h3 {
            background: #01458aff;
            color: white;
            margin: 0;
            padding: 1rem;
            font-size: 1.1rem;
        }

        .sidebar-menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .sidebar-menu li {
            border-bottom: 1px solid #e0e0e0;
        }

        .sidebar-menu li:last-child {
            border-bottom: none;
        }

        .sidebar-menu a {
            display: block;
            padding: 0.75rem 1rem;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar-menu a:hover {
            background: #e8ecf2;
            padding-left: 1.25rem;
        }

        .sidebar-menu a.active {
            background: var(--college-blue, #003366);
            color: white;
            font-weight: 600;
        }

        .content-column h1, .content-column h2 {
            color: var(--college-blue, #003366);
            margin-bottom: 1rem;
        }

        .content-column p {
            line-height: 1.8;
            margin-bottom: 1rem;
            color: #555;
        }

        @media (max-width: 992px) {
            .page-container {
                gap: 1.5rem;
            }

            .content-column {
                padding: 1.5rem;
                flex: 2;
            }

            .sidebar-menu h3 {
                font-size: 1rem;
            }

            .sidebar-menu a {
                padding: 0.6rem 0.8rem;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 768px) {
            .page-container {
                flex-direction: column;
                gap: 1rem;
                margin-top: 1rem;
            }

            .content-column {
                flex: 1;
                padding: 1rem;
            }

            .sidebar-column {
                flex: 1;
                order: 2;
            }

            .sidebar-menu {
                position: static;
                margin-bottom: 1rem;
            }

            .sidebar-menu a {
                padding: 0.6rem 0.8rem;
                font-size: 0.9rem;
            }

            .content-column h1 {
                font-size: 1.5rem;
            }

            .content-column h2 {
                font-size: 1.3rem;
            }

            .content-column p {
                font-size: 0.95rem;
            }
        }

        @media (max-width: 576px) {
            .page-container {
                gap: 0.5rem;
            }

            .content-column {
                padding: 0.75rem;
                border-radius: 4px;
            }

            .sidebar-menu {
                border-radius: 4px;
            }

            .sidebar-menu h3 {
                padding: 0.75rem;
                font-size: 0.95rem;
            }

            .sidebar-menu ul {
                max-height: 300px;
                overflow-y: auto;
            }

            .sidebar-menu a {
                padding: 0.5rem 0.6rem;
                font-size: 0.85rem;
            }

            .sidebar-menu a:hover {
                padding-left: 0.8rem;
            }

            .content-column h1 {
                font-size: 1.2rem;
                margin-bottom: 0.75rem;
            }

            .content-column h2 {
                font-size: 1.1rem;
                margin-bottom: 0.75rem;
            }

            .content-column p {
                font-size: 0.9rem;
                margin-bottom: 0.75rem;
                line-height: 1.6;
            }

            .content-column ul {
                margin-left: 1.2rem;
            }

            .content-column li {
                font-size: 0.9rem;
                margin-bottom: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            :root {
                --header-height: 100px;
            }

            .page-container {
                margin-top: 0.5rem;
            }

            .content-column {
                padding: 0.5rem;
            }

            .sidebar-menu h3 {
                padding: 0.5rem;
                font-size: 0.9rem;
            }

            .sidebar-menu a {
                padding: 0.4rem 0.5rem;
                font-size: 0.8rem;
            }

            .content-column h1 {
                font-size: 1rem;
            }

            .content-column h2 {
                font-size: 0.95rem;
            }

            .content-column p, .content-column li {
                font-size: 0.85rem;
            }
        }
    </style>
@endpush

@section('content')
<div class="page-container">
    <div class="content-column">
        <h1>Research at St. Joseph's College, Moolamattom (Autonomous)</h1>

        <p style="font-style: italic;">
            In alignment with its vision of academic excellence and social responsibility, 
            St. Joseph's College, Moolamattom (Autonomous) is committed to fostering a robust 
            research culture that upholds academic integrity and contributes to knowledge 
            creation and societal development.
        </p>

        <p>
            Recognizing research as a key component of quality higher education, the institution 
            promotes an enabling environment for research and innovation among faculty and students. 
            Research activities at the college are closely integrated with teaching–learning processes, 
            encouraging critical inquiry, interdisciplinary perspectives, and outcome-based research.
        </p>

        <p>
            The Research and Development Cell / Research Committee functions as the apex body to 
            formulate research policies, facilitate infrastructure development, promote funded 
            and non-funded research projects, and monitor research output.
        </p>

        <p>
            The college emphasizes ethical research practices by strictly adhering to established 
            codes of research ethics and plagiarism prevention guidelines.
        </p>

        <p>
            Through systematic planning, institutional support, and quality assurance mechanisms, 
            St. Joseph's College, Moolamattom (Autonomous) strives to strengthen its research ecosystem 
            and contribute meaningfully to academic advancement and societal progress.
        </p>
    </div>

    <div class="sidebar-column">
        <div class="sidebar-menu">
            <h3>Research</h3>
            <ul>
                <li><a href="{{ route('research.index') }}" class="@if(Route::is('research.index')) active @endif">Overview</a></li>
                <li><a href="{{ route('research.facilities') }}" class="@if(Route::is('research.facilities')) active @endif">Facilities</a></li>
                <li><a href="{{ route('research.guides') }}" class="@if(Route::is('research.guides')) active @endif">Research Guides</a></li>
                <li><a href="{{ route('research.phds') }}" class="@if(Route::is('research.phds')) active @endif">PhDs</a></li>
                <li><a href="{{ route('research.profile') }}" class="@if(Route::is('research.profile')) active @endif">Research Profile</a></li>
                <li><a href="{{ route('research.projects') }}" class="@if(Route::is('research.projects')) active @endif">Projects</a></li>
                <li><a href="{{ route('research.publications') }}" class="@if(Route::is('research.publications')) active @endif">Publications</a></li>
                <li><a href="{{ route('research.scholars') }}" class="@if(Route::is('research.scholars')) active @endif">Research Scholars</a></li>
                <li><a href="{{ route('research.seminars') }}" class="@if(Route::is('research.seminars')) active @endif">Seminars</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

