<?php

namespace App\Http\Controllers;

use App\Http\Requests\HostelRoomTypeStoreRequest;
use App\Http\Requests\HostelRoomTypeUpdateRequest;
use App\Models\HostelRoomType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HostelRoomTypeController extends Controller
{
    public function index(Request $request): View
    {
        $hostelRoomTypes = HostelRoomType::all();

        return view('hostelRoomType.index', compact('hostelRoomTypes'));
    }

    public function create(Request $request): View
    {
        return view('hostelRoomType.create');
    }

    public function store(HostelRoomTypeStoreRequest $request): RedirectResponse
    {
        $hostelRoomType = HostelRoomType::create($request->validated());

        $request->session()->flash('hostelRoomType.id', $hostelRoomType->id);

        return redirect()->route('hostelRoomType.index');
    }

    public function show(Request $request, HostelRoomType $hostelRoomType): View
    {
        return view('hostelRoomType.show', compact('hostelRoomType'));
    }

    public function edit(Request $request, HostelRoomType $hostelRoomType): View
    {
        return view('hostelRoomType.edit', compact('hostelRoomType'));
    }

    public function update(HostelRoomTypeUpdateRequest $request, HostelRoomType $hostelRoomType): RedirectResponse
    {
        $hostelRoomType->update($request->validated());

        $request->session()->flash('hostelRoomType.id', $hostelRoomType->id);

        return redirect()->route('hostelRoomType.index');
    }

    public function destroy(Request $request, HostelRoomType $hostelRoomType): RedirectResponse
    {
        $hostelRoomType->delete();

        return redirect()->route('hostelRoomType.index');
    }
}
