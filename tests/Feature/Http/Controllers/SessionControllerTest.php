<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SessionController
 */
class SessionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $sessions = Session::factory()->count(3)->create();

        $response = $this->get(route('session.index'));

        $response->assertOk();
        $response->assertViewIs('session.index');
        $response->assertViewHas('sessions');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('session.create'));

        $response->assertOk();
        $response->assertViewIs('session.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SessionController::class,
            'store',
            \App\Http\Requests\SessionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('session.store'));

        $response->assertRedirect(route('session.index'));
        $response->assertSessionHas('session.id', $session->id);

        $this->assertDatabaseHas(sessions, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $session = Session::factory()->create();

        $response = $this->get(route('session.show', $session));

        $response->assertOk();
        $response->assertViewIs('session.show');
        $response->assertViewHas('session');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $session = Session::factory()->create();

        $response = $this->get(route('session.edit', $session));

        $response->assertOk();
        $response->assertViewIs('session.edit');
        $response->assertViewHas('session');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SessionController::class,
            'update',
            \App\Http\Requests\SessionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $session = Session::factory()->create();

        $response = $this->put(route('session.update', $session));

        $session->refresh();

        $response->assertRedirect(route('session.index'));
        $response->assertSessionHas('session.id', $session->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $session = Session::factory()->create();

        $response = $this->delete(route('session.destroy', $session));

        $response->assertRedirect(route('session.index'));

        $this->assertModelMissing($session);
    }
}
