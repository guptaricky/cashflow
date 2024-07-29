<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cashflow;
use App\Models\Currency;
use App\Models\Company;
use Illuminate\Support\Facades\Log;

class CashflowForm extends Component
{
    public $serialNo;
    public $clientName;
    public $clientRef;
    public $date;
    public $company;
    public $department;
    public $description;
    public $countryOrigin;
    public $uom;
    public $packagingInfo;
    public $modeofshipment;
    public $availability;
    public $goodsTravel;
    public $quantity;
    public $incoterms;
    public $unitPrice;
    public $unitMaterialPrice;
    public $unitOtherCharges;
    public $freight;
    public $unitLocalHandling;
    public $customDuty;
    public $bankCharges;
    public $landedCost;
    public $companyProfileMargin;
    public $profitMargin;
    public $targetPrice;
    public $sellingPrice;
    public $totalSelling;
    public $qty;
    public $totalMaterialPrice;
    public $totalOthercharges;
    public $totalFreight;
    public $totalHandling;
    public $totalCustoms;
    public $totalBankComm;
    public $totalCompanyMargin;

    protected $rules = [
        'serialNo' => 'required|min:5'
    ];

    public function submit()
    {
        Log::debug('Submit method has been called.');

        $this->validate();

        Cashflow::create($this->all()
       
    );

        session()->flash('message', 'Entry submitted successfully.');

        $this->reset();
    }
    public function render()
    {
        $companies = Company::all();
        $currencies = Currency::all();
        return view('livewire.cashflow',[
            'companies' => $companies,
            'currencies' => $currencies,
        ]);
    }
    
}
