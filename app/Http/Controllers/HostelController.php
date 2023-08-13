<?php

namespace App\Http\Controllers;

use App\Http\Requests\HostelStoreRequest;
use App\Http\Requests\HostelUpdateRequest;
use App\Models\Hostel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HostelController extends Controller
{
    public function index(Request $request): View
    {
        $hostels = Hostel::all();

        return view('hostel.index', compact('hostels'));
    }

    public function create(Request $request): View
    {
        return view('hostel.create');
    }

    public function store(HostelStoreRequest $request): RedirectResponse
    {
        $hostel = Hostel::create($request->validated());

        $request->session()->flash('hostel.id', $hostel->id);

        return redirect()->route('hostel.index');
    }

    public function show(Request $request, Hostel $hostel): View
    {
        return view('hostel.show', compact('hostel'));
    }

    public function edit(Request $request, Hostel $hostel): View
    {
        return view('hostel.edit', compact('hostel'));
    }

    public function update(HostelUpdateRequest $request, Hostel $hostel): RedirectResponse
    {
        $hostel->update($request->validated());

        $request->session()->flash('hostel.id', $hostel->id);

        return redirect()->route('hostel.index');
    }

    public function destroy(Request $request, Hostel $hostel): RedirectResponse
    {
        $hostel->delete();

        return redirect()->route('hostel.index');
    }
}
