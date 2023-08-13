<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentTypeStoreRequest;
use App\Http\Requests\AssessmentTypeUpdateRequest;
use App\Models\AssessmentType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssessmentTypeController extends Controller
{
    public function index(Request $request): View
    {
        $assessmentTypes = AssessmentType::all();

        return view('assessmentType.index', compact('assessmentTypes'));
    }

    public function create(Request $request): View
    {
        return view('assessmentType.create');
    }

    public function store(AssessmentTypeStoreRequest $request): RedirectResponse
    {
        $assessmentType = AssessmentType::create($request->validated());

        $request->session()->flash('assessmentType.id', $assessmentType->id);

        return redirect()->route('assessmentType.index');
    }

    public function show(Request $request, AssessmentType $assessmentType): View
    {
        return view('assessmentType.show', compact('assessmentType'));
    }

    public function edit(Request $request, AssessmentType $assessmentType): View
    {
        return view('assessmentType.edit', compact('assessmentType'));
    }

    public function update(AssessmentTypeUpdateRequest $request, AssessmentType $assessmentType): RedirectResponse
    {
        $assessmentType->update($request->validated());

        $request->session()->flash('assessmentType.id', $assessmentType->id);

        return redirect()->route('assessmentType.index');
    }

    public function destroy(Request $request, AssessmentType $assessmentType): RedirectResponse
    {
        $assessmentType->delete();

        return redirect()->route('assessmentType.index');
    }
}
