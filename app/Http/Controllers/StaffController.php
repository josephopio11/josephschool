<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffStoreRequest;
use App\Http\Requests\StaffUpdateRequest;
use App\Models\Staff;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StaffController extends Controller
{
    public function index(Request $request): View
    {
        $staff = Staff::all();

        return view('staff.index', compact('staff'));
    }

    public function create(Request $request): View
    {
        return view('staff.create');
    }

    public function store(StaffStoreRequest $request): RedirectResponse
    {
        $staff = Staff::create($request->validated());

        $request->session()->flash('staff.id', $staff->id);

        return redirect()->route('staff.index');
    }

    public function show(Request $request, Staff $staff): View
    {
        return view('staff.show', compact('staff'));
    }

    public function edit(Request $request, Staff $staff): View
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(StaffUpdateRequest $request, Staff $staff): RedirectResponse
    {
        $staff->update($request->validated());

        $request->session()->flash('staff.id', $staff->id);

        return redirect()->route('staff.index');
    }

    public function destroy(Request $request, Staff $staff): RedirectResponse
    {
        $staff->delete();

        return redirect()->route('staff.index');
    }
}
