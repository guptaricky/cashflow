<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;

class customerController extends Controller
{
    public function create()
    {
        $customers = Customer::orderBy('created_at','DESC')->get();
        return view('masters/customer',[
            'customers' => $customers
        ]);
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required|min:3',
            'ref_no' => 'required|min:3',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('customer.create')->withInput()->withErrors($validator);
        }
        
        $customer = new Customer();
        $customer->name = $request->name; 
        $customer->ref_no = $request->ref_no; 
        $customer->isActive = 1;
        $customer->save();
        return redirect()->route('customer.create')->with('success', 'Entry created successfully');
    }

    public function updateActive($id, Request $request)
    {
        $customer = Customer::findOrFail($id);
        $customer->isActive = $request->input('isActive');
        $customer->save();

        return response()->json(['message' => 'Active status updated successfully', 'success' => true]);
    }
}
