<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Storage;

class FacultyController extends Controller
{
    public function __construct()
    {
        // Admin actions require auth
        $this->middleware('auth')->except(['index', 'show']);
    }

    // Public listing for a department
    public function index($dept)
    {
        $faculties = Faculty::where('department', $dept)
            ->get()
            ->sortBy(function($faculty) {
                // Create sort key: [is_hod DESC, designation_priority, name]
                $designationPriority = [
                    'professor' => 0,
                    'associate professor' => 1,
                    'assistant professor' => 2,
                    'lecturer' => 3,
                ];
                
                $designation = strtolower($faculty->designation ?? '');
                $priority = 999; // default for unknown designations
                
                foreach($designationPriority as $key => $value) {
                    if(strpos($designation, $key) !== false) {
                        $priority = $value;
                        break;
                    }
                }
                
                // Return sort array: [is_hod DESC (negate), designation priority, name]
                return [(int)!$faculty->is_hod, $priority, $faculty->name];
            });
        return view('departments.faculty', compact('faculties', 'dept'));
    }

    // Public single profile
    public function show($dept, Faculty $faculty)
    {
        if ($faculty->department !== $dept) {
            abort(404);
        }
        return view('departments.faculty_profile', compact('faculty'));
    }

    // Admin create form
    public function create()
    {
        return view('admin.faculty.create');
    }

    // Admin: manage faculty for a specific department
    public function manage($dept)
    {
        // authorize department-level management
        $this->authorize('manage', [Faculty::class, $dept]);

        $faculties = Faculty::where('department', $dept)->orderBy('name')->get();
        return view('admin.faculty.index', compact('faculties', 'dept'));
    }

    // Admin Dashboard: show all departments with faculty counts
    public function adminDashboard()
    {
        // Define all available departments
        $allDepartments = [
            'commerce' => 'Commerce',
            'managementstudies' => 'Management Studies',
            'socialwork' => 'Social Work',
            'physics' => 'Physics',
            'chemistry' => 'Chemistry',
            'mathematics' => 'Mathematics',
            'english' => 'English',
            'economics' => 'Economics',
            'datascience' => 'Data Science',
            'orientallanguages' => 'Oriental Languages',
            'physicaleducation' => 'Physical Education',
        ];

        // Get faculty counts for each department
        $facultyCounts = Faculty::selectRaw('department, COUNT(*) as count')
            ->groupBy('department')
            ->pluck('count', 'department');

        // Build departments array with counts
        $departments = collect($allDepartments)->map(function($displayName, $slug) use ($facultyCounts) {
            return [
                'name' => $slug,
                'display_name' => $displayName,
                'count' => $facultyCounts->get($slug, 0)
            ];
        })->values();

        // Get total faculty count
        $totalFaculty = Faculty::count();

        return view('admin.faculty.departments', compact('departments', 'totalFaculty'));
    }

    // Store new faculty (admin)
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'masters' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'designation' => 'nullable|string|max:255',
            'is_hod' => 'nullable|boolean',
            'qualification' => 'nullable|string',
            'area_of_interest' => 'nullable|string',
            'teaching_experience' => 'nullable|string',
            'industrial_experience' => 'nullable|string',
            'vidwan_id' => 'nullable|string|max:255',
            'orcid_id' => 'nullable|string|max:255',
            'scopus_id' => 'nullable|string|max:255',
            'google_scholar_id' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:min_width=150,min_height=150|max:4096',
        ]);

        // authorize creation for this department
        $this->authorize('create', [Faculty::class, $data['department']]);

        // ensure degree is present (DB may have non-null constraint from earlier migrations)
        if (empty($data['degree'])) {
            $data['degree'] = 'N/A';
        }

        // default experience_years to 0 when missing (older migration might have NOT NULL constraint)
        if (!array_key_exists('experience_years', $data) || $data['experience_years'] === null) {
            $data['experience_years'] = 0;
        }

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('faculty_photos', 'public_uploads');
        } else {
            // older migration required a photo_path; use default placeholder
            $data['photo_path'] = $data['photo_path'] ?? 'faculty_default.png';
        }

        Faculty::create($data);

        return redirect()->back()->with('success', 'Faculty added successfully');
    }

    // Admin edit form
    public function edit(Faculty $faculty)
    {
        $this->authorize('update', $faculty);
        return view('admin.faculty.edit', compact('faculty'));
    }

    // Admin update
    public function update(Request $request, Faculty $faculty)
    {
        $this->authorize('update', $faculty);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'masters' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'designation' => 'nullable|string|max:255',
            'is_hod' => 'nullable|boolean',
            'qualification' => 'nullable|string',
            'area_of_interest' => 'nullable|string',
            'teaching_experience' => 'nullable|string',
            'industrial_experience' => 'nullable|string',
            'vidwan_id' => 'nullable|string|max:255',
            'orcid_id' => 'nullable|string|max:255',
            'scopus_id' => 'nullable|string|max:255',
            'google_scholar_id' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:min_width=150,min_height=150|max:4096',
        ]);

        if ($request->hasFile('photo')) {
            // delete old photo if exists
            if ($faculty->photo_path && Storage::disk('public_uploads')->exists($faculty->photo_path)) {
                Storage::disk('public_uploads')->delete($faculty->photo_path);
            }
            $data['photo_path'] = $request->file('photo')->store('faculty_photos', 'public_uploads');
        }

        $faculty->update($data);

        return redirect()->back()->with('success', 'Faculty updated successfully');
    }

    // Admin destroy
    public function destroy(Faculty $faculty)
    {
        $this->authorize('delete', $faculty);

        if ($faculty->photo_path && Storage::disk('public_uploads')->exists($faculty->photo_path)) {
            Storage::disk('public_uploads')->delete($faculty->photo_path);
        }
        $faculty->delete();
        return redirect()->back()->with('success', 'Faculty removed');
    }
}