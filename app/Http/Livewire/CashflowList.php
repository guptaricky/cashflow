<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cashflow;
use Illuminate\Support\Facades\Log;

class CashflowList extends Component
{
    public function render()
    {
        $dataSource = Cashflow::all();
        return view('livewire.cashflow-list',[
            'dataSource' => $dataSource,
        ]);
    }
    
}
