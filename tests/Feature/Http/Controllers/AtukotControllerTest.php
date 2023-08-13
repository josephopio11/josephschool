<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Atukot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AtukotController
 */
class AtukotControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $atukots = Atukot::factory()->count(3)->create();

        $response = $this->get(route('atukot.index'));

        $response->assertOk();
        $response->assertViewIs('atukot.index');
        $response->assertViewHas('atukots');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('atukot.create'));

        $response->assertOk();
        $response->assertViewIs('atukot.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AtukotController::class,
            'store',
            \App\Http\Requests\AtukotStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('atukot.store'));

        $response->assertRedirect(route('atukot.index'));
        $response->assertSessionHas('atukot.id', $atukot->id);

        $this->assertDatabaseHas(atukots, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $atukot = Atukot::factory()->create();

        $response = $this->get(route('atukot.show', $atukot));

        $response->assertOk();
        $response->assertViewIs('atukot.show');
        $response->assertViewHas('atukot');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $atukot = Atukot::factory()->create();

        $response = $this->get(route('atukot.edit', $atukot));

        $response->assertOk();
        $response->assertViewIs('atukot.edit');
        $response->assertViewHas('atukot');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AtukotController::class,
            'update',
            \App\Http\Requests\AtukotUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $atukot = Atukot::factory()->create();

        $response = $this->put(route('atukot.update', $atukot));

        $atukot->refresh();

        $response->assertRedirect(route('atukot.index'));
        $response->assertSessionHas('atukot.id', $atukot->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $atukot = Atukot::factory()->create();

        $response = $this->delete(route('atukot.destroy', $atukot));

        $response->assertRedirect(route('atukot.index'));

        $this->assertModelMissing($atukot);
    }
}
