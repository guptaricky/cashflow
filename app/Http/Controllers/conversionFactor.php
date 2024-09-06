<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Currency;
use App\Models\conversionFactor as conversionModel;
use Illuminate\Support\Facades\DB;



class conversionFactor extends Controller
{
    public function create()
    {
        $currencies = Currency::where('isActive', 1)->orderBy('created_at','DESC')->get();
        $conversions = DB::table('conversion_factor')
        ->select(DB::raw('MAX(id) as id, fromCurrency, toCurrency','cf_value'))
        ->groupBy('fromCurrency', 'toCurrency')
        ->get();
       

        // Now, fetch the full details using the `id` values, including cf_value
        $latestConversions = conversionModel::whereIn('id', $conversions->pluck('id'))
        ->orderBy('created_at', 'DESC')
        ->get();

        // dd($latestConversions);
        return view('masters/conversionFactor',[
            'conversions' => $latestConversions,
            'currencies' => $currencies
        ]);
    }

    public function store(Request $request){

        $rules = [
            'fromCurrency' => 'required|min:1',
            'toCurrency' => 'required|min:1',
            'conversion_factor' => 'required|min:1'
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('conversion.create')->withInput()->withErrors($validator);
        }

        $conversion = new conversionModel();
        $conversion->fromCurrency = $request->fromCurrency; 
        $conversion->toCurrency = $request->toCurrency; 
        $conversion->cf_value = $request->conversion_factor;

        $conversion->save();
        return redirect()->route('conversion.create')->with('success', 'Entry created successfully');
    }

    public function getConversion($currency){

        $currencies = Currency::where('isDefault', 1)->first();
        $conversions = conversionModel::select('cf_value')->where('fromCurrency', $currencies->name)->where('toCurrency' , $currency)->orderBy('id','desc')->limit(1)->get();
        return $conversions;
    }

}
