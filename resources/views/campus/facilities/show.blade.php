@extends('layouts.app')

@section('content')
<div class="facilities-container">
    <!-- Sidebar -->
    <aside class="facilities-sidebar">
        <h3 class="sidebar-title">Facilities</h3>
        <ul class="facilities-list">
            @foreach($facilities as $key => $name)
                <li>
                    <a href="{{ route('campus.facilities.show', $key) }}" 
                       class="facility-link {{ $key === $facility ? 'active' : '' }}">
                        {{ $name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="facilities-content">
        <div class="facility-detail">
            <div class="facility-header">
                <h1>{{ $facilityName }}</h1>
            </div>

            <div class="facility-body">
                <div class="facility-intro">
                    <p>
                        Welcome to our {{ strtolower($facilityName) }}. This page provides information about the facilities, amenities, and services available in this section of our campus.
                    </p>
                </div>

                <div class="facility-sections">
                    <section class="facility-section">
                        <h2>Overview</h2>
                        <p>
                            Our {{ strtolower($facilityName) }} is designed to support the academic and personal development of our students. 
                            With state-of-the-art infrastructure and modern amenities, we ensure a conducive environment for learning and growth.
                        </p>
                    </section>

                    <section class="facility-section">
                        <h2>Key Features</h2>
                        <ul class="features-list">
                            <li>Modern and well-maintained infrastructure</li>
                            <li>Equipped with latest technology and equipment</li>
                            <li>Professional and dedicated staff</li>
                            <li>Regular maintenance and upgrades</li>
                            <li>Accessible to all students and faculty members</li>
                        </ul>
                    </section>

                    <section class="facility-section">
                        <h2>Amenities & Services</h2>
                        <p>
                            The facility is equipped with comprehensive amenities to ensure comfort, safety, and an excellent experience. 
                            Our experienced staff is available to assist and provide guidance as needed.
                        </p>
                    </section>

                    <section class="facility-section">
                        <h2>Accessibility & Hours</h2>
                        <p>
                            This facility is accessible to all registered students and faculty members during college hours. 
                            For special access or inquiries, please contact the college administration.
                        </p>
                    </section>

                    <section class="facility-section">
                        <h2>Contact & Support</h2>
                        <p>
                            For more information about this facility or to schedule a visit, please contact our administration office:
                        </p>
                        <div class="contact-info">
                            <p><strong>Email:</strong> admin@sjcmoolamattom.edu.in</p>
                            <p><strong>Phone:</strong> Available upon request</p>
                            <p><strong>Location:</strong> St. Joseph's College Campus, Moolamattom</p>
                        </div>
                    </section>
                </div>
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

    .facility-link.active {
        background: #003366;
        color: white;
        border-left-color: #f0ad4e;
    }

    .facilities-content {
        flex: 1;
        min-width: 0;
    }

    .facility-detail {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .facility-header {
        background: linear-gradient(135deg, #003366 0%, #002244 100%);
        color: white;
        padding: 40px;
        border-bottom: 4px solid #f0ad4e;
    }

    .facility-header h1 {
        font-size: 2.5rem;
        margin-bottom: 0;
        font-family: 'Merriweather', Georgia, serif;
    }

    .facility-body {
        padding: 40px;
    }

    .facility-intro {
        background: linear-gradient(135deg, rgba(0, 51, 102, 0.05) 0%, rgba(240, 173, 78, 0.05) 100%);
        padding: 25px;
        border-radius: 12px;
        border-left: 4px solid #003366;
        margin-bottom: 40px;
    }

    .facility-intro p {
        font-size: 1.1rem;
        color: #333;
        line-height: 1.8;
        margin: 0;
    }

    .facility-sections {
        display: grid;
        gap: 30px;
        margin-bottom: 40px;
    }

    .facility-section {
        border-bottom: 1px solid #eee;
        padding-bottom: 30px;
    }

    .facility-section:last-of-type {
        border-bottom: none;
        padding-bottom: 0;
    }

    .facility-section h2 {
        font-size: 1.5rem;
        color: #003366;
        margin-bottom: 15px;
        font-family: 'Merriweather', Georgia, serif;
    }

    .facility-section p {
        color: #555;
        line-height: 1.8;
        margin-bottom: 15px;
    }

    .features-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .features-list li {
        padding: 12px 0;
        padding-left: 30px;
        position: relative;
        color: #555;
        line-height: 1.6;
    }

    .features-list li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #003366;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .contact-info {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #f0ad4e;
    }

    .contact-info p {
        margin-bottom: 10px;
        color: #333;
    }

    .contact-info p:last-child {
        margin-bottom: 0;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .facilities-container {
            gap: 20px;
        }

        .facilities-sidebar {
            flex: 0 0 240px;
        }

        .facility-header h1 {
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

        .facility-header h1 {
            font-size: 1.8rem;
        }

        .facility-header {
            padding: 30px;
        }

        .facility-body {
            padding: 30px;
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

        .facility-header {
            padding: 25px;
        }

        .facility-header h1 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .breadcrumb {
            font-size: 0.9rem;
        }

        .facility-body {
            padding: 25px;
        }

        .facility-intro {
            padding: 20px;
            margin-bottom: 30px;
        }

        .facility-intro p {
            font-size: 1rem;
        }

        .facility-section h2 {
            font-size: 1.3rem;
            margin-bottom: 12px;
        }

        .facility-sections {
            gap: 25px;
            margin-bottom: 30px;
        }

        .facility-section {
            padding-bottom: 25px;
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

        .facility-header {
            padding: 20px;
            border-bottom: 3px solid #f0ad4e;
        }

        .facility-header h1 {
            font-size: 1.3rem;
            margin-bottom: 8px;
        }

        .breadcrumb {
            font-size: 0.85rem;
        }

        .facility-body {
            padding: 20px;
        }

        .facility-intro {
            padding: 15px;
            margin-bottom: 20px;
        }

        .facility-intro p {
            font-size: 0.95rem;
        }

        .facility-section h2 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .facility-sections {
            gap: 20px;
            margin-bottom: 20px;
        }

        .facility-section {
            padding-bottom: 20px;
        }

        .facility-section p {
            font-size: 0.95rem;
        }

        .features-list li {
            font-size: 0.95rem;
        }

        .contact-info {
            padding: 15px;
        }

        .contact-info p {
            font-size: 0.95rem;
        }

        .facility-navigation {
            margin-top: 30px;
            padding-top: 20px;
        }

        .nav-button {
            padding: 10px 20px;
            font-size: 0.95rem;
        }
    }
</style>
@endsection
