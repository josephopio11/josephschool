<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolSessionStoreRequest;
use App\Http\Requests\SchoolSessionUpdateRequest;
use App\Models\SchoolSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolSessionController extends Controller
{
    public function index(Request $request): View
    {
        $schoolSessions = SchoolSession::all();

        return view('schoolSession.index', compact('schoolSessions'));
    }

    public function create(Request $request): View
    {
        return view('schoolSession.create');
    }

    public function store(SchoolSessionStoreRequest $request): RedirectResponse
    {
        $schoolSession = SchoolSession::create($request->validated());

        $request->session()->flash('schoolSession.id', $schoolSession->id);

        return redirect()->route('schoolSession.index');
    }

    public function show(Request $request, SchoolSession $schoolSession): View
    {
        return view('schoolSession.show', compact('schoolSession'));
    }

    public function edit(Request $request, SchoolSession $schoolSession): View
    {
        return view('schoolSession.edit', compact('schoolSession'));
    }

    public function update(SchoolSessionUpdateRequest $request, SchoolSession $schoolSession): RedirectResponse
    {
        $schoolSession->update($request->validated());

        $request->session()->flash('schoolSession.id', $schoolSession->id);

        return redirect()->route('schoolSession.index');
    }

    public function destroy(Request $request, SchoolSession $schoolSession): RedirectResponse
    {
        $schoolSession->delete();

        return redirect()->route('schoolSession.index');
    }
}
