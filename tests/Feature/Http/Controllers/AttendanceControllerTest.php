<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AttendanceController
 */
class AttendanceControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $attendances = Attendance::factory()->count(3)->create();

        $response = $this->get(route('attendance.index'));

        $response->assertOk();
        $response->assertViewIs('attendance.index');
        $response->assertViewHas('attendances');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('attendance.create'));

        $response->assertOk();
        $response->assertViewIs('attendance.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AttendanceController::class,
            'store',
            \App\Http\Requests\AttendanceStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('attendance.store'));

        $response->assertRedirect(route('attendance.index'));
        $response->assertSessionHas('attendance.id', $attendance->id);

        $this->assertDatabaseHas(attendances, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $attendance = Attendance::factory()->create();

        $response = $this->get(route('attendance.show', $attendance));

        $response->assertOk();
        $response->assertViewIs('attendance.show');
        $response->assertViewHas('attendance');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $attendance = Attendance::factory()->create();

        $response = $this->get(route('attendance.edit', $attendance));

        $response->assertOk();
        $response->assertViewIs('attendance.edit');
        $response->assertViewHas('attendance');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AttendanceController::class,
            'update',
            \App\Http\Requests\AttendanceUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $attendance = Attendance::factory()->create();

        $response = $this->put(route('attendance.update', $attendance));

        $attendance->refresh();

        $response->assertRedirect(route('attendance.index'));
        $response->assertSessionHas('attendance.id', $attendance->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $attendance = Attendance::factory()->create();

        $response = $this->delete(route('attendance.destroy', $attendance));

        $response->assertRedirect(route('attendance.index'));

        $this->assertModelMissing($attendance);
    }
}
