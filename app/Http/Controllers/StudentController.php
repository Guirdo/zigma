<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Student managment";
        $students = Student::simplePaginate(15);

        return view('students.index',compact('title','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add student";

        return view('students.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        $student = new Student();

        $student->name = $request->name;
        $student->lastname = $request->lastname;
        $student->birthday = $request->birthday;
        $student->gender = $request->gender;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->phonenumber = $request->phonenumber;

        $student->save();

        return redirect()->route('students.show',$student->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $title = "Student #".$student->id;

        return view('students.show',compact('title','student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $title = "Edit student #".$student->id;

        return view('students.edit',compact('title','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $student->name = $request->name;
        $student->lastname = $request->lastname;
        $student->birthday = $request->birthday;
        $student->gender = $request->gender;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->phonenumber = $request->phonenumber;

        $student->save();

        return redirect()->route('students.show',$student->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(['redirect'=>'/students']);
    }
}
