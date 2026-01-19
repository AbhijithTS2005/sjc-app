<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AcademicsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FacilitiesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Storage Route - Serve files from storage/app/public without requiring symlink
// Works on all hosting providers including InfinityFree and GoDaddy
// Note: public/uploads/ is served directly, this is for storage/app/public/ fallback
Route::get('/storage/{path}', function ($path) {
    $file = storage_path('app/public/' . $path);
    
    if (!file_exists($file)) {
        abort(404);
    }
    
    return response()->file($file);
})->where('path', '.*')->name('storage.file');

// 1. Home Page
Route::get('/', function () {
    return view('Home');
})->name('home');

// 2. About Us Section
// This line fixes the "Route [about] not defined" error by linking it to the profile
Route::get('/About-Us', [PageController::class, 'profile'])->name('about');

Route::get('/Anthem', [PageController::class, 'anthem'])->name('anthem');
Route::get('/Administration', [PageController::class, 'administration'])->name('administration');
Route::get('/Founder', [PageController::class, 'founder'])->name('founder');
Route::get('/History', [PageController::class, 'history'])->name('history');
Route::get('/Principal', [PageController::class, 'principal'])->name('principal');
Route::get('/Profile', [PageController::class, 'profile'])->name('profile');
Route::get('/Rules', [PageController::class, 'rules'])->name('rules');
Route::get('/Vision', [PageController::class, 'vision'])->name('vision');

// 3. Student Services Routes
Route::get('/Student-Services/NSS', function () {
    return view('Student-Services.nss');
})->name('student-services.nss');
Route::get('/Student-Services/NCC', function () {
    return view('Student-Services.ncc');
})->name('student-services.ncc');
Route::get('/Student-Services/Placement-Cell', function () {
    return view('Student-Services.placementcell');
})->name('student-services.placement');
Route::get('/Student-Services/Mentoring', function () {
    return view('Student-Services.mentoring');
})->name('student-services.mentoring');
Route::get('/Student-Services/GRC', function () {
    return view('Student-Services.GRC');
})->name('student-services.grc');
Route::get('/Student-Services/Endowments', function () {
    return view('Student-Services.endowments');
})->name('student-services.endowments');
Route::get('/Student-Services/Clubs', function () {
    return view('Student-Services.clubs');
})->name('student-services.clubs');
Route::get('/Student-Services/ASAP', function () {
    return view('Student-Services.asap');
})->name('student-services.asap');
Route::get('/Student-Services/Anti-Ragging', function () {
    return view('Student-Services.anti-ragging');
})->name('student-services.anti-ragging');
Route::get('/Student-Services/PTA', function () {
    return view('Student-Services.pta');
})->name('student-services.pta');
Route::get('/Student-Services/Scholarship', function () {
    return view('Student-Services.scholarship');
})->name('student-services.scholarship');
Route::get('/Student-Services/SC-ST-OBC-Cell', function () {
    return view('Student-Services.sc-st-obc-cell');
})->name('student-services.sc-st-obc');
Route::get('/Student-Services/Students-Aid-Fund', function () {
    return view('Student-Services.students-aid-fund');
})->name('student-services.students-aid');
Route::get('/Student-Services/Union', function () {
    return view('Student-Services.union');
})->name('student-services.union');
Route::get('/Student-Services/Women-Cell', function () {
    return view('Student-Services.women-cell');
})->name('student-services.women');
Route::get('/Student-Services/WWS', function () {
    return view('Student-Services.wws');
})->name('student-services.wws');

// 4. Research Routes
Route::get('/Research', function () {
    return view('Research.research');
})->name('research.index');
Route::get('/Research/Facilities', function () {
    return view('Research.research-facilities');
})->name('research.facilities');
Route::get('/Research/Guides', function () {
    return view('Research.research-guides');
})->name('research.guides');
Route::get('/Research/PhDs', function () {
    return view('Research.research-phds');
})->name('research.phds');
Route::get('/Research/Profile', function () {
    return view('Research.research-profile');
})->name('research.profile');
Route::get('/Research/Projects', function () {
    return view('Research.research-projects');
})->name('research.projects');
Route::get('/Research/Publications', function () {
    return view('Research.research-publications');
})->name('research.publications');
Route::get('/Research/Scholars', function () {
    return view('Research.research-scholars');
})->name('research.scholars');
Route::get('/Research/Seminars', function () {
    return view('Research.research-seminars');
})->name('research.seminars');

// 4.5 Campus Facilities Routes
Route::get('/campus', [FacilitiesController::class, 'index'])->name('campus.facilities.index');
Route::get('/campus/{facility}', [FacilitiesController::class, 'show'])->name('campus.facilities.show');

// 5. Faculty Routes
Route::get('/faculty/create', [FacultyController::class, 'create'])->name('faculty.create');
Route::post('/faculty/store', [FacultyController::class, 'store'])->name('faculty.store');

// Backward compatibility redirects - redirect old department slugs to new ones
Route::redirect('/bcom/{path?}', '/commerce/{path?}');
Route::redirect('/bba/{path?}', '/managementstudies/{path?}');
Route::redirect('/msw/{path?}', '/socialwork/{path?}');

// Department-scoped public faculty listing & profile
Route::get('/{dept}/faculty', [FacultyController::class, 'index'])->name('dept.faculty.index');

// Department-scoped admin management (authenticated users only) - place BEFORE the dynamic {faculty} route
Route::get('/{dept}/faculty/manage', [FacultyController::class, 'manage'])->middleware('auth')->name('dept.faculty.manage');

Route::get('/{dept}/faculty/{faculty}', [FacultyController::class, 'show'])->name('dept.faculty.show');

// Admin routes for general faculty CRUD (requires auth)
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('faculty', FacultyController::class)->except(['index','show']);
});

// Simple auth routes (login/logout) for apps without full scaffolding
use App\Http\Controllers\Auth\LoginController;

// Unified Login Page (showing Faculty and Events options)
Route::get('/login.in', function () {
    return view('auth.login-in');
})->name('login.in');

// Faculty Login Page
Route::get('/faculty/login', function () {
    return view('auth.faculty-login');
})->name('faculty.login');

// Events Admin Login Page
Route::get('/events/login', function () {
    return view('auth.events-login');
})->name('events.login');

// Main login route (default - redirects to login.in)
Route::get('/login', function () {
    return redirect()->route('login.in');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Events Routes (Public)
Route::get('/events/archive', [EventController::class, 'archive'])->name('events.archive');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

// Events API Routes (for homepage)
Route::get('/api/events/upcoming', [EventController::class, 'upcomingJson'])->name('api.events.upcoming');
Route::get('/api/events/past', [EventController::class, 'pastJson'])->name('api.events.past');

// News Routes (Public)
Route::get('/news', [NewsController::class, 'publicIndex'])->name('news.public.index');
Route::get('/news/{news}', [NewsController::class, 'publicShow'])->name('news.public.show');

// Examination Routes
Route::get('/Examination/Overview', function () {
    return view('Examination.overview');
})->name('examination.overview');
Route::get('/Examination/Calendar', function () {
    return view('Examination.calendar');
})->name('examination.calendar');
Route::get('/Examination/Notification', function () {
    return view('Examination.notification');
})->name('examination.notification');
Route::get('/Examination/Timetable', function () {
    return view('Examination.timetable');
})->name('examination.timetable');
Route::get('/Examination/Guidelines', function () {
    return view('Examination.guidelines');
})->name('examination.guidelines');
Route::get('/Examination/Application', function () {
    return view('Examination.application');
})->name('examination.application');
Route::get('/Examination/Login', function () {
    return view('Examination.login');
})->name('examination.login');

// IQAC Routes
Route::get('/iqac', function () {
    return view('iqac.index');
})->name('iqac.index');
Route::get('/iqac/about', function () {
    return view('iqac.about');
})->name('iqac.about');
Route::get('/iqac/committee', function () {
    return view('iqac.committee');
})->name('iqac.committee');
Route::get('/iqac/objectives', function () {
    return view('iqac.objectives');
})->name('iqac.objectives');
Route::get('/iqac/documents', function () {
    return view('iqac.documents');
})->name('iqac.documents');
Route::get('/iqac/ssr', function () {
    return view('iqac.ssr');
})->name('iqac.ssr');
Route::get('/iqac/iiqa', function () {
    return view('iqac.iiqa');
})->name('iqac.iiqa');
Route::get('/iqac/minutes', function () {
    return view('iqac.minutes');
})->name('iqac.minutes');
Route::get('/iqac/reports', function () {
    return view('iqac.reports');
})->name('iqac.reports');
Route::get('/iqac/feedback', function () {
    return view('iqac.feedback');
})->name('iqac.feedback');
Route::get('/iqac/best-practices', function () {
    return view('iqac.best-practices');
})->name('iqac.best-practices');
Route::get('/iqac/aaa', function () {
    return view('iqac.aaa');
})->name('iqac.aaa');
Route::get('/iqac/po-pso-co', function () {
    return view('iqac.po-pso-co');
})->name('iqac.po-pso-co');

// Pages Routes (NIRF, AISHE, IEDC, KSUM, Gallery)
Route::get('/nirf', function () {
    return view('pages.nirf');
})->name('pages.nirf');
Route::get('/aishe', function () {
    return view('pages.aishe');
})->name('pages.aishe');
Route::get('/iedc', function () {
    return view('pages.iedc');
})->name('pages.iedc');
Route::get('/ksum', function () {
    return view('pages.ksum');
})->name('pages.ksum');
Route::get('/gallery', function () {
    return view('pages.gallery');
})->name('pages.gallery');

// News API Routes (for homepage)
Route::get('/api/news/latest', function () {
    return response()->json(
        \App\Models\News::where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->limit(10)
            ->get()
            ->map(function($article) {
                // Ensure image has correct path for API
                $imagePath = $article->image;
                if ($imagePath && !str_starts_with($imagePath, 'http') && !str_starts_with($imagePath, '/storage/')) {
                    $imagePath = '/storage/' . $imagePath;
                }
                return [
                    'id' => $article->id,
                    'title' => $article->title,
                    'description' => $article->description,
                    'excerpt' => $article->description,
                    'image' => $imagePath,
                    'published_at' => $article->published_at,
                ];
            })
    );
})->name('api.news.latest');

// Admin Events Management Routes (requires auth)
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/faculty-dashboard', [FacultyController::class, 'adminDashboard'])->name('admin.faculty.dashboard');
    
    // Test route to debug events
    Route::get('/events-test', function() {
        $events = \App\Models\Event::orderBy('date', 'desc')->paginate(15);
        $totalEvents = \App\Models\Event::count();
        return view('admin.events.test-events', compact('events', 'totalEvents'));
    });
    
    Route::resource('events', EventController::class)->except(['show']);
    Route::resource('news', NewsController::class);
});

// Department Events Management (for faculty users logging via events) - AFTER admin routes
Route::get('/{dept}/events', [EventController::class, 'departmentIndex'])->middleware('auth')->name('dept.events.index');

// Academics Routes (Courses)
Route::get('/academics/{course}/{page}', [AcademicsController::class, 'showPage'])->name('academics.page');
Route::get('/academics/{course}', [AcademicsController::class, 'index'])->name('academics.home');

// Sub-pages Route (Syllabus, Activities, Vision, etc.)
// Place the more specific route before the catch-all to avoid shadowing.
Route::get('/{dept}/{page}', [DepartmentController::class, 'showPage'])->name('dept.page');

// Main Department Route (Home)
Route::get('/{dept}', [DepartmentController::class, 'index'])->name('dept.home');