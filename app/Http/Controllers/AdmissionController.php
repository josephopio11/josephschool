<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $code = env('STUDENT_CODE');

        $admission = $code . date('ymhi');


        return view('admissions.index', compact('admission'));
    }

    public function admit(Request $request)
    {
        dd($request->all());
    }
}
