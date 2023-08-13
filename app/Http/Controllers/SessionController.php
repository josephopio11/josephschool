<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionStoreRequest;
use App\Http\Requests\SessionUpdateRequest;
use App\Models\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SessionController extends Controller
{
    public function index(Request $request): View
    {
        $sessions = Session::all();

        return view('session.index', compact('sessions'));
    }

    public function create(Request $request): View
    {
        return view('session.create');
    }

    public function store(SessionStoreRequest $request): RedirectResponse
    {
        $session = Session::create($request->validated());

        $request->session()->flash('session.id', $session->id);

        return redirect()->route('session.index');
    }

    public function show(Request $request, Session $session): View
    {
        return view('session.show', compact('session'));
    }

    public function edit(Request $request, Session $session): View
    {
        return view('session.edit', compact('session'));
    }

    public function update(SessionUpdateRequest $request, Session $session): RedirectResponse
    {
        $session->update($request->validated());

        $request->session()->flash('session.id', $session->id);

        return redirect()->route('session.index');
    }

    public function destroy(Request $request, Session $session): RedirectResponse
    {
        $session->delete();

        return redirect()->route('session.index');
    }
}
