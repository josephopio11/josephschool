<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Hostel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HostelController
 */
class HostelControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $hostels = Hostel::factory()->count(3)->create();

        $response = $this->get(route('hostel.index'));

        $response->assertOk();
        $response->assertViewIs('hostel.index');
        $response->assertViewHas('hostels');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('hostel.create'));

        $response->assertOk();
        $response->assertViewIs('hostel.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HostelController::class,
            'store',
            \App\Http\Requests\HostelStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('hostel.store'));

        $response->assertRedirect(route('hostel.index'));
        $response->assertSessionHas('hostel.id', $hostel->id);

        $this->assertDatabaseHas(hostels, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $hostel = Hostel::factory()->create();

        $response = $this->get(route('hostel.show', $hostel));

        $response->assertOk();
        $response->assertViewIs('hostel.show');
        $response->assertViewHas('hostel');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $hostel = Hostel::factory()->create();

        $response = $this->get(route('hostel.edit', $hostel));

        $response->assertOk();
        $response->assertViewIs('hostel.edit');
        $response->assertViewHas('hostel');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HostelController::class,
            'update',
            \App\Http\Requests\HostelUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $hostel = Hostel::factory()->create();

        $response = $this->put(route('hostel.update', $hostel));

        $hostel->refresh();

        $response->assertRedirect(route('hostel.index'));
        $response->assertSessionHas('hostel.id', $hostel->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $hostel = Hostel::factory()->create();

        $response = $this->delete(route('hostel.destroy', $hostel));

        $response->assertRedirect(route('hostel.index'));

        $this->assertModelMissing($hostel);
    }
}
