<?php

namespace App\Http\Controllers;

use App\Http\Requests\HostelAllocationStoreRequest;
use App\Http\Requests\HostelAllocationUpdateRequest;
use App\Models\HostelAllocation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HostelAllocationController extends Controller
{
    public function index(Request $request): View
    {
        $hostelAllocations = HostelAllocation::all();

        return view('hostelAllocation.index', compact('hostelAllocations'));
    }

    public function create(Request $request): View
    {
        return view('hostelAllocation.create');
    }

    public function store(HostelAllocationStoreRequest $request): RedirectResponse
    {
        $hostelAllocation = HostelAllocation::create($request->validated());

        $request->session()->flash('hostelAllocation.id', $hostelAllocation->id);

        return redirect()->route('hostelAllocation.index');
    }

    public function show(Request $request, HostelAllocation $hostelAllocation): View
    {
        return view('hostelAllocation.show', compact('hostelAllocation'));
    }

    public function edit(Request $request, HostelAllocation $hostelAllocation): View
    {
        return view('hostelAllocation.edit', compact('hostelAllocation'));
    }

    public function update(HostelAllocationUpdateRequest $request, HostelAllocation $hostelAllocation): RedirectResponse
    {
        $hostelAllocation->update($request->validated());

        $request->session()->flash('hostelAllocation.id', $hostelAllocation->id);

        return redirect()->route('hostelAllocation.index');
    }

    public function destroy(Request $request, HostelAllocation $hostelAllocation): RedirectResponse
    {
        $hostelAllocation->delete();

        return redirect()->route('hostelAllocation.index');
    }
}
