<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Exports\ExportCashflow;
use App\Exports\ExportXero;
use Excel;
use App\Models\Cashflow as ModelsCashflow;
use App\Models\CashflowItems;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Company;
use App\Models\Currency;
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
        $companies = Company::where('isActive', 1)->orderBy('created_at','DESC')->get();
        $currencies = Currency::where('isActive', 1)->orderBy('created_at','DESC')->get();
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

    public function createold()
    {
        // ini_set('memory_limit', '256M');
        $companies = Company::where('isActive', 1)->orderBy('created_at','DESC')->get();
        $currencies = Currency::where('isActive', 1)->where('isDefault', 0)->orderBy('created_at','DESC')->get();
        return view('cashflow/cashflowFormold',[
            
            'companies' => $companies,
            'currencies' => $currencies,
        ]);
    }

    public function create()
    {
        // ini_set('memory_limit', '256M');
        $customers = Customer::where('isActive', 1)->orderBy('created_at','DESC')->get();
        $products = Product::where('isActive', 1)->orderBy('created_at','DESC')->get();
        $companies = Company::where('isActive', 1)->orderBy('created_at','DESC')->get();
        $currencies = Currency::where('isActive', 1)->where('isDefault', 0)->orderBy('created_at','DESC')->get();
        return view('cashflow/cashflowForm',[
            'customers' => $customers,
            'products' => $products,
            'companies' => $companies,
            'currencies' => $currencies,
        ]);
    }   

    public function store(Request $request)
    {
        
        $request->validate([
            'serialNo' => 'required|string|max:255',
            'clientName' => 'required|string|max:255',
            'date' => 'required|date',
            'company' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'countryOrigin' => 'required|string|max:255',
            'modeofshipment' => 'required|string|max:255',
            'availability' => 'required|string|max:255',
            'goodsTravel' => 'required|string|max:255',
            'incoterms' => 'required|string|max:255',
            'currency' => 'required|string|min:1',
            'conversion_factor' => 'required|numeric|min:0',
            // 'items' => 'required|array',
            // 'items.*.product' => 'required|numeric|min:0',
            // 'items.*.quantity' => 'required|numeric|min:0',
            // 'items.*.unitPrice' => 'required|numeric|min:0',
            // 'items.*.packagingInfo' => 'required|numeric|min:0',

            // 'items.*.unitMaterialPrice' => 'required|numeric|min:0',
            // 'items.*.unitOtherCharges' => 'nullable|numeric|min:0',
            // 'items.*.freight' => 'nullable|numeric|min:0',
            // 'items.*.unitLocalHandling' => 'nullable|numeric|min:0',
            // 'items.*.customDuty' => 'nullable|numeric|min:0',
            // 'items.*.bankCharges' => 'nullable|numeric|min:0',
            // 'items.*.landedCost' => 'nullable|numeric|min:0',
            // 'items.*.companyProfileMargin' => 'nullable|numeric|min:0',
            // 'items.*.profitMargin' => 'nullable|numeric|min:0',
            // 'items.*.targetPrice' => 'nullable|numeric|min:0',
            // 'items.*.sellingPrice' => 'required|numeric|min:0',
            // 'items.*.totalSelling' => 'required|numeric|min:0',
            // 'items.*.totalMaterialPrice' => 'nullable|numeric|min:0',
            // 'items.*.totalOtherCharges' => 'nullable|numeric|min:0',
            // 'items.*.totalFreight' => 'nullable|numeric|min:0',
            // 'items.*.totalHandling' => 'nullable|numeric|min:0',
            // 'items.*.totalCustoms' => 'nullable|numeric|min:0',
            // 'items.*.totalBankComm' => 'nullable|numeric|min:0',
            // 'items.*.totalCompanyMargin' => 'nullable|numeric|min:0',
        ]);

        // Start a database transaction
        DB::beginTransaction();
        
        try {
            // Step 1: Insert into the Cashflow (parent) table
            $cashflow = ModelsCashflow::create([
                'serialNo' => $request->serialNo,
                'clientName' => $request->clientName,
                'date' => $request->date,
                'company' => $request->company,
                'department' => $request->department,
                'countryOrigin' => $request->countryOrigin,
                'modeofshipment' => $request->modeofshipment,
                'availability' => $request->availability,
                'goodsTravel' => $request->goodsTravel,
                'incoterms' => $request->incoterms,
                'currency' => $request->currency,
                'conversion_factor' => $request->conversion_factor,
            ]);
            // dd($request->items);
            // Step 2: Insert associated items into the CashflowItems (child) table
            foreach ($request->items as $item) {
                // dd($item['product']);
                CashflowItems::create([
                    'cashflow_id' => $cashflow->id,
                    'product' => $item['product'],
                    'unitPrice' => $item['unitPrice'],
                    'quantity' => $item['quantity'],
                    'packagingInfo' => $item['packagingInfo'],

                    // 'unitMaterialPrice' => $item['unitMaterialPrice'],
                    // 'unitOtherCharges' => $item['unitOtherCharges'] ?? 0,
                    // 'freight' => $item['freight'] ?? 0,
                    // 'unitLocalHandling' => $item['unitLocalHandling'] ?? 0,
                    // 'customDuty' => $item['customDuty'] ?? 0,
                    // 'bankCharges' => $item['bankCharges'] ?? 0,
                    // 'landedCost' => $item['landedCost'] ?? 0,
                    // 'companyProfileMargin' => $item['companyProfileMargin'] ?? 0,
                    // 'profitMargin' => $item['profitMargin'] ?? 0,
                    // 'targetPrice' => $item['targetPrice'] ?? 0,
                    // 'sellingPrice' => $item['sellingPrice'],
                    // 'totalSelling' => $item['totalSelling'],
                    // 'totalMaterialPrice' => $item['totalMaterialPrice'] ?? 0,
                    // 'totalOtherCharges' => $item['totalOtherCharges'] ?? 0,
                    // 'totalFreight' => $item['totalFreight'] ?? 0,
                    // 'totalHandling' => $item['totalHandling'] ?? 0,
                    // 'totalCustoms' => $item['totalCustoms'] ?? 0,
                    // 'totalBankComm' => $item['totalBankComm'] ?? 0,
                    // 'totalCompanyMargin' => $item['totalCompanyMargin'] ?? 0,
                ]);
            }

            // Commit the transaction
            DB::commit();

            // Redirect or return success response
            return redirect()->route('cashflow.index')->with('success', 'Cashflow and items added successfully.');
        
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            return back()->withErrors(['error' => 'An error occurred while saving the data: ' . $e->getMessage()]);
        }
    }

    public function store_old(Request $request)
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

    public function exportXero(Request $request) {
        $filters = $request->only(['company', 'department', 'fromDate', 'toDate']);
        $cashflow = $this->cashflowService->getResults();
        return Excel::download(new ExportXero($cashflow), 'cashflow.xlsx');
    }
    public function update() {}

    public function delete() {}
}
