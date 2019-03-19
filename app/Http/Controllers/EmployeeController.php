<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()) {
            $employees = Employee::paginate(10);
            return view('employee.viewAllEmployees')->with('employees', $employees);
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()) {
            return view('employee.createEmployeeForm')->with('companies', Company::all());
        } else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()) {

            if (Company::find($request->input('company')) == null) {
                error_log("the company doesn't exist");
                return redirect("/");
            } else {

                $this->validate($request, ['fname' => 'required', 'lname' => 'required']);
                $emp = new Employee();
                $emp->addNewEmployee($request);
                return redirect('/employee');
            }
        }
        error_log("Unauthorized access");
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()) {
            return view('employee.viewSpecificEmployee')->with('emp', Employee::find($id));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()) {
            return view('employee.editEmployeeData', [
                'companies' => Company::all(),
                'emp' => Employee::find($id)
            ]);
        }
        return redirect("/");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()) {
            $this->validate($request, ['fname' => 'required', 'lname' => 'required']);
            $emp = Employee::find($id);
            $emp->ModifyEmployeeData($request);
            return redirect('/employee');
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()) {
            $emp = Employee::find($id);
            $emp->delete();
            return redirect('/employee');
        }
    }
}
