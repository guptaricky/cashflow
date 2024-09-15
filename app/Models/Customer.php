<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ref_no',
        'isActive'
    ];

    public function Cashflow()
    {
        return $this->hasMany(Cashflow::class, 'clientName');
    }
}
