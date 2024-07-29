<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cashflow;
use App\Models\Company;
use Illuminate\Support\Facades\Log;

class CashflowList extends Component
{
    public $company;

    protected $rules = [
        'company' => 'required|min:5'
       
    ];
    public function submit()
    {
        $this->validate();
        $dataSource = Cashflow::where('company', $this->company)->get();
        
    }
    public function render()
    {
        $dataSource = Cashflow::all();
        $companies = Company::all();
        return view('livewire.cashflow-list',[
            'companies' => $companies,
            'dataSource' => $dataSource,
        ]);
    }
    
}
