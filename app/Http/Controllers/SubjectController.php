<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectStoreRequest;
use App\Http\Requests\SubjectUpdateRequest;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubjectController extends Controller
{
    public function index(Request $request): View
    {
        $subjects = Subject::all();

        return view('subject.index', compact('subjects'));
    }

    public function create(Request $request): View
    {
        return view('subject.create');
    }

    public function store(SubjectStoreRequest $request): RedirectResponse
    {
        $subject = Subject::create($request->validated());

        $request->session()->flash('subject.id', $subject->id);

        return redirect()->route('subject.index');
    }

    public function show(Request $request, Subject $subject): View
    {
        return view('subject.show', compact('subject'));
    }

    public function edit(Request $request, Subject $subject): View
    {
        return view('subject.edit', compact('subject'));
    }

    public function update(SubjectUpdateRequest $request, Subject $subject): RedirectResponse
    {
        $subject->update($request->validated());

        $request->session()->flash('subject.id', $subject->id);

        return redirect()->route('subject.index');
    }

    public function destroy(Request $request, Subject $subject): RedirectResponse
    {
        $subject->delete();

        return redirect()->route('subject.index');
    }
}
