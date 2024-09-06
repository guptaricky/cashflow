<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Company;



class companyController extends Controller
{
    public function create()
    {
        $companies = Company::orderBy('created_at','DESC')->get();
        return view('masters/company',[
            'companies' => $companies
        ]);
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required|min:2',
            'code' => 'required|min:2',
            'currency' => 'required|min:2',
            'description' => 'required|min:5'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('company.create')->withInput()->withErrors($validator);
        }

        $company = new Company();
        $company->name = $request->name; 
        $company->code = $request->code; 
        $company->description = $request->description;
        $company->currency = $request->currency;
        $company->isActive = 1;

        $company->save();
        return redirect()->route('company.create')->with('success', 'Entry created successfully');
    }

    public function updateActive($id, Request $request)
    {
        $company = Company::findOrFail($id);
        $company->isActive = $request->input('isActive');
        $company->save();

        return response()->json(['message' => 'Active status updated successfully', 'success' => true]);
    }

}
