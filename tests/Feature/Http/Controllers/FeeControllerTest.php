<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Fee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FeeController
 */
class FeeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $fees = Fee::factory()->count(3)->create();

        $response = $this->get(route('fee.index'));

        $response->assertOk();
        $response->assertViewIs('fee.index');
        $response->assertViewHas('fees');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('fee.create'));

        $response->assertOk();
        $response->assertViewIs('fee.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FeeController::class,
            'store',
            \App\Http\Requests\FeeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('fee.store'));

        $response->assertRedirect(route('fee.index'));
        $response->assertSessionHas('fee.id', $fee->id);

        $this->assertDatabaseHas(fees, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $fee = Fee::factory()->create();

        $response = $this->get(route('fee.show', $fee));

        $response->assertOk();
        $response->assertViewIs('fee.show');
        $response->assertViewHas('fee');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $fee = Fee::factory()->create();

        $response = $this->get(route('fee.edit', $fee));

        $response->assertOk();
        $response->assertViewIs('fee.edit');
        $response->assertViewHas('fee');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FeeController::class,
            'update',
            \App\Http\Requests\FeeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $fee = Fee::factory()->create();

        $response = $this->put(route('fee.update', $fee));

        $fee->refresh();

        $response->assertRedirect(route('fee.index'));
        $response->assertSessionHas('fee.id', $fee->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $fee = Fee::factory()->create();

        $response = $this->delete(route('fee.destroy', $fee));

        $response->assertRedirect(route('fee.index'));

        $this->assertModelMissing($fee);
    }
}
