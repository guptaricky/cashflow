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
        'date',
        'company',
        'department',
        'countryOrigin',
        'packagingInfo',
        'modeofshipment',
        'availability',
        'goodsTravel',
        'incoterms',
        'currency',
        'conversion_factor'
    ];
   
    public function items()
    {
        return $this->hasMany(CashflowItems::class);
    }
}
