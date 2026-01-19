@extends('layouts.app')

@section('content')
<style>
    :root {
        --college-blue: #003366;
        --accent-gold: #ffcc00;
        --light-gray: #f8f9fa;
    }

    .form-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .form-header {
        margin-bottom: 30px;
        border-bottom: 3px solid var(--college-blue);
        padding-bottom: 20px;
    }

    .form-header h1 {
        font-size: 2.5rem;
        color: var(--college-blue);
        margin: 0 0 15px 0;
        font-weight: 700;
    }

    .form-header .subtitle {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 10px;
    }

    .form-back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 10px;
        color: #666;
        text-decoration: none;
        font-size: 0.95rem;
        transition: all 0.3s;
    }

    .form-back-link:hover {
        color: var(--college-blue);
        margin-left: -5px;
    }

    .form-section {
        background: white;
        padding: 35px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 28px;
    }

    .form-group label {
        display: block;
        font-weight: 700;
        color: var(--college-blue);
        margin-bottom: 10px;
        font-size: 0.98rem;
        letter-spacing: 0.3px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 13px 15px;
        border: 1.5px solid #ddd;
        border-radius: 6px;
        font-size: 0.95rem;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--college-blue);
        box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-group.has-error input,
    .form-group.has-error textarea,
    .form-group.has-error select {
        border-color: #dc3545;
    }

    .form-error {
        color: #dc3545;
        font-size: 0.85rem;
        margin-top: 6px;
        display: block;
    }

    .form-helper {
        color: #666;
        font-size: 0.85rem;
        margin-top: 6px;
        display: block;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        align-items: start;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 40px;
        padding-top: 25px;
        border-top: 2px solid #eee;
        flex-wrap: wrap;
    }

    .btn {
        padding: 13px 28px;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        white-space: nowrap;
    }

    .btn-primary {
        background: var(--college-blue);
        color: white;
    }

    .btn-primary:hover {
        background: #002244;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
    }

    .btn-secondary {
        background: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(108, 117, 125, 0.2);
    }

    .alert {
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
        border-left: 4px solid;
    }

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border-color: #f5c6cb;
    }

    .info-box {
        background: #e7f3ff;
        border-left: 4px solid var(--college-blue);
        padding: 15px;
        border-radius: 6px;
        margin-bottom: 25px;
        font-size: 0.95rem;
        color: #003366;
    }

    .info-box i {
        margin-right: 10px;
        color: var(--college-blue);
    }

    #imagePreview {
        display: none;
        padding: 15px;
        background: var(--light-gray);
        border-radius: 6px;
        border-left: 4px solid var(--accent-gold);
    }

    #imagePreview.show {
        display: block;
    }

    #imagePreview img {
        max-width: 200px;
        max-height: 200px;
        border-radius: 4px;
    }

    #imagePreview p {
        margin: 10px 0 0 0;
        font-size: 0.85rem;
        color: #666;
    }

    .dept-badge {
        display: inline-block;
        background: var(--college-blue);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-left: 10px;
    }
</style>

<div class="form-container">
    <div class="form-header">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-calendar-alt" style="font-size: 1.5rem; color: var(--college-blue);"></i>
            <div>
                <h1>Edit Event</h1>
                <div class="subtitle">
                    <strong>@deptDisplay(auth()->user()->department) Department</strong> - Update your event details
                    <span class="dept-badge">@deptDisplay(auth()->user()->department)</span>
                </div>
            </div>
        </div>
        <a href="{{ route('dept.events.index', auth()->user()->department) }}" class="form-back-link">
            <i class="fas fa-arrow-left"></i> Back to Events
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i> <strong>Please fix the following errors:</strong>
            <ul style="margin: 10px 0 0 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-section">
        <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="department" value="{{ auth()->user()->department }}">

            <div class="form-row">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Event Title *</label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        value="{{ old('title', $event->title) }}" 
                        placeholder="Enter event title"
                        required
                    >
                    @error('title')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                    <span class="form-helper">Min 3 characters, max 255</span>
                </div>

                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                    <label for="date">Event Date *</label>
                    <input 
                        type="date" 
                        id="date" 
                        name="date" 
                        value="{{ old('date', $event->date->format('Y-m-d')) }}" 
                        required
                    >
                    @error('date')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                    <span class="form-helper">Format: YYYY-MM-DD</span>
                </div>
            </div>

            <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                <label>Event Type *</label>
                <select name="type" required>
                    <option value="">-- Select Event Type --</option>
                    <option value="academic" {{ old('type', $event->type) == 'academic' ? 'selected' : '' }}>Academic</option>
                    <option value="sports" {{ old('type', $event->type) == 'sports' ? 'selected' : '' }}>Sports</option>
                    <option value="cultural" {{ old('type', $event->type) == 'cultural' ? 'selected' : '' }}>Cultural</option>
                    <option value="placement" {{ old('type', $event->type) == 'placement' ? 'selected' : '' }}>Placement</option>
                    <option value="social" {{ old('type', $event->type) == 'social' ? 'selected' : '' }}>Social</option>
                </select>
                @error('type')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Short Description *</label>
                <textarea 
                    id="description" 
                    name="description" 
                    placeholder="Enter a brief description (10-500 characters)"
                    required
                >{{ old('description', $event->description) }}</textarea>
                @error('description')
                    <span class="form-error">{{ $message }}</span>
                @enderror
                <span class="form-helper">Summary displayed in lists and previews</span>
            </div>

            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="content">Full Content *</label>
                <textarea 
                    id="content" 
                    name="content" 
                    placeholder="Enter detailed event content"
                    required
                    style="min-height: 200px;"
                >{{ old('content', $event->content) }}</textarea>
                @error('content')
                    <span class="form-error">{{ $message }}</span>
                @enderror
                <span class="form-helper">Detailed content shown on event detail page</span>
            </div>

            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <label for="image"><i class="fas fa-image"></i> Event Image</label>
                <input 
                    type="file" 
                    id="image" 
                    name="image" 
                    accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml"
                    onchange="previewImage(event)"
                >
                @error('image')
                    <span class="form-error">{{ $message }}</span>
                @enderror
                <span class="form-helper">Supported formats: JPEG, PNG, JPG, GIF, SVG (Max 5MB)</span>
                <div id="imagePreview" style="margin-top: 15px;"></div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Event
                </button>
                <a href="{{ route('dept.events.index', auth()->user()->department) }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('imagePreview');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `
                <img src="${e.target.result}" alt="Image preview">
                <p><strong>File:</strong> ${file.name}</p>
                <p><strong>Size:</strong> ${(file.size / 1024).toFixed(2)} KB</p>
            `;
            preview.classList.add('show');
        };
        reader.readAsDataURL(file);
    } else {
        preview.classList.remove('show');
        preview.innerHTML = '';
    }
}
</script>
@endsection
