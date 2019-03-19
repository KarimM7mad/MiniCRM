<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Company extends Model
{
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }


    public function addNewCompany($request)
    {
        try {

            if ($request->hasFile('logo')) {
                //get Name with extension
                $filenamewithext = $request->file('logo')->getClientOriginalName();
                //get Name with extension
                $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
                //get extension
                $extension = $request->file('logo')->getClientOriginalExtension();
                //filename to store
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                //upload Image
                $path = $request->file('logo')->storeAs('public/', $filenameToStore);
            } else {
                $filenameToStore = "noImage.jpg";
            }
            $this->logo = $filenameToStore;


            $this->name = $request->input('name');
            $this->email = $request->input('email');
            $this->website = $request->input('website');
            $this->save();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


    public function ModifyExistingCompany($request)
    {
        try {

            if ($request->hasFile('logo')) {
                //get Name with extension
                $filenamewithext = $request->file('logo')->getClientOriginalName();
                //get Name with extension
                $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
                //get extension
                $extension = $request->file('logo')->getClientOriginalExtension();
                //filename to store
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                //upload Image
                $path = $request->file('logo')->storeAs('public/', $filenameToStore);
                $this->logo = $filenameToStore;
            } else {
                $filenameToStore = "noImage.jpg";
            }
            $this->name = $request->input('name');
            $this->email = $request->input('email');
            $this->website = $request->input('website');
            $this->save();

            
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
