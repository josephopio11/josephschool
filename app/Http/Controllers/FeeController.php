<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeeStoreRequest;
use App\Http\Requests\FeeUpdateRequest;
use App\Models\Fee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeeController extends Controller
{
    public function index(Request $request): View
    {
        $fees = Fee::all();

        return view('fee.index', compact('fees'));
    }

    public function create(Request $request): View
    {
        return view('fee.create');
    }

    public function store(FeeStoreRequest $request): RedirectResponse
    {
        $fee = Fee::create($request->validated());

        $request->session()->flash('fee.id', $fee->id);

        return redirect()->route('fee.index');
    }

    public function show(Request $request, Fee $fee): View
    {
        return view('fee.show', compact('fee'));
    }

    public function edit(Request $request, Fee $fee): View
    {
        return view('fee.edit', compact('fee'));
    }

    public function update(FeeUpdateRequest $request, Fee $fee): RedirectResponse
    {
        $fee->update($request->validated());

        $request->session()->flash('fee.id', $fee->id);

        return redirect()->route('fee.index');
    }

    public function destroy(Request $request, Fee $fee): RedirectResponse
    {
        $fee->delete();

        return redirect()->route('fee.index');
    }
}
