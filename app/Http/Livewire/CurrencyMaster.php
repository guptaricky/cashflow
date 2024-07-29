<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Currency;
use Illuminate\Support\Facades\Log;

class CurrencyMaster extends Component
{
    
    public $currencyName;
    public $symbol;
   

    protected $rules = [
        'currencyName' => 'required|min:5',
        'symbol' => 'required|min:1'
    ];

    public function submit()
    {
        Log::debug('Submit method has been called.');
        
        $this->validate();

        Currency::create(
            // $this->all()
        [
            'name' => $this->currencyName,
            'code' => $this->symbol,
            'isDefault' => 0,
            'isActive' => 1
        ]
    );

        session()->flash('message', 'Entry submitted successfully.');

        $this->reset();
    }
    public function render()
    {
        $defaultCurrency = Currency::where('isDefault', 1)->get();
        $currencies = Currency::all();
        return view('livewire.currency',[
            'currencies' => $currencies,
            'defaultCurrency' => $defaultCurrency,
        ]);
    }
    
}
