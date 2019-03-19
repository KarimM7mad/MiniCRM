<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Company;

class Employee extends Model
{
    //
    public function company()
    {
        return $this->belongTo('App\Company', 'company');
    }

    public function addNewEmployee(Request $request)
    {
        

        try {
            $this->Fname = $request->input('fname');
            $this->Lname = $request->input('lname');
            $this->email = $request->input('email');
            $this->phone = $request->input('phone');
            $this->company = $request->input('company');
            $this->save();
            return true;
        } catch (\Exception $th) {
            echo $th->getMessage();
        }
        return false;
    }

    public function getName($id){
        return Company::find($id)->name;
    }

    public function ModifyEmployeeData($request)
    {
        try {
            $this->Fname = $request->input('fname');
            $this->Lname = $request->input('lname');
            $this->email = $request->input('email');
            $this->phone = $request->input('phone');
            $this->company = $request->input('company');
            $this->save();
            return true;
        } catch (\Exception $th) {
            echo $th->getMessage();
        }
        return false;
    }
}
