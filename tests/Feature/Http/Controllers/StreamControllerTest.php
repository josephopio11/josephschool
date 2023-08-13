<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Stream;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StreamController
 */
class StreamControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $streams = Stream::factory()->count(3)->create();

        $response = $this->get(route('stream.index'));

        $response->assertOk();
        $response->assertViewIs('stream.index');
        $response->assertViewHas('streams');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('stream.create'));

        $response->assertOk();
        $response->assertViewIs('stream.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StreamController::class,
            'store',
            \App\Http\Requests\StreamStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('stream.store'));

        $response->assertRedirect(route('stream.index'));
        $response->assertSessionHas('stream.id', $stream->id);

        $this->assertDatabaseHas(streams, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $stream = Stream::factory()->create();

        $response = $this->get(route('stream.show', $stream));

        $response->assertOk();
        $response->assertViewIs('stream.show');
        $response->assertViewHas('stream');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $stream = Stream::factory()->create();

        $response = $this->get(route('stream.edit', $stream));

        $response->assertOk();
        $response->assertViewIs('stream.edit');
        $response->assertViewHas('stream');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StreamController::class,
            'update',
            \App\Http\Requests\StreamUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $stream = Stream::factory()->create();

        $response = $this->put(route('stream.update', $stream));

        $stream->refresh();

        $response->assertRedirect(route('stream.index'));
        $response->assertSessionHas('stream.id', $stream->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $stream = Stream::factory()->create();

        $response = $this->delete(route('stream.destroy', $stream));

        $response->assertRedirect(route('stream.index'));

        $this->assertModelMissing($stream);
    }
}
