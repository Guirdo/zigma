<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Payment;
use App\Models\Group;
use App\Models\StudentGroup;
use App\Models\Course;
use App\Models\Concept;
use App\Http\Requests\PaymentStoreRequest;
use DB;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $title = "Payment managment";
        $students = Student::select('id','name','lastname')->simplePaginate(15);
        /*
        $firstpayments = DB::table('students')->select('students.id','name','lastname')
                    ->join('student_groups','student_groups.student_id','students.id')
                    ->join('groups','groups.id','student_groups.group_id')
                    ->where('groups.firstdate','>=',date('Y-m-d'))
                    ->where(function($query){
                        $query->select(DB::raw('count(*)'))
                        ->from('payments')
                        ->where('student_id');
                    },0)
                    ->get();
        */

        return view('payments.index',compact('title','students'));
    }

    public function pay(Student $student){
        $title = "Payment";
        $sg = StudentGroup::where('student_id',$student->id)->first();
        $group = Group::find($sg->group_id);
        $course = Course::find($group->course_id);
        $concepts = Concept::all();

        $amount = $student->payment_type == 'weekly' ? $course->weeklycost : $course->monthlycost;

        return view('payments.create',compact('title','student','group','course','concepts','amount'));
    }

    public function store(PaymentStoreRequest $request){
        $payment = new Payment();

        $payment->concept = $request->concept;
        $payment->amount = $request->amount;
        $payment->surcharge = $request->surcharge;
        $payment->student_id = $request->student_id;
        $payment->group_id = $request->group_id;

        $payment->save();

        return redirect()->route('payments.show',$payment);
    }
    
    public function show(Payment $payment)
    {
        $title = "Receipt #".$payment->id;
        $student = Student::find($payment->student_id);
        $group = Group::find($payment->group_id);

        return view('payments.show',compact('title','payment','student','group'));
    }

}
