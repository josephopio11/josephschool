<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomBookingStoreRequest;
use App\Http\Requests\ClassroomBookingUpdateRequest;
use App\Models\ClassroomBooking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassroomBookingController extends Controller
{
    public function index(Request $request): View
    {
        $classroomBookings = ClassroomBooking::all();

        return view('classroomBooking.index', compact('classroomBookings'));
    }

    public function create(Request $request): View
    {
        return view('classroomBooking.create');
    }

    public function store(ClassroomBookingStoreRequest $request): RedirectResponse
    {
        $classroomBooking = ClassroomBooking::create($request->validated());

        $request->session()->flash('classroomBooking.id', $classroomBooking->id);

        return redirect()->route('classroomBooking.index');
    }

    public function show(Request $request, ClassroomBooking $classroomBooking): View
    {
        return view('classroomBooking.show', compact('classroomBooking'));
    }

    public function edit(Request $request, ClassroomBooking $classroomBooking): View
    {
        return view('classroomBooking.edit', compact('classroomBooking'));
    }

    public function update(ClassroomBookingUpdateRequest $request, ClassroomBooking $classroomBooking): RedirectResponse
    {
        $classroomBooking->update($request->validated());

        $request->session()->flash('classroomBooking.id', $classroomBooking->id);

        return redirect()->route('classroomBooking.index');
    }

    public function destroy(Request $request, ClassroomBooking $classroomBooking): RedirectResponse
    {
        $classroomBooking->delete();

        return redirect()->route('classroomBooking.index');
    }
}
