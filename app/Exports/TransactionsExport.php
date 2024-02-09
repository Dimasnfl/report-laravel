<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransactionsExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {

        $total_income = Transaction::select('categories.name as category_name')
                                    ->join('coas', 'transactions.coa_id', '=', 'coas.id')
                                    ->join('categories', 'coas.category_id', '=', 'categories.id')
                                    ->where('categories.name', 'not like', '%expense%')
                                    ->sum('credit'); 

        $total_expense = Transaction::select('categories.name as category_name')
                                    ->join('coas', 'transactions.coa_id', '=', 'coas.id')
                                    ->join('categories', 'coas.category_id', '=', 'categories.id')
                                    ->where('categories.name', 'like', '%expense%')
                                    ->sum('debit');  

        $net_income = $total_income - $total_expense;        
                                               
        return view('report.all', [
            "total_income" => $total_income,
            "total_expense" => $total_expense,
            "net_income" => $net_income,
            "incomes" => Transaction::query()
                                        ->selectRaw('categories.name as category_name, 
                                                    SUM(transactions.credit) as amount')
                                        ->join('coas', 'transactions.coa_id', '=', 'coas.id')
                                        ->join('categories', 'coas.category_id', '=', 'categories.id')
                                        ->where('categories.name', 'not like', '%expense%')
                                        ->orderByDesc('categories.name')
                                        ->groupByRaw('category_name')
                                        ->get(),
            "expenses" => Transaction::query()
                                        ->selectRaw('categories.name as category_name, 
                                                    SUM(transactions.debit) as amount')
                                        ->join('coas', 'transactions.coa_id', '=', 'coas.id')
                                        ->join('categories', 'coas.category_id', '=', 'categories.id')
                                        ->where('categories.name', 'like', '%expense%')
                                        ->orderByDesc('categories.name')
                                        ->groupByRaw('category_name')
                                        ->get()
        ]);

    }
}


