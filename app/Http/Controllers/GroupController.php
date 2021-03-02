<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Course;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\GroupStoreRequest;
use App\Http\Requests\GroupUpdateRequest;
use DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.EmployeeStoreRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Group managment";
        $groups = Group::simplePaginate(15);
        $courses = Course::all();

        return view('groups.index',compact('title','groups','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add group";
        $courses = Course::all();

        return view('groups.create',compact('title','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupStoreRequest $request)
    {
        $group = new Group();

        $group->days = $request->days;
        $group->starthour = $request->starthour;
        $group->finalhour = $request->finalhour;
        $group->firstdate = $request->firstdate;
        $group->teacher_id = $request->teacher_id;
        $group->course_id = $request->course_id;

        $group->save();

        return redirect()->route('groups.show',$group->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $title = 'Group #'.$group->id;
        $teacher = Employee::find($group->teacher_id);
        $course = Course::find($group->course_id);

        $students = DB::table('students')->select('students.id','name','lastname')
                    ->leftJoin('student_groups','students.id','student_groups.student_id')
                    ->leftJoin('groups','student_groups.group_id','groups.id')
                    ->where('groups.id',$group->id)->get();
        
        return view('groups.show',compact('title','group','teacher','course','students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $title = "Edit group #".$group->id;
        $teacher = Employee::find($group->teacher_id);
        $courses = Course::all();

        return view('groups.edit',compact('title','group','teacher','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(GroupUpdateRequest $request, Group $group)
    {
        $group->days = $request->days;
        $group->starthour = $request->starthour;
        $group->finalhour = $request->finalhour;
        $group->firstdate = $request->firstdate;
        $group->teacher_id = $request->teacher_id;
        $group->course_id = $request->course_id;

        $group->save();

        return redirect()->route('groups.show',$group->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }

}
