<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicsController extends Controller
{
    // Main landing page for an academic course (e.g., /academics/bcom)
    public function index(string $course)
    {
        // Basic validation to avoid path traversal and unexpected input
        if (!preg_match('/^[a-z0-9_-]+$/i', $course)) {
            abort(404);
        }
        $course = strtolower($course);

        // Prefer a course-specific index view at academics.{course}.index
        $courseView = "academics.$course.index";
        if (view()->exists($courseView)) {
            return view($courseView, compact('course'));
        }

        // Fallback to a generic academics.index if present
        if (view()->exists('academics.index')) {
            return view('academics.index', compact('course'));
        }

        // If nothing exists, abort with 404
        abort(404);
    }

    // Sub-pages (e.g., /academics/bcom/syllabus)
    public function showPage(string $course, string $page)
    {
        // Basic validation to avoid path traversal and unexpected input
        if (!preg_match('/^[a-z0-9_-]+$/i', $course) || !preg_match('/^[a-z0-9_-]+$/i', $page)) {
            abort(404);
        }
        $course = strtolower($course);
        $page = strtolower($page);

        // Load only course-specific page: academics.{course}.{page}
        $coursePageView = "academics.$course.$page";
        if (view()->exists($coursePageView)) {
            return view($coursePageView, compact('course', 'page'));
        }

        // If course-specific page not found, abort with 404
        abort(404);
    }
}
