<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ClassroomBooking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ClassroomBookingController
 */
class ClassroomBookingControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $classroomBookings = ClassroomBooking::factory()->count(3)->create();

        $response = $this->get(route('classroom-booking.index'));

        $response->assertOk();
        $response->assertViewIs('classroomBooking.index');
        $response->assertViewHas('classroomBookings');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('classroom-booking.create'));

        $response->assertOk();
        $response->assertViewIs('classroomBooking.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClassroomBookingController::class,
            'store',
            \App\Http\Requests\ClassroomBookingStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('classroom-booking.store'));

        $response->assertRedirect(route('classroomBooking.index'));
        $response->assertSessionHas('classroomBooking.id', $classroomBooking->id);

        $this->assertDatabaseHas(classroomBookings, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $classroomBooking = ClassroomBooking::factory()->create();

        $response = $this->get(route('classroom-booking.show', $classroomBooking));

        $response->assertOk();
        $response->assertViewIs('classroomBooking.show');
        $response->assertViewHas('classroomBooking');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $classroomBooking = ClassroomBooking::factory()->create();

        $response = $this->get(route('classroom-booking.edit', $classroomBooking));

        $response->assertOk();
        $response->assertViewIs('classroomBooking.edit');
        $response->assertViewHas('classroomBooking');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClassroomBookingController::class,
            'update',
            \App\Http\Requests\ClassroomBookingUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $classroomBooking = ClassroomBooking::factory()->create();

        $response = $this->put(route('classroom-booking.update', $classroomBooking));

        $classroomBooking->refresh();

        $response->assertRedirect(route('classroomBooking.index'));
        $response->assertSessionHas('classroomBooking.id', $classroomBooking->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $classroomBooking = ClassroomBooking::factory()->create();

        $response = $this->delete(route('classroom-booking.destroy', $classroomBooking));

        $response->assertRedirect(route('classroomBooking.index'));

        $this->assertModelMissing($classroomBooking);
    }
}
