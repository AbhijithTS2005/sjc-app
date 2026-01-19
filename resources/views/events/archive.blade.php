@extends('layouts.app')

@push('styles')
    <style>
        :root {
            --college-blue: #003366;
            --accent-gold: #ffcc00;
            --light-gray: #f8f9fa;
        }

        .archive-hero {
            background: linear-gradient(135deg, var(--college-blue), #004080);
            color: white;
            padding: 60px 40px;
            text-align: center;
        }

        .archive-hero h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .archive-hero p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .archive-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 40px;
        }

        .year-section {
            margin-bottom: 40px;
        }

        .year-header {
            font-size: 2rem;
            color: var(--college-blue);
            border-bottom: 3px solid var(--accent-gold);
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .month-group {
            margin-bottom: 25px;
            background: #f9f9f9;
            padding: 20px;
            border-left: 4px solid var(--college-blue);
            border-radius: 4px;
        }

        .month-header {
            font-size: 1.3rem;
            color: var(--college-blue);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .events-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .event-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            cursor: pointer;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.15);
            border-color: var(--college-blue);
        }

        .event-card a {
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
        }

        .event-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: var(--light-gray);
        }

        .event-content {
            padding: 15px;
        }

        .event-date {
            color: var(--college-blue);
            font-weight: 700;
            font-size: 0.85rem;
            margin-bottom: 8px;
        }

        .event-title {
            font-size: 1.05rem;
            font-weight: 600;
            color: var(--college-blue);
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .event-type {
            display: inline-block;
            background: var(--light-gray);
            color: var(--college-blue);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: capitalize;
        }

        .no-events {
            text-align: center;
            color: #999;
            padding: 40px;
            font-size: 1.1rem;
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

    <div class="archive-hero">
        <h1>Events Archive</h1>
        <p>Explore all events conducted in the past 3 years</p>
    </div>

    <div class="archive-container">
        @if(empty($groupedEvents))
            <div class="no-events">No events found for the past 3 years.</div>
        @else
            @foreach($groupedEvents as $year => $months)
                <div class="year-section">
                    <div class="year-header">{{ $year }}</div>
                    
                    @foreach($months as $monthNum => $monthData)
                        <div class="month-group">
                            <div class="month-header">{{ $monthData['name'] }}</div>
                            <div class="events-list">
                                @foreach($monthData['events'] as $event)
                                    <div class="event-card">
                                        <a href="{{ route('events.show', $event['id']) }}">
                                            <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="event-image">
                                            <div class="event-content">
                                                <div class="event-date">{{ $event['date'] }}</div>
                                                <div class="event-title">{{ $event['title'] }}</div>
                                                <div class="event-type">{{ $event['type'] }}</div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>

@endsection
