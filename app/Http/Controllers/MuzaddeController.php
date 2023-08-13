<?php

namespace App\Http\Controllers;

use App\Http\Requests\MuzaddeStoreRequest;
use App\Http\Requests\MuzaddeUpdateRequest;
use App\Models\Muzadde;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MuzaddeController extends Controller
{
    public function index(Request $request): View
    {
        $muzaddes = Muzadde::all();

        return view('muzadde.index', compact('muzaddes'));
    }

    public function create(Request $request): View
    {
        return view('muzadde.create');
    }

    public function store(MuzaddeStoreRequest $request): RedirectResponse
    {
        $muzadde = Muzadde::create($request->validated());

        $request->session()->flash('muzadde.id', $muzadde->id);

        return redirect()->route('muzadde.index');
    }

    public function show(Request $request, Muzadde $muzadde): View
    {
        return view('muzadde.show', compact('muzadde'));
    }

    public function edit(Request $request, Muzadde $muzadde): View
    {
        return view('muzadde.edit', compact('muzadde'));
    }

    public function update(MuzaddeUpdateRequest $request, Muzadde $muzadde): RedirectResponse
    {
        $muzadde->update($request->validated());

        $request->session()->flash('muzadde.id', $muzadde->id);

        return redirect()->route('muzadde.index');
    }

    public function destroy(Request $request, Muzadde $muzadde): RedirectResponse
    {
        $muzadde->delete();

        return redirect()->route('muzadde.index');
    }
}
