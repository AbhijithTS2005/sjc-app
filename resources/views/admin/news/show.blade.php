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
    .article-container {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    .article-header {
        padding: 30px;
        background: linear-gradient(135deg, #f9f9f9 0%, #f0f0f0 100%);
        border-bottom: 2px solid #003366;
    }
    .article-title {
        font-family: 'Merriweather', Georgia, serif;
        font-size: 2.2rem;
        color: #003366;
        margin: 0 0 15px 0;
        font-weight: 700;
    }
    .article-meta {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
        font-size: 0.9rem;
    }
    .article-meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #666;
    }
    .article-meta-item i {
        color: #003366;
        width: 20px;
        text-align: center;
    }
    .article-image {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
    }
    .article-body {
        padding: 30px;
    }
    .article-description {
        background: #f9f9f9;
        padding: 20px;
        border-left: 4px solid #f0ad4e;
        margin-bottom: 25px;
        border-radius: 4px;
        font-size: 1rem;
        color: #555;
        line-height: 1.6;
    }
    .article-content {
        color: #333;
        line-height: 1.8;
        font-size: 0.95rem;
        white-space: pre-wrap;
        word-wrap: break-word;
    }
    .article-actions {
        display: flex;
        gap: 12px;
        margin-top: 30px;
        padding-top: 20px;
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
    .btn-edit {
        background: #003366;
        color: white;
    }
    .btn-edit:hover {
        background: #002244;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
    }
    .btn-delete {
        background: #d32f2f;
        color: white;
    }
    .btn-delete:hover {
        background: #b71c1c;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(211, 47, 47, 0.3);
    }
</style>

<div class="container mx-auto px-4 py-8">
    <div style="max-width: 900px; margin: 0 auto;">
        <a href="{{ route('news.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to News
        </a>

        <article class="article-container">
            @if ($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="article-image">
            @endif

            <div class="article-header">
                <h1 class="article-title">{{ $news->title }}</h1>
                <div class="article-meta">
                    <div class="article-meta-item">
                        <i class="fas fa-calendar"></i>
                        <strong>Published:</strong> {{ $news->published_at ? $news->published_at->format('F d, Y') : 'Not published' }}
                    </div>
                    <div class="article-meta-item">
                        <i class="fas fa-clock"></i>
                        <strong>Created:</strong> {{ $news->created_at->format('F d, Y') }}
                    </div>
                </div>
            </div>

            <div class="article-body">
                <div class="article-description">
                    <strong>Summary:</strong><br>
                    {{ $news->description }}
                </div>

                <div class="article-content">
                    {{ $news->content }}
                </div>

                <div class="article-actions">
                    <a href="{{ route('news.edit', $news) }}" class="btn btn-edit">
                        <i class="fas fa-edit"></i> Edit Article
                    </a>
                    <form action="{{ route('news.destroy', $news) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this article permanently?')">
                            <i class="fas fa-trash"></i> Delete Article
                        </button>
                    </form>
                </div>
            </div>
        </article>
    </div>
</div>
@endsection
