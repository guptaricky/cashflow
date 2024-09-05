<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Cashflow;
use PhpParser\Node\Expr\FuncCall;

class ExportCashflow implements FromCollection, WithHeadings, WithMapping
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
            $cashflow->date,
            $cashflow->clientName,
            $cashflow->company,
            $cashflow->department,
            $cashflow->totalMaterialPrice,
            $cashflow->totalOthercharges,
            $cashflow->totalFreight,
            $cashflow->totalHandling,
            $cashflow->totalCustoms,
            $cashflow->totalBankComm,
            $cashflow->totalCompanyMargin,
            $cashflow->totalOthercharges + $cashflow->totalCompanyMargin,
        ];
    }

    public function headings(): array
    {
        return [
            'Serial No',
            'Date',
            'client Name / Ref',
            'company',
            'Department',
            'Total Material Price(KWD)',
            'Total Other Charges(KWD)',
            'Total Freight(KWD)',
            'Total Handling cost(KWD)',
            'Total Customs 6%(KWD)',
            'Total Bank Comm',
            'Total Company Margin(KWD)',
            'TOTAL SELLING COST'
        ];
    }
}
