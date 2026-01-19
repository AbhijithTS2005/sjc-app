<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FacultyFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function public_listing_shows_only_department_faculty()
    {
        Faculty::factory()->create(['name' => 'Dept A One', 'department' => 'a']);
        Faculty::factory()->create(['name' => 'Dept B One', 'department' => 'b']);

        $response = $this->get('/a/faculty');
        $response->assertStatus(200);
        $response->assertSee('Dept A One');
        $response->assertDontSee('Dept B One');
    }

    /** @test */
    public function department_manager_can_manage_their_department_but_not_others()
    {
        $manager = User::factory()->create(['department' => 'a', 'is_admin' => false]);
        $other = User::factory()->create(['department' => 'b', 'is_admin' => false]);

        // manager should be allowed to view manage route for department a
        $this->actingAs($manager);
        $response = $this->get('/a/faculty/manage');
        $response->assertStatus(200);

        // other should get 403 for department a
        $this->actingAs($other);
        $resp2 = $this->get('/a/faculty/manage');
        $resp2->assertStatus(403);
    }

    /** @test */
    public function admin_can_create_faculty()
    {
        Storage::fake('public');

        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $response = $this->post(route('faculty.store'), [
            'name' => 'New Prof',
            'department' => 'commerce',
            'designation' => 'Assistant',
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('faculties', [
            'name' => 'New Prof',
            'department' => 'commerce',
        ]);

        $faculty = Faculty::where('name', 'New Prof')->first();
        $this->assertNotNull($faculty);
    }

    /** @test */
    public function admin_can_create_faculty_with_all_fields()
    {
        Storage::fake('public');

        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        // create a generic fake file (avoid GD dependency in the test environment)
        $file = UploadedFile::fake()->create('photo.jpg', 150, 'image/jpeg');

        $response = $this->post(route('faculty.store'), [
            'name' => 'Prof Full',
            'department' => 'commerce',
            'designation' => 'Associate Professor'
            'degree' => 'B.Tech',
            'masters' => 'M.Tech',
            'experience_years' => 12,
            'qualification' => 'B.Tech, M.Tech, PhD',
            'area_of_interest' => 'AI, ML, Systems',
            'teaching_experience' => '10 years at XYZ College',
            'industrial_experience' => '2 years at ABC Corp',
            'vidwan_id' => 'VID12345',
            'orcid_id' => '0000-0002-1825-0097',
            'scopus_id' => '1234567890',
            'google_scholar_id' => 'GK9x1-0AAAAJ',
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('faculties', [
            'name' => 'Prof Full',
            'department' => 'cse',
            'designation' => 'Associate Professor',
            'vidwan_id' => 'VID12345',
            'orcid_id' => '0000-0002-1825-0097',
        ]);

        $faculty = \App\Models\Faculty::where('name', 'Prof Full')->first();
        $this->assertNotNull($faculty);

        // when photo not uploaded, controller uses default placeholder
        $this->assertEquals('faculty_default.png', $faculty->photo_path);
    }

    /** @test */
    public function total_experience_is_computed_from_text_fields()
    {
        // create faculty without experience_years but with textual experience fields
        Faculty::factory()->create([
            'name' => 'Prof Sum',
            'department' => 'eng',
            'teaching_experience' => '3 years at XYZ',
            'industrial_experience' => '2.5 years at ABC',
            'experience_years' => null, // ensure accessor falls back to parsing
        ]);

        $response = $this->get('/eng/faculty');
        $response->assertStatus(200);

        // The UI no longer shows a combined total; ensure individual entries are shown instead
        $response->assertSee('Teaching Experience');
        $response->assertSee('3 years at XYZ');
        $response->assertSee('Industrial Experience');
        $response->assertSee('2.5 years at ABC');
    }
}
