<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return view("dashboard")->with('students', $students);
    }

    public function addStudent(Request $request)
    {
        $name = $request->input('name');
        $course = $request->input('course');

        $student = new Student();

        $student->name = strtoupper($request->name);
        $student->course = strtoupper($request->course);
        $student->save();

        return redirect()->route('dashboard')->with('success', 'Student Added');
    }

    public function editStudent(Request $request)
    {
        $id = $request->id;
        $decryptedId = Crypt::decryptString($id);
        $student = Student::findOrFail($decryptedId);

        return view("edit-student", compact('student'));
    }

    public function update(Request $request, $id)
    {

        $student = Student::findOrFail($id);

        $student->name = strtoupper($request->name);
        $student->course = strtoupper($request->course);
        $student->save();

        return redirect()->route('dashboard')->with('success', 'Student Updated');
    }

    public function delete(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()->route('dashboard')->with('success', 'Student Deleted');
    }

}
