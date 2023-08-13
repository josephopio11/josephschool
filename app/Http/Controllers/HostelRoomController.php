<?php

namespace App\Http\Controllers;

use App\Http\Requests\HostelRoomStoreRequest;
use App\Http\Requests\HostelRoomUpdateRequest;
use App\Models\HostelRoom;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HostelRoomController extends Controller
{
    public function index(Request $request): View
    {
        $hostelRooms = HostelRoom::all();

        return view('hostelRoom.index', compact('hostelRooms'));
    }

    public function create(Request $request): View
    {
        return view('hostelRoom.create');
    }

    public function store(HostelRoomStoreRequest $request): RedirectResponse
    {
        $hostelRoom = HostelRoom::create($request->validated());

        $request->session()->flash('hostelRoom.id', $hostelRoom->id);

        return redirect()->route('hostelRoom.index');
    }

    public function show(Request $request, HostelRoom $hostelRoom): View
    {
        return view('hostelRoom.show', compact('hostelRoom'));
    }

    public function edit(Request $request, HostelRoom $hostelRoom): View
    {
        return view('hostelRoom.edit', compact('hostelRoom'));
    }

    public function update(HostelRoomUpdateRequest $request, HostelRoom $hostelRoom): RedirectResponse
    {
        $hostelRoom->update($request->validated());

        $request->session()->flash('hostelRoom.id', $hostelRoom->id);

        return redirect()->route('hostelRoom.index');
    }

    public function destroy(Request $request, HostelRoom $hostelRoom): RedirectResponse
    {
        $hostelRoom->delete();

        return redirect()->route('hostelRoom.index');
    }
}
