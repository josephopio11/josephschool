<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtukotStoreRequest;
use App\Http\Requests\AtukotUpdateRequest;
use App\Models\Atukot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AtukotController extends Controller
{
    public function index(Request $request): View
    {
        $atukots = Atukot::all();

        return view('atukot.index', compact('atukots'));
    }

    public function create(Request $request): View
    {
        return view('atukot.create');
    }

    public function store(AtukotStoreRequest $request): RedirectResponse
    {
        $atukot = Atukot::create($request->validated());

        $request->session()->flash('atukot.id', $atukot->id);

        return redirect()->route('atukot.index');
    }

    public function show(Request $request, Atukot $atukot): View
    {
        return view('atukot.show', compact('atukot'));
    }

    public function edit(Request $request, Atukot $atukot): View
    {
        return view('atukot.edit', compact('atukot'));
    }

    public function update(AtukotUpdateRequest $request, Atukot $atukot): RedirectResponse
    {
        $atukot->update($request->validated());

        $request->session()->flash('atukot.id', $atukot->id);

        return redirect()->route('atukot.index');
    }

    public function destroy(Request $request, Atukot $atukot): RedirectResponse
    {
        $atukot->delete();

        return redirect()->route('atukot.index');
    }
}
