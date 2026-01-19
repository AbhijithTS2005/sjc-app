{{-- Unified Department Sidebar Stylesheet
     This ensures all department pages have consistent sidebar styling
--}}
@push('styles')
<style>
    /* Sidebar Container */
    .sidebar {
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        border: 1px solid #e0e0e0;
    }

    /* Sidebar Sections */
    .sidebar-section {
        margin-bottom: 30px;
    }

    .sidebar-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 15px;
        border-bottom: 2px solid #f0ad4e;
        padding-bottom: 5px;
    }

    /* Links List */
    .sidebar-links {
        list-style: none;
        padding: 0;
    }

    .sidebar-links li {
        margin-bottom: 8px;
    }

    .sidebar-links a {
        display: block;
        padding: 8px 12px;
        border-radius: 4px;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        color: #333;
        text-decoration: none;
    }

    .sidebar-links a:hover,
    .sidebar-links a.active-link {
        background: #003366;
        color: #fff;
        transform: translateX(5px);
    }

    .sidebar-links a i {
        margin-right: 8px;
        width: 16px;
        display: inline-block;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .sidebar {
            margin-top: 0;
            padding: 20px;
        }
        
        .sidebar-title {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 768px) {
        .sidebar {
            padding: 15px;
            width: 100%;
        }
        
        .sidebar-title {
            font-size: 1rem;
            margin-bottom: 10px;
        }
        
        .sidebar-links a {
            padding: 6px 10px;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 576px) {
        .sidebar {
            padding: 12px;
        }
        
        .sidebar-title {
            font-size: 0.95rem;
            margin-bottom: 8px;
        }
        
        .sidebar-links a {
            padding: 5px 8px;
            font-size: 0.75rem;
        }
    }

    @media (max-width: 480px) {
        .sidebar {
            padding: 10px;
        }
        
        .sidebar-title {
            font-size: 0.9rem;
            margin-bottom: 6px;
        }
        
        .sidebar-links a {
            padding: 4px 6px;
            font-size: 0.7rem;
        }
    }
</style>
@endpush
