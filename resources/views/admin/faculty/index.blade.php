@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Faculty Management @if(isset($dept)) — @deptDisplay($dept) @endif</h1>

    @if(session('success'))
        <div style="background:#e6ffed;border:1px solid #b7f5c7;padding:10px;border-radius:4px;margin-bottom:12px;color:#1a7a2e;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('faculty.create') }}{{ isset($dept) ? ('?department='.$dept) : '' }}" class="btn" style="display:inline-block;margin-bottom:12px;padding:8px 12px;background:#003366;color:#fff;border-radius:6px;text-decoration:none;">Add New Faculty</a>

    <table class="table" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <th style="text-align:left; padding:8px; border-bottom:1px solid #eee;">Photo</th>
                <th style="text-align:left; padding:8px; border-bottom:1px solid #eee;">Name</th>
                <th style="text-align:left; padding:8px; border-bottom:1px solid #eee;">Department</th>
                <th style="text-align:left; padding:8px; border-bottom:1px solid #eee;">Designation</th>
                <th style="text-align:right; padding:8px; border-bottom:1px solid #eee;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faculties as $f)
            <tr>
                <td style="padding:8px; border-bottom:1px solid #f3f3f3;"><img src="{{ $f->photo_url ?? '/storage/faculty_default.png' }}" style="height:48px;border-radius:6px;object-fit:cover;border:1px solid #ddd;" /></td>
                <td style="padding:8px; border-bottom:1px solid #f3f3f3;">{{ $f->name }}</td>
                <td style="padding:8px; border-bottom:1px solid #f3f3f3;">@deptDisplay($f->department)</td>
                <td style="padding:8px; border-bottom:1px solid #f3f3f3;">{{ $f->designation }}</td>
                <td style="padding:8px; border-bottom:1px solid #f3f3f3; text-align:right;">
                    <div style="display: flex; justify-content: flex-end; align-items: center; gap: 10px;">
                        <a href="{{ route('faculty.edit', $f->id) }}" style="text-decoration:none; color:#003366;">Edit</a>
                        <span style="color:#ddd;">|</span>
                        <form action="{{ route('faculty.destroy', $f->id) }}" method="POST" style="display:inline; margin:0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete?')" style="background:none; border:none; color:#CC0000; cursor:pointer; padding:0; font-family:inherit; font-size:inherit;">Delete</button>
                        </form>
                    </div>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection