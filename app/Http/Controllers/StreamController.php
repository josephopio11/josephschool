<?php

namespace App\Http\Controllers;

use App\Http\Requests\StreamStoreRequest;
use App\Http\Requests\StreamUpdateRequest;
use App\Models\Stream;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StreamController extends Controller
{
    public function index(Request $request): View
    {
        $streams = Stream::all();

        return view('stream.index', compact('streams'));
    }

    public function create(Request $request): View
    {
        return view('stream.create');
    }

    public function store(StreamStoreRequest $request): RedirectResponse
    {
        $stream = Stream::create($request->validated());

        $request->session()->flash('stream.id', $stream->id);

        return redirect()->route('stream.index');
    }

    public function show(Request $request, Stream $stream): View
    {
        return view('stream.show', compact('stream'));
    }

    public function edit(Request $request, Stream $stream): View
    {
        return view('stream.edit', compact('stream'));
    }

    public function update(StreamUpdateRequest $request, Stream $stream): RedirectResponse
    {
        $stream->update($request->validated());

        $request->session()->flash('stream.id', $stream->id);

        return redirect()->route('stream.index');
    }

    public function destroy(Request $request, Stream $stream): RedirectResponse
    {
        $stream->delete();

        return redirect()->route('stream.index');
    }
}
