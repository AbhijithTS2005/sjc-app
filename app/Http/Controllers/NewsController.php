<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    /**
     * Display public news listing with filters
     */
    public function publicIndex()
    {
        // Get years from database and add current year and previous 2 years
        $dbYears = News::where('published_at', '<=', now())
            ->selectRaw('YEAR(published_at) as year')
            ->distinct()
            ->pluck('year')
            ->toArray();
        
        // Add current year and previous 2 years to ensure they're always available
        $currentYear = now()->year;
        $defaultYears = [$currentYear, $currentYear - 1, $currentYear - 2];
        
        $allYears = array_unique(array_merge($dbYears, $defaultYears));
        rsort($allYears);
        $years = collect($allYears);
        
        $selectedYear = request('year', $years->first() ?? now()->year);
        $selectedMonth = request('month', null);
        
        $query = News::where('published_at', '<=', now())
            ->whereYear('published_at', $selectedYear);
        
        if ($selectedMonth) {
            $query->whereMonth('published_at', $selectedMonth);
        }
        
        $news = $query->orderBy('published_at', 'desc')->paginate(12);
        
        // Get all 12 months with their data
        $dbMonths = News::where('published_at', '<=', now())
            ->whereYear('published_at', $selectedYear)
            ->selectRaw('MONTH(published_at) as month, DATE_FORMAT(published_at, "%M") as month_name')
            ->distinct()
            ->get()
            ->keyBy('month');
        
        // Create all 12 months (even if empty)
        $monthNames = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];
        
        $months = collect();
        foreach ($monthNames as $monthNum => $monthName) {
            if ($dbMonths->has($monthNum)) {
                $months[$monthNum] = $dbMonths[$monthNum];
            } else {
                $months[$monthNum] = (object)['month' => $monthNum, 'month_name' => $monthName];
            }
        }
        
        return view('news.index', compact('news', 'years', 'selectedYear', 'selectedMonth', 'months'));
    }

    /**
     * Display public news detail
     */
    public function publicShow(News $news)
    {
        // Only show published news
        if ($news->published_at > now()) {
            abort(404);
        }
        
        return view('news.show', compact('news'));
    }

    /**
     * Display a listing of the resource (Admin).
     */
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $data = $request->validated();

        // Automatically set published_at to current date/time
        $data['published_at'] = now();

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public_uploads');
            $data['image'] = $path;
        }

        News::create($data);

        return redirect()->route('news.index')->with('success', 'News article created and published successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, News $news)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($news->image && \Storage::disk('public_uploads')->exists($news->image)) {
                \Storage::disk('public_uploads')->delete($news->image);
            }

            $path = $request->file('image')->store('news', 'public_uploads');
            $data['image'] = $path;
        }

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'News article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // Delete image if exists
        if ($news->image && \Storage::disk('public_uploads')->exists($news->image)) {
            \Storage::disk('public_uploads')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News article deleted successfully.');
    }
}
