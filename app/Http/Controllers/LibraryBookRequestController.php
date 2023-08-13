<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryBookRequestStoreRequest;
use App\Http\Requests\LibraryBookRequestUpdateRequest;
use App\Models\LibraryBookRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LibraryBookRequestController extends Controller
{
    public function index(Request $request): View
    {
        $libraryBookRequests = LibraryBookRequest::all();

        return view('libraryBookRequest.index', compact('libraryBookRequests'));
    }

    public function create(Request $request): View
    {
        return view('libraryBookRequest.create');
    }

    public function store(LibraryBookRequestStoreRequest $request): RedirectResponse
    {
        $libraryBookRequest = LibraryBookRequest::create($request->validated());

        $request->session()->flash('libraryBookRequest.id', $libraryBookRequest->id);

        return redirect()->route('libraryBookRequest.index');
    }

    public function show(Request $request, LibraryBookRequest $libraryBookRequest): View
    {
        return view('libraryBookRequest.show', compact('libraryBookRequest'));
    }

    public function edit(Request $request, LibraryBookRequest $libraryBookRequest): View
    {
        return view('libraryBookRequest.edit', compact('libraryBookRequest'));
    }

    public function update(LibraryBookRequestUpdateRequest $request, LibraryBookRequest $libraryBookRequest): RedirectResponse
    {
        $libraryBookRequest->update($request->validated());

        $request->session()->flash('libraryBookRequest.id', $libraryBookRequest->id);

        return redirect()->route('libraryBookRequest.index');
    }

    public function destroy(Request $request, LibraryBookRequest $libraryBookRequest): RedirectResponse
    {
        $libraryBookRequest->delete();

        return redirect()->route('libraryBookRequest.index');
    }
}
