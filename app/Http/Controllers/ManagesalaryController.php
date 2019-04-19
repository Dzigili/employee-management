<?php

namespace App\Http\Controllers;


use App\Advancepayment;
use App\Designation;
use App\Managesalary;
use App\Salary;
use App\User;
use App\Leave;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagesalaryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.managesalary.index',compact('users'));
    }

    public function detail(Request $request,$id)
    {

//        if($request->startdate){
//            $advance=Advancepayment::where('date',$request->startdate)->get();
//        }else{
//            $advance = Advancepayment::all();
//        }

        $from = $request->input('startdate');
        $to = $request->input('enddate');
        if ( empty($to) && empty($from) ) {
            $advance = Advancepayment::where('employee_id','=',$id)->get() ;
        } elseif ( empty($to) && ! empty($from) ) {
            $advance = Advancepayment::where('date', $from)->where('employee_id','=',$id);
        } else {
            $advance = Advancepayment::whereBetween('date', [$from, $to])->where('employee_id','=',$id)->get();
        }
//        dd($advance);
        $designation = Designation::find($id);
        if(!$designation){
            return redirect(route('designation.create'));
        }
////        dd(sum($advance->amount));
//        $a=[];
//        foreach($advance as $advances){
//            array_push($a,$advances->amount);
//        dd($a);

        $des = $designation -> designation_type;
        $user=User::find($id);
        $amt = $user->salary;
        $employee_name = $designation -> userss->username;
//To count the leaves of the employee
//where('employee_id',$id) -> employee_id is from leaves db and $id is from detail(Request $request,$id)
        $total_leaves=Leave::where('employee_id',$id)->where('is_approved',1)->count();
        return view('admin.managesalary.detail',compact('amt','des','employee_name','user','advance','total_leaves'));
    }

    public function salarylist()
    {
        $users = Managesalary::all();
        return view('admin.managesalary.salarylist',compact('users'));
    }

    public function store(Request $request)
    {
        $users = new Managesalary();
        $users -> employee_name = $request -> employee_name;
        $users -> designation_type = $request -> employee_designation;
        $users -> working_days = $request -> working_days;
        $users -> tax = $request -> tax_deduction;
        $users -> gross_salary = $request -> gross_salary;
        $users -> save();
        return redirect()->route('managesalary.salarylist');
    }

    public function makepayment()
    {
        return view('admin.managesalary.makepayment');
    }

    public function makeAdvance(Request $request)
    {
        $salaries = new Advancepayment();
        $salaries -> employee_id = $request -> employee_id;
        $salaries -> date = $request -> date;
        $salaries -> amount = $request -> amount;
        $salaries -> save();
        return redirect()->route('managesalary.detail', $request->employee_id);
    }

    public function search(Request $request){
        $data =User::where('username', 'LIKE',"%{$request->search}%")->paginate();
        return redirect()->route('managesalary.detail');
    }
}
