<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // A shared function to get the sidebar links
    private function getQuickLinks()
    {
        return [
            ['name' => 'Examination', 'url' => '#'],
            ['name' => 'Placements', 'url' => '#'],
            ['name' => 'Attendance', 'url' => '#'],
            ['name' => 'Notices', 'url' => '#'],
        ];
    }

    // 1. Anthem Page
    public function anthem()
    {
        $pageTitle = "College Anthem";
        $quickLinks = $this->getQuickLinks();
        return view('About-Us.Anthem', compact('pageTitle', 'quickLinks'));
    }

    // 2. Administration Page
    public function administration()
    {
        $pageTitle = "Administration";
        $quickLinks = $this->getQuickLinks();
        return view('About-Us.Administration', compact('pageTitle', 'quickLinks'));
    }

    // 3. Founder Page
    public function founder()
    {
        $pageTitle = "Our Founder";
        $quickLinks = $this->getQuickLinks();
        return view('About-Us.Founder', compact('pageTitle', 'quickLinks'));
    }

    // 4. History Page
    public function history()
    {
        $pageTitle = "History - St. Joseph's College";
        $quickLinks = $this->getQuickLinks();
        return view('About-Us.History', compact('pageTitle', 'quickLinks'));
    }

    // 5. Principal's Message Page
    public function principal()
    {
        $pageTitle = "Principal's Message";
        $quickLinks = $this->getQuickLinks();
        return view('About-Us.Principal', compact('pageTitle', 'quickLinks'));
    }

    // 6. Profile Page
    public function profile()
    {
        $pageTitle = "College Profile";
        $quickLinks = $this->getQuickLinks();
        return view('About-Us.Profile', compact('pageTitle', 'quickLinks'));
    }

    // 7. Rules and Regulations Page
    public function rules()
    {
        $pageTitle = "Rules & Regulations";
        $quickLinks = $this->getQuickLinks();
        return view('About-Us.Rules', compact('pageTitle', 'quickLinks'));
    }

    // 8. Vision & Mission Page
    public function vision()
    {
        $pageTitle = "Vision & Mission";
        $quickLinks = $this->getQuickLinks();
        return view('About-Us.Vision', compact('pageTitle', 'quickLinks'));
    }
}