<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryBooksStoreRequest;
use App\Http\Requests\LibraryBooksUpdateRequest;
use App\Models\LibraryBooks;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LibraryBooksController extends Controller
{
    public function index(Request $request): View
    {
        $libraryBooks = LibraryBook::all();

        return view('libraryBook.index', compact('libraryBooks'));
    }

    public function create(Request $request): View
    {
        return view('libraryBook.create');
    }

    public function store(LibraryBooksStoreRequest $request): RedirectResponse
    {
        $libraryBook = LibraryBook::create($request->validated());

        $request->session()->flash('libraryBook.id', $libraryBook->id);

        return redirect()->route('libraryBook.index');
    }

    public function show(Request $request, LibraryBook $libraryBook): View
    {
        return view('libraryBook.show', compact('libraryBook'));
    }

    public function edit(Request $request, LibraryBook $libraryBook): View
    {
        return view('libraryBook.edit', compact('libraryBook'));
    }

    public function update(LibraryBooksUpdateRequest $request, LibraryBook $libraryBook): RedirectResponse
    {
        $libraryBook->update($request->validated());

        $request->session()->flash('libraryBook.id', $libraryBook->id);

        return redirect()->route('libraryBook.index');
    }

    public function destroy(Request $request, LibraryBook $libraryBook): RedirectResponse
    {
        $libraryBook->delete();

        return redirect()->route('libraryBook.index');
    }
}
