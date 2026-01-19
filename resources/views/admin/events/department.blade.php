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

    .btn-secondary {
        background: #666;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-secondary:hover {
        background: #555;
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

    .events-table {
        width: 100%;
        background: white;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .events-table thead {
        background: var(--college-blue);
        color: white;
    }

    .events-table th {
        padding: 18px 15px;
        text-align: left;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .events-table tbody tr {
        border-bottom: 1px solid #eee;
        transition: background 0.2s;
    }

    .events-table tbody tr:hover {
        background: #f9f9f9;
    }

    .events-table td {
        padding: 15px;
        font-size: 0.95rem;
    }

    .event-title {
        font-weight: 600;
        color: var(--college-blue);
    }

    .event-date {
        color: #666;
        font-size: 0.9rem;
    }

    .badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .badge-approved {
        background: #d4edda;
        color: #155724;
    }

    .badge-pending {
        background: #fff3cd;
        color: #856404;
    }

    .badge-rejected {
        background: #f8d7da;
        color: #721c24;
    }

    .badge-academic {
        background: #cfe2ff;
        color: #084298;
    }

    .badge-sports {
        background: #d1e7dd;
        color: #0f5132;
    }

    .badge-cultural {
        background: #f8d7da;
        color: #721c24;
    }

    .badge-placement {
        background: #cff4fc;
        color: #055160;
    }

    .badge-social {
        background: #e2e3e5;
        color: #383d41;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .btn-edit, .btn-delete {
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .btn-edit {
        background: #007bff;
        color: white;
    }

    .btn-edit:hover {
        background: #0056b3;
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
    }

    .btn-delete {
        background: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
    }

    .no-events {
        text-align: center;
        padding: 60px 40px;
        background: white;
        border-radius: 8px;
        color: #666;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .no-events i {
        display: block;
        font-size: 3.5rem;
        color: #ddd;
        margin-bottom: 20px;
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .pagination a,
    .pagination span {
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-decoration: none;
        color: #333;
        transition: all 0.3s;
        min-width: 40px;
        text-align: center;
    }

    .pagination a:hover {
        background: var(--college-blue);
        color: white;
        border-color: var(--college-blue);
    }

    .pagination .active {
        background: var(--college-blue);
        color: white;
        border-color: var(--college-blue);
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--college-blue);
        text-decoration: none;
        margin-bottom: 20px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .back-link:hover {
        gap: 12px;
    }

        .events-table {
            font-size: 0.85rem;
        }

        .events-table th, .events-table td {
            padding: 10px 8px;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-edit, .btn-delete {
            width: 100%;
            justify-content: center;
        }

        /* Mobile Responsive Design */
        @media (max-width: 768px) {
            .admin-container {
                padding: 20px 10px;
            }

            .back-link {
                margin-bottom: 15px;
                font-size: 0.95rem;
            }

            .admin-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
                margin-bottom: 25px;
                padding-bottom: 15px;
            }

            .admin-header h1 {
                font-size: 1.6rem;
                width: 100%;
            }

            .btn-create {
                width: 100%;
                justify-content: center;
            }

            /* Table Responsive - Horizontal Scroll */
            .table-wrapper {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                border-radius: 6px;
                margin-bottom: 15px;
            }

            .events-table {
                font-size: 0.85rem;
                min-width: 800px;
            }

            .events-table th,
            .events-table td {
                padding: 10px 6px !important;
                white-space: nowrap;
            }

            .events-table th {
                position: sticky;
                top: 0;
                z-index: 10;
            }

            .event-title,
            .event-date {
                font-size: 0.9rem;
            }

            .badge {
                padding: 4px 8px;
                font-size: 0.7rem;
            }

            .action-buttons {
                gap: 6px;
            }

            .btn-edit,
            .btn-delete {
                padding: 8px 12px;
                font-size: 0.8rem;
                width: auto;
            }

            .btn-edit i,
            .btn-delete i {
                display: none;
            }

            .pagination {
                gap: 4px;
            }

            .pagination a,
            .pagination span {
                padding: 8px 10px;
                font-size: 0.85rem;
                min-width: 36px;
            }
        }

        @media (max-width: 576px) {
            .admin-container {
                padding: 15px 8px;
            }

            .back-link {
                margin-bottom: 12px;
                font-size: 0.9rem;
            }

            .admin-header {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
                margin-bottom: 20px;
            }

            .admin-header h1 {
                font-size: 1.3rem;
                margin: 0;
            }

            .btn-create {
                width: 100%;
                padding: 11px 16px;
                font-size: 0.95rem;
            }

            /* Stack action buttons vertically */
            .action-buttons {
                flex-direction: column;
                gap: 8px;
            }

            .btn-edit,
            .btn-delete {
                width: 100%;
                padding: 10px;
                font-size: 0.8rem;
                justify-content: center;
            }

            .btn-edit i,
            .btn-delete i {
                display: inline;
            }

            .events-table {
                font-size: 0.8rem;
                min-width: 700px;
            }

            .events-table th,
            .events-table td {
                padding: 8px 5px !important;
            }

            .badge {
                padding: 3px 6px;
                font-size: 0.65rem;
            }

            .pagination a,
            .pagination span {
                padding: 6px 8px;
                font-size: 0.8rem;
                min-width: 32px;
            }
        }
    }
</style>

<div class="admin-container">
    <a href="{{ route('dept.faculty.manage', $dept) }}" class="back-link">
        <i class="fas fa-arrow-left"></i> Back to Faculty Management
    </a>

    <div class="admin-header">
        <h1>@deptDisplay($dept) Events</h1>
        <a href="{{ route('events.create') }}" class="btn-create">
            <i class="fas fa-plus"></i> Create Event
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if($events->count() > 0)
        <div class="table-wrapper">
            <table class="events-table">
                <thead>
                    <tr>
                        <th style="width: 25%;">Title</th>
                        <th style="width: 12%;">Date</th>
                        <th style="width: 10%;">Type</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 20%;">Description</th>
                        <th style="width: 23%;">Actions</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>
                            <div class="event-title">{{ $event->title }}</div>
                        </td>
                        <td>
                            <div class="event-date">
                                {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-{{ $event->type }}">
                                {{ ucfirst($event->type) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-{{ $event->status }}">
                                {{ ucfirst($event->status) }}
                            </span>
                        </td>
                        <td>
                            {{ Str::limit($event->description, 30) }}
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('events.edit', $event->id) }}" class="btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <div class="pagination">
            {{ $events->links() }}
        </div>
    @else
        <div class="no-events">
            <i class="fas fa-calendar-times"></i>
            <p>No events found for @deptDisplay($dept) department</p>
            <a href="{{ route('events.create') }}" class="btn-create" style="margin-top: 20px;">
                <i class="fas fa-plus"></i> Create First Event
            </a>
        </div>
    @endif
</div>
@endsection
