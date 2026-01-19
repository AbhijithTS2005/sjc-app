@extends('layouts.app')

@section('content')
<style>
    .back-link {
        color: #003366;
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 20px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: color 0.2s;
    }
    .back-link:hover {
        color: #f0ad4e;
    }
    .news-detail-container {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    .news-detail-image {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        background: #f0ad4e;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 4rem;
    }
    .news-detail-header {
        padding: 40px;
        background: linear-gradient(135deg, #f9f9f9 0%, #f0f0f0 100%);
        border-bottom: 2px solid #003366;
    }
    .news-detail-title {
        font-family: 'Merriweather', Georgia, serif;
        font-size: 2.5rem;
        color: #003366;
        margin: 0 0 20px 0;
        font-weight: 700;
        line-height: 1.2;
    }
    .news-detail-meta {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
        font-size: 0.95rem;
    }
    .news-detail-meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #666;
    }
    .news-detail-meta-item i {
        color: #003366;
        width: 20px;
        text-align: center;
    }
    .news-detail-body {
        padding: 40px;
    }
    .news-detail-description {
        background: #f9f9f9;
        padding: 25px;
        border-left: 4px solid #f0ad4e;
        margin-bottom: 30px;
        border-radius: 4px;
        font-size: 1.05rem;
        color: #555;
        line-height: 1.7;
    }
    .news-detail-content {
        color: #333;
        line-height: 1.9;
        font-size: 1rem;
        white-space: pre-wrap;
        word-wrap: break-word;
    }
    .news-detail-content p {
        margin-bottom: 20px;
    }
    .related-news {
        margin-top: 50px;
        padding-top: 30px;
        border-top: 2px solid #eee;
    }
    .related-news h3 {
        color: #003366;
        font-size: 1.5rem;
        margin-bottom: 20px;
        font-weight: 700;
    }
    .related-news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }
    .related-news-card {
        background: #f9f9f9;
        border-radius: 6px;
        overflow: hidden;
        transition: all 0.2s;
        text-decoration: none;
        border: 1px solid #eee;
    }
    .related-news-card:hover {
        border-color: #f0ad4e;
        box-shadow: 0 4px 12px rgba(240, 173, 78, 0.15);
    }
    .related-news-card-image {
        width: 100%;
        height: 150px;
        object-fit: cover;
        background: #f0ad4e;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
    }
    .related-news-card-content {
        padding: 15px;
    }
    .related-news-card-title {
        font-weight: 600;
        color: #003366;
        margin-bottom: 8px;
        font-size: 0.95rem;
        line-height: 1.3;
    }
    .related-news-card-date {
        font-size: 0.8rem;
        color: #999;
    }
    .action-buttons {
        display: flex;
        gap: 15px;
        margin-top: 40px;
        padding-top: 30px;
        border-top: 1px solid #eee;
    }
    .btn {
        padding: 12px 24px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.95rem;
    }
    .btn-back {
        background: #003366;
        color: white;
    }
    .btn-back:hover {
        background: #002244;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .news-detail-header {
            padding: 30px;
        }
        .news-detail-title {
            font-size: 2rem;
        }
        .news-detail-body {
            padding: 30px;
        }
    }

    @media (max-width: 992px) {
        .news-detail-header {
            padding: 25px;
        }
        .news-detail-title {
            font-size: 1.8rem;
        }
        .news-detail-meta {
            flex-direction: column;
            gap: 15px;
            font-size: 0.9rem;
        }
        .news-detail-body {
            padding: 25px;
        }
        .related-news-grid {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .news-detail-image {
            max-height: 350px;
        }
        .news-detail-header {
            padding: 20px;
        }
        .news-detail-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        .news-detail-meta {
            gap: 12px;
            font-size: 0.85rem;
        }
        .news-detail-meta-item i {
            display: none;
        }
        .news-detail-body {
            padding: 20px;
        }
        .news-detail-description {
            padding: 15px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .news-detail-content {
            font-size: 0.95rem;
            line-height: 1.7;
        }
        .related-news h3 {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }
        .related-news h3 i {
            display: none;
        }
        .related-news-grid {
            grid-template-columns: 1fr;
        }
        .action-buttons {
            gap: 10px;
            margin-top: 30px;
            padding-top: 20px;
            flex-wrap: wrap;
        }
        .btn {
            padding: 10px 18px;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 576px) {
        .back-link {
            margin-bottom: 15px;
            font-size: 0.9rem;
        }
        .back-link i {
            display: none;
        }
        .news-detail-image {
            max-height: 280px;
        }
        .news-detail-header {
            padding: 15px;
        }
        .news-detail-title {
            font-size: 1.3rem;
            margin-bottom: 12px;
        }
        .news-detail-meta {
            gap: 10px;
            font-size: 0.8rem;
            flex-wrap: wrap;
        }
        .news-detail-meta-item {
            gap: 5px;
        }
        .news-detail-body {
            padding: 15px;
        }
        .news-detail-description {
            padding: 12px;
            margin-bottom: 15px;
            font-size: 0.85rem;
            line-height: 1.5;
        }
        .news-detail-description i {
            display: none;
        }
        .news-detail-content {
            font-size: 0.9rem;
            line-height: 1.6;
            white-space: normal;
        }
        .related-news {
            margin-top: 30px;
            padding-top: 20px;
        }
        .related-news h3 {
            font-size: 1.1rem;
            margin-bottom: 12px;
        }
        .related-news-grid {
            grid-template-columns: 1fr;
            gap: 10px;
        }
        .related-news-card {
            display: flex;
            gap: 10px;
        }
        .related-news-card-image {
            width: 80px;
            min-width: 80px;
            height: 80px;
        }
        .related-news-card-content {
            padding: 8px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .related-news-card-title {
            font-size: 0.85rem;
        }
        .related-news-card-date {
            font-size: 0.75rem;
        }
        .action-buttons {
            gap: 8px;
            margin-top: 20px;
            padding-top: 15px;
            flex-direction: column;
        }
        .btn {
            padding: 9px 15px;
            font-size: 0.8rem;
            justify-content: center;
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .back-link {
            margin-bottom: 10px;
            font-size: 0.8rem;
        }
        .news-detail-image {
            max-height: 220px;
        }
        .news-detail-header {
            padding: 12px;
        }
        .news-detail-title {
            font-size: 1.15rem;
            margin-bottom: 10px;
            line-height: 1.2;
        }
        .news-detail-meta {
            gap: 8px;
            font-size: 0.75rem;
        }
        .news-detail-body {
            padding: 12px;
        }
        .news-detail-description {
            padding: 10px;
            margin-bottom: 12px;
            font-size: 0.8rem;
            line-height: 1.4;
        }
        .news-detail-content {
            font-size: 0.85rem;
            line-height: 1.5;
        }
        .news-detail-content p {
            margin-bottom: 12px;
        }
        .related-news {
            margin-top: 20px;
            padding-top: 15px;
        }
        .related-news h3 {
            font-size: 1rem;
            margin-bottom: 10px;
        }
        .related-news-card-image {
            width: 70px;
            min-width: 70px;
            height: 70px;
        }
        .related-news-card-title {
            font-size: 0.8rem;
        }
        .btn {
            padding: 8px 12px;
            font-size: 0.75rem;
        }
    }
</style>

<div class="container mx-auto px-4 py-8">
    <div style="max-width: 1000px; margin: 0 auto;">
        <a href="{{ route('news.public.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to News
        </a>

        <article class="news-detail-container">
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="news-detail-image">
            @else
                <div class="news-detail-image">
                    <i class="fas fa-newspaper"></i>
                </div>
            @endif

            <div class="news-detail-header">
                <h1 class="news-detail-title">{{ $news->title }}</h1>
                <div class="news-detail-meta">
                    <div class="news-detail-meta-item">
                        <i class="fas fa-calendar"></i>
                        <strong>Published:</strong> {{ $news->published_at->format('F d, Y') }}
                    </div>
                    <div class="news-detail-meta-item">
                        <i class="fas fa-clock"></i>
                        <strong>Last Updated:</strong> {{ $news->updated_at->format('F d, Y') }}
                    </div>
                </div>
            </div>

            <div class="news-detail-body">
                <div class="news-detail-description">
                    <strong><i class="fas fa-quote-left" style="margin-right: 8px;"></i>Summary:</strong><br>
                    {{ $news->description }}
                </div>

                <div class="news-detail-content">
                    {{ $news->content }}
                </div>

                <div class="action-buttons">
                    <a href="{{ route('news.public.index') }}" class="btn btn-back">
                        <i class="fas fa-arrow-left"></i> Back to News Archive
                    </a>
                </div>
            </div>
        </article>

        <!-- Related News -->
        @php
            $relatedNews = \App\Models\News::where('published_at', '<=', now())
                ->where('id', '!=', $news->id)
                ->orderBy('published_at', 'desc')
                ->limit(3)
                ->get();
        @endphp

        @if($relatedNews->count() > 0)
            <div class="related-news">
                <h3><i class="fas fa-link" style="margin-right: 10px;"></i>Related News</h3>
                <div class="related-news-grid">
                    @foreach($relatedNews as $related)
                        <a href="{{ route('news.public.show', $related) }}" class="related-news-card">
                            <div class="related-news-card-image">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <i class="fas fa-newspaper"></i>
                                @endif
                            </div>
                            <div class="related-news-card-content">
                                <div class="related-news-card-title">{{ $related->title }}</div>
                                <div class="related-news-card-date">{{ $related->published_at->format('M d, Y') }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
