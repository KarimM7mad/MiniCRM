<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Employee extends Model
{
    //
    public function company()
    {
        return $this->belongTo('App\Company', 'company');
    }

    public function addNewEmployee(Request $request, $companyID)
    {
        if ($companyID == null)
            return false;

        try {
            $this->Fname = $request->input('Fname');
            $this->Lname = $request->input('Lname');
            $this->email = $request->input('email');
            $this->phone = $request->input('phone');
            $this->company = $companyID;
            $this->save();
            return true;
        } catch (\Exception $th) {
            echo $th->getMessage();
        }
        return false;
    }


    public function ModifyEmployeeData($request)
    {
        try {
            $this->Fname = $request->input('Fname');
            $this->Lname = $request->input('Lname');
            $this->email = $request->input('email');
            $this->phone = $request->input('phone');
            $this->save();
            return true;
        } catch (\Exception $th) {
            echo $th->getMessage();
        }
        return false;
    }
}
