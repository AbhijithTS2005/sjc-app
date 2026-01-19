<?php

namespace App\Helpers;

class DepartmentHelper
{
    /**
     * Get the display name for a department slug
     * 
     * @param string $slug
     * @return string
     */
    public static function getDisplayName($slug)
    {
        $departments = [
            // New department codes
            'commerce' => 'Commerce',
            'managementstudies' => 'Management Studies',
            'socialwork' => 'Social Work',
            // Old department codes (for backward compatibility)
            'bcom' => 'Commerce',
            'bba' => 'Management Studies',
            'msw' => 'Social Work',
            // Other departments
            'physics' => 'Physics',
            'chemistry' => 'Chemistry',
            'mathematics' => 'Mathematics',
            'english' => 'English',
            'economics' => 'Economics',
            'datascience' => 'Data Science',
            'orientallanguages' => 'Oriental Languages',
            'physicaleducation' => 'Physical Education',
        ];

        return $departments[strtolower($slug)] ?? ucfirst($slug);
    }

    /**
     * Get all departments with their display names
     * 
     * @return array
     */
    public static function getAllDepartments()
    {
        return [
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
    }
}
