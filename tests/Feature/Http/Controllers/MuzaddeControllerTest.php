<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Muzadde;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MuzaddeController
 */
class MuzaddeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $muzaddes = Muzadde::factory()->count(3)->create();

        $response = $this->get(route('muzadde.index'));

        $response->assertOk();
        $response->assertViewIs('muzadde.index');
        $response->assertViewHas('muzaddes');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('muzadde.create'));

        $response->assertOk();
        $response->assertViewIs('muzadde.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MuzaddeController::class,
            'store',
            \App\Http\Requests\MuzaddeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('muzadde.store'));

        $response->assertRedirect(route('muzadde.index'));
        $response->assertSessionHas('muzadde.id', $muzadde->id);

        $this->assertDatabaseHas(muzaddes, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $muzadde = Muzadde::factory()->create();

        $response = $this->get(route('muzadde.show', $muzadde));

        $response->assertOk();
        $response->assertViewIs('muzadde.show');
        $response->assertViewHas('muzadde');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $muzadde = Muzadde::factory()->create();

        $response = $this->get(route('muzadde.edit', $muzadde));

        $response->assertOk();
        $response->assertViewIs('muzadde.edit');
        $response->assertViewHas('muzadde');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MuzaddeController::class,
            'update',
            \App\Http\Requests\MuzaddeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $muzadde = Muzadde::factory()->create();

        $response = $this->put(route('muzadde.update', $muzadde));

        $muzadde->refresh();

        $response->assertRedirect(route('muzadde.index'));
        $response->assertSessionHas('muzadde.id', $muzadde->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $muzadde = Muzadde::factory()->create();

        $response = $this->delete(route('muzadde.destroy', $muzadde));

        $response->assertRedirect(route('muzadde.index'));

        $this->assertModelMissing($muzadde);
    }
}
