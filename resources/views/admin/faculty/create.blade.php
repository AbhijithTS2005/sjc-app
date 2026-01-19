@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Faculty</h1>

    @if(session('success'))
        <div style="background:#e6ffed;border:1px solid #b7f5c7;padding:10px;border-radius:4px;margin-bottom:12px;color:#1a7a2e;">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div style="background:#ffe6e6;border:1px solid #f5b7b7;padding:10px;border-radius:4px;margin-bottom:12px;color:#7a1a1a;">
            <ul style="margin:0;padding-left:18px;">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('faculty.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom:10px;">
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('name') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Department</label><br>
            <select name="department" required style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
                <option value="">-- Select Department --</option>
                <option value="commerce" {{ old('department', request()->get('department')) === 'commerce' ? 'selected' : '' }}>Commerce</option>
                <option value="managementstudies" {{ old('department', request()->get('department')) === 'managementstudies' ? 'selected' : '' }}>Management Studies</option>
                <option value="socialwork" {{ old('department', request()->get('department')) === 'socialwork' ? 'selected' : '' }}>Social Work</option>
                <option value="physics" {{ old('department', request()->get('department')) === 'physics' ? 'selected' : '' }}>Physics</option>
                <option value="chemistry" {{ old('department', request()->get('department')) === 'chemistry' ? 'selected' : '' }}>Chemistry</option>
                <option value="mathematics" {{ old('department', request()->get('department')) === 'mathematics' ? 'selected' : '' }}>Mathematics</option>
                <option value="english" {{ old('department', request()->get('department')) === 'english' ? 'selected' : '' }}>English</option>
                <option value="economics" {{ old('department', request()->get('department')) === 'economics' ? 'selected' : '' }}>Economics</option>
                <option value="datascience" {{ old('department', request()->get('department')) === 'datascience' ? 'selected' : '' }}>Data Science</option>
                <option value="orientallanguages" {{ old('department', request()->get('department')) === 'orientallanguages' ? 'selected' : '' }}>Oriental Languages</option>
                <option value="physicaleducation" {{ old('department', request()->get('department')) === 'physicaleducation' ? 'selected' : '' }}>Physical Education</option>
            </select>
            @error('department') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Designation</label><br>
            <input type="text" name="designation" value="{{ old('designation') }}" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('designation') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label style="display:flex;align-items:center;gap:8px;">
                <input type="checkbox" name="is_hod" value="1" {{ old('is_hod') ? 'checked' : '' }}>
                <span>Head of Department (HOD)</span>
            </label>
            @error('is_hod') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Qualification</label><br>
            <textarea name="qualification" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">{{ old('qualification') }}</textarea>
            @error('qualification') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Area of Interest</label><br>
            <textarea name="area_of_interest" rows="3" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">{{ old('area_of_interest') }}</textarea>
            @error('area_of_interest') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Teaching Experience</label><br>
            <textarea name="teaching_experience" rows="3" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">{{ old('teaching_experience') }}</textarea>
            @error('teaching_experience') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Industrial Experience</label><br>
            <textarea name="industrial_experience" rows="2" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">{{ old('industrial_experience') }}</textarea>
            @error('industrial_experience') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Vidwan ID</label><br>
            <input type="text" name="vidwan_id" value="{{ old('vidwan_id') }}" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('vidwan_id') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>ORCID ID</label><br>
            <input type="text" name="orcid_id" value="{{ old('orcid_id') }}" placeholder="0000-0000-0000-0000" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('orcid_id') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Scopus ID</label><br>
            <input type="text" name="scopus_id" value="{{ old('scopus_id') }}" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('scopus_id') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Google Scholar ID</label><br>
            <input type="text" name="google_scholar_id" value="{{ old('google_scholar_id') }}" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('google_scholar_id') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Photo</label><br>
            <input type="file" name="photo" accept="image/*" id="photoInput">
            <div id="photoPreviewWrap" style="margin-top:8px; display:none;">
                <img id="photoPreview" src="#" style="height:96px;border-radius:6px;object-fit:cover;border:1px solid #ddd;" />
            </div>
            @error('photo') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <button type="submit" style="padding:10px 16px;border-radius:6px;background:#003366;color:#fff;border:none;">Save</button>
    </form>
</div>

<script>
document.getElementById('photoInput').addEventListener('change', function(e){
    var file = e.target.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function(evt){
        var img = document.getElementById('photoPreview');
        img.src = evt.target.result;
        document.getElementById('photoPreviewWrap').style.display = 'block';
    };
    reader.readAsDataURL(file);
});
</script>
@endsection