<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\HostelBed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HostelBedController
 */
class HostelBedControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $hostelBeds = HostelBed::factory()->count(3)->create();

        $response = $this->get(route('hostel-bed.index'));

        $response->assertOk();
        $response->assertViewIs('hostelBed.index');
        $response->assertViewHas('hostelBeds');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('hostel-bed.create'));

        $response->assertOk();
        $response->assertViewIs('hostelBed.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HostelBedController::class,
            'store',
            \App\Http\Requests\HostelBedStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('hostel-bed.store'));

        $response->assertRedirect(route('hostelBed.index'));
        $response->assertSessionHas('hostelBed.id', $hostelBed->id);

        $this->assertDatabaseHas(hostelBeds, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $hostelBed = HostelBed::factory()->create();

        $response = $this->get(route('hostel-bed.show', $hostelBed));

        $response->assertOk();
        $response->assertViewIs('hostelBed.show');
        $response->assertViewHas('hostelBed');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $hostelBed = HostelBed::factory()->create();

        $response = $this->get(route('hostel-bed.edit', $hostelBed));

        $response->assertOk();
        $response->assertViewIs('hostelBed.edit');
        $response->assertViewHas('hostelBed');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HostelBedController::class,
            'update',
            \App\Http\Requests\HostelBedUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $hostelBed = HostelBed::factory()->create();

        $response = $this->put(route('hostel-bed.update', $hostelBed));

        $hostelBed->refresh();

        $response->assertRedirect(route('hostelBed.index'));
        $response->assertSessionHas('hostelBed.id', $hostelBed->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $hostelBed = HostelBed::factory()->create();

        $response = $this->delete(route('hostel-bed.destroy', $hostelBed));

        $response->assertRedirect(route('hostelBed.index'));

        $this->assertModelMissing($hostelBed);
    }
}
