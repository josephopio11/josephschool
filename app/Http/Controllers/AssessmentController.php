<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentStoreRequest;
use App\Http\Requests\AssessmentUpdateRequest;
use App\Models\Assessment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssessmentController extends Controller
{
    public function index(Request $request): View
    {
        $assessments = Assessment::all();

        return view('assessment.index', compact('assessments'));
    }

    public function create(Request $request): View
    {
        return view('assessment.create');
    }

    public function store(AssessmentStoreRequest $request): RedirectResponse
    {
        $assessment = Assessment::create($request->validated());

        $request->session()->flash('assessment.id', $assessment->id);

        return redirect()->route('assessment.index');
    }

    public function show(Request $request, Assessment $assessment): View
    {
        return view('assessment.show', compact('assessment'));
    }

    public function edit(Request $request, Assessment $assessment): View
    {
        return view('assessment.edit', compact('assessment'));
    }

    public function update(AssessmentUpdateRequest $request, Assessment $assessment): RedirectResponse
    {
        $assessment->update($request->validated());

        $request->session()->flash('assessment.id', $assessment->id);

        return redirect()->route('assessment.index');
    }

    public function destroy(Request $request, Assessment $assessment): RedirectResponse
    {
        $assessment->delete();

        return redirect()->route('assessment.index');
    }
}
