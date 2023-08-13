<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\LibraryBook;
use App\Models\LibraryBooks;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LibraryBooksController
 */
class LibraryBooksControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $libraryBooks = LibraryBooks::factory()->count(3)->create();

        $response = $this->get(route('library-book.index'));

        $response->assertOk();
        $response->assertViewIs('libraryBook.index');
        $response->assertViewHas('libraryBooks');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('library-book.create'));

        $response->assertOk();
        $response->assertViewIs('libraryBook.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LibraryBooksController::class,
            'store',
            \App\Http\Requests\LibraryBooksStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('library-book.store'));

        $response->assertRedirect(route('libraryBook.index'));
        $response->assertSessionHas('libraryBook.id', $libraryBook->id);

        $this->assertDatabaseHas(libraryBooks, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $libraryBook = LibraryBooks::factory()->create();

        $response = $this->get(route('library-book.show', $libraryBook));

        $response->assertOk();
        $response->assertViewIs('libraryBook.show');
        $response->assertViewHas('libraryBook');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $libraryBook = LibraryBooks::factory()->create();

        $response = $this->get(route('library-book.edit', $libraryBook));

        $response->assertOk();
        $response->assertViewIs('libraryBook.edit');
        $response->assertViewHas('libraryBook');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LibraryBooksController::class,
            'update',
            \App\Http\Requests\LibraryBooksUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $libraryBook = LibraryBooks::factory()->create();

        $response = $this->put(route('library-book.update', $libraryBook));

        $libraryBook->refresh();

        $response->assertRedirect(route('libraryBook.index'));
        $response->assertSessionHas('libraryBook.id', $libraryBook->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $libraryBook = LibraryBooks::factory()->create();
        $libraryBook = LibraryBook::factory()->create();

        $response = $this->delete(route('library-book.destroy', $libraryBook));

        $response->assertRedirect(route('libraryBook.index'));

        $this->assertModelMissing($libraryBook);
    }
}
