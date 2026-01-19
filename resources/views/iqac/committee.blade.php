@extends('layouts.app')

@push('styles')
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f4f4f4; color: #333; line-height: 1.6; }

        .container {
            display: grid;
            grid-template-columns: 3fr 1.2fr;
            gap: 30px;
            padding: 40px;
            max-width: 1500px;
            margin: 0 auto;
        }

        .content-block { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .page-title { color: var(--college-blue); font-size: 2rem; border-bottom: 2px solid var(--accent-gold); padding-bottom: 15px; margin-bottom: 25px; }

        .sidebar { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border: 1px solid #e0e0e0; }
        .sidebar-section { margin-bottom: 30px; }
        .sidebar-title { font-size: 1.2rem; font-weight: 700; color: var(--college-blue); margin-bottom: 15px; border-bottom: 2px solid var(--accent-gold); padding-bottom: 5px; }
        .sidebar-links { list-style: none; padding: 0; }
        .sidebar-links li { margin-bottom: 8px; }
        .sidebar-links a { display: block; padding: 8px 12px; border-radius: 4px; transition: all 0.3s ease; font-size: 0.95rem; text-decoration: none; color: #333; }
        .sidebar-links a:hover { background: var(--college-blue); color: #fff; transform: translateX(5px); }
        .sidebar-links a i { margin-right: 8px; width: 16px; }
        .active-link { color: var(--college-blue) !important; font-weight: bold; }

        h3 { color: var(--college-blue); margin: 25px 0 15px 0; font-size: 1.3rem; }
        p { text-align: justify; line-height: 1.8; color: #555; margin-bottom: 15px; }

        .members-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
        }

        .members-table thead {
            background: var(--college-blue);
            color: white;
        }

        .members-table th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }

        .members-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        .members-table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .designation {
            color: var(--college-blue);
            font-weight: 600;
        }

        .member-card {
            background: #f9f9f9;
            padding: 20px;
            margin: 15px 0;
            border-left: 4px solid var(--college-blue);
            border-radius: 4px;
        }

        .member-card h4 {
            color: var(--college-blue);
            margin-bottom: 8px;
            font-size: 1.05rem;
        }

        .member-card p {
            margin: 5px 0;
            font-size: 0.95rem;
            color: #666;
        }

        .member-role {
            display: inline-block;
            background: var(--accent-gold);
            color: #333;
            padding: 3px 10px;
            border-radius: 3px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        @media (max-width: 1200px) { .container { grid-template-columns: 3fr 1fr; gap: 25px; padding: 30px 20px; } }
        @media (max-width: 992px) { .container { grid-template-columns: 1fr; gap: 20px; padding: 25px 15px; } footer { grid-template-columns: 1fr 1fr !important; } }
        @media (max-width: 768px) {
            .container { grid-template-columns: 1fr; padding: 20px 10px; gap: 15px; }
            .page-title { font-size: 1.6rem; }
            .content-block { padding: 15px; }
            .members-table { font-size: 0.9rem; }
            .members-table th, .members-table td { padding: 8px; }
            footer { grid-template-columns: 1fr !important; }
        }
        @media (max-width: 576px) { .container { grid-template-columns: 1fr; padding: 15px 8px; gap: 10px; } .page-title { font-size: 1.3rem; } .content-block { padding: 12px; } }
    </style>
@endpush

@section('content')

    <div class="container">
        <main>
            <div class="content-block">
                <h1 class="page-title">IQAC Committee Members</h1>

                <p>The IQAC committee comprises a diverse team of faculty, staff, and administrative personnel committed to ensuring quality excellence in institutional functioning. The committee brings together varied expertise and perspectives to foster continuous improvement.</p>

                <h3>Core Committee</h3>

                <div class="member-card">
                    <div class="member-role">Chairperson</div>
                    <h4>Dr. Joseph George </h4>
                    <p><strong>Position:</strong> Principal</p>
                    <p><strong>Email:</strong> principal@college.ac.in</p>
                </div>

                <div class="member-card">
                    <h4>Mr. Roby Mathew</h4>
                    <p><strong>Position:</strong> IQAC Coordinator</p>
                    <p><strong>Department:</strong> Department of chemistry</p>
                    <p><strong>Email:</strong> robymathew@college.ac.in</p>
                </div>

                  <div class="member-card">
                    <h4>Mr. Prince J. Mathew </h4>
                    <p><strong>Position:</strong> IQAC Assistant Coordinator</p>
                    <p><strong>Department:</strong> Department of chemistry</p>
                    <p><strong>Email:</strong> princejmathew@college.ac.in</p>
                </div>


                <h3>Faculty Representatives</h3>

                <table class="members-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Designation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Dr. Jose James</strong></td>
                            <td>Department of Physics</td>
                            <td class="designation">Associate Professor</td>
                        </tr>
                        <tr>
                            <td><strong>Dr. Sr. Sijo Francis</strong></td>
                            <td>Department of Chemistry</td>
                            <td class="designation">Associate Professor</td>
                        </tr>
                        <tr>
                            <td><strong>Ms. Sunitha Mathew</strong></td>
                            <td>Department of Mathematics</td>
                            <td class="designation">Assistant Professor</td>
                        </tr>
                        <tr>
                            <td><strong>Dr. Anju P Mathews</strong></td>
                            <td>Department of Commerce</td>
                            <td class="designation">Associate Professor</td>
                        </tr>
                        <tr>
                            <td><strong>Ms. Tisha Tomy</strong></td>
                            <td>Department of Economics</td>
                            <td class="designation">Assistant Professor</td>
                        </tr>
                        <tr>
                            <td><strong>Mr. Aneesh N</strong></td>
                            <td>Department of English</td>
                            <td class="designation">Assistant Professor</td>
                        </tr>
                        
                        <tr>
                            <td><strong>Mr. Vimal V</strong></td>
                            <td>Department of Zoology</td>
                            <td class="designation">Associate Professor</td>
                        </tr>
                        <tr>
                            <td><strong>Dr. Sr. Jinsi Jose</strong></td>
                            <td>Department of Botany</td>
                            <td class="designation">Assistant Professor</td>
                        </tr>

                        <tr>
                            <td><strong>Ms. Droupathy Devi C G</strong></td>
                            <td>Department of Malayalam</td>
                            <td class="designation">Associate Professor</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Administrative Representatives</h3>

                 <div class="member-card">
                    <h4>Rev. Dr. Alex Louis Thannipara CMI  </h4>
                    <p><strong>Position:</strong> CFO</p>
                    <p><strong>Department:</strong> Department of chemistry</p>
                    <p><strong>Email:</strong> Alexlouis@college.ac.in</p>
                </div>

                <div class="member-card">
                    <h4>Rev.Fr. Bobin Kumarettu CMI  </h4>
                    <p><strong>Position:</strong> Bursar</p>
                    <p><strong>Department:</strong> Department of chemistry</p>
                    <p><strong>Email:</strong> princejmathew@college.ac.in</p>
                </div>

                <div class="member-card">
                    <h4>Sr. Betsi Paul</h4>
                    <p><strong>Position:</strong> Office Superintendent in Charge</p>
                    <p><strong>Email:</strong> office@college.ac.in</p>
                </div>

                <h3>Student Representatives</h3>

                <div class="member-card">
                    <h4>Mr. Cyriac Philip</h4>
                    <p><strong>Position:</strong> Student Representative</p>
                    <p><strong>Year:</strong> Final Year B.Sc. Physics</p>
                </div>

                <h3>Alumni and External Stakeholders</h3>

                 <div class="member-card">
                    <h4>Ms. Kochurani Joseph</h4>
                    <p><strong>Position:</strong> Local Body Representative</p>
                    <p><strong>Email:</strong> kochurani@college.ac.in</p>
                </div>

                 <div class="member-card">
                    <h4>Mr. Roshan Paul </h4>
                    <p><strong>Position:</strong> Alumni Representative</p>
                    <p><strong>Email:</strong> roshan@college.ac.in</p>
                </div>

                 <div class="member-card">
                    <h4>Mr. Rahul J. Nair </h4>
                    <p><strong>Position:</strong> Employer</p>
                    <p><strong>Email:</strong> rahul@college.ac.in</p>
                </div>

                 <div class="member-card">
                    <h4>Mr. Alex Abraham</h4>
                    <p><strong>Position:</strong> PTA President</p>
                    <p><strong>Email:</strong> alex@college.ac.in</p>
                </div>

                 <div class="member-card">
                    <h4>Mr. Shibin Joseph</h4>
                    <p><strong>Position:</strong> Industry Expert</p>
                    <p><strong>Email:</strong> shibin@college.ac.in</p>
                </div>


                <h3>Committee Responsibilities</h3>
                <p>The IQAC committee members have the following key responsibilities:</p>
                <ul style="margin-left: 30px;">
                    <li>Participate in regular committee meetings and deliberations</li>
                    <li>Review and provide feedback on institutional policies and procedures</li>
                    <li>Support data collection and analysis for quality assessment</li>
                    <li>Promote quality consciousness in their respective departments</li>
                    <li>Contribute to the preparation of Annual Quality Assurance Reports (AQAR)</li>
                    <li>Liaison between IQAC and their respective constituencies</li>
                    <li>Contribute to institutional accreditation processes</li>
                </ul>

                <h3>Meeting Schedule</h3>
                <p>The IQAC committee meets on a bi-monthly basis to review institutional quality metrics, discuss improvement strategies, and coordinate quality enhancement activities. Special meetings are convened as needed for accreditation and quality-related matters.</p>

                <h3>Contact Information</h3>
                <p><strong>IQAC Office:</strong> Main Building, First Floor<br>
                <strong>Phone:</strong> +91-XXXX-XXXXXX<br>
                <strong>Email:</strong> iqac@college.ac.in</p>
            </div>
        </main>

        <aside class="sidebar">
            <div class="sidebar-section">
                <h3 class="sidebar-title"><i class="fas fa-cog"></i> IQAC Menu</h3>
                <ul class="sidebar-links">
                    <li><a href="{{ route('iqac.index') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="{{ route('iqac.about') }}"><i class="fas fa-info-circle"></i> About IQAC</a></li>
                    <li><a href="{{ route('iqac.committee') }}" class="active-link"><i class="fas fa-users"></i> Committee</a></li>
                    <li><a href="{{ route('iqac.objectives') }}"><i class="fas fa-bullseye"></i> Objectives</a></li>
                    <li><a href="{{ route('iqac.documents') }}"><i class="fas fa-file-pdf"></i> AQAR</a></li>
                    <li><a href="{{ route('iqac.ssr') }}"><i class="fas fa-file-alt"></i> SSR</a></li>
                    <li><a href="{{ route('iqac.iiqa') }}"><i class="fas fa-check-circle"></i> IIQA</a></li>
                    <li><a href="{{ route('iqac.minutes') }}"><i class="fas fa-clipboard-list"></i> Minutes</a></li>
                    <li><a href="{{ route('iqac.reports') }}"><i class="fas fa-chart-bar"></i> Reports</a></li>
                    <li><a href="{{ route('iqac.feedback') }}"><i class="fas fa-comment-dots"></i> Feedback</a></li>
                    <li><a href="{{ route('iqac.best-practices') }}"><i class="fas fa-star"></i> Best Practices</a></li>
                    <li><a href="{{ route('iqac.aaa') }}"><i class="fas fa-graduation-cap"></i> AAA</a></li>
                    <li><a href="{{ route('iqac.po-pso-co') }}"><i class="fas fa-tasks"></i> PO/PSO/CO</a></li>
                </ul>
            </div>
        </aside>
    </div>

@endsection
