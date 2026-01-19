<?php

namespace App\Policies;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FacultyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can manage faculties for a department.
     */
    public function manage(User $user, $dept): bool
    {
        return $user->managesDepartment($dept);
    }

    /**
     * Determine whether the user can create a faculty record for a department.
     */
    public function create(User $user, $dept): bool
    {
        return $user->managesDepartment($dept);
    }

    /**
     * Determine whether the user can update the faculty.
     */
    public function update(User $user, Faculty $faculty): bool
    {
        return $user->managesDepartment($faculty->department);
    }

    /**
     * Determine whether the user can delete the faculty.
     */
    public function delete(User $user, Faculty $faculty): bool
    {
        return $user->managesDepartment($faculty->department);
    }
}