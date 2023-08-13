<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentTypeStoreRequest;
use App\Http\Requests\PaymentTypeUpdateRequest;
use App\Models\PaymentType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentTypeController extends Controller
{
    public function index(Request $request): View
    {
        $paymentTypes = PaymentType::all();

        return view('paymentType.index', compact('paymentTypes'));
    }

    public function create(Request $request): View
    {
        return view('paymentType.create');
    }

    public function store(PaymentTypeStoreRequest $request): RedirectResponse
    {
        $paymentType = PaymentType::create($request->validated());

        $request->session()->flash('paymentType.id', $paymentType->id);

        return redirect()->route('paymentType.index');
    }

    public function show(Request $request, PaymentType $paymentType): View
    {
        return view('paymentType.show', compact('paymentType'));
    }

    public function edit(Request $request, PaymentType $paymentType): View
    {
        return view('paymentType.edit', compact('paymentType'));
    }

    public function update(PaymentTypeUpdateRequest $request, PaymentType $paymentType): RedirectResponse
    {
        $paymentType->update($request->validated());

        $request->session()->flash('paymentType.id', $paymentType->id);

        return redirect()->route('paymentType.index');
    }

    public function destroy(Request $request, PaymentType $paymentType): RedirectResponse
    {
        $paymentType->delete();

        return redirect()->route('paymentType.index');
    }
}
