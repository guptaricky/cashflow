<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'serialNo',
        'clientName',
        'clientRef',
        'date',
        'company',
        'department',
        'description',
        'countryOrigin',
        'uom',
        'packagingInfo',
        'modeofshipment',
        'availability',
        'goodsTravel',
        'quantity',
        'incoterms',
        'unitPrice',
        'conversion_factor',
        'unitMaterialPrice',
        'unitOtherCharges',
        'freight',
        'unitLocalHandling',
        'customDuty',
        'bankCharges',
        'landedCost',
        'companyProfileMargin',
        'profitMargin',
        'targetPrice',
        'sellingPrice',
        'totalSelling',
        'qty',
        'totalMaterialPrice',
        'totalOthercharges',
        'totalFreight',
        'totalHandling',
        'totalCustoms',
        'totalBankComm',
        'totalCompanyMargin'
    ];
}
