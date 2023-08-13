<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\HostelRoomType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HostelRoomTypeController
 */
class HostelRoomTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $hostelRoomTypes = HostelRoomType::factory()->count(3)->create();

        $response = $this->get(route('hostel-room-type.index'));

        $response->assertOk();
        $response->assertViewIs('hostelRoomType.index');
        $response->assertViewHas('hostelRoomTypes');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('hostel-room-type.create'));

        $response->assertOk();
        $response->assertViewIs('hostelRoomType.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HostelRoomTypeController::class,
            'store',
            \App\Http\Requests\HostelRoomTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('hostel-room-type.store'));

        $response->assertRedirect(route('hostelRoomType.index'));
        $response->assertSessionHas('hostelRoomType.id', $hostelRoomType->id);

        $this->assertDatabaseHas(hostelRoomTypes, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $hostelRoomType = HostelRoomType::factory()->create();

        $response = $this->get(route('hostel-room-type.show', $hostelRoomType));

        $response->assertOk();
        $response->assertViewIs('hostelRoomType.show');
        $response->assertViewHas('hostelRoomType');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $hostelRoomType = HostelRoomType::factory()->create();

        $response = $this->get(route('hostel-room-type.edit', $hostelRoomType));

        $response->assertOk();
        $response->assertViewIs('hostelRoomType.edit');
        $response->assertViewHas('hostelRoomType');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HostelRoomTypeController::class,
            'update',
            \App\Http\Requests\HostelRoomTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $hostelRoomType = HostelRoomType::factory()->create();

        $response = $this->put(route('hostel-room-type.update', $hostelRoomType));

        $hostelRoomType->refresh();

        $response->assertRedirect(route('hostelRoomType.index'));
        $response->assertSessionHas('hostelRoomType.id', $hostelRoomType->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $hostelRoomType = HostelRoomType::factory()->create();

        $response = $this->delete(route('hostel-room-type.destroy', $hostelRoomType));

        $response->assertRedirect(route('hostelRoomType.index'));

        $this->assertModelMissing($hostelRoomType);
    }
}
