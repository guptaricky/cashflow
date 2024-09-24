<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportXero implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $cashflows;

    public function __construct($cashflows)
    {
        $this->cashflows = $cashflows;
    }
    public function collection()
    {
        return $this->cashflows;
    }
    public function map($cashflow): array
    {
        return [
            $cashflow->serialNo,
            $cashflow->product_name,
            $cashflow->description,
            $cashflow->unitMaterialPrice,
            "",
            $cashflow->freight,
            $cashflow->description,
            $cashflow->sellingPrice,
            "",
            $cashflow->freight,
            "",			
            ""		
        ];
    }

    public function headings(): array
    {
        return [
            'ItemCode',
            'ItemName',
            'PurchasesDescription',
            'PurchasesUnitPrice',
            'PurchasesAccount',
            'PurchasesTaxRate',
            'SalesDescription',
            'SalesUnitPrice',
            'SalesAccount',
            'SalesTaxRate',
            'InventoryAssetAccount',
            'CostOfGoodsSoldAccount'
        ];
    }
}
