<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryBookIssueStoreRequest;
use App\Http\Requests\LibraryBookIssueUpdateRequest;
use App\Models\LibraryBookIssue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LibraryBookIssueController extends Controller
{
    public function index(Request $request): View
    {
        $libraryBookIssues = LibraryBookIssue::all();

        return view('libraryBookIssue.index', compact('libraryBookIssues'));
    }

    public function create(Request $request): View
    {
        return view('libraryBookIssue.create');
    }

    public function store(LibraryBookIssueStoreRequest $request): RedirectResponse
    {
        $libraryBookIssue = LibraryBookIssue::create($request->validated());

        $request->session()->flash('libraryBookIssue.id', $libraryBookIssue->id);

        return redirect()->route('libraryBookIssue.index');
    }

    public function show(Request $request, LibraryBookIssue $libraryBookIssue): View
    {
        return view('libraryBookIssue.show', compact('libraryBookIssue'));
    }

    public function edit(Request $request, LibraryBookIssue $libraryBookIssue): View
    {
        return view('libraryBookIssue.edit', compact('libraryBookIssue'));
    }

    public function update(LibraryBookIssueUpdateRequest $request, LibraryBookIssue $libraryBookIssue): RedirectResponse
    {
        $libraryBookIssue->update($request->validated());

        $request->session()->flash('libraryBookIssue.id', $libraryBookIssue->id);

        return redirect()->route('libraryBookIssue.index');
    }

    public function destroy(Request $request, LibraryBookIssue $libraryBookIssue): RedirectResponse
    {
        $libraryBookIssue->delete();

        return redirect()->route('libraryBookIssue.index');
    }
}
