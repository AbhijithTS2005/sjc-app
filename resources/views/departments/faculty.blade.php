@extends('layouts.app')
@include('partials.department-sidebar-css')

@push('styles')
<style>
    * { 
        margin: 0; 
        padding: 0; 
        box-sizing: border-box; 
        font-family: 'Segoe UI', sans-serif; 
    }
    
    body { 
        background-color: #f4f4f4; 
        color: #333; 
        line-height: 1.6; 
    }

    a { 
        text-decoration: none; 
        color: inherit; 
        transition: all 0.3s ease; 
    }

    /* Layout Grid */
    .container {
        display: grid;
        grid-template-columns: 3fr 1.2fr;
        gap: 30px;
        padding: 40px;
        max-width: 1500px;
        margin: 0 auto;
        min-height: 80vh;
    }

    /* Faculty Section */
    .faculty-section {
        background: white;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .section-header {
        border-bottom: 2px solid var(--college-blue);
        padding-bottom: 15px;
        margin-bottom: 30px;
    }

    .section-header h1 {
        color: var(--college-blue);
        font-size: 2rem;
        margin: 0;
    }

    /* Faculty Grid */
    .faculty-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    /* Faculty Card */
    .faculty-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: transform 0.2s, box-shadow 0.2s;
        border: 1px solid #eee;
        text-align: center;
        padding: 20px;
        display: flex;
        flex-direction: column;
    }

    .faculty-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }

    /* Faculty Image */
    .faculty-image-container {
        position: relative;
        margin-bottom: 15px;
    }

    .faculty-img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #fff;
        background-color: #eee;
        margin: 0 auto 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.12);
        image-rendering: -webkit-optimize-contrast;
    }

    /* HOD Badge */
    .hod-badge {
        position: absolute;
        top: -5px;
        right: 20px;
        background: linear-gradient(135deg, #f0ad4e 0%, #ec971f 100%);
        color: white;
        padding: 6px 12px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 11px;
        box-shadow: 0 4px 12px rgba(240, 173, 78, 0.4);
        border: 2px solid white;
        letter-spacing: 0.5px;
    }

    /* Faculty Info */
    .faculty-name {
        font-size: 18px;
        font-weight: 700;
        margin: 10px 0 5px 0;
        color: #1a1a1a;
        letter-spacing: 0.3px;
    }

    .faculty-designation {
        font-size: 14px;
        color: #0066cc;
        font-weight: 700;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .faculty-details {
        text-align: left;
        color: #555;
        font-size: 13px;
        line-height: 1.7;
        margin: 10px 0;
        flex-grow: 1;
    }

    .faculty-details div {
        margin-bottom: 8px;
    }

    .faculty-details strong {
        color: #0066cc;
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
        font-size: 13px;
        letter-spacing: 0.2px;
    }

    /* External ID Buttons */
    .ext-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 12px;
        border-radius: 8px;
        background: #f3f4f6;
        color: #111827;
        text-decoration: none;
        font-weight: 700;
        border: 1px solid #e5e7eb;
        transition: background 0.12s, transform 0.12s;
        font-size: 12px;
        white-space: nowrap;
        flex-shrink: 0;
        min-width: 90px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .ext-btn:hover {
        background: #e6f0ff;
        transform: translateY(-2px);
    }

    /* Empty State */
    .empty-message {
        text-align: center;
        padding: 50px;
        color: #7f8c8d;
    }

    .empty-message p {
        font-size: 16px;
        margin-bottom: 15px;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .container {
            grid-template-columns: 3fr 1fr;
            gap: 25px;
            padding: 30px 20px;
        }
        .section-header h1 { 
            font-size: 1.8rem; 
        }
    }

    @media (max-width: 992px) {
        .container {
            grid-template-columns: 1fr;
            gap: 20px;
            padding: 25px 15px;
        }
        .section-header h1 { 
            font-size: 1.6rem; 
        }
        .faculty-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .container {
            grid-template-columns: 1fr;
            padding: 20px 10px;
            gap: 15px;
        }
        .section-header h1 { 
            font-size: 1.4rem;
        }
        .faculty-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .faculty-img {
            width: 160px;
            height: 160px;
        }
        .ext-btn {
            padding: 6px 8px;
            font-size: 11px;
            min-width: 70px;
            flex-shrink: 0;
        }
    }

    @media (max-width: 576px) {
        .container {
            grid-template-columns: 1fr;
            padding: 15px;
            gap: 10px;
        }
        .section-header h1 { 
            font-size: 1.2rem;
        }
        .faculty-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        .faculty-card {
            padding: 15px;
        }
        .faculty-img {
            width: 140px;
            height: 140px;
        }
        .faculty-name {
            font-size: 15px;
        }
        .ext-btn {
            padding: 5px 6px;
            font-size: 9px;
            min-width: 65px;
            flex-shrink: 0;
        }
    }
</style>
@endpush

@section('content')
<div class="container">
    <!-- Main Content -->
    <div>
        <div class="faculty-section">
            <div class="section-header">
                <h1>Faculty Members</h1>
            </div>

            <div class="faculty-grid">
                @forelse($faculties as $faculty)
                    <div class="faculty-card">
                        <div class="faculty-image-container">
                            <img src="{{ $faculty->photo_url ?? asset('storage/' . $faculty->photo_path) }}" 
                                 alt="{{ $faculty->name }}" 
                                 class="faculty-img">
                            @if($faculty->is_hod)
                                <div class="hod-badge">HOD</div>
                            @endif
                        </div>

                        <div class="faculty-name">{{ $faculty->name }}</div>
                        <div class="faculty-designation">{{ $faculty->designation ?? '' }}</div>

                        <div class="faculty-details">
                            @if($faculty->qualification)
                                <strong>Qualification</strong>
                                <div style="margin-bottom:14px;color:#555;line-height:1.6;">{!! nl2br(e($faculty->qualification)) !!}</div>
                            @endif

                            @if($faculty->area_of_interest)
                                <strong>Area of Interest</strong>
                                <div style="margin-bottom:14px;color:#555;line-height:1.6;">{!! nl2br(e($faculty->area_of_interest)) !!}</div>
                            @endif

                            @if($faculty->teaching_experience)
                                <strong>Teaching Experience</strong>
                                <div style="margin-bottom:14px;color:#555;line-height:1.6;">{!! nl2br(e($faculty->teaching_experience)) !!}</div>
                            @endif

                            @if($faculty->industrial_experience)
                                <strong>Industrial Experience</strong>
                                <div style="margin-bottom:14px;color:#555;line-height:1.6;">{!! nl2br(e($faculty->industrial_experience)) !!}</div>
                            @endif
                        </div>

                        <div style="display:flex;justify-content:center;gap:6px;margin-top:12px;flex-wrap:nowrap;overflow-x:auto;-webkit-overflow-scrolling:touch;padding:4px 0;">
                            @if($faculty->orcid_id)
                                <a class="ext-btn" href="https://orcid.org/{{ $faculty->orcid_id }}" target="_blank" rel="noopener">ORCID</a>
                            @endif
                            @if($faculty->scopus_id)
                                <a class="ext-btn" href="https://www.scopus.com/authid/detail.uri?authorId={{ $faculty->scopus_id }}" target="_blank" rel="noopener">Scopus</a>
                            @endif
                            @if($faculty->google_scholar_id)
                                <a class="ext-btn" href="https://scholar.google.com/citations?user={{ $faculty->google_scholar_id }}" target="_blank" rel="noopener">Scholar</a>
                            @endif
                            @if($faculty->vidwan_id)
                                <a class="ext-btn" href="https://vidwan.inflibnet.ac.in/profile/{{ $faculty->vidwan_id }}" target="_blank" rel="noopener">Vidwan</a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="empty-message">
                        <p>No faculty members found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    @include('partials.department-sidebar', ['dept' => $dept])
</div>

@endsection
