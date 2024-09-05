<?php

namespace App\Services;

use App\Models\Cashflow;

class CashflowService
{
    protected $results;

    public function search($filters)
    {
        // if(empty($filters)){
        //     $this->results = Cashflow::get();
        // }
        // else{
            $this->results = Cashflow::when($filters['company'], function ($query, $company) {
                return $query->where('company', 'LIKE', "%{$company}%");
            })
            ->when($filters['department'], function ($query, $department) {
                return $query->where('department', 'LIKE', "%{$department}%");
            })
            ->when($filters['fromDate'] && $filters['toDate'], function ($query) use ($filters) {
                return $query->whereBetween('date', [$filters['fromDate'], $filters['toDate']]);
            })
            ->orderBy('created_at', 'DESC')
            ->get();
        // }
        

        return $this->results;
    }

    public function getResults()
    {
        return $this->results = Cashflow::get();
    }
}
