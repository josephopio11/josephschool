<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ClassroomController
 */
class ClassroomControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $classrooms = Classroom::factory()->count(3)->create();

        $response = $this->get(route('classroom.index'));

        $response->assertOk();
        $response->assertViewIs('classroom.index');
        $response->assertViewHas('classrooms');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('classroom.create'));

        $response->assertOk();
        $response->assertViewIs('classroom.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClassroomController::class,
            'store',
            \App\Http\Requests\ClassroomStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('classroom.store'));

        $response->assertRedirect(route('classroom.index'));
        $response->assertSessionHas('classroom.id', $classroom->id);

        $this->assertDatabaseHas(classrooms, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $classroom = Classroom::factory()->create();

        $response = $this->get(route('classroom.show', $classroom));

        $response->assertOk();
        $response->assertViewIs('classroom.show');
        $response->assertViewHas('classroom');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $classroom = Classroom::factory()->create();

        $response = $this->get(route('classroom.edit', $classroom));

        $response->assertOk();
        $response->assertViewIs('classroom.edit');
        $response->assertViewHas('classroom');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClassroomController::class,
            'update',
            \App\Http\Requests\ClassroomUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $classroom = Classroom::factory()->create();

        $response = $this->put(route('classroom.update', $classroom));

        $classroom->refresh();

        $response->assertRedirect(route('classroom.index'));
        $response->assertSessionHas('classroom.id', $classroom->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $classroom = Classroom::factory()->create();

        $response = $this->delete(route('classroom.destroy', $classroom));

        $response->assertRedirect(route('classroom.index'));

        $this->assertModelMissing($classroom);
    }
}
