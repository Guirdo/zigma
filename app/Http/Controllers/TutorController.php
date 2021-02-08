<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Http\Requests\TutorStoreRequest;
use App\Http\Requests\TutorUpdateRequest;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Tutor managment";
        $tutors = Tutor::simplePaginate(15);

        return view('tutors.index',compact('title','tutors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add new tutor";

        return view('tutors.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TutorStoreRequest $request)
    {
        $tutor = new Tutor();

        $tutor->name = $request->name;
        $tutor->lastname = $request->lastname;
        $tutor->email = $request->email;
        $tutor->gender = $request->gender;
        $tutor->address = $request->address;
        $tutor->phonenumber = $request->phonenumber;

        $tutor->save();

        return redirect()->route('tutors.show',$tutor->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show(Tutor $tutor)
    {
        $title = "Tutor #".$tutor->id;

        return view('tutors.show',compact('title','tutor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutor $tutor)
    {
        $title = "Edit tutor #".$tutor->id;

        return view('tutors.edit',compact('title','tutor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(TutorUpdateRequest $request, Tutor $tutor)
    {
        $tutor->name = $request->name;
        $tutor->lastname = $request->lastname;
        $tutor->email = $request->email;
        $tutor->gender = $request->gender;
        $tutor->address = $request->address;
        $tutor->phonenumber = $request->phonenumber;

        $tutor->save();

        return redirect()->route('tutors.show',$tutor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutor $tutor)
    {
        $tutor->delete();
        
        return response()->json(['redirect'=>'/tutors']);
    }
}
