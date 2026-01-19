<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Main landing page for a department (e.g., /Bcom)
    public function index(string $dept)
    {
        // Basic validation to avoid path traversal and unexpected input
        if (!preg_match('/^[a-z0-9_-]+$/i', $dept)) {
            abort(404);
        }
        $dept = strtolower($dept);

        // Prefer a department-specific index view at departments.{dept}.index
        $deptView = "departments.$dept.index";
        if (view()->exists($deptView)) {
            return view($deptView, compact('dept'));
        }

        // Fallback to a generic departments.index if present
        if (view()->exists('departments.index')) {
            return view('departments.index', compact('dept'));
        }

        // If nothing exists, abort with 404
        abort(404);
    }

    // Sub-pages (e.g., /Bcom/syllabus)
    public function showPage(string $dept, string $page)
    {
        // Basic validation to avoid path traversal and unexpected input
        if (!preg_match('/^[a-z0-9_-]+$/i', $dept) || !preg_match('/^[a-z0-9_-]+$/i', $page)) {
            abort(404);
        }
        $dept = strtolower($dept);
        $page = strtolower($page);

        // Load only department-specific page: departments.{dept}.{page}
        $deptPageView = "departments.$dept.$page";
        if (view()->exists($deptPageView)) {
            return view($deptPageView, compact('dept', 'page'));
        }

        // If department-specific page not found, abort with 404
        abort(404);
    }
}