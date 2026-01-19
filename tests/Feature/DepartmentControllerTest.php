<?php

namespace Tests\Feature;

use Tests\TestCase;

class DepartmentControllerTest extends TestCase
{
    /** @test */
    public function index_shows_department_page()
    {
        $response = $this->get('/physics');
        $response->assertStatus(200);
        $response->assertSee('Department of Physics');
    }

    /** @test */
    public function showPage_shows_department_subpage()
    {
        $response = $this->get('/physics/valueadded');
        $response->assertStatus(200);
        $response->assertSee('Value Added Programs');
    }

    /** @test */
    public function invalid_dept_returns_404()
    {
        $response = $this->get('/..');
        $response->assertStatus(404);
    }

    /** @test */
    public function invalid_page_returns_404()
    {
        $response = $this->get('/physics/../');
        $response->assertStatus(404);
    }
}
