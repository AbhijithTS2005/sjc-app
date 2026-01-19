@extends('layouts.app')

@section('content')
<style>
    .form-header {
        background: linear-gradient(135deg, #003366 0%, #004d99 100%);
        color: white;
        padding: 30px 40px;
        margin: -32px -40px 30px -40px;
        border-radius: 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .form-header h1 {
        font-family: 'Merriweather', Georgia, serif;
        font-size: 2rem;
        margin: 0;
        font-weight: 700;
    }
    .form-container {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        padding: 30px;
    }
    .error-alert {
        background: #fee;
        border: 1px solid #fcc;
        color: #c33;
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
    }
    .error-alert h3 {
        font-weight: 600;
        margin: 0 0 10px 0;
    }
    .error-alert ul {
        margin: 0;
        padding-left: 20px;
    }
    .error-alert li {
        margin-bottom: 5px;
    }
    .form-group {
        margin-bottom: 25px;
    }
    .form-group label {
        display: block;
        font-weight: 600;
        color: #003366;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }
    .form-group input[type="text"],
    .form-group input[type="date"],
    .form-group input[type="file"],
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-family: inherit;
        font-size: 0.95rem;
        transition: all 0.2s;
        box-sizing: border-box;
    }
    .form-group input[type="text"]:focus,
    .form-group input[type="date"]:focus,
    .form-group input[type="file"]:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #003366;
        box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
    }
    .form-group input.error,
    .form-group textarea.error {
        border-color: #d32f2f;
        background-color: #fff5f5;
    }
    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }
    .form-help {
        font-size: 0.85rem;
        color: #666;
        margin-top: 6px;
        display: block;
    }
    .form-error {
        color: #d32f2f;
        font-size: 0.85rem;
        margin-top: 6px;
        display: block;
    }
    .form-actions {
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
    .btn-primary {
        background: #f0ad4e;
        color: white;
    }
    .btn-primary:hover {
        background: #ec971f;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(240, 173, 78, 0.3);
    }
    .btn-secondary {
        background: #f0f0f0;
        color: #333;
    }
    .btn-secondary:hover {
        background: #e0e0e0;
    }
    .required-note {
        font-size: 0.85rem;
        color: #666;
        margin-top: 20px;
        text-align: center;
    }
</style>

<div class="container mx-auto px-4 py-8">
    <div style="max-width: 700px; margin: 0 auto;">
        <div class="form-header">
            <h1><i class="fas fa-plus-circle" style="margin-right: 12px;"></i>Create News Article</h1>
        </div>

        @if ($errors->any())
            <div class="error-alert">
                <h3><i class="fas fa-exclamation-circle"></i> Please fix the following errors:</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf

            <div class="form-group">
                <label for="title"><i class="fas fa-heading" style="margin-right: 8px; color: #003366;"></i>Title *</label>
                <input type="text" name="title" id="title" 
                       class="@error('title') error @enderror" 
                       value="{{ old('title') }}" 
                       placeholder="Enter article title" required>
                <span class="form-help">Minimum 3 characters</span>
                @error('title')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description"><i class="fas fa-align-left" style="margin-right: 8px; color: #003366;"></i>Description *</label>
                <textarea name="description" id="description" 
                          class="@error('description') error @enderror" 
                          placeholder="Brief summary of the news article..."
                          required style="min-height: 100px;">{{ old('description') }}</textarea>
                <span class="form-help">Brief summary (10-500 characters)</span>
                @error('description')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="content"><i class="fas fa-file-alt" style="margin-right: 8px; color: #003366;"></i>Content *</label>
                <textarea name="content" id="content" 
                          class="@error('content') error @enderror" 
                          placeholder="Full news article content..."
                          required style="min-height: 200px;">{{ old('content') }}</textarea>
                <span class="form-help">Complete article content (minimum 20 characters)</span>
                @error('content')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image"><i class="fas fa-image" style="margin-right: 8px; color: #003366;"></i>Featured Image</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="@error('image') error @enderror">
                <span class="form-help">JPEG, PNG, GIF, or SVG (Maximum 5MB) - Optional</span>
                @error('image')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check"></i> Create Article
                </button>
                <a href="{{ route('news.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>

            <div class="required-note">
                <strong>*</strong> = Required field
            </div>
        </form>
    </div>
</div>
@endsection
