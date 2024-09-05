<?php

namespace App\Http\Controllers;

use App\Exports\ExportCashflow;
use Excel;
use App\Models\Cashflow as ModelsCashflow;
use App\Models\Company;
use App\Models\Currency;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Services\CashflowService;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Cashflow extends Controller
{
    protected $cashflowService;

    public function __construct(CashflowService $cashflowService)
    {
        $this->cashflowService = $cashflowService;
    }
    public function index()
    {
        $cashflow = ModelsCashflow::orderBy('created_at','DESC')->get();
        $companies = Company::orderBy('created_at','DESC')->get();
        $currencies = Currency::orderBy('created_at','DESC')->get();
        return view('cashflow/cashflowList',[
            'cashflows' => $cashflow,
            'companies' => $companies,
            'currencies' => $currencies,
        ]);
    }

    public function detail($id)
    {
        $cashflowDetail = ModelsCashflow::where('id', $id)->first();
        return view('cashflow/cashflowDetail',[
            'cashflowDetail' => $cashflowDetail
        ]);
    }

    public function create()
    {
        // ini_set('memory_limit', '256M');
        $companies = Company::orderBy('created_at','DESC')->get();
        $currencies = Currency::orderBy('created_at','DESC')->get();
        return view('cashflow/cashflowForm',[
            'companies' => $companies,
            'currencies' => $currencies,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'serialNo' => 'required|min:5',
            'clientName' => 'required|min:5',
            'clientRef' => 'required|min:5',
            'date' => 'required|min:10',
            'company' => 'required|min:5',
            'department' => 'required|min:5',
            'description' => 'required|min:5',
            'countryOrigin' => 'required|min:5',
            'uom' => 'required|min:2',
            'packagingInfo' => 'required|min:5',
            'modeofshipment' => 'required|min:5',
            'availability' => 'required|min:1',
            'goodsTravel' => 'required|min:1',
            'quantity' => 'required|min:1',
            'incoterms' => 'required|min:2',
            'unitPrice' => 'required|min:1',
            'companyProfileMargin' => 'required|min:1',
            'targetPrice' => 'required|min:1',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('cashflow.create')->withInput()->withErrors($validator);
        }

        $cashflow = new ModelsCashflow();
        $cashflow->serialNo = $request->serialNo;
        $cashflow->clientName = $request->clientName;
        $cashflow->clientRef = $request->clientRef;
        $cashflow->date = $request->date;
        $cashflow->company = $request->company;
        $cashflow->department = $request->department;
        $cashflow->description = $request->description;
        $cashflow->countryOrigin = $request->countryOrigin;
        $cashflow->uom = $request->uom;
        $cashflow->packagingInfo = $request->packagingInfo;
        $cashflow->modeofshipment = $request->modeofshipment;
        $cashflow->availability = $request->availability;
        $cashflow->goodsTravel = $request->goodsTravel;
        $cashflow->quantity = $request->quantity;
        $cashflow->incoterms = $request->incoterms;
        $cashflow->unitPrice = $request->unitPrice;
        $cashflow->conversion_factor = $request->conversion_factor;
        $cashflow->unitMaterialPrice = $request->unitMaterialPrice;
        $cashflow->unitOtherCharges = $request->unitOtherCharges;
        $cashflow->freight = $request->freight;
        $cashflow->unitLocalHandling = $request->unitLocalHandling;
        $cashflow->customDuty = $request->customDuty;
        $cashflow->bankCharges = $request->bankCharges;
        $cashflow->landedCost = $request->landedCost;
        $cashflow->companyProfileMargin = $request->companyProfileMargin;
        $cashflow->profitMargin = $request->profitMargin;
        $cashflow->targetPrice = $request->targetPrice;
        $cashflow->sellingPrice = $request->sellingPrice;
        $cashflow->totalSelling = $request->totalSelling;
        $cashflow->qty = $request->qty;
        $cashflow->totalMaterialPrice = $request->totalMaterialPrice;
        $cashflow->totalOthercharges = $request->totalOthercharges;
        $cashflow->totalFreight = $request->totalFreight;
        $cashflow->totalHandling = $request->totalHandling;
        $cashflow->totalCustoms = $request->totalCustoms;
        $cashflow->totalBankComm = $request->totalBankComm;
        $cashflow->totalCompanyMargin = $request->totalCompanyMargin;

        $cashflow->save($request->all());

        return redirect()->route('cashflow.index')->with('success', 'Entry created successfully');
    }

    public function search(Request $request) {

        $filters = $request->only(['company', 'department', 'fromDate', 'toDate']);
        $results = $this->cashflowService->search($filters);
        return view('cashflow/searchResult', compact('results'));
        // return view('cashflow/searchResult', ['results' => collect()]); // Empty collection if no query
    }

    public function export(Request $request) {

        $filters = $request->only(['company', 'department', 'fromDate', 'toDate']);
        $cashflow = $this->cashflowService->search($filters);
        return Excel::download(new ExportCashflow($cashflow), 'cashflow.xlsx');
    }

    public function exportAll() {
        $cashflow = $this->cashflowService->getResults();
        return Excel::download(new ExportCashflow($cashflow), 'cashflow.xlsx');
    }
    public function update() {}

    public function delete() {}
}
