<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cashflow;
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
        // dd($this->serialNo);
        Log::debug('Submitted Data:', [
            'serialNo' => $this->serialNo,
            'clientName' => $this->clientName,
            'clientRef' => $this->clientRef,
            'date' => $this->date,
            'company' => $this->company,
            'department' => $this->department,
            'description' => $this->description,
            'countryOrigin' => $this->countryOrigin,
            'uom' => $this->uom,
            'packagingInfo' => $this->packagingInfo,
            'modeofshipment' => $this->modeofshipment,
            'availability' => $this->availability,
            'goodsTravel' => $this->goodsTravel,
            'quantity' => $this->quantity,
            'incoterms' => $this->incoterms,
            'unitPrice' => $this->unitPrice,
            'unitMaterialPrice' => $this->unitMaterialPrice,
            'unitOtherCharges' => $this->unitOtherCharges,
            'freight' => $this->freight,
            'unitLocalHandling' => $this->unitLocalHandling,
            'customDuty' => $this->customDuty,
            'bankCharges' => $this->bankCharges,
            'landedCost' => $this->landedCost,
            'profitMargin' => $this->profitMargin,
            'targetPrice' => $this->targetPrice,
            'sellingPrice' => $this->sellingPrice,
            'totalSelling' => $this->totalSelling,
            'qty' => $this->qty,
            'totalMaterialPrice' => $this->totalMaterialPrice,
            'totalOthercharges' => $this->totalOthercharges,
            'totalFreight' => $this->totalFreight,
            'totalHandling' => $this->totalHandling,
            'totalCustoms' => $this->totalCustoms,
            'totalBankComm' => $this->totalBankComm,
            'totalCompanyMargin' => $this->totalCompanyMargin
           
        ]);
        $this->validate();

        Cashflow::create([
            'serialNo' => $this->serialNo,
            'clientName' => $this->clientName,
            'clientRef' => $this->clientRef,
            'date' => $this->date,
            'company' => $this->company,
            'department' => $this->department,
            'description' => $this->description,
            'countryOrigin' => $this->countryOrigin,
            'uom' => $this->uom,
            'packagingInfo' => $this->packagingInfo,
            'modeofshipment' => $this->modeofshipment,
            'availability' => $this->availability,
            'goodsTravel' => $this->goodsTravel,
            'quantity' => $this->quantity,
            'incoterms' => $this->incoterms,
            'unitPrice' => $this->unitPrice,
            'unitMaterialPrice' => $this->unitMaterialPrice,
            'unitOtherCharges' => $this->unitOtherCharges,
            'freight' => $this->freight,
            'unitLocalHandling' => $this->unitLocalHandling,
            'customDuty' => $this->customDuty,
            'bankCharges' => $this->bankCharges,
            'landedCost' => $this->landedCost,
            'profitMargin' => $this->profitMargin,
            'targetPrice' => $this->targetPrice,
            'sellingPrice' => $this->sellingPrice,
            'totalSelling' => $this->totalSelling,
            'qty' => $this->qty,
            'totalMaterialPrice' => $this->totalMaterialPrice,
            'totalOthercharges' => $this->totalOthercharges,
            'totalFreight' => $this->totalFreight,
            'totalHandling' => $this->totalHandling,
            'totalCustoms' => $this->totalCustoms,
            'totalBankComm' => $this->totalBankComm,
            'totalCompanyMargin' => $this->totalCompanyMargin,
        ]);

        session()->flash('message', 'Contact form successfully submitted.');

        $this->reset(['serialNo']);
    }
    public function render()
    {
        return view('livewire.cashflow');
    }
    
}
