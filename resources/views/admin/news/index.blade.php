@extends('layouts.app')

@section('content')
<style>
    .news-header {
        background: linear-gradient(135deg, #003366 0%, #004d99 100%);
        color: white;
        padding: 30px 40px;
        margin: -32px -40px 30px -40px;
        border-radius: 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .news-header h1 {
        font-family: 'Merriweather', Georgia, serif;
        font-size: 2.5rem;
        margin: 0;
        font-weight: 700;
    }
    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #f0ad4e;
        color: white;
        font-weight: 700;
        padding: 10px 20px;
        border-radius: 6px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-add:hover {
        background: #ec971f;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    .success-alert {
        background: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .success-alert i {
        font-size: 1.2rem;
    }
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: #f9f9f9;
        border-radius: 8px;
        border: 2px dashed #ddd;
    }
    .empty-state i {
        font-size: 3rem;
        color: #ccc;
        margin-bottom: 15px;
    }
    .empty-state p {
        font-size: 1.1rem;
        color: #666;
        margin: 10px 0;
    }
    .news-table {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }
    .news-table thead {
        background: #f5f5f5;
        border-bottom: 2px solid #003366;
    }
    .news-table thead th {
        color: #003366;
        font-weight: 700;
        padding: 16px;
        text-align: left;
        font-size: 0.9rem;
    }
    .news-table tbody td {
        padding: 16px;
        border-bottom: 1px solid #eee;
    }
    .news-table tbody tr:hover {
        background: #f9f9f9;
    }
    .news-title {
        color: #003366;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s;
    }
    .news-title:hover {
        color: #f0ad4e;
        text-decoration: underline;
    }
    .news-image {
        height: 50px;
        width: 50px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #ddd;
    }
    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
    }
    .btn-edit, .btn-delete {
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.2s;
        border: none;
        cursor: pointer;
    }
    .btn-edit {
        background: #e3f2fd;
        color: #1976d2;
    }
    .btn-edit:hover {
        background: #1976d2;
        color: white;
    }
    .btn-delete {
        background: #ffebee;
        color: #d32f2f;
    }
    .btn-delete:hover {
        background: #d32f2f;
        color: white;
    }

    @media (max-width: 1200px) {
        .news-header {
            padding: 25px 30px;
            margin: -32px -30px 25px -30px;
        }
        .news-header h1 {
            font-size: 2rem;
        }
    }

    @media (max-width: 992px) {
        .news-header {
            padding: 20px 20px;
            margin: -32px -20px 20px -20px;
        }
        .news-header h1 {
            font-size: 1.8rem;
        }
        .news-header > div {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start !important;
        }
        .btn-add {
            width: 100%;
            justify-content: center;
        }
        .news-table thead {
            display: none;
        }
        .news-table tbody {
            display: block;
        }
        .news-table tbody tr {
            display: block;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            background: white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }
        .news-table tbody td {
            display: block;
            padding: 12px 16px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }
        .news-table tbody td:last-child {
            border-bottom: none;
        }
        .news-table tbody td:before {
            content: attr(data-label);
            font-weight: 700;
            color: #003366;
            display: block;
            font-size: 0.85rem;
            margin-bottom: 5px;
        }
        .news-table tbody td[data-label="Title"]:before {
            content: "Title";
        }
        .news-table tbody td[data-label="Published Date"]:before {
            content: "Published";
        }
        .news-table tbody td[data-label="Image"]:before {
            content: "Image";
        }
        .news-table tbody td[data-label="Actions"]:before {
            content: "Actions";
        }
        .action-buttons {
            flex-wrap: wrap;
            gap: 8px;
        }
        .btn-edit, .btn-delete {
            flex: 1;
            min-width: 80px;
            padding: 8px 10px;
            font-size: 0.8rem;
            text-align: center;
        }
    }

    @media (max-width: 768px) {
        .container {
            padding: 0 10px;
        }
        .news-header {
            padding: 15px 15px;
            margin: -32px -10px 15px -10px;
        }
        .news-header h1 {
            font-size: 1.5rem;
        }
        .news-header h1 i {
            margin-right: 10px !important;
        }
        .btn-add {
            font-size: 0.9rem;
            padding: 8px 15px;
        }
        .success-alert {
            font-size: 0.9rem;
            padding: 12px 15px;
        }
        .empty-state {
            padding: 40px 15px;
        }
        .empty-state i {
            font-size: 2.5rem;
        }
        .empty-state p {
            font-size: 1rem;
        }
        .news-table tbody tr {
            margin-bottom: 15px;
        }
        .news-table tbody td {
            padding: 10px 12px;
            font-size: 0.9rem;
        }
        .news-image {
            height: 45px;
            width: 45px;
        }
        .btn-edit, .btn-delete {
            padding: 6px 8px;
            font-size: 0.75rem;
        }
    }

    @media (max-width: 576px) {
        .news-header {
            padding: 12px 12px;
            margin: -32px -10px 12px -10px;
        }
        .news-header h1 {
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .btn-add {
            font-size: 0.85rem;
            padding: 8px 12px;
            gap: 6px;
        }
        .btn-add i {
            display: none;
        }
        .btn-add:before {
            content: "+";
            font-weight: bold;
            font-size: 1.1rem;
        }
        .success-alert {
            font-size: 0.85rem;
            padding: 10px 12px;
            margin-bottom: 15px;
        }
        .success-alert i {
            display: none;
        }
        .empty-state {
            padding: 30px 10px;
        }
        .empty-state i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .empty-state p {
            font-size: 0.95rem;
        }
        .news-table {
            box-shadow: none;
            border: 1px solid #eee;
        }
        .news-table tbody tr {
            margin-bottom: 12px;
            border-radius: 6px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
        }
        .news-table tbody td {
            padding: 8px 12px;
            font-size: 0.85rem;
        }
        .news-title {
            font-size: 0.9rem;
        }
        .news-image {
            height: 40px;
            width: 40px;
        }
        .action-buttons {
            flex-direction: column;
            gap: 6px;
        }
        .btn-edit, .btn-delete {
            width: 100%;
            padding: 6px 10px;
            font-size: 0.75rem;
        }
        .btn-edit i, .btn-delete i {
            display: none;
        }
    }
</style>

<div class="container mx-auto px-4 py-8">
    <div class="news-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h1><i class="fas fa-newspaper" style="margin-right: 15px;"></i>SJC News Management</h1>
            <a href="{{ route('news.create') }}" class="btn-add">
                <i class="fas fa-plus"></i> Add News Article
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="success-alert">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if ($news->isEmpty())
        <div class="empty-state">
            <i class="fas fa-file-alt"></i>
            <p>No news articles yet</p>
            <a href="{{ route('news.create') }}" class="btn-add" style="margin-top: 20px; display: inline-flex;">
                <i class="fas fa-plus"></i> Create Your First Article
            </a>
        </div>
    @else
        <div class="news-table">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="width: 40%;">Title</th>
                        <th style="width: 20%;">Published Date</th>
                        <th style="width: 15%;">Image</th>
                        <th style="width: 25%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $article)
                        <tr>
                            <td data-label="Title">
                                <a href="{{ route('news.show', $article) }}" class="news-title">
                                    {{ $article->title }}
                                </a>
                            </td>
                            <td data-label="Published Date">
                                <span style="color: #666; font-size: 0.9rem;">
                                    {{ $article->published_at ? $article->published_at->format('M d, Y') : 'Not published' }}
                                </span>
                            </td>
                            <td data-label="Image">
                                @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="news-image">
                                @else
                                    <span style="color: #999; font-size: 0.85rem;">—</span>
                                @endif
                            </td>
                            <td data-label="Actions">
                                <div class="action-buttons">
                                    <a href="{{ route('news.edit', $article) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('news.destroy', $article) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" onclick="return confirm('Delete this article permanently?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($news->hasPages())
            <div style="margin-top: 20px; display: flex; justify-content: center;">
                {{ $news->links() }}
            </div>
        @endif
    @endif
</div>
@endsection
