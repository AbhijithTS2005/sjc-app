<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacilitiesController extends Controller
{
    // List of all facilities
    protected $facilities = [
        'auditorium-halls' => 'Auditorium Halls',
        'audio-visual-lab' => 'Audio-Visual Lab',
        'campus-radio' => 'Campus Radio',
        'canteen-cafeteria' => 'Canteen Cafeteria',
        'college-stadiums' => 'College Stadiums',
        'computer-labs' => 'Computer Labs',
        'exam-hall' => 'Exam Hall',
        'girls-retiring-room' => 'Girls Retiring Room',
        'guest-room' => 'Guest Room',
        'hostel' => 'Hostel',
        'laboratories' => 'Laboratories',
        'language-lab' => 'Language Lab',
        'library' => 'Library',
        'multi-gym' => 'Multi-Gym',
        'seminar-halls' => 'Seminar Halls',
        'smart-classrooms' => 'Smart Classrooms',
        'smart-campus' => 'Smart Campus',
        'wifi-facilities' => 'WiFi Facilities',
        'yoga-center' => 'Yoga Center',
        'common-facilities' => 'Common Facilities',
        'green-campus' => 'Green Campus'
    ];

    /**
     * Show the facilities overview page
     */
    public function index()
    {
        return view('campus.facilities.index', [
            'facilities' => $this->facilities,
            'title' => 'Campus Facilities'
        ]);
    }

    /**
     * Show a specific facility page
     */
    public function show($facility)
    {
        // Validate that the facility exists
        if (!isset($this->facilities[$facility])) {
            return abort(404);
        }

        $facilityName = $this->facilities[$facility];
        
        return view('campus.facilities.show', [
            'facility' => $facility,
            'facilityName' => $facilityName,
            'facilities' => $this->facilities,
            'title' => $facilityName
        ]);
    }
}
