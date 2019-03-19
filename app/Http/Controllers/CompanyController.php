<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function _construct()
    {
        $this->middleware['auth'];
    }

    public function index()
    {
        $allCompanies =  Company::paginate(10);
        return view('company.allCompanies')->with('allCompanies', $allCompanies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get request to obtain the create form
        if (auth()->user())
            return view('company.addCompanyForm');
        else {
            error_log('Unauthorized Access');
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
            $this->validate($request, ['name' => 'required', 'logo' => 'dimensions:min_width=100,min_height=100']);
            $company = new Company();
            $company->addNewCompany($request);

            return redirect('/company');
        } else {
            return redirect('/company');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c = Company::find($id);
        return view('company.viewCertainCompany')->with('c', $c);
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
            $c = Company::find($id);
            return view('company.editCompanyForm')->with('c', $c);
        }
        //get update view of a certain element
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
            $this->validate($request, ['name' => 'required', 'logo' => 'dimensions:min_width=100,min_height=100']);
            $c = Company::find($id);

            $c->ModifyExistingCompany($request);
            return redirect('/company');
        }


        // put request of the update in the database
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete request of a certain item
        if (auth()->user()) {
            $c = Company::find($id);
            Storage::delete('/', 'public/' . $c->logo);
            $c->delete();
            return redirect('/company');
        }
    }
}
