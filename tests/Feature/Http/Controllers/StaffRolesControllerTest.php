<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\StaffRole;
use App\Models\StaffRoles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StaffRolesController
 */
class StaffRolesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $staffRoles = StaffRoles::factory()->count(3)->create();

        $response = $this->get(route('staff-role.index'));

        $response->assertOk();
        $response->assertViewIs('staffRole.index');
        $response->assertViewHas('staffRoles');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('staff-role.create'));

        $response->assertOk();
        $response->assertViewIs('staffRole.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StaffRolesController::class,
            'store',
            \App\Http\Requests\StaffRolesStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('staff-role.store'));

        $response->assertRedirect(route('staffRole.index'));
        $response->assertSessionHas('staffRole.id', $staffRole->id);

        $this->assertDatabaseHas(staffRoles, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $staffRole = StaffRoles::factory()->create();

        $response = $this->get(route('staff-role.show', $staffRole));

        $response->assertOk();
        $response->assertViewIs('staffRole.show');
        $response->assertViewHas('staffRole');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $staffRole = StaffRoles::factory()->create();

        $response = $this->get(route('staff-role.edit', $staffRole));

        $response->assertOk();
        $response->assertViewIs('staffRole.edit');
        $response->assertViewHas('staffRole');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StaffRolesController::class,
            'update',
            \App\Http\Requests\StaffRolesUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $staffRole = StaffRoles::factory()->create();

        $response = $this->put(route('staff-role.update', $staffRole));

        $staffRole->refresh();

        $response->assertRedirect(route('staffRole.index'));
        $response->assertSessionHas('staffRole.id', $staffRole->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $staffRole = StaffRoles::factory()->create();
        $staffRole = StaffRole::factory()->create();

        $response = $this->delete(route('staff-role.destroy', $staffRole));

        $response->assertRedirect(route('staffRole.index'));

        $this->assertModelMissing($staffRole);
    }
}
