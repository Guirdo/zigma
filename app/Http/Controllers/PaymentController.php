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
        $payment = Payment::create([
            'amount' => $request->amount,
            'surcharge' => $request->surcharge,
            'concept_id' => $request->concept_id,
            'student_id' => $request->student_id,
            'group_id' => $request->group_id,
        ]);

        $payment->folionumber = self::setFolioNumber();
        $payment->save();

        return redirect()->route('payments.show',$payment->folionumber);
    }
    
    public function show($folio)
    {   
        $payment = Payment::where('folionumber',$folio)->first();

        $title = "Receipt #".$payment->folionumber;
        $student = Student::find($payment->student_id);
        $group = Group::find($payment->group_id);
        $course = Course::find($group->course_id);
        $concept = Concept::find($payment->concept_id);

        return view('payments.show',compact('title','payment','student','group','course','concept'));
    }

    private function setFolioNumber(){
        $count = Payment::whereYear('created_at',date('Y'))->count();

        if(($count / 1000) >= 1){
            return 'SA-'.$count.'-'.date('Y');
        }else if(($count / 100) >= 1){
            return 'SA-0'.$count.'-'.date('Y');
        }else if(($count / 10) >= 1){
            return 'SA-00'.$count.'-'.date('Y');
        }else{
            return 'SA-000'.$count.'-'.date('Y');
        }
    }

    public function printPDF(Request $request){
        $payment = Payment::find($request->payment_id);
        $student = Student::find($payment->student_id);
        $group = Group::find($payment->group_id);
        $course = Course::find($group->course_id);
        $concept = Concept::find($payment->concept_id);

        return response()->json([
            'payment'   =>  $payment,
            'student'   =>  $student,
            'group'     =>  $group,
            'course'    =>  $course,
            'concept'   =>  $concept,
        ]);
    }

}
