<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller {

    public function index() {
        $students = Student::all();
        return view('index', compact('students'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {

        if($request->input('action') == 'Add') {
            $storeData = $this->validateStudent($request);
            $student = new Student($storeData);
            $student->save();
        }

        return redirect(route('student.index'))->with('completed', 'Student has been saved!');
    }


    public function show(Student $student) {
        return view('show', $student);
    }

    public function edit(Student $student) {
        return view('edit', compact('student'));
    }


    public function update(Request $request, Student $student) {
        $updateData = $this->validateStudent($request);
        $student->update($updateData);

        return redirect(route('student.index'))->with('completed', 'Student has been updated');
    }

    public function destroy(Student $student) {
        $student->delete();

        return redirect('/student')->with('completed', 'Student has been deleted');
    }

    private function validateStudent(Request $request) {
        return $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
            'password' => 'required|max:255',
        ]);
    }
}
