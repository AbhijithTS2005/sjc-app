
@extends('layouts.app')
@include('partials.department-sidebar-css')

@push('styles')
<style> 
        /* --- COPY OF YOUR EXISTING STYLES --- */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f4f4f4; color: #333; line-height: 1.6; background-image: radial-gradient(circle, rgba(0,51,102,0.05) 1px, transparent 1px); background-size: 30px 30px; }

        a { text-decoration: none; color: inherit; transition: all 0.3s ease; }
        
        /* Header styles are provided by layouts.app */

        /* --- LAYOUT GRID --- */
        .container {
            display: grid;
            grid-template-columns: 3fr 1.2fr; /* Left Content | Right Sidebar */
            gap: 30px;
            padding: 40px;
            max-width: 1500px;
            margin: 0 auto;
            min-height: 80vh;
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        /* --- LEFT COLUMN STYLES (Specific to Dept Page) --- */
        .dept-banner {
            width: 100%;
            height: 350px;
            background-color: #ddd;
            background-image: url('https://via.placeholder.com/1000x400/003366/ffffff?text=Fee+Structure'); /* Replace with real image */
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            margin-bottom: 25px;
            border: 1px solid #ccc;
            position: relative;
            overflow: hidden;
            animation: zoomIn 1s ease-out 0.6s both;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: transform 0.3s ease;
        }
        .dept-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,51,102,0.4), rgba(240,173,78,0.2));
            pointer-events: none;
            z-index: 1;
        }
        .dept-banner:hover { transform: scale(1.02); }

        .dept-header {
            border-bottom: 2px solid var(--college-blue);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .dept-header h1 {
            color: var(--college-blue);
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0;
        }

        .content-block {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 25px;
            animation: fadeInUp 1s ease-out 0.8s both;
        }
        .content-block p {
            margin-bottom: 15px;
            font-size: 1.05rem;
            text-align: justify;
        }

        .eligibility-box {
            background: #f8f9fa;
            border-left: 4px solid var(--accent-gold);
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 4px;
        }

        /* Table Styles for Fee Structure */
        .fee-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .fee-table th, .fee-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .fee-table th {
            background-color: var(--college-blue);
            color: white;
        }
        .fee-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* --- RIGHT SIDEBAR STYLES --- */
        
        
        
        .sidebar-links a:hover {
            background: var(--college-blue);
            color: #fff;
            transform: translateX(5px);
        }
        .sidebar-links a i {
            margin-right: 8px;
            width: 16px;
        }


        /* Responsive Design */
        @media (max-width: 1200px) {
            .container {
                grid-template-columns: 3fr 1fr;
                gap: 25px;
                padding: 30px 20px;
            }
            .dept-header h1 { font-size: 1.8rem; }
        }

        @media (max-width: 992px) {
            .container {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 25px 15px;
            }
            .dept-banner {
                height: 280px;
            }
            .dept-header h1 { font-size: 1.6rem; }
            .content-block {
                padding: 20px;
                margin-bottom: 15px;
            }
            }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
                padding: 20px 10px;
                gap: 15px;
            }
            .dept-banner {
                height: 240px;
                margin-bottom: 20px;
            }
            .dept-header h1 { 
                font-size: 1.4rem;
                margin-bottom: 15px;
            }
            .content-block {
                padding: 15px;
                margin-bottom: 15px;
            }
            .content-block p {
                font-size: 0.95rem;
                text-align: left;
            }
            .eligibility-box {
                padding: 15px;
                margin-top: 15px;
                font-size: 0.9rem;
            }
            .eligibility-box h3 {
                font-size: 1rem;
            }
            
        }

        @media (max-width: 576px) {
            .container {
                grid-template-columns: 1fr;
                padding: 15px;
                gap: 10px;
            }
            .dept-banner {
                height: 200px;
                margin-bottom: 15px;
            }
            .banner-slideshow img {
                width: 33.33%;
            }
            .dept-header h1 { 
                font-size: 1.2rem;
                margin-bottom: 10px;
            }
            .content-block {
                padding: 12px;
                margin-bottom: 12px;
                border-radius: 6px;
            }
            .content-block p {
                font-size: 0.85rem;
                line-height: 1.4;
                text-align: left;
            }
            .eligibility-box {
                padding: 12px;
                margin-top: 10px;
                font-size: 0.8rem;
                border-left-width: 4px;
            }
            .eligibility-box h3 {
                font-size: 0.95rem;
                margin-bottom: 8px;
            }
            
            
            .sidebar-links a i {
                margin-right: 6px;
            }
        }

        @media (max-width: 480px) {
            .container {
                grid-template-columns: 1fr;
                padding: 10px;
                gap: 8px;
            }
            .dept-banner {
                height: 180px;
                margin-bottom: 10px;
                border-radius: 6px;
            }
            .dept-header h1 { 
                font-size: 1.1rem;
                margin-bottom: 8px;
            }
            .content-block {
                padding: 10px;
                margin-bottom: 10px;
            }
            .content-block p {
                font-size: 0.8rem;
                line-height: 1.3;
            }
            .eligibility-box {
                padding: 10px;
                margin-top: 8px;
                font-size: 0.75rem;
            }
            .eligibility-box h3 {
                font-size: 0.9rem;
                margin-bottom: 6px;
            }
            
        }
    </style>
@endpush

@section('content')

    {{-- Header provided by layouts.app --}}

    <div class="container">
        
        <main>
            <div class="dept-banner">
            </div>

            <div class="content-block">
                <div class="dept-header">
                    <h1>Fee Structure - @deptDisplay($dept)</h1>
                </div>

                <p>
                    The fee structure for the Social Work program is designed to be affordable while providing excellent value for the education and facilities offered. Below is the detailed breakdown of fees for the academic year.
                </p>

                <table class="fee-table">
                    <thead>
                        <tr>
                            <th>Fee Category</th>
                            <th>Amount (INR)</th>
                            <th>Frequency</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tuition Fee</td>
                            <td>25,000</td>
                            <td>Per Year</td>
                        </tr>
                        <tr>
                            <td>Library Fee</td>
                            <td>2,000</td>
                            <td>Per Year</td>
                        </tr>
                        <tr>
                            <td>Laboratory Fee</td>
                            <td>3,000</td>
                            <td>Per Year</td>
                        </tr>
                        <tr>
                            <td>Examination Fee</td>
                            <td>1,500</td>
                            <td>Per Year</td>
                        </tr>
                        <tr>
                            <td>Sports & Cultural Fee</td>
                            <td>1,000</td>
                            <td>Per Year</td>
                        </tr>
                        <tr>
                            <td>Development Fee</td>
                            <td>2,500</td>
                            <td>Per Year</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>35,000</strong></td>
                            <td><strong>Per Year</strong></td>
                        </tr>
                    </tbody>
                </table>

                <div class="eligibility-box">
                    <h3 style="color:var(--college-blue); margin-bottom:10px;">Payment Information</h3>
                    <p>Fees can be paid in two installments per year. Scholarships and financial aid are available for eligible students. Contact the accounts department for more details.</p>
                </div>
            </div>
        </main>

                @include('partials.department-sidebar', ['dept' => $dept])

    </div>

@endsection