<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PaymentController
 */
class PaymentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $payments = Payment::factory()->count(3)->create();

        $response = $this->get(route('payment.index'));

        $response->assertOk();
        $response->assertViewIs('payment.index');
        $response->assertViewHas('payments');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('payment.create'));

        $response->assertOk();
        $response->assertViewIs('payment.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PaymentController::class,
            'store',
            \App\Http\Requests\PaymentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('payment.store'));

        $response->assertRedirect(route('payment.index'));
        $response->assertSessionHas('payment.id', $payment->id);

        $this->assertDatabaseHas(payments, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $payment = Payment::factory()->create();

        $response = $this->get(route('payment.show', $payment));

        $response->assertOk();
        $response->assertViewIs('payment.show');
        $response->assertViewHas('payment');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $payment = Payment::factory()->create();

        $response = $this->get(route('payment.edit', $payment));

        $response->assertOk();
        $response->assertViewIs('payment.edit');
        $response->assertViewHas('payment');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PaymentController::class,
            'update',
            \App\Http\Requests\PaymentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $payment = Payment::factory()->create();

        $response = $this->put(route('payment.update', $payment));

        $payment->refresh();

        $response->assertRedirect(route('payment.index'));
        $response->assertSessionHas('payment.id', $payment->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $payment = Payment::factory()->create();

        $response = $this->delete(route('payment.destroy', $payment));

        $response->assertRedirect(route('payment.index'));

        $this->assertModelMissing($payment);
    }
}
