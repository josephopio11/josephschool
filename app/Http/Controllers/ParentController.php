<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParentStoreRequest;
use App\Http\Requests\ParentUpdateRequest;
use App\Models\Parent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ParentController extends Controller
{
    public function index(Request $request): View
    {
        $parents = Parent::all();

        return view('parent.index', compact('parents'));
    }

    public function create(Request $request): View
    {
        return view('parent.create');
    }

    public function store(ParentStoreRequest $request): RedirectResponse
    {
        $parent = Parent::create($request->validated());

        $request->session()->flash('parent.id', $parent->id);

        return redirect()->route('parent.index');
    }

    public function show(Request $request, Parent $parent): View
    {
        return view('parent.show', compact('parent'));
    }

    public function edit(Request $request, Parent $parent): View
    {
        return view('parent.edit', compact('parent'));
    }

    public function update(ParentUpdateRequest $request, Parent $parent): RedirectResponse
    {
        $parent->update($request->validated());

        $request->session()->flash('parent.id', $parent->id);

        return redirect()->route('parent.index');
    }

    public function destroy(Request $request, Parent $parent): RedirectResponse
    {
        $parent->delete();

        return redirect()->route('parent.index');
    }
}
