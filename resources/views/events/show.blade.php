@extends('layouts.app')

@push('styles')
    <style>
        :root {
            --college-blue: #003366;
            --accent-gold: #ffcc00;
            --light-gray: #f8f9fa;
        }

        .event-hero {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--college-blue), #004080);
        }

        .event-hero-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.6;
        }

        .event-hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 51, 102, 0.7);
        }

        .event-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            max-width: 800px;
            padding: 40px;
        }

        .event-hero-content h1 {
            font-size: 3rem;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .event-hero-content .event-meta {
            font-size: 1.2rem;
            opacity: 0.95;
        }

        .event-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 40px;
        }

        .event-details {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .event-meta-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 2px solid var(--light-gray);
        }

        .meta-item {
            display: flex;
            flex-direction: column;
        }

        .meta-label {
            font-size: 0.85rem;
            color: #999;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .meta-value {
            font-size: 1.1rem;
            color: var(--college-blue);
            font-weight: 600;
        }

        .event-type-badge {
            display: inline-block;
            background: var(--accent-gold);
            color: var(--college-blue);
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
            text-transform: capitalize;
            font-size: 0.9rem;
        }

        .event-description {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #444;
            text-align: justify;
            margin-bottom: 20px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--college-blue);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .back-link:hover {
            color: var(--accent-gold);
            text-decoration: underline;
        }

        .back-link i {
            margin-right: 8px;
        }

        @media (max-width: 1200px) {
            .news-container, .event-container { gap: 30px; padding: 30px 15px; }
            .section-header, .archive-hero h1 { font-size: 2rem; }
        }

        @media (max-width: 992px) {
            .news-grid { grid-template-columns: repeat(2, 1fr); }
            .section-header, .archive-hero h1 { font-size: 1.8rem; }
        }

        @media (max-width: 768px) {
            .news-container, .event-container { padding: 15px; gap: 15px; }
            .news-grid { grid-template-columns: 1fr; }
            .section-header, .archive-hero h1 { font-size: 1.5rem; margin-bottom: 15px; }
            .archive-hero { padding: 40px 20px; }
            .archive-hero h1 { font-size: 1.5rem; }
            .archive-hero p { font-size: 0.9rem; }
        }

        @media (max-width: 576px) {
            .news-container, .event-container { padding: 10px; }
            .section-header, .archive-hero h1 { font-size: 1.3rem; }
            .month-group, .news-card { padding: 15px; }
        }

        @media (max-width: 480px) {
            .news-container, .event-container { padding: 8px; }
            .section-header, .archive-hero h1 { font-size: 1.1rem; }
            .archive-hero { padding: 30px 15px; }
            .archive-hero h1 { font-size: 1.2rem; }
            .archive-hero p { font-size: 0.8rem; }
        }
    </style>
@endpush

@section('content')

    <div class="event-hero">
        <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="event-hero-image">
        <div class="event-hero-overlay"></div>
        <div class="event-hero-content">
            <h1>{{ $event['title'] }}</h1>
            <div class="event-meta">{{ $event['date'] }} • {{ ucfirst($event['type']) }}</div>
        </div>
    </div>

    <div class="event-container">
        <a href="{{ route('events.archive') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Events
        </a>

        <div class="event-details">
            <div class="event-meta-row">
                <div class="meta-item">
                    <span class="meta-label">Event Date</span>
                    <span class="meta-value">{{ \Carbon\Carbon::parse($event['date'])->format('F d, Y') }}</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Event Type</span>
                    <span class="event-type-badge">{{ $event['type'] }}</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Category</span>
                    <span class="meta-value">College Event</span>
                </div>
            </div>

            <div class="event-description">
                {{ $event['content'] }}
            </div>

            <div style="margin-top: 40px; padding-top: 30px; border-top: 2px solid var(--light-gray);">
                <p style="color: #666; font-size: 0.95rem;">
                    <strong>For more information,</strong> please contact the Student Activity Cell or visit the campus.
                </p>
            </div>
        </div>
    </div>

@endsection
