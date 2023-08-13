<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Staff;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StaffController
 */
class StaffControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $staff = Staff::factory()->count(3)->create();

        $response = $this->get(route('staff.index'));

        $response->assertOk();
        $response->assertViewIs('staff.index');
        $response->assertViewHas('staff');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('staff.create'));

        $response->assertOk();
        $response->assertViewIs('staff.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StaffController::class,
            'store',
            \App\Http\Requests\StaffStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('staff.store'));

        $response->assertRedirect(route('staff.index'));
        $response->assertSessionHas('staff.id', $staff->id);

        $this->assertDatabaseHas(staff, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $staff = Staff::factory()->create();

        $response = $this->get(route('staff.show', $staff));

        $response->assertOk();
        $response->assertViewIs('staff.show');
        $response->assertViewHas('staff');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $staff = Staff::factory()->create();

        $response = $this->get(route('staff.edit', $staff));

        $response->assertOk();
        $response->assertViewIs('staff.edit');
        $response->assertViewHas('staff');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StaffController::class,
            'update',
            \App\Http\Requests\StaffUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $staff = Staff::factory()->create();

        $response = $this->put(route('staff.update', $staff));

        $staff->refresh();

        $response->assertRedirect(route('staff.index'));
        $response->assertSessionHas('staff.id', $staff->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $staff = Staff::factory()->create();

        $response = $this->delete(route('staff.destroy', $staff));

        $response->assertRedirect(route('staff.index'));

        $this->assertModelMissing($staff);
    }
}
