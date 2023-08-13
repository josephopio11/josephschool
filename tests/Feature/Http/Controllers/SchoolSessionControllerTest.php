<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\SchoolSession;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SchoolSessionController
 */
class SchoolSessionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $schoolSessions = SchoolSession::factory()->count(3)->create();

        $response = $this->get(route('school-session.index'));

        $response->assertOk();
        $response->assertViewIs('schoolSession.index');
        $response->assertViewHas('schoolSessions');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('school-session.create'));

        $response->assertOk();
        $response->assertViewIs('schoolSession.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SchoolSessionController::class,
            'store',
            \App\Http\Requests\SchoolSessionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('school-session.store'));

        $response->assertRedirect(route('schoolSession.index'));
        $response->assertSessionHas('schoolSession.id', $schoolSession->id);

        $this->assertDatabaseHas(schoolSessions, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $schoolSession = SchoolSession::factory()->create();

        $response = $this->get(route('school-session.show', $schoolSession));

        $response->assertOk();
        $response->assertViewIs('schoolSession.show');
        $response->assertViewHas('schoolSession');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $schoolSession = SchoolSession::factory()->create();

        $response = $this->get(route('school-session.edit', $schoolSession));

        $response->assertOk();
        $response->assertViewIs('schoolSession.edit');
        $response->assertViewHas('schoolSession');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SchoolSessionController::class,
            'update',
            \App\Http\Requests\SchoolSessionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $schoolSession = SchoolSession::factory()->create();

        $response = $this->put(route('school-session.update', $schoolSession));

        $schoolSession->refresh();

        $response->assertRedirect(route('schoolSession.index'));
        $response->assertSessionHas('schoolSession.id', $schoolSession->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $schoolSession = SchoolSession::factory()->create();

        $response = $this->delete(route('school-session.destroy', $schoolSession));

        $response->assertRedirect(route('schoolSession.index'));

        $this->assertModelMissing($schoolSession);
    }
}
