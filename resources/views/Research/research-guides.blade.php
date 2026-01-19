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
            background: var(--college-blue, #003366);
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

        .content-column p, .content-column li {
            line-height: 1.8;
            margin-bottom: 1rem;
            color: #555;
        }

        .content-column ul {
            margin-left: 1.5rem;
        }



            .content-column {
                padding: 1rem;
            }
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

            .content-column h1, .content-column h2 {
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

            .content-column h1, .content-column h2 {
                font-size: 1.1rem;
                margin-bottom: 0.75rem;
            }

            .content-column p, .content-column li {
                font-size: 0.9rem;
                margin-bottom: 0.75rem;
                line-height: 1.6;
            }

            .content-column ul {
                margin-left: 1.2rem;
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

            .content-column h1, .content-column h2 {
                font-size: 1rem;
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
        <h2>Research Guides</h2>

        <p>
            Comprehensive guides to support research activities at St. Joseph's College.
        </p>

        <ul>
            <li>Research methodology guidelines</li>
            <li>Ethical research practices</li>
            <li>Citation and referencing standards</li>
            <li>Plagiarism prevention resources</li>
            <li>Data management and analysis tools</li>
            <li>Publication guidelines for researchers</li>
        </ul>
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
