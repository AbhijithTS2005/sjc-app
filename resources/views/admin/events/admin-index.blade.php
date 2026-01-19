@extends('layouts.app')

@section('content')
    <style>
        :root {
            --college-blue: #003366;
            --accent-gold: #ffcc00;
            --light-gray: #f8f9fa;
        }

        .admin-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            border-bottom: 3px solid var(--college-blue);
            padding-bottom: 20px;
            flex-wrap: wrap;
            width: 100%;
        }

        .admin-header h1 {
            font-size: 2rem;
            color: var(--college-blue);
            margin: 0;
            flex: 1;
            min-width: 200px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-header i {
            font-size: 1.8rem;
        }

        .btn-create {
            background: var(--college-blue);
            color: white;
            padding: 10px 24px;
            border: none;
            border-radius: 6px;
            font-size: 0.95rem;
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
            border-collapse: collapse;
            background: white;
            min-width: 1000px;
        }

        .events-table thead {
            background: var(--college-blue);
            color: white;
            position: sticky;
            top: 0;
        }

        .events-table th {
            padding: 16px 12px;
            text-align: left;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .events-table th:nth-child(1) {
            width: 15%;
        }

        .events-table th:nth-child(2) {
            width: 10%;
        }

        .events-table th:nth-child(3) {
            width: 10%;
        }

        .events-table th:nth-child(4) {
            width: 12%;
        }

        .events-table th:nth-child(5) {
            width: 10%;
        }

        .events-table th:nth-child(6) {
            width: 25%;
        }

        .events-table th:nth-child(7) {
            width: 18%;
        }

        .events-table td {
            padding: 14px 12px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
            font-size: 0.9rem;
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
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
        }

        .btn-sm {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
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
            align-items: center;
            margin-top: 50px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            padding: 30px 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 51, 102, 0.12);
            border: 1px solid #e8eef5;
        }

        .pagination a,
        .pagination span {
            padding: 11px 14px;
            border: 2px solid #d0dce8;
            border-radius: 8px;
            text-decoration: none;
            color: var(--college-blue);
            font-weight: 600;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.95rem;
            min-width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            position: relative;
            overflow: hidden;
        }

        .pagination a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--college-blue), #004d99);
            z-index: -1;
            transition: left 0.35s ease;
        }

        .pagination a:hover {
            color: white;
            border-color: var(--college-blue);
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 51, 102, 0.3);
        }

        .pagination a:hover::before {
            left: 0;
        }

        .pagination .active span {
            background: linear-gradient(135deg, var(--college-blue), #004d99);
            color: white;
            border-color: var(--college-blue);
            font-weight: 700;
            box-shadow: 0 6px 16px rgba(0, 51, 102, 0.3);
        }

        .pagination span.disabled {
            color: #b0b8c5;
            cursor: not-allowed;
            border-color: #e8eef5;
            background: #f5f7fa;
            opacity: 0.6;
        }

        .pagination span.disabled:hover {
            transform: none;
            box-shadow: none;
        }

        .pagination svg {
            width: 18px;
            height: 18px;
            stroke-width: 2.5;
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
    </style>

    <div class="admin-container">
        <div class="admin-header">
            <h1>
                <i class="fas fa-shield-alt"></i>
                Event Management
            </h1>
            <a href="{{ route('events.create') }}" class="btn-create">
                <i class="fas fa-plus"></i> Create New Event
            </a>
        </div>

        <!-- Debug Info -->
        <div
            style="background: linear-gradient(135deg, #e7f3ff 0%, #f0f8ff 100%); padding: 15px 20px; border-radius: 8px; margin-bottom: 25px; border-left: 5px solid #003366; font-size: 0.9rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
            <div>
                <strong>📊 Total Events:</strong> <span
                    style="color: var(--college-blue); font-weight: 700; font-size: 1.1rem;">{{ $totalEvents ?? 0 }}</span>
            </div>
            <div>
                <strong>📄 Showing:</strong>
                {{ isset($events) && $events->count() > 0 ? (($events->currentPage() - 1) * $events->perPage()) + 1 : 0 }} -
                {{ isset($events) && $events->count() > 0 ? min($events->currentPage() * $events->perPage(), $totalEvents ?? 0) : 0 }}
                of {{ $totalEvents ?? 0 }}
            </div>
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

        @if (isset($events) && $events && count($events) > 0)
            <div class="table-wrapper">
                <table class="events-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Department</th>
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
                                    {{ $event->department ? \App\Helpers\DepartmentHelper::getDisplayName($event->department) : 'College-wide' }}
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
                <p>No events found. Create your first event!</p>
                <a href="{{ route('events.create') }}" class="btn-create">Create Event</a>
            </div>
        @endif
    </div>
@endsection