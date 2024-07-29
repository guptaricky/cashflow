<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use Illuminate\Support\Facades\Log;

class CompanyMaster extends Component
{
    
    public $companyName;
    public $currency;
    public $description;
   

    protected $rules = [
        'companyName' => 'required|min:5',
        'currency' => 'required|min:5'
    ];

    public function submit()
    {
        Log::debug('Submit method has been called.');
        
        $this->validate();

        Company::create(
            // $this->all()
        [
            'name' => $this->companyName,
            'code' => uniqid(),
            'description' => $this->description,
            'currency' => $this->currency
        ]
    );

        session()->flash('message', 'Entry submitted successfully.');

        $this->reset();
    }
    public function render()
    {
        $dataSource = Company::all();
        return view('livewire.company',[
            'dataSource' => $dataSource,
        ]);
    }
    
}
