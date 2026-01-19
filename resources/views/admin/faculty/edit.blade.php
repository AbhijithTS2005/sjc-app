@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Faculty</h1>

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

    <form action="{{ route('faculty.update', $faculty->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="margin-bottom:10px;">
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name', $faculty->name) }}" required style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('name') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Department</label><br>
            <select name="department" required style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
                <option value="">-- Select Department --</option>
                <option value="commerce" {{ old('department', $faculty->department) === 'commerce' ? 'selected' : '' }}>Commerce</option>
                <option value="managementstudies" {{ old('department', $faculty->department) === 'managementstudies' ? 'selected' : '' }}>Management Studies</option>
                <option value="socialwork" {{ old('department', $faculty->department) === 'socialwork' ? 'selected' : '' }}>Social Work</option>
                <option value="physics" {{ old('department', $faculty->department) === 'physics' ? 'selected' : '' }}>Physics</option>
                <option value="chemistry" {{ old('department', $faculty->department) === 'chemistry' ? 'selected' : '' }}>Chemistry</option>
                <option value="mathematics" {{ old('department', $faculty->department) === 'mathematics' ? 'selected' : '' }}>Mathematics</option>
                <option value="english" {{ old('department', $faculty->department) === 'english' ? 'selected' : '' }}>English</option>
                <option value="economics" {{ old('department', $faculty->department) === 'economics' ? 'selected' : '' }}>Economics</option>
                <option value="datascience" {{ old('department', $faculty->department) === 'datascience' ? 'selected' : '' }}>Data Science</option>
                <option value="orientallanguages" {{ old('department', $faculty->department) === 'orientallanguages' ? 'selected' : '' }}>Oriental Languages</option>
                <option value="physicaleducation" {{ old('department', $faculty->department) === 'physicaleducation' ? 'selected' : '' }}>Physical Education</option>
            </select>
            @error('department') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Designation</label><br>
            <input type="text" name="designation" value="{{ old('designation', $faculty->designation) }}" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('designation') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label style="display:flex;align-items:center;gap:8px;">
                <input type="checkbox" name="is_hod" value="1" {{ old('is_hod', $faculty->is_hod) ? 'checked' : '' }}>
                <span>Head of Department (HOD)</span>
            </label>
            @error('is_hod') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Degree (UG)</label><br>
            <input type="text" name="degree" placeholder="e.g., BCommerce, BMS, BA, BSc, BMC" value="{{ old('degree', $faculty->degree) }}" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('degree') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Masters / Higher Degree</label><br>
            <input type="text" name="masters" placeholder="e.g., MCommerce, MSocialWork, MSc, MA, PhD, MPhil" value="{{ old('masters', $faculty->masters) }}" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('masters') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Years of Experience</label><br>
            <input type="number" name="experience_years" value="{{ old('experience_years', $faculty->experience_years ?? 0) }}" min="0" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('experience_years') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Qualification</label><br>
            <textarea name="qualification" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">{{ old('qualification', $faculty->qualification) }}</textarea>
            @error('qualification') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Area of Interest</label><br>
            <textarea name="area_of_interest" rows="3" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">{{ old('area_of_interest', $faculty->area_of_interest) }}</textarea>
            @error('area_of_interest') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Teaching Experience</label><br>
            <textarea name="teaching_experience" rows="3" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">{{ old('teaching_experience', $faculty->teaching_experience) }}</textarea>
            @error('teaching_experience') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Industrial Experience</label><br>
            <textarea name="industrial_experience" rows="2" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">{{ old('industrial_experience', $faculty->industrial_experience) }}</textarea>
            @error('industrial_experience') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Vidwan ID</label><br>
            <input type="text" name="vidwan_id" value="{{ old('vidwan_id', $faculty->vidwan_id) }}" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('vidwan_id') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>ORCID ID</label><br>
            <input type="text" name="orcid_id" value="{{ old('orcid_id', $faculty->orcid_id) }}" placeholder="0000-0000-0000-0000" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('orcid_id') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Scopus ID</label><br>
            <input type="text" name="scopus_id" value="{{ old('scopus_id', $faculty->scopus_id) }}" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('scopus_id') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Google Scholar ID</label><br>
            <input type="text" name="google_scholar_id" value="{{ old('google_scholar_id', $faculty->google_scholar_id) }}" style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;">
            @error('google_scholar_id') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom:10px;">
            <label>Photo (replace)</label><br>
            <input type="file" name="photo" accept="image/*" id="photoInputEdit">
            <div style="margin-top:8px;">
                @if($faculty->photo_url)
                    <img id="existingPhoto" src="{{ $faculty->photo_url }}" style="height:96px;border-radius:6px;object-fit:cover;border:1px solid #ddd;" />
                @else
                    <img id="existingPhoto" src="" style="height:96px;border-radius:6px;object-fit:cover;border:1px solid #ddd;display:none;" />
                @endif
            </div>
            <div id="photoPreviewWrapEdit" style="margin-top:8px; display:none;">
                <img id="photoPreviewEdit" src="#" style="height:96px;border-radius:6px;object-fit:cover;border:1px solid #ddd;" />
            </div>
            @error('photo') <div style="color:#c00;margin-top:6px;">{{ $message }}</div> @enderror
        </div>
        <button type="submit" style="padding:10px 16px;border-radius:6px;background:#003366;color:#fff;border:none;">Save</button>
    </form>
</div>

<script>
document.getElementById('photoInputEdit').addEventListener('change', function(e){
    var file = e.target.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function(evt){
        var img = document.getElementById('photoPreviewEdit');
        img.src = evt.target.result;
        document.getElementById('photoPreviewWrapEdit').style.display = 'block';
        var existing = document.getElementById('existingPhoto'); if (existing) existing.style.display = 'none';
    };
    reader.readAsDataURL(file);
});
</script>
@endsection