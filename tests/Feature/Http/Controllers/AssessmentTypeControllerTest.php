<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\AssessmentType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AssessmentTypeController
 */
class AssessmentTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $assessmentTypes = AssessmentType::factory()->count(3)->create();

        $response = $this->get(route('assessment-type.index'));

        $response->assertOk();
        $response->assertViewIs('assessmentType.index');
        $response->assertViewHas('assessmentTypes');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('assessment-type.create'));

        $response->assertOk();
        $response->assertViewIs('assessmentType.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AssessmentTypeController::class,
            'store',
            \App\Http\Requests\AssessmentTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('assessment-type.store'));

        $response->assertRedirect(route('assessmentType.index'));
        $response->assertSessionHas('assessmentType.id', $assessmentType->id);

        $this->assertDatabaseHas(assessmentTypes, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $assessmentType = AssessmentType::factory()->create();

        $response = $this->get(route('assessment-type.show', $assessmentType));

        $response->assertOk();
        $response->assertViewIs('assessmentType.show');
        $response->assertViewHas('assessmentType');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $assessmentType = AssessmentType::factory()->create();

        $response = $this->get(route('assessment-type.edit', $assessmentType));

        $response->assertOk();
        $response->assertViewIs('assessmentType.edit');
        $response->assertViewHas('assessmentType');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AssessmentTypeController::class,
            'update',
            \App\Http\Requests\AssessmentTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $assessmentType = AssessmentType::factory()->create();

        $response = $this->put(route('assessment-type.update', $assessmentType));

        $assessmentType->refresh();

        $response->assertRedirect(route('assessmentType.index'));
        $response->assertSessionHas('assessmentType.id', $assessmentType->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $assessmentType = AssessmentType::factory()->create();

        $response = $this->delete(route('assessment-type.destroy', $assessmentType));

        $response->assertRedirect(route('assessmentType.index'));

        $this->assertModelMissing($assessmentType);
    }
}
