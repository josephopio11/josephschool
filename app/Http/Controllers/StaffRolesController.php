<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRolesStoreRequest;
use App\Http\Requests\StaffRolesUpdateRequest;
use App\Models\StaffRoles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StaffRolesController extends Controller
{
    public function index(Request $request): View
    {
        $staffRoles = StaffRole::all();

        return view('staffRole.index', compact('staffRoles'));
    }

    public function create(Request $request): View
    {
        return view('staffRole.create');
    }

    public function store(StaffRolesStoreRequest $request): RedirectResponse
    {
        $staffRole = StaffRole::create($request->validated());

        $request->session()->flash('staffRole.id', $staffRole->id);

        return redirect()->route('staffRole.index');
    }

    public function show(Request $request, StaffRole $staffRole): View
    {
        return view('staffRole.show', compact('staffRole'));
    }

    public function edit(Request $request, StaffRole $staffRole): View
    {
        return view('staffRole.edit', compact('staffRole'));
    }

    public function update(StaffRolesUpdateRequest $request, StaffRole $staffRole): RedirectResponse
    {
        $staffRole->update($request->validated());

        $request->session()->flash('staffRole.id', $staffRole->id);

        return redirect()->route('staffRole.index');
    }

    public function destroy(Request $request, StaffRole $staffRole): RedirectResponse
    {
        $staffRole->delete();

        return redirect()->route('staffRole.index');
    }
}
