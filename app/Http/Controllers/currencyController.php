<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Currency;



class currencyController extends Controller
{
    public function create()
    {
        $currencies = Currency::orderBy('created_at','DESC')->get();
        return view('masters/currency',[
            'currencies' => $currencies
        ]);
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required|min:2',
            'code' => 'required|min:2'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('currency.create')->withInput()->withErrors($validator);
        }

        $currency = new Currency();
        $currency->name = $request->name; 
        $currency->code = $request->code; 
        $currency->isDefault = 0;
        $currency->isActive = 1;

        $currency->save();
        return redirect()->route('currency.create')->with('success', 'Entry created successfully');
    }

    public function setDefault($id, Request $request)
    {
        // Ensure that only one currency can be default
        $isDefault = $request->input('isDefault');

        if ($isDefault) {
            // making all other currencies as non default
            Currency::where('isDefault', 1)->update(['isDefault' => 0]);
        }
        $currency = Currency::findOrFail($id);
        $currency->isDefault = $request->input('isDefault');
        $currency->save();

        return response()->json(['message' => 'Default status updated successfully', 'success' => true]);
    }

    public function updateActive($id, Request $request)
    {
        $currency = Currency::findOrFail($id);
        $currency->isActive = $request->input('isActive');
        $currency->save();

        return response()->json(['message' => 'Active status updated successfully', 'success' => true]);
    }

}
