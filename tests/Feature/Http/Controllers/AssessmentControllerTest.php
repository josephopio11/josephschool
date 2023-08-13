<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AssessmentController
 */
class AssessmentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $assessments = Assessment::factory()->count(3)->create();

        $response = $this->get(route('assessment.index'));

        $response->assertOk();
        $response->assertViewIs('assessment.index');
        $response->assertViewHas('assessments');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('assessment.create'));

        $response->assertOk();
        $response->assertViewIs('assessment.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AssessmentController::class,
            'store',
            \App\Http\Requests\AssessmentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('assessment.store'));

        $response->assertRedirect(route('assessment.index'));
        $response->assertSessionHas('assessment.id', $assessment->id);

        $this->assertDatabaseHas(assessments, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $assessment = Assessment::factory()->create();

        $response = $this->get(route('assessment.show', $assessment));

        $response->assertOk();
        $response->assertViewIs('assessment.show');
        $response->assertViewHas('assessment');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $assessment = Assessment::factory()->create();

        $response = $this->get(route('assessment.edit', $assessment));

        $response->assertOk();
        $response->assertViewIs('assessment.edit');
        $response->assertViewHas('assessment');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AssessmentController::class,
            'update',
            \App\Http\Requests\AssessmentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $assessment = Assessment::factory()->create();

        $response = $this->put(route('assessment.update', $assessment));

        $assessment->refresh();

        $response->assertRedirect(route('assessment.index'));
        $response->assertSessionHas('assessment.id', $assessment->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $assessment = Assessment::factory()->create();

        $response = $this->delete(route('assessment.destroy', $assessment));

        $response->assertRedirect(route('assessment.index'));

        $this->assertModelMissing($assessment);
    }
}
