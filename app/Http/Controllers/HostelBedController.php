<?php

namespace App\Http\Controllers;

use App\Http\Requests\HostelBedStoreRequest;
use App\Http\Requests\HostelBedUpdateRequest;
use App\Models\HostelBed;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HostelBedController extends Controller
{
    public function index(Request $request): View
    {
        $hostelBeds = HostelBed::all();

        return view('hostelBed.index', compact('hostelBeds'));
    }

    public function create(Request $request): View
    {
        return view('hostelBed.create');
    }

    public function store(HostelBedStoreRequest $request): RedirectResponse
    {
        $hostelBed = HostelBed::create($request->validated());

        $request->session()->flash('hostelBed.id', $hostelBed->id);

        return redirect()->route('hostelBed.index');
    }

    public function show(Request $request, HostelBed $hostelBed): View
    {
        return view('hostelBed.show', compact('hostelBed'));
    }

    public function edit(Request $request, HostelBed $hostelBed): View
    {
        return view('hostelBed.edit', compact('hostelBed'));
    }

    public function update(HostelBedUpdateRequest $request, HostelBed $hostelBed): RedirectResponse
    {
        $hostelBed->update($request->validated());

        $request->session()->flash('hostelBed.id', $hostelBed->id);

        return redirect()->route('hostelBed.index');
    }

    public function destroy(Request $request, HostelBed $hostelBed): RedirectResponse
    {
        $hostelBed->delete();

        return redirect()->route('hostelBed.index');
    }
}
