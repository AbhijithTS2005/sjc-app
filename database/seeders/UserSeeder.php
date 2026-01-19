<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user (idempotent)
        User::updateOrCreate([
            'email' => 'admin@example.com',
        ],[
            'name' => 'Seed Admin',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        // Department managers (idempotent)
        $departments = ['commerce','physics','chemistry','economics','mathematics','datascience','english','managementstudies','socialwork','orientallanguages','physicaleducation'];
        foreach($departments as $dept){
            $email = $dept . 'mgr@example.com';
            User::updateOrCreate([
                'email' => $email,
            ],[
                'name' => ucfirst($dept) . ' Manager',
                'password' => bcrypt('password'),
                'department' => $dept,
                'is_admin' => false,
            ]);
        }
    }
}
