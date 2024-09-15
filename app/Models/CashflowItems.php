<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashflowItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'cashflow_id',
        'product',
        'quantity',
        'unitPrice',
        'packagingInfo',
        'unitMaterialPrice',
        'unitOtherCharges',
        'freight',
        'unitLocalHandling',
        'customDuty',
        'bankCharges',
        'landedCost',
        'companyProfitMargin',
        'sellingPrice',
        'totalSelling',
        'totalMaterialPrice',
        'totalOtherCharges',
        'totalFreight',
        'totalHandling',
        'totalCustoms',
        'totalBankComm',
        'totalCompanyMargin'
    ];

    public function cashflow()
    {
        return $this->belongsTo(Cashflow::class);
    }
}
