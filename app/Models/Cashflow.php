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
        'conversion_factor',
        'profitMargin',
        'targetPrice'
    ];
   
    public function CashflowItems()
    {
        return $this->hasMany(CashflowItems::class);
    }
    
    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'clientName');
    }
}
