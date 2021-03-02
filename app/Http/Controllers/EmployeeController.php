<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeType;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Employee managment";
        $employees = Employee::simplePaginate(15);

        return view('employees.index',compact('title','employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add employee";
        $employeetypes = EmployeeType::all();

        return view('employees.create',compact('title','employeetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        $employee = new Employee();

        $employee->name = $request->name;
        $employee->lastname = $request->lastname;
        $employee->gender = $request->gender;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->phonenumber = $request->phonenumber;
        $employee->employee_type_id = $request->employeetype;

        $employee->save();

        return redirect()->route('employees.show',$employee->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $title = "Employee #".$employee->id;
        $employeetype = EmployeeType::find($employee->employee_type_id);

        return view('employees.show',compact('title','employee','employeetype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $title = "Edit employee #".$employee->id;
        $employeetypes = EmployeeType::all();

        return view('employees.edit',compact('title','employee','employeetypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $employee->name = $request->name;
        $employee->lastname = $request->lastname;
        $employee->gender = $request->gender;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->phonenumber = $request->phonenumber;
        $employee->employee_type_id = $request->employeetype;

        $employee->save();

        return redirect()->route('employees.show',$employee->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(['redirect'=>'/employees']);
    }

    public function search(Request $request){
        $lastname = $request->input;
        $employees = Employee::where('lastname','like',$lastname.'%')->get();
        $employeetypes = [];

        foreach($employees as $emp){
            $et = EmployeeType::find($emp->employee_type_id);
            array_push($employeetypes,$et);
        }

        return response()->json(['employees'=>$employees,'employeetypes'=>$employeetypes]);
    }

    public function searchTeacher(Request $request){
        $lastname = $request->input;
        $teachers = Employee::where('lastname','like',$lastname.'%')
                        ->where('employee_type_id',3)
                        ->orWhere('id',1)->get();

        return response()->json(['teachers'=>$teachers]);
    }
}
