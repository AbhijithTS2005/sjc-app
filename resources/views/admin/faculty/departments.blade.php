@extends('layouts.app')

@section('content')
<style>
    :root {
        --college-blue: #003366;
        --accent-gold: #ffcc00;
        --light-gray: #f8f9fa;
    }

    .admin-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 40px;
        border-bottom: 3px solid var(--college-blue);
        padding-bottom: 20px;
        flex-wrap: wrap;
    }

    .admin-header h1 {
        font-size: 2.5rem;
        color: var(--college-blue);
        margin: 0;
        flex: 1;
        min-width: 200px;
    }

    .btn-create {
        background: var(--college-blue);
        color: white;
        padding: 12px 28px;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
    }

    .btn-create:hover {
        background: #002244;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
    }

    .alert {
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
        border-left: 4px solid;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #28a745;
    }

    .departments-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .department-card {
        background: white;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
        border: 2px solid transparent;
    }

    .department-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        border-color: var(--college-blue);
    }

    .department-card-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--college-blue), #004d99);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        margin-bottom: 15px;
    }

    .department-card-name {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--college-blue);
        margin-bottom: 10px;
    }

    .department-card-count {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 15px;
    }

    .department-card-members {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        color: #888;
    }

    .department-card-members i {
        color: var(--college-blue);
    }

    .no-departments {
        text-align: center;
        padding: 60px 40px;
        background: white;
        border-radius: 8px;
        color: #666;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .no-departments i {
        display: block;
        font-size: 3.5rem;
        color: #ddd;
        margin-bottom: 20px;
    }

    .no-departments p {
        font-size: 1.15rem;
        margin-bottom: 25px;
        color: #555;
        font-weight: 500;
    }

    .quick-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        border-left: 4px solid var(--college-blue);
    }

    .stat-label {
        font-size: 0.85rem;
        color: #666;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--college-blue);
    }

        .departments-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="admin-container">
    <div class="admin-header">
        <h1>Faculty Management</h1>
        <a href="{{ route('faculty.create') }}" class="btn-create">
            <i class="fas fa-plus"></i> Add Faculty
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if($departments->count() > 0)
        <div class="quick-stats">
            <div class="stat-card">
                <div class="stat-label">Total Departments</div>
                <div class="stat-value">{{ $departments->count() }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Faculty</div>
                <div class="stat-value">{{ $totalFaculty }}</div>
            </div>
        </div>

        <h2 style="color: var(--college-blue); margin-bottom: 25px; font-size: 1.5rem;">Select Department to Manage</h2>

        <div class="departments-grid">
            @foreach($departments as $dept)
                <a href="{{ route('dept.faculty.manage', $dept['name']) }}" class="department-card">
                    <div class="department-card-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="department-card-name">{{ $dept['display_name'] }}</div>
                    <div class="department-card-count">{{ $dept['count'] }} faculty members</div>
                    <div class="department-card-members">
                        <i class="fas fa-users"></i>
                        <span>View & Manage</span>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="no-departments">
            <i class="fas fa-folder-open"></i>
            <p>No departments found</p>
            <a href="{{ route('faculty.create') }}" class="btn-create">Create First Faculty</a>
        </div>
    @endif
</div>
@endsection
