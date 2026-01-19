@extends('layouts.app')

@section('content')
<style>
    .news-page-header {
        background: linear-gradient(135deg, #003366 0%, #004d99 100%);
        color: white;
        padding: 40px 0;
        margin: 0;
        border-radius: 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: visible;
        width: 100%;
        box-sizing: border-box;
    }
    .news-page-header h1 {
        font-family: 'Merriweather', Georgia, serif;
        font-size: 2.5rem;
        margin: 0;
        font-weight: 700;
        padding: 40px;
    }
    .filters-container {
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }
    .filter-section h3 {
        color: #003366;
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }
    .year-buttons {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }
    .year-btn {
        padding: 10px 20px;
        border: 2px solid #ddd;
        background: white;
        color: #333;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.2s;
        text-decoration: none;
    }
    .year-btn:hover {
        border-color: #f0ad4e;
        color: #f0ad4e;
    }
    .year-btn.active {
        background: #f0ad4e;
        color: white;
        border-color: #f0ad4e;
    }
    .month-buttons {
        display: flex;
        flex-direction: row;
        gap: 8px;
        flex-wrap: wrap;
    }
    .month-btn {
        padding: 10px 15px;
        border: 1px solid #ddd;
        background: white;
        color: #333;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        text-align: center;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-block;
    }
    .month-btn:hover {
        background: #f9f9f9;
        border-color: #f0ad4e;
        color: #f0ad4e;
    }
    .month-btn.active {
        background: #f0ad4e;
        color: white;
        border-color: #f0ad4e;
    }
    .clear-filter {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 16px;
        background: #f0f0f0;
        color: #333;
        border-radius: 4px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.2s;
    }
    .clear-filter:hover {
        background: #e0e0e0;
    }
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }
    .news-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        flex-direction: column;
    }
    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
    .news-card-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background: #f0ad4e;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2.5rem;
    }
    .news-card-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .news-card-date {
        font-size: 0.85rem;
        color: #999;
        margin-bottom: 10px;
    }
    .news-card-title {
        font-size: 1.1rem;
        color: #003366;
        font-weight: 600;
        margin-bottom: 10px;
        line-height: 1.4;
        flex-grow: 1;
    }
    .news-card-description {
        font-size: 0.9rem;
        color: #666;
        line-height: 1.5;
        margin-bottom: 15px;
        flex-grow: 1;
    }
    .read-more {
        color: #f0ad4e;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: color 0.2s;
    }
    .read-more:hover {
        color: #ec971f;
    }
    .no-news {
        text-align: center;
        padding: 60px 20px;
        background: #f9f9f9;
        border-radius: 8px;
        border: 2px dashed #ddd;
    }
    .no-news i {
        font-size: 3rem;
        color: #ccc;
        margin-bottom: 15px;
    }
    .no-news p {
        font-size: 1.1rem;
        color: #666;
    }
    .pagination {
        margin-top: 40px;
        display: flex;
        justify-content: center;
    }
    .filters-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .filters-container {
            padding: 25px;
        }
        .news-grid {
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }
    }

    @media (max-width: 992px) {
        .filters-row {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .news-grid {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 18px;
        }
        .filters-container {
            padding: 20px;
            margin-bottom: 20px;
        }
        .filter-section h3 {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        .news-page-header {
            padding: 25px 0;
            margin: 0 0 20px 0;
        }
        .news-page-header h1 {
            font-size: 1.8rem;
            padding: 25px 15px;
        }
        .filters-container {
            padding: 15px;
            margin-bottom: 15px;
        }
        .filter-section h3 {
            font-size: 0.95rem;
            margin-bottom: 10px;
        }
        .year-buttons,
        .month-buttons {
            gap: 6px;
        }
        .year-btn {
            padding: 8px 15px;
            font-size: 0.85rem;
        }
        .month-btn {
            padding: 8px 12px;
            font-size: 0.8rem;
        }
        .news-grid {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 12px;
            margin-bottom: 25px;
        }
        .news-card-image {
            height: 150px;
        }
        .news-card-content {
            padding: 15px;
        }
        .news-card-title {
            font-size: 0.95rem;
            margin-bottom: 8px;
        }
        .news-card-description {
            font-size: 0.8rem;
            margin-bottom: 10px;
        }
        .news-card-date {
            font-size: 0.75rem;
        }
    }

    @media (max-width: 576px) {
        .news-page-header {
            padding: 20px 0;
            margin: 0 0 15px 0;
            display: block !important;
            visibility: visible !important;
        }
        .news-page-header h1 {
            font-size: 1.5rem;
            display: block !important;
            visibility: visible !important;
            color: white;
            padding: 20px 10px;
        }
        .news-page-header i {
            display: none;
        }
        .filters-container {
            padding: 12px;
            margin-bottom: 12px;
        }
        .filters-row {
            gap: 15px;
        }
        .filter-section h3 {
            font-size: 0.9rem;
            margin-bottom: 8px;
        }
        .year-buttons,
        .month-buttons {
            gap: 5px;
        }
        .year-btn {
            padding: 7px 12px;
            font-size: 0.75rem;
        }
        .month-btn {
            padding: 6px 10px;
            font-size: 0.7rem;
        }
        .clear-filter {
            padding: 6px 12px;
            font-size: 0.8rem;
        }
        .news-grid {
            grid-template-columns: 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }
        .news-card-image {
            height: 180px;
        }
        .news-card-content {
            padding: 12px;
        }
        .news-card-title {
            font-size: 0.9rem;
            margin-bottom: 6px;
        }
        .news-card-description {
            font-size: 0.75rem;
            margin-bottom: 8px;
            line-height: 1.4;
        }
        .news-card-date {
            font-size: 0.7rem;
            margin-bottom: 6px;
        }
        .read-more {
            font-size: 0.75rem;
        }
    }

    @media (max-width: 480px) {
        .news-page-header {
            padding: 15px 0;
            margin: 0 0 10px 0;
            display: block !important;
            visibility: visible !important;
        }
        .news-page-header h1 {
            font-size: 1.3rem;
            margin-bottom: 5px;
            display: block !important;
            visibility: visible !important;
            color: white;
            padding: 15px 8px;
        }
        .filters-container {
            padding: 10px;
            margin-bottom: 10px;
        }
        .filters-row {
            gap: 10px;
        }
        .filter-section h3 {
            font-size: 0.85rem;
            margin-bottom: 6px;
        }
        .filter-section h3 i {
            display: none;
        }
        .year-buttons,
        .month-buttons {
            gap: 4px;
        }
        .year-btn {
            padding: 6px 10px;
            font-size: 0.7rem;
        }
        .month-btn {
            padding: 5px 8px;
            font-size: 0.65rem;
        }
        .news-grid {
            grid-template-columns: 1fr;
            gap: 8px;
            margin-bottom: 15px;
        }
        .news-card-image {
            height: 150px;
        }
        .news-card-content {
            padding: 10px;
        }
        .news-card-title {
            font-size: 0.85rem;
            margin-bottom: 5px;
            line-height: 1.3;
        }
        .news-card-description {
            font-size: 0.7rem;
            margin-bottom: 6px;
        }
        .news-card-date {
            font-size: 0.65rem;
            margin-bottom: 4px;
        }
        .news-card-date i {
            display: none;
        }
        .read-more {
            font-size: 0.7rem;
        }
        .no-news {
            padding: 30px 15px;
            font-size: 0.9rem;
        }
        .no-news i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .no-news p {
            font-size: 0.9rem;
        }
    }
</style>

<div class="news-page-header">
    <div class="container mx-auto px-4">
        <h1><i class="fas fa-newspaper" style="margin-right: 15px;"></i>SJC News Archive</h1>
    </div>
</div>

<div class="container mx-auto px-4 py-8">

    <div class="filters-container">
        <div class="filters-row">
            <!-- Years Filter -->
            <div class="filter-section">
                <div class="year-buttons">
                    @forelse($years as $year)
                        <a href="{{ route('news.public.index', ['year' => $year]) }}" 
                           class="year-btn @if($year == $selectedYear) active @endif">
                            {{ $year }}
                        </a>
                    @empty
                        <p style="color: #999;">No news available</p>
                    @endforelse
                </div>
            </div>

            <!-- Months Filter -->
            <div class="filter-section">
                <div class="month-buttons">
                    <a href="{{ route('news.public.index', ['year' => $selectedYear]) }}" 
                       class="month-btn @if(!$selectedMonth) active @endif">
                        All Months
                    </a>
                    @forelse($months as $month => $monthData)
                        <a href="{{ route('news.public.index', ['year' => $selectedYear, 'month' => $month]) }}" 
                           class="month-btn @if($month == $selectedMonth) active @endif">
                            {{ $monthData->month_name }}
                        </a>
                    @empty
                        <p style="color: #999; font-size: 0.9rem;">No months available</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- News Grid -->
    @if($news->count() > 0)
        <div class="news-grid">
            @foreach($news as $article)
                <a href="{{ route('news.public.show', $article) }}" class="news-card">
                    <div class="news-card-image">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <i class="fas fa-newspaper"></i>
                        @endif
                    </div>
                    <div class="news-card-content">
                        <div class="news-card-date">
                            <i class="fas fa-calendar-alt" style="margin-right: 5px;"></i>
                            {{ $article->published_at->format('M d, Y') }}
                        </div>
                        <h3 class="news-card-title">{{ $article->title }}</h3>
                        <p class="news-card-description">{{ Str::limit($article->description, 100) }}</p>
                        <span class="read-more">
                            Read More <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>

        @if($news->hasPages())
            <div class="pagination">
                {{ $news->links() }}
            </div>
        @endif
    @else
        <div class="no-news">
            <i class="fas fa-inbox"></i>
            <p>No news articles found for the selected filters.</p>
        </div>
    @endif
</div>
@endsection
