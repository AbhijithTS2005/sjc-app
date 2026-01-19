<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExploreProgramsPartialTest extends TestCase
{
    /**
     * Ensure the "Explore Other Programs" partial renders, excludes the current dept,
     * and renders between 1 and 4 items.
     */
    public function test_partial_excludes_current_dept_and_renders_items()
    {
        // Choose a department that exists in routes and in the partial list
        $dept = 'managementstudies';

        $response = $this->get(route('dept.page', ['dept' => $dept, 'page' => 'syllabus']));

        $response->assertStatus(200);

        // The block title must be present
        $response->assertSee('Explore Other Programs');

        $content = $response->getContent();

        // Extract the Explore Other Programs block
        $found = preg_match('/<div class="sidebar-section">[\s\S]*?<div class="sidebar-title">Explore Other Programs[\s\S]*?<\/ul>/i', $content, $matches);
        $this->assertTrue((bool) $found, 'Explore Other Programs block was not found in the response');

        $block = $matches[0];

        // Assert the current department is not linked inside this block (no href to /{dept} and no plain text for the same)
        $this->assertDoesNotMatchRegularExpression('/href="[^"]*\/' . preg_quote($dept, '/') . '"/i', $block);
        $this->assertDoesNotMatchRegularExpression('/>\s*' . preg_quote(strtoupper($dept), '/') . '\s*<\/a>/i', $block);

        // Count rendered items (li elements). Should be between 1 and 4 (inclusive)
        preg_match_all('/<li[\s\S]*?>/i', $block, $lis);
        $count = count($lis[0]);

        $this->assertGreaterThanOrEqual(1, $count, 'Expected at least 1 program link in the Explore block');
        $this->assertLessThanOrEqual(4, $count, 'Expected at most 4 program links in the Explore block');
    }
}
