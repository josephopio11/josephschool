<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Parent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ParentController
 */
class ParentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $parents = Parent::factory()->count(3)->create();

        $response = $this->get(route('parent.index'));

        $response->assertOk();
        $response->assertViewIs('parent.index');
        $response->assertViewHas('parents');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('parent.create'));

        $response->assertOk();
        $response->assertViewIs('parent.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ParentController::class,
            'store',
            \App\Http\Requests\ParentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('parent.store'));

        $response->assertRedirect(route('parent.index'));
        $response->assertSessionHas('parent.id', $parent->id);

        $this->assertDatabaseHas(parents, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $parent = Parent::factory()->create();

        $response = $this->get(route('parent.show', $parent));

        $response->assertOk();
        $response->assertViewIs('parent.show');
        $response->assertViewHas('parent');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $parent = Parent::factory()->create();

        $response = $this->get(route('parent.edit', $parent));

        $response->assertOk();
        $response->assertViewIs('parent.edit');
        $response->assertViewHas('parent');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ParentController::class,
            'update',
            \App\Http\Requests\ParentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $parent = Parent::factory()->create();

        $response = $this->put(route('parent.update', $parent));

        $parent->refresh();

        $response->assertRedirect(route('parent.index'));
        $response->assertSessionHas('parent.id', $parent->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $parent = Parent::factory()->create();

        $response = $this->delete(route('parent.destroy', $parent));

        $response->assertRedirect(route('parent.index'));

        $this->assertModelMissing($parent);
    }
}
