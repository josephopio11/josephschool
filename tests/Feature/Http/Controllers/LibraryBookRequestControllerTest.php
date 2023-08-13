<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\LibraryBookRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LibraryBookRequestController
 */
class LibraryBookRequestControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $libraryBookRequests = LibraryBookRequest::factory()->count(3)->create();

        $response = $this->get(route('library-book-request.index'));

        $response->assertOk();
        $response->assertViewIs('libraryBookRequest.index');
        $response->assertViewHas('libraryBookRequests');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('library-book-request.create'));

        $response->assertOk();
        $response->assertViewIs('libraryBookRequest.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LibraryBookRequestController::class,
            'store',
            \App\Http\Requests\LibraryBookRequestStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('library-book-request.store'));

        $response->assertRedirect(route('libraryBookRequest.index'));
        $response->assertSessionHas('libraryBookRequest.id', $libraryBookRequest->id);

        $this->assertDatabaseHas(libraryBookRequests, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $libraryBookRequest = LibraryBookRequest::factory()->create();

        $response = $this->get(route('library-book-request.show', $libraryBookRequest));

        $response->assertOk();
        $response->assertViewIs('libraryBookRequest.show');
        $response->assertViewHas('libraryBookRequest');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $libraryBookRequest = LibraryBookRequest::factory()->create();

        $response = $this->get(route('library-book-request.edit', $libraryBookRequest));

        $response->assertOk();
        $response->assertViewIs('libraryBookRequest.edit');
        $response->assertViewHas('libraryBookRequest');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LibraryBookRequestController::class,
            'update',
            \App\Http\Requests\LibraryBookRequestUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $libraryBookRequest = LibraryBookRequest::factory()->create();

        $response = $this->put(route('library-book-request.update', $libraryBookRequest));

        $libraryBookRequest->refresh();

        $response->assertRedirect(route('libraryBookRequest.index'));
        $response->assertSessionHas('libraryBookRequest.id', $libraryBookRequest->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $libraryBookRequest = LibraryBookRequest::factory()->create();

        $response = $this->delete(route('library-book-request.destroy', $libraryBookRequest));

        $response->assertRedirect(route('libraryBookRequest.index'));

        $this->assertModelMissing($libraryBookRequest);
    }
}
