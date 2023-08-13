<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\HostelRoom;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HostelRoomController
 */
class HostelRoomControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $hostelRooms = HostelRoom::factory()->count(3)->create();

        $response = $this->get(route('hostel-room.index'));

        $response->assertOk();
        $response->assertViewIs('hostelRoom.index');
        $response->assertViewHas('hostelRooms');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('hostel-room.create'));

        $response->assertOk();
        $response->assertViewIs('hostelRoom.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HostelRoomController::class,
            'store',
            \App\Http\Requests\HostelRoomStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('hostel-room.store'));

        $response->assertRedirect(route('hostelRoom.index'));
        $response->assertSessionHas('hostelRoom.id', $hostelRoom->id);

        $this->assertDatabaseHas(hostelRooms, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $hostelRoom = HostelRoom::factory()->create();

        $response = $this->get(route('hostel-room.show', $hostelRoom));

        $response->assertOk();
        $response->assertViewIs('hostelRoom.show');
        $response->assertViewHas('hostelRoom');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $hostelRoom = HostelRoom::factory()->create();

        $response = $this->get(route('hostel-room.edit', $hostelRoom));

        $response->assertOk();
        $response->assertViewIs('hostelRoom.edit');
        $response->assertViewHas('hostelRoom');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HostelRoomController::class,
            'update',
            \App\Http\Requests\HostelRoomUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $hostelRoom = HostelRoom::factory()->create();

        $response = $this->put(route('hostel-room.update', $hostelRoom));

        $hostelRoom->refresh();

        $response->assertRedirect(route('hostelRoom.index'));
        $response->assertSessionHas('hostelRoom.id', $hostelRoom->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $hostelRoom = HostelRoom::factory()->create();

        $response = $this->delete(route('hostel-room.destroy', $hostelRoom));

        $response->assertRedirect(route('hostelRoom.index'));

        $this->assertModelMissing($hostelRoom);
    }
}
