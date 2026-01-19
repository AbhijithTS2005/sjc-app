@extends('layouts.app')

@section('content')
<div class="facilities-container">
    <!-- Sidebar -->
    <aside class="facilities-sidebar">
        <h3 class="sidebar-title">Facilities</h3>
        <ul class="facilities-list">
            @foreach($facilities as $key => $name)
                <li>
                    <a href="{{ route('campus.facilities.show', $key) }}" class="facility-link">
                        {{ $name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="facilities-content">
        <div class="facilities-overview">
            <h1>Campus Facilities</h1>
            <p class="intro-text">
                St. Joseph's College Moolamattom is equipped with world-class facilities to support comprehensive academic, research, and extracurricular activities. Our campus features modern infrastructure designed to provide students with an excellent learning environment.
            </p>

            <div class="facilities-grid">
                @php
                    // Map facility types to specific icons
                    $iconMap = [
                        'library' => 'fa-book',
                        'laboratory' => 'fa-flask',
                        'cafeteria' => 'fa-utensils',
                        'sports' => 'fa-basketball',
                        'auditorium' => 'fa-theater-masks',
                        'hostel' => 'fa-bed',
                        'medical' => 'fa-hospital',
                        'computer' => 'fa-laptop',
                        'gym' => 'fa-dumbbell',
                        'ground' => 'fa-futbol',
                        'playground' => 'fa-futbol',
                        'classroom' => 'fa-chalkboard-user',
                        'office' => 'fa-briefcase',
                        'parking' => 'fa-square-parking',
                        'wifi' => 'fa-wifi',
                        'transport' => 'fa-bus',
                        'parking' => 'fa-square-parking',
                        'security' => 'fa-shield-alt',
                    ];
                @endphp
                @foreach($facilities as $key => $name)
                    @php
                        $iconClass = 'fa-building'; // default
                        $lowerName = strtolower($name);
                        foreach($iconMap as $keyword => $icon) {
                            if(strpos($lowerName, $keyword) !== false) {
                                $iconClass = $icon;
                                break;
                            }
                        }
                    @endphp
                    <div class="facility-card">
                        <a href="{{ route('campus.facilities.show', $key) }}" class="facility-icon-link">
                            <div class="facility-icon">
                                <i class="fas {{ $iconClass }}"></i>
                            </div>
                        </a>
                        <h3>{{ $name }}</h3>
                        <p>Explore our {{ strtolower($name) }} and the facilities we offer.</p>
                        <a href="{{ route('campus.facilities.show', $key) }}" class="facility-card-link">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</div>

<style>
    .facilities-container {
        display: flex;
        gap: 30px;
        max-width: 1400px;
        margin: 40px auto;
        padding: 0 20px;
        min-height: calc(100vh - 300px);
    }

    .facilities-sidebar {
        flex: 0 0 280px;
        position: sticky;
        top: calc(var(--header-height) + 20px);
        height: fit-content;
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        border-left: 4px solid #003366;
    }

    .sidebar-title {
        font-size: 1.5rem;
        color: #003366;
        margin-bottom: 20px;
        font-family: 'Merriweather', Georgia, serif;
        font-weight: 700;
    }

    .facilities-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .facilities-list li {
        margin-bottom: 8px;
    }

    .facility-link {
        display: block;
        padding: 12px 15px;
        color: #333;
        background: #f8f9fa;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-weight: 600;
        text-decoration: none;
        border-left: 3px solid transparent;
    }

    .facility-link:hover {
        background: #003366;
        color: white;
        border-left-color: #f0ad4e;
        transform: translateX(5px);
    }

    .facilities-content {
        flex: 1;
        min-width: 0;
    }

    .facilities-overview h1 {
        font-size: 2.5rem;
        color: #003366;
        margin-bottom: 20px;
        font-family: 'Merriweather', Georgia, serif;
    }

    .intro-text {
        font-size: 1.1rem;
        color: #555;
        line-height: 1.8;
        margin-bottom: 40px;
        padding: 20px;
        background: linear-gradient(135deg, rgba(0, 51, 102, 0.05) 0%, rgba(240, 173, 78, 0.05) 100%);
        border-radius: 12px;
        border-left: 4px solid #003366;
    }

    .facilities-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        margin-top: 40px;
    }

    .facility-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        text-align: center;
        border-top: 4px solid #003366;
        display: flex;
        flex-direction: column;
    }

    .facility-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        border-top-color: #f0ad4e;
    }

    .facility-icon {
        font-size: 3rem;
        color: #003366;
        margin-bottom: 15px;
    }

    .facility-icon-link {
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .facility-icon-link:hover .facility-icon {
        color: #f0ad4e;
        transform: scale(1.1) rotate(5deg);
    }

    .facility-icon-link:hover {
        text-decoration: none;
    }

    .facility-card h3 {
        font-size: 1.3rem;
        color: #003366;
        margin-bottom: 10px;
        font-family: 'Merriweather', Georgia, serif;
    }

    .facility-card p {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 20px;
        flex-grow: 1;
        line-height: 1.6;
    }

    .facility-card-link {
        display: inline-block;
        background: #003366;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .facility-card-link:hover {
        background: #002244;
        transform: translateX(5px);
    }

    .facility-card-link i {
        margin-left: 8px;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .facilities-container {
            gap: 20px;
        }

        .facilities-sidebar {
            flex: 0 0 240px;
        }

        .facilities-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .facilities-overview h1 {
            font-size: 2rem;
        }
    }

    @media (max-width: 992px) {
        .facilities-container {
            flex-direction: column;
        }

        .facilities-sidebar {
            flex: 1;
            position: relative;
            top: 0;
            max-width: 100%;
            order: 2;
        }

        .facilities-content {
            order: 1;
        }

        .facilities-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        }

        .facilities-overview h1 {
            font-size: 1.8rem;
        }

        .intro-text {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        .facilities-container {
            margin: 30px auto;
        }

        .facilities-sidebar {
            padding: 20px;
        }

        .sidebar-title {
            font-size: 1.3rem;
        }

        .facility-link {
            padding: 10px 12px;
            font-size: 0.95rem;
        }

        .facilities-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .facility-card {
            padding: 20px;
        }

        .facilities-overview h1 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .intro-text {
            margin-bottom: 25px;
            padding: 15px;
            font-size: 0.95rem;
        }
    }

    @media (max-width: 480px) {
        .facilities-container {
            gap: 15px;
            margin: 20px auto;
            padding: 0 15px;
        }

        .facilities-sidebar {
            padding: 15px;
        }

        .sidebar-title {
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        .facility-link {
            padding: 8px 10px;
            font-size: 0.9rem;
        }

        .facility-card {
            padding: 15px;
        }

        .facility-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .facility-card h3 {
            font-size: 1.1rem;
        }

        .facility-card p {
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
    }
</style>
@endsection
