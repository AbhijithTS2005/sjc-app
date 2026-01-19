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

        .document-category {
            margin: 30px 0;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 6px;
            border-top: 4px solid var(--college-blue);
        }

        .document-category h4 {
            color: var(--college-blue);
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .document-list {
            list-style: none;
            padding: 0;
        }

        .document-item {
            background: white;
            padding: 12px;
            margin: 8px 0;
            border-left: 3px solid var(--accent-gold);
            border-radius: 3px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .document-item:hover {
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            transform: translateX(5px);
        }

        .document-info {
            flex: 1;
        }

        .document-name {
            color: var(--college-blue);
            font-weight: 600;
            margin-bottom: 3px;
        }

        .document-year {
            font-size: 0.85rem;
            color: #999;
        }

        .document-actions {
            display: flex;
            gap: 10px;
        }

        .btn-view, .btn-download {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 3px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .btn-view {
            background: #e8f4f8;
            color: var(--college-blue);
        }

        .btn-view:hover {
            background: var(--college-blue);
            color: white;
        }

        .btn-download {
            background: var(--accent-gold);
            color: #333;
        }

        .btn-download:hover {
            background: #ffb84d;
        }

        .info-box {
            background: #e8f4f8;
            border-left: 4px solid var(--college-blue);
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }

        .info-box p {
            margin: 0;
            font-size: 0.95rem;
        }

        @media (max-width: 1200px) { .container { grid-template-columns: 3fr 1fr; gap: 25px; padding: 30px 20px; } }
        @media (max-width: 992px) { .container { grid-template-columns: 1fr; gap: 20px; padding: 25px 15px; } footer { grid-template-columns: 1fr 1fr !important; } }
        @media (max-width: 768px) {
            .container { grid-template-columns: 1fr; padding: 20px 10px; gap: 15px; }
            .page-title { font-size: 1.6rem; }
            .content-block { padding: 15px; }
            .document-item { flex-direction: column; align-items: flex-start; }
            .document-actions { margin-top: 10px; width: 100%; }
            footer { grid-template-columns: 1fr !important; }
        }
        @media (max-width: 576px) { .container { grid-template-columns: 1fr; padding: 15px 8px; gap: 10px; } .page-title { font-size: 1.3rem; } .content-block { padding: 12px; } }
    </style>
@endpush

@section('content')

    <div class="container">
        <main>
            <div class="content-block">
                <h1 class="page-title">IQAC Documents & AQAR</h1>

                <p>This page provides access to important IQAC documents including Annual Quality Assurance Reports (AQAR), quality policies, strategic plans, and other institutional documents. These documents reflect the college's commitment to continuous quality improvement and institutional excellence.</p>

                <div class="info-box">
                    <p><strong>Note:</strong> AQAR (Annual Quality Assurance Report) is a comprehensive document submitted to NAAC detailing the institution's quality metrics, achievements, and action plans for the academic year.</p>
                </div>

                <h3>Annual Quality Assurance Reports (AQAR)</h3>

                <div class="document-category">
                    <h4><i class="fas fa-file-pdf"></i> AQAR Documents</h4>
                    <ul class="document-list">
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">AQAR 2023-2024</div>
                                <div class="document-year">Academic Year: 2023-2024 | Size: 2.4 MB</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">AQAR 2022-2023</div>
                                <div class="document-year">Academic Year: 2022-2023 | Size: 2.3 MB</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">AQAR 2021-2022</div>
                                <div class="document-year">Academic Year: 2021-2022 | Size: 2.2 MB</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">AQAR 2020-2021</div>
                                <div class="document-year">Academic Year: 2020-2021 | Size: 2.1 MB</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">AQAR 2019-2020</div>
                                <div class="document-year">Academic Year: 2019-2020 | Size: 1.9 MB</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <h3>Accreditation Documents</h3>

                <div class="document-category">
                    <h4><i class="fas fa-file-alt"></i> NAAC and Other Accreditation Reports</h4>
                    <ul class="document-list">
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">NAAC SSR (Self Study Report) 2022</div>
                                <div class="document-year">Accreditation Cycle 2 | Size: 8.5 MB</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">NAAC Peer Team Report 2022</div>
                                <div class="document-year">Accreditation Assessment | Size: 1.8 MB</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">NAAC Certificate 2022</div>
                                <div class="document-year">Grade A | Size: 0.5 MB</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <h3>Quality Policies and Standards</h3>

                <div class="document-category">
                    <h4><i class="fas fa-cogs"></i> Institutional Policies</h4>
                    <ul class="document-list">
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">Quality Assurance Policy</div>
                                <div class="document-year">Policy Document | Updated: 2023</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">Academic Excellence Framework</div>
                                <div class="document-year">Strategic Document | Updated: 2023</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">Teaching and Learning Outcomes Guidelines</div>
                                <div class="document-year">Policy Document | Updated: 2023</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">Research and Innovation Policy</div>
                                <div class="document-year">Policy Document | Updated: 2023</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <h3>Institutional Strategic Plans</h3>

                <div class="document-category">
                    <h4><i class="fas fa-chart-line"></i> Strategic Documents</h4>
                    <ul class="document-list">
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">Five Year Strategic Plan 2023-2028</div>
                                <div class="document-year">Strategic Plan | Duration: 5 Years</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">Annual Action Plan 2024-2025</div>
                                <div class="document-year">Action Plan | Academic Year: 2024-2025</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <h3>Data and Metrics</h3>

                <div class="document-category">
                    <h4><i class="fas fa-chart-bar"></i> Institutional Data</h4>
                    <ul class="document-list">
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">Institutional Statistics 2023-2024</div>
                                <div class="document-year">Data Document | Format: Excel</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                        <li class="document-item">
                            <div class="document-info">
                                <div class="document-name">Student Satisfaction Survey Report</div>
                                <div class="document-year">Survey Document | Conducted: 2024</div>
                            </div>
                            <div class="document-actions">
                                <a href="#" class="btn-view"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="btn-download"><i class="fas fa-download"></i> Download</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <h3>Important Links</h3>
                <ul style="margin-left: 30px;">
                    <li><a href="https://www.naac.gov.in/" target="_blank">NAAC - National Assessment and Accreditation Council</a></li>
                    <li><a href="https://www.ugc.gov.in/" target="_blank">UGC - University Grants Commission</a></li>
                    <li><a href="https://www.kshec.kerala.gov.in/" target="_blank">KSHEC - Kerala State Higher Education Council</a></li>
                </ul>
            </div>
        </main>

        <aside class="sidebar">
            <div class="sidebar-section">
                <h3 class="sidebar-title"><i class="fas fa-cog"></i> IQAC Menu</h3>
                <ul class="sidebar-links">
                    <li><a href="{{ route('iqac.index') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="{{ route('iqac.about') }}"><i class="fas fa-info-circle"></i> About IQAC</a></li>
                    <li><a href="{{ route('iqac.committee') }}"><i class="fas fa-users"></i> Committee</a></li>
                    <li><a href="{{ route('iqac.objectives') }}"><i class="fas fa-bullseye"></i> Objectives</a></li>
                    <li><a href="{{ route('iqac.documents') }}" class="active-link"><i class="fas fa-file-pdf"></i> AQAR</a></li>
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
