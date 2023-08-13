<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\LibraryBookIssue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LibraryBookIssueController
 */
class LibraryBookIssueControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $libraryBookIssues = LibraryBookIssue::factory()->count(3)->create();

        $response = $this->get(route('library-book-issue.index'));

        $response->assertOk();
        $response->assertViewIs('libraryBookIssue.index');
        $response->assertViewHas('libraryBookIssues');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('library-book-issue.create'));

        $response->assertOk();
        $response->assertViewIs('libraryBookIssue.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LibraryBookIssueController::class,
            'store',
            \App\Http\Requests\LibraryBookIssueStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('library-book-issue.store'));

        $response->assertRedirect(route('libraryBookIssue.index'));
        $response->assertSessionHas('libraryBookIssue.id', $libraryBookIssue->id);

        $this->assertDatabaseHas(libraryBookIssues, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $libraryBookIssue = LibraryBookIssue::factory()->create();

        $response = $this->get(route('library-book-issue.show', $libraryBookIssue));

        $response->assertOk();
        $response->assertViewIs('libraryBookIssue.show');
        $response->assertViewHas('libraryBookIssue');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $libraryBookIssue = LibraryBookIssue::factory()->create();

        $response = $this->get(route('library-book-issue.edit', $libraryBookIssue));

        $response->assertOk();
        $response->assertViewIs('libraryBookIssue.edit');
        $response->assertViewHas('libraryBookIssue');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LibraryBookIssueController::class,
            'update',
            \App\Http\Requests\LibraryBookIssueUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $libraryBookIssue = LibraryBookIssue::factory()->create();

        $response = $this->put(route('library-book-issue.update', $libraryBookIssue));

        $libraryBookIssue->refresh();

        $response->assertRedirect(route('libraryBookIssue.index'));
        $response->assertSessionHas('libraryBookIssue.id', $libraryBookIssue->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $libraryBookIssue = LibraryBookIssue::factory()->create();

        $response = $this->delete(route('library-book-issue.destroy', $libraryBookIssue));

        $response->assertRedirect(route('libraryBookIssue.index'));

        $this->assertModelMissing($libraryBookIssue);
    }
}
