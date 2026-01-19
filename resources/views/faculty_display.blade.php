<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Display</title>
    <style>
        /* Modern System Font Stack (No Google Fonts API) */
        body {
            background-color: #f4f7f6;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 40px 20px;
            color: #333;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            color: #2c3e50;
        }

       
        .btn-add:hover {
            background-color: #34495e;
        }

        /* Responsive Grid */
        .faculty-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }

        /* Modern Card Design */
        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 25px;
            border: 1px solid #eee;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        /* External ID buttons */
        .ext-btn {
            display:inline-block;
            padding:8px 12px;
            border-radius:8px;
            background:#f3f4f6;
            color:#111827;
            text-decoration:none;
            font-weight:700;
            border:1px solid #e5e7eb;
            transition:background 0.12s, transform 0.12s;
            font-size:13px;
            white-space:nowrap;
        }
        .ext-btn:hover { background:#e6f0ff; transform:translateY(-2px); }

        /* Image Styling */
        .faculty-img {
            width: 280px;
            height: 280px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            background-color: #eee;
            margin-bottom: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
            image-rendering: -webkit-optimize-contrast; 
        }

        /* HOD Badge Styling */
        .hod-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: linear-gradient(135deg, #f0ad4e 0%, #ec971f 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 12px;
            box-shadow: 0 4px 12px rgba(240, 173, 78, 0.4);
            border: 2px solid white;
            letter-spacing: 0.5px;
        }
        
        .faculty-name {
            font-size: 20px;
            font-weight: 700;
            margin: 10px 0 5px 0;
            color: #1a1a1a;
            letter-spacing: 0.3px;
        }
        
        .faculty-details-heading {
            font-weight: 600;
            color: #0066cc;
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            letter-spacing: 0.2px;
        }





        .empty-msg {
            text-align: center;
            grid-column: 1 / -1;
            padding: 50px;
            color: #7f8c8d;
            background: #fff;
            border-radius: 12px;
        }

        @media (max-width: 1200px) {
            .page-container { gap: 30px; padding: 30px 15px; }
            .section-header { font-size: 2rem; }
        }

        @media (max-width: 992px) {
            .page-container { flex-direction: column; padding: 20px; gap: 20px; }
            .sidebar-column { order: 2; min-width: 100%; }
            .content-column { order: 1; }
            .section-header { font-size: 1.8rem; }
        }

        @media (max-width: 768px) {
            .page-container { padding: 15px; gap: 15px; }
            .section-header { font-size: 1.5rem; margin-bottom: 15px; }
            .faculty-grid { grid-template-columns: repeat(2, 1fr); }
            .form-group { margin-bottom: 15px; }
            input, textarea, select { font-size: 1rem; padding: 8px; }
        }

        @media (max-width: 576px) {
            .page-container { padding: 10px; }
            .section-header { font-size: 1.3rem; }
            .faculty-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 480px) {
            .page-container { padding: 8px; }
            .section-header { font-size: 1.1rem; }
            input, textarea, select { font-size: 0.9rem; padding: 6px; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Faculty Display</h1>
    </div>

    <div class="faculty-grid">
        @forelse($faculties as $faculty)
            <div class="card">
                <div style="position: relative; width: 100%; margin-bottom: 15px;">
                    <img src="{{ $faculty->photo_url ?? asset('storage/' . $faculty->photo_path) }}" 
                         alt="{{ $faculty->name }}" 
                         class="faculty-img">
                    @if($faculty->is_hod)
                        <div class="hod-badge">HOD</div>
                    @endif
                </div>

                <div class="faculty-name">{{ $faculty->name }}</div>

                <div style="text-align:center;margin-bottom:6px;color:#6b7280;font-size:13px">@deptDisplay($faculty->department)</div>

                <div class="faculty-designation" style="margin-bottom:12px">
                    <strong style=\"font-size:15px;color:#0066cc;text-transform:uppercase;letter-spacing:0.5px;font-weight:700;\">{{ $faculty->designation ?? '' }}</strong>
                </div>

                <div style="width:100%;margin-top:12px;color:#555;text-align:left;font-size:13px;line-height:1.7;">
                    @if($faculty->qualification)
                        <div class="faculty-details-heading">Qualification</div>
                        <div style="margin-bottom:14px;">{!! nl2br(e($faculty->qualification)) !!}</div>
                    @endif

                    @if($faculty->area_of_interest)
                        <div class="faculty-details-heading">Area of Interest</div>
                        <div style="margin-bottom:14px;">{!! nl2br(e($faculty->area_of_interest)) !!}</div>
                    @endif

                    @if($faculty->teaching_experience)
                        <div class="faculty-details-heading">Teaching Experience</div>
                        <div style="margin-bottom:14px;">{!! nl2br(e($faculty->teaching_experience)) !!}</div>
                    @endif

                    @if($faculty->industrial_experience)
                        <div class="faculty-details-heading">Industrial Experience</div>
                        <div style="margin-bottom:14px;">{!! nl2br(e($faculty->industrial_experience)) !!}</div>
                    @endif
                </div>

                <div style="display:flex;gap:6px;margin-top:12px;flex-wrap:nowrap;justify-content:center;overflow-x:auto;">
                    @if($faculty->orcid_id)
                        <a class="ext-btn" href="https://orcid.org/{{ $faculty->orcid_id }}" target="_blank" rel="noopener">ORCID</a>
                    @endif
                    @if($faculty->scopus_id)
                        <a class="ext-btn" href="https://www.scopus.com/authid/detail.uri?authorId={{ $faculty->scopus_id }}" target="_blank" rel="noopener">Scopus</a>
                    @endif
                    @if($faculty->google_scholar_id)
                        <a class="ext-btn" href="https://scholar.google.com/citations?user={{ $faculty->google_scholar_id }}" target="_blank" rel="noopener">Google Scholar</a>
                    @endif
                    @if($faculty->vidwan_id)
                        <a class="ext-btn" href="https://vidwan.in/profile/{{ $faculty->vidwan_id }}" target="_blank" rel="noopener">Vidwan</a>
                    @endif
                </div>
            </div>
        @empty
            <div class="empty-msg">
                <p>No faculty members found in the database.</p>
                <a href="/faculty/create">Add one now</a>
            </div>
        @endforelse
    </div>
</div>

</body>
</html>