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
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-header i {
            font-size: 2rem;
        }

        .dept-badge {
            display: inline-block;
            background: var(--college-blue);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
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

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .events-table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .events-table thead {
            background: var(--college-blue);
            color: white;
        }

        .events-table th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 700;
            font-size: 0.98rem;
            letter-spacing: 0.5px;
        }

        .events-table td {
            padding: 16px 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        .events-table tbody tr:hover {
            background-color: var(--light-gray);
        }

        .events-table tbody tr:last-child td {
            border-bottom: none;
        }

        .event-type-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: capitalize;
        }

        .badge-academic {
            background: #cfe2ff;
            color: #084298;
        }

        .badge-sports {
            background: #cff4fc;
            color: #055160;
        }

        .badge-cultural {
            background: #fff3cd;
            color: #664d03;
        }

        .badge-placement {
            background: #d1e7dd;
            color: #0f5132;
        }

        .badge-social {
            background: #f8d7da;
            color: #842029;
        }

        .event-status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: capitalize;
        }

        .badge-approved {
            background: #d1e7dd;
            color: #0f5132;
        }

        .badge-pending {
            background: #fff3cd;
            color: #664d03;
        }

        .badge-rejected {
            background: #f8d7da;
            color: #842029;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-sm {
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            font-size: 0.88rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            white-space: nowrap;
        }

        .btn-edit {
            background: #17a2b8;
            color: white;
        }

        .btn-edit:hover {
            background: #138496;
            transform: translateY(-1px);
            box-shadow: 0 2px 6px rgba(23, 162, 184, 0.3);
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #c82333;
            transform: translateY(-1px);
            box-shadow: 0 2px 6px rgba(220, 53, 69, 0.3);
        }

        .no-events {
            text-align: center;
            padding: 60px 40px;
            background: white;
            border-radius: 8px;
            color: #666;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .no-events i {
            display: block;
            font-size: 3.5rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .no-events p {
            font-size: 1.15rem;
            margin-bottom: 25px;
            color: #555;
            font-weight: 500;
        }

        .no-events .btn-create {
            display: inline-block;
            margin-top: 10px;
        }

        .pagination {
            display: flex;
            gap: 8px;
            justify-content: center;
            margin-top: 40px;
            margin-bottom: 20px;
            flex-wrap: wrap;
            align-items: center;
        }

        .pagination a,
        .pagination span {
            padding: 10px 14px;
            border: 1.5px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            color: var(--college-blue);
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            min-width: 40px;
            text-align: center;
        }

        .pagination a:hover {
            background: var(--college-blue);
            color: white;
            border-color: var(--college-blue);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 51, 102, 0.2);
        }

        .pagination .active span {
            background: var(--college-blue);
            color: white;
            border-color: var(--college-blue);
            font-weight: 700;
        }

        .pagination span.disabled {
            color: #ccc;
            cursor: not-allowed;
        }

        .delete-form {
            display: inline;
        }

        .events-table {
            font-size: 0.9rem;
        }

        .events-table th,
        .events-table td {
            padding: 12px 8px;
        }

        /* Mobile Responsive Design */
        @media (max-width: 768px) {
            .admin-container {
                padding: 20px 10px;
            }

            .admin-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
                margin-bottom: 25px;
                padding-bottom: 15px;
            }

            .admin-header h1 {
                flex-direction: column;
                font-size: 1.6rem;
                gap: 8px;
                width: 100%;
            }

            .admin-header i {
                font-size: 1.5rem;
            }

            .dept-badge {
                font-size: 0.8rem;
                padding: 6px 12px;
            }

            .btn-create {
                width: 100%;
                justify-content: center;
                padding: 12px 20px;
            }

            .alert {
                padding: 12px 15px;
                margin-bottom: 15px;
            }

            .alert ul {
                margin: 8px 0 0 0 !important;
                padding-left: 18px !important;
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
                padding: 10px 6px;
                white-space: nowrap;
            }

            .events-table th {
                position: sticky;
                top: 0;
                z-index: 10;
            }

            .event-type-badge,
            .event-status-badge {
                padding: 4px 8px;
                font-size: 0.7rem;
            }

            .action-buttons {
                gap: 6px;
            }

            .btn-sm {
                padding: 8px 12px;
                font-size: 0.8rem;
                gap: 4px;
            }

            .btn-sm i {
                display: none;
            }

            .btn-edit {
                flex: 1;
                min-width: 60px;
            }

            .btn-delete {
                flex: 1;
                min-width: 60px;
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

            .no-events {
                padding: 40px 20px;
            }

            .no-events i {
                font-size: 2.5rem;
                margin-bottom: 15px;
            }

            .no-events p {
                font-size: 1rem;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 576px) {
            .admin-container {
                padding: 15px 8px;
            }

            .admin-header {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
                margin-bottom: 20px;
            }

            .admin-header h1 {
                flex-direction: column;
                font-size: 1.3rem;
                gap: 6px;
                margin: 0;
            }

            .admin-header i {
                font-size: 1.2rem;
            }

            .dept-badge {
                font-size: 0.75rem;
                padding: 5px 10px;
            }

            .btn-create {
                width: 100%;
                padding: 11px 16px;
                font-size: 0.95rem;
            }

            .alert {
                padding: 10px 12px;
                font-size: 0.9rem;
                margin-bottom: 12px;
            }

            .alert-success,
            .alert-error {
                border-left-width: 3px;
            }

            .alert ul {
                margin: 6px 0 0 0 !important;
                padding-left: 15px !important;
                font-size: 0.85rem;
            }

            /* Stack action buttons vertically on extra small screens */
            .action-buttons {
                flex-direction: column;
                gap: 8px;
            }

            .btn-sm {
                width: 100%;
                padding: 10px;
                font-size: 0.8rem;
                justify-content: center;
            }

            .btn-sm i {
                display: inline;
            }

            .btn-edit::after {
                content: ' Edit';
            }

            .btn-delete::after {
                content: ' Delete';
            }

            .events-table {
                font-size: 0.8rem;
                min-width: 700px;
            }

            .events-table th,
            .events-table td {
                padding: 8px 5px;
            }

            .event-type-badge,
            .event-status-badge {
                padding: 3px 6px;
                font-size: 0.65rem;
            }

            .pagination a,
            .pagination span {
                padding: 6px 8px;
                font-size: 0.8rem;
                min-width: 32px;
            }

            .no-events {
                padding: 30px 15px;
            }

            .no-events i {
                font-size: 2rem;
                margin-bottom: 12px;
            }

            .no-events p {
                font-size: 0.95rem;
                margin-bottom: 15px;
            }
        }
    </style>

    <div class="admin-container">
        <div class="admin-header">
            <h1>
                <i class="fas fa-calendar-alt"></i>
                @deptDisplay($dept) Events
                <span class="dept-badge">@deptDisplay($dept)</span>
            </h1>
            <a href="{{ route('events.create') }}" class="btn-create">
                <i class="fas fa-plus"></i> Create Event
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> Please fix the errors below:
                <ul style="margin: 10px 0 0 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($events->count() > 0)
            <div class="table-wrapper">
                <table class="events-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td><strong>{{ $event->title }}</strong></td>
                            <td>{{ $event->date->format('M d, Y') }}</td>
                            <td>
                                <span class="event-type-badge badge-{{ $event->type }}">
                                    {{ $event->type }}
                                </span>
                            </td>
                            <td>
                                <span class="event-status-badge badge-{{ $event->status }}">
                                    {{ $event->status }}
                                </span>
                            </td>
                            <td>{{ Str::limit($event->description, 60) }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('events.edit', $event) }}" class="btn-sm btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('events.destroy', $event) }}" method="POST" class="delete-form"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-sm btn-delete"
                                            onclick="return confirm('Are you sure you want to delete this event?');">
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