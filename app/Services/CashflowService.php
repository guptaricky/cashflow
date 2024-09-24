<?php

namespace App\Services;

use App\Models\Cashflow;
use Illuminate\Support\Facades\DB;

class CashflowService
{
    protected $results;

    public function search($filters)
    {
        $this->results = DB::table('cashflow_items as cfi')
            ->select('*', 'c.name as customer_name', 'p.name as product_name')
            ->leftjoin('cashflows as cf', 'cf.id', '=', 'cfi.cashflow_id')
            ->leftjoin('customers as c', 'c.id', '=', 'cf.clientName')
            ->leftjoin('products as p', 'p.id', '=', 'cfi.product')
            ->when($filters['company'], function ($query, $company) {
                return $query->where('cf.company', 'LIKE', "%{$company}%");
            })
            ->when($filters['department'], function ($query, $department) {
                return $query->where('cf.department', 'LIKE', "%{$department}%");
            })
            ->when($filters['fromDate'] && $filters['toDate'], function ($query) use ($filters) {
                return $query->whereBetween('cf.date', [$filters['fromDate'], $filters['toDate']]);
            })
            ->when($filters['serialNo'], function ($query, $serialNo) {
                return $query->where('cf.serialNo', '=', "{$serialNo}");
            })
            ->orderBy('cfi.created_at', 'DESC')
            ->get();

        return $this->results;
    }

    public function getResults($filters)
    {
        $this->results = DB::table('cashflow_items as cfi')
            ->select('*', 'c.name as customer_name', 'p.name as product_name')
            ->leftjoin('cashflows as cf', 'cf.id', '=', 'cfi.cashflow_id')
            ->leftjoin('customers as c', 'c.id', '=', 'cf.clientName')
            ->leftjoin('products as p', 'p.id', '=', 'cfi.product')
            ->when($filters['company'], function ($query, $company) {
                return $query->where('cf.company', 'LIKE', "%{$company}%");
            })
            ->when($filters['department'], function ($query, $department) {
                return $query->where('cf.department', 'LIKE', "%{$department}%");
            })
            ->when($filters['fromDate'] && $filters['toDate'], function ($query) use ($filters) {
                return $query->whereBetween('cf.date', [$filters['fromDate'], $filters['toDate']]);
            })
            ->when($filters['serialNo'], function ($query, $serialNo) {
                return $query->where('cf.serialNo', '=', "{$serialNo}");
            })
            ->orderBy('cfi.created_at', 'DESC')
            ->get();

        return $this->results;
    }
}
