<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\HostelAllocation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HostelAllocationController
 */
class HostelAllocationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $hostelAllocations = HostelAllocation::factory()->count(3)->create();

        $response = $this->get(route('hostel-allocation.index'));

        $response->assertOk();
        $response->assertViewIs('hostelAllocation.index');
        $response->assertViewHas('hostelAllocations');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('hostel-allocation.create'));

        $response->assertOk();
        $response->assertViewIs('hostelAllocation.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HostelAllocationController::class,
            'store',
            \App\Http\Requests\HostelAllocationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('hostel-allocation.store'));

        $response->assertRedirect(route('hostelAllocation.index'));
        $response->assertSessionHas('hostelAllocation.id', $hostelAllocation->id);

        $this->assertDatabaseHas(hostelAllocations, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $hostelAllocation = HostelAllocation::factory()->create();

        $response = $this->get(route('hostel-allocation.show', $hostelAllocation));

        $response->assertOk();
        $response->assertViewIs('hostelAllocation.show');
        $response->assertViewHas('hostelAllocation');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $hostelAllocation = HostelAllocation::factory()->create();

        $response = $this->get(route('hostel-allocation.edit', $hostelAllocation));

        $response->assertOk();
        $response->assertViewIs('hostelAllocation.edit');
        $response->assertViewHas('hostelAllocation');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HostelAllocationController::class,
            'update',
            \App\Http\Requests\HostelAllocationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $hostelAllocation = HostelAllocation::factory()->create();

        $response = $this->put(route('hostel-allocation.update', $hostelAllocation));

        $hostelAllocation->refresh();

        $response->assertRedirect(route('hostelAllocation.index'));
        $response->assertSessionHas('hostelAllocation.id', $hostelAllocation->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $hostelAllocation = HostelAllocation::factory()->create();

        $response = $this->delete(route('hostel-allocation.destroy', $hostelAllocation));

        $response->assertRedirect(route('hostelAllocation.index'));

        $this->assertModelMissing($hostelAllocation);
    }
}
