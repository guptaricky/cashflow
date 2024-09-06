<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conversionFactor extends Model
{
    use HasFactory;

    protected $fillable = [
        'fromCurrency',
        'toCurrency',
        'cf_value'
    ];

    protected $table = 'conversion_factor';

}
