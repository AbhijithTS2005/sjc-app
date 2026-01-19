{{-- Partial: Programs Offered by Department
     Shows only academic courses offered by the specific department
     Expected variables:
       - $dept (string) : current department slug
     Usage: @include('partials.explore-programs', ['dept' => $dept])
--}}
@php
// Map departments to their academic courses with routes
$departmentCourses = [
    'commerce' => [
        ['name' => 'B.Com Finance & Taxation', 'course' => 'bcom_fin_tax'],
        ['name' => 'B.Com Computer Applications', 'course' => 'bcom_ca'],
        ['name' => 'M.Com', 'course' => 'mcom'],
    ],
    'managementstudies' => [
        ['name' => 'BBA (Aided)', 'course' => 'bba_aided'],
        ['name' => 'BBA (Self Finance)', 'course' => 'bba_sf'],
    ],
    'mathematics' => [
        ['name' => 'B.Sc Mathematics', 'course' => 'mathematics'],
    ],
    'physics' => [
        ['name' => 'B.Sc Physics', 'course' => 'physics'],
    ],
    'chemistry' => [
        ['name' => 'B.Sc Chemistry', 'course' => 'chemistry'],
    ],
    'english' => [
        ['name' => 'B.A English', 'course' => 'english'],
        ['name' => 'M.A English', 'course' => 'ma_english'],
    ],
    'datascience' => [
        ['name' => 'Integrated M.Sc Data Science', 'course' => 'datascience'],
    ],
    'economics' => [
        ['name' => 'B.A Economics', 'course' => 'economics'],
    ],
    'socialwork' => [
        ['name' => 'M.S.W (Master of Social Work)', 'course' => 'msw'],
    ],
];

// Get courses for current department
$courses = $departmentCourses[$dept] ?? [];
@endphp

@if(!empty($courses))
<div class="sidebar-section">
    <div class="sidebar-title">Programs Offered</div>
    <ul class="sidebar-links">
        @foreach($courses as $course)
            <li>
                <a href="{{ route('academics.home', ['course' => $course['course']]) }}">
                    <i class="fas fa-graduation-cap"></i> {{ $course['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endif

