<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Tutor;
use App\Models\StudentTutor;
use App\Models\Group;
use App\Models\Course;
use App\Models\StudentGroup;
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
        $groups = Group::all();
        $courses = Course::all();

        return view('students.create',compact('title','groups','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        $student = Student::create([
            'enrollment'    =>  self::setEnrollment(),
            'name'          =>  $request->name,
            'lastname'      =>  $request->lastname,
            'birthday'      =>  $request->birthday,
            'gender'        =>  $request->gender,
            'email'         =>  $request->email,
            'address'       =>  $request->address,
            'phonenumber'   =>  $request->phonenumber,
            'payment_type'  =>  $request->payment_type,
        ]);

        $sg = StudentGroup::create([
            'student_id'    =>  $student->id,
            'group_id'      =>  $request->group_id,
        ]);

        if($request->tutor_id != null){
            StudentTutor::create([
                'student_id'    =>  $student->id,
                'tutor_id'      =>  $request->tutor_id,
            ]);
        }

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
        $sg = StudentGroup::where('student_id',$student->id)->first();
        $group = Group::find($sg->group_id);
        $course = Course::find($group->course_id);

        $tutor = null;
        $st = StudentTutor::where('student_id',$student->id)->first();
        if($st != null){
            $tutor = Tutor::find($st->tutor_id);
        }

        return view('students.show',compact('title','student','tutor','group','course'));
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
        $student->fill([
            'name'          =>  $request->name,
            'lastname'      =>  $request->lastname,
            'birthday'      =>  $request->birthday,
            'gender'        =>  $request->gender,
            'email'         =>  $request->email,
            'address'       =>  $request->address,
            'phonenumber'   =>  $request->phonenumber,
            'payment_type'  =>  $request->payment_type,
        ]);
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

    public function setEnrollment(){
        $count = Student::whereYear('created_at',date('Y'))->count();
        $count = $count + 1;

        if(($count / 100) >= 1){
            return date('y').$count;
        }else if(($count / 10) >= 1){
            return date('y').'0'.$count;
        }else{
            return date('y').'00'.$count;
        }
    }
}
