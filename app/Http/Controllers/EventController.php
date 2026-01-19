<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\EventRequest;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display all events in admin panel
     */
    public function index()
    {
        try {
            $events = Event::orderBy('date', 'desc')->paginate(15);
            $totalEvents = Event::count();
        } catch (\Exception $e) {
            $events = collect([]);
            $totalEvents = 0;
        }
        
        $user = auth()->user();
        $isAdmin = optional($user)->is_admin;
        
        if ($isAdmin) {
            // Show all events for admin
            return view('admin.events.admin-index', compact('events', 'isAdmin', 'totalEvents'));
        } else {
            // Show department-filtered events
            $dept = optional($user)->department ?? 'ADMIN';
            return view('admin.events.dept-index', compact('events', 'isAdmin', 'totalEvents', 'dept'));
        }
    }

    /**
     * Show create event form
     */
    public function create()
    {
        $userDepartment = auth()->user()->department;
        $isAdmin = auth()->user()->is_admin;
        
        // Use different views for admin vs department
        if ($isAdmin) {
            return view('admin.events.admin-create', compact('userDepartment', 'isAdmin'));
        } else {
            return view('admin.events.dept-create', compact('userDepartment', 'isAdmin'));
        }
    }

    /**
     * Store new event in database
     */
    public function store(EventRequest $request)
    {
        $data = $request->validated();
        
        // Auto-set department if user is not admin
        if (!auth()->user()->is_admin && auth()->user()->department) {
            $data['department'] = auth()->user()->department;
        }
        
        // Set default status to approved (both admin and department faculty can create published events)
        if (!isset($data['status']) || !$data['status']) {
            $data['status'] = 'approved';
        }
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('events', 'public_uploads');
            $data['image'] = $path; // Store relative path like 'events/timestamp_id.jpg'
        }
        
        Event::create($data);
        
        // Redirect based on user type
        if (auth()->user()->is_admin) {
            return redirect()->route('events.index')->with('success', 'Event created successfully!');
        } else {
            return redirect()->route('dept.events.index', auth()->user()->department)->with('success', 'Event created successfully!');
        }
    }

    /**
     * Show edit event form
     */
    public function edit(Event $event)
    {
        $isAdmin = auth()->user()->is_admin;
        
        // Use different views for admin vs department
        if ($isAdmin) {
            return view('admin.events.admin-edit', compact('event', 'isAdmin'));
        } else {
            return view('admin.events.dept-edit', compact('event', 'isAdmin'));
        }
    }

    /**
     * Update event in database
     */
    public function update(EventRequest $request, Event $event)
    {
        $data = $request->validated();
        
        // Auto-set department if user is not admin
        if (!auth()->user()->is_admin && auth()->user()->department) {
            $data['department'] = auth()->user()->department;
        }
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image && \Storage::disk('public_uploads')->exists($event->image)) {
                \Storage::disk('public_uploads')->delete($event->image);
            }
            
            $path = $request->file('image')->store('events', 'public_uploads');
            $data['image'] = $path; // Store relative path like 'events/timestamp_id.jpg'
        }
        
        $event->update($data);
        
        // Redirect based on user type
        if (auth()->user()->is_admin) {
            return redirect()->route('events.index')->with('success', 'Event updated successfully!');
        } else {
            return redirect()->route('dept.events.index', auth()->user()->department)->with('success', 'Event updated successfully!');
        }
    }

    /**
     * Delete event
     */
    public function destroy(Event $event)
    {
        // Delete image file if exists
        if ($event->image && \Storage::disk('public_uploads')->exists($event->image)) {
            \Storage::disk('public_uploads')->delete($event->image);
        }
        
        $event->delete();
        
        // Redirect based on user type
        if (auth()->user()->is_admin) {
            return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
        } else {
            return redirect()->route('dept.events.index', auth()->user()->department)->with('success', 'Event deleted successfully!');
        }
    }

    /**
     * Show events archive - grouped by year and month
     */
    public function archive()
    {
        // Get past events from the last 3 years, grouped by year and month
        $events = Event::approved()
                       ->past()
                       ->lastNYears(3)
                       ->get();

        // Group by year, then by month
        $groupedEvents = [];
        foreach ($events as $event) {
            $year = $event->year;
            $month = $event->month;
            $monthName = $event->month_name;
            
            if (!isset($groupedEvents[$year])) {
                $groupedEvents[$year] = [];
            }
            if (!isset($groupedEvents[$year][$month])) {
                $groupedEvents[$year][$month] = ['name' => $monthName, 'events' => []];
            }
            $groupedEvents[$year][$month]['events'][] = $event;
        }

        // Sort years descending
        krsort($groupedEvents);

        return view('events.archive', ['groupedEvents' => $groupedEvents]);
    }

    /**
     * Show single event details
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }

    /**
     * API: Get upcoming events (for homepage)
     */
    public function upcomingJson()
    {
        $events = Event::approved()
                       ->upcoming()
                       ->take(15)
                       ->get()
                       ->map(function($event) {
                           // Ensure image has correct path for API
                           $imagePath = $event->image;
                           if ($imagePath && !str_starts_with($imagePath, 'http') && !str_starts_with($imagePath, '/storage/')) {
                               $imagePath = '/storage/' . $imagePath;
                           }
                           
                           return [
                               'id' => $event->id,
                               'title' => $event->title,
                               'date' => $event->date->format('Y-m-d'),
                               'description' => $event->description,
                               'image' => $imagePath,
                               'type' => $event->type,
                           ];
                       });

        return response()->json($events);
    }

    /**
     * API: Get past events (for homepage news section)
     */
    public function pastJson()
    {
        $events = Event::approved()
                       ->past()
                       ->take(15)
                       ->get()
                       ->map(function($event) {
                           // Ensure image has correct path for API
                           $imagePath = $event->image;
                           if ($imagePath && !str_starts_with($imagePath, 'http') && !str_starts_with($imagePath, '/storage/')) {
                               $imagePath = '/storage/' . $imagePath;
                           }
                           
                           return [
                               'id' => $event->id,
                               'title' => $event->title,
                               'date' => $event->date->format('Y-m-d'),
                               'description' => $event->description,
                               'image' => $imagePath,
                               'type' => $event->type,
                           ];
                       });

        return response()->json($events);
    }

    /**
     * Display events for a specific department (faculty view)
     */
    public function departmentIndex($dept)
    {
        $events = Event::where('department', $dept)
            ->orderBy('date', 'desc')
            ->paginate(15);
        return view('admin.events.dept-index', compact('events', 'dept'));
    }
}
