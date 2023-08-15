<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdmissionController extends Controller
{
    public function index()
    {
        $students = Student::where('is_active', 0)->get();

        // dd($students);

        return view('admissions.index', compact('students'));

    }

    public function create()
    {
        $code = env('STUDENT_CODE');
        if(date('m' < 7)) {
            $sess = 1;
        } else {
            $sess = 2;
        }

        $appended = date('m') * 70 + date('h') * 60 + date('i') * 50 + date('s');

        $admission = $code. $sess . date('y') . $appended;

        // dd($admission);

        return view('admissions.create', compact('admission'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $student = new Student();

        $student->admission_number = $request->admission_number;
        $student->admission_date = $request->admission_date;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->alternate_phone = $request->alternate_phone;
        $student->email = $request->email;
        $student->photo = $request->photo;
        $request->is_active ? $student->is_active = 1 : $student->is_active = 0;
        $student->last_active = $request->last_active;
        $student->previous_school = $request->previous_school;
        $request->has_sibling ? $student->has_sibling = 1 : $student->has_sibling = 0;
        $request->can_login ? $student->can_login = 1 : $student->can_login = 0;
        $student->password = Hash::make($request->password);

        // dd($student);

        $student->save();

        return redirect()->route('admission.index')->with('success', 'Student admitted successfully');
    }

    public function regparent(Request $request)
    {
        dd($request->all());
    }
}
