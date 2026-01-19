<aside class="sidebar">
    
    @include('partials.explore-programs', ['dept' => $dept])

    <div class="sidebar-section">
        <div class="sidebar-title">Department Info</div>
        <ul class="sidebar-links">
            <li><a href="{{ route('dept.home', ['dept' => $dept]) }}" class="{{ (isset($page) && $page === null) ? 'active-link' : '' }}"><i class="fas fa-home"></i> Overview</a></li>
            <li><a href="{{ route('dept.faculty.index', ['dept' => $dept]) }}" class="{{ (isset($page) && $page == 'faculty') ? 'active-link' : '' }}"><i class="fas fa-users"></i> Faculty</a></li>
            <li><a href="{{ route('dept.page', ['dept' => $dept, 'page' => 'visionmission']) }}" class="{{ (isset($page) && $page == 'visionmission') ? 'active-link' : '' }}"><i class="fas fa-eye"></i> Vision & Mission</a></li>
        </ul>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-title">Academics</div>
        <ul class="sidebar-links">
            <li><a href="{{ route('dept.page', ['dept' => $dept, 'page' => 'placementinternships']) }}" class="{{ (isset($page) && $page == 'placementinternships') ? 'active-link' : '' }}"><i class="fas fa-briefcase"></i> Placement & Internships</a></li>
            <li><a href="{{ route('dept.page', ['dept' => $dept, 'page' => 'valueadded']) }}" class="{{ (isset($page) && $page == 'valueadded') ? 'active-link' : '' }}"><i class="fas fa-certificate"></i> Value Added & Certificate Programs</a></li>
            <li><a href="{{ route('dept.page', ['dept' => $dept, 'page' => 'activities']) }}" class="{{ (isset($page) && $page == 'activities') ? 'active-link' : '' }}"><i class="fas fa-tasks"></i> Activities</a></li>
            <li><a href="{{ route('dept.page', ['dept' => $dept, 'page' => 'achievements']) }}" class="{{ (isset($page) && $page == 'achievements') ? 'active-link' : '' }}"><i class="fas fa-trophy"></i> Achievements</a></li>
        </ul>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-title">Research & Publications</div>
        <ul class="sidebar-links">
            <li><a href="{{ route('dept.page', ['dept' => $dept, 'page' => 'publications']) }}" class="{{ (isset($page) && $page == 'publications') ? 'active-link' : '' }}"><i class="fas fa-file-alt"></i> Publications</a></li>
            <li><a href="{{ route('dept.page', ['dept' => $dept, 'page' => 'patents']) }}" class="{{ (isset($page) && $page == 'patents') ? 'active-link' : '' }}"><i class="fas fa-lightbulb"></i> Patents</a></li>
            <li><a href="{{ route('dept.page', ['dept' => $dept, 'page' => 'magazine']) }}" class="{{ (isset($page) && $page == 'magazine') ? 'active-link' : '' }}"><i class="fas fa-newspaper"></i> Magazine</a></li>
        </ul>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-title">Gallery & Community</div>
        <ul class="sidebar-links">
            <li><a href="{{ route('dept.page', ['dept' => $dept, 'page' => 'gallery']) }}" class="{{ (isset($page) && $page == 'gallery') ? 'active-link' : '' }}"><i class="fas fa-images"></i> Gallery</a></li>
            <li><a href="{{ route('dept.page', ['dept' => $dept, 'page' => 'collaborations']) }}" class="{{ (isset($page) && $page == 'collaborations') ? 'active-link' : '' }}"><i class="fas fa-handshake"></i> Collaborations & MOU</a></li>
            <li><a href="{{ route('dept.page', ['dept' => $dept, 'page' => 'testimonials']) }}" class="{{ (isset($page) && $page == 'testimonials') ? 'active-link' : '' }}"><i class="fas fa-quote-left"></i> Testimonials</a></li>
        </ul>
    </div>

</aside>
