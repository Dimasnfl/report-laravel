<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Coa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionsExport;
use Carbon\Carbon;



class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transaction.index', [
            "title" => "Transactions",
            "transactions" => Transaction::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction.create', [
            "title" => "Create Transactions",
            "coas" => Coa::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date|before:tomorrow',
            'coa_id' => 'required',
            'desc' => 'required',
            'debit' => 'required',
            'credit' => 'required'
        ]);

        Transaction::create($validatedData);

        return redirect('/transaction')->with('success', 'New data transaction has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transaction.edit', [
            "title" => "Edit Transactions",
            "transaction" => $transaction,
            "coas" => Coa::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'coa_id' => 'required',
            'desc' => 'required',
            'debit' => 'required',
            'credit' => 'required'
        ]);

        Transaction::where('id', $transaction->id)
        ->update($validatedData);

        return redirect('/transaction')->with('success', 'Data transaction has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::destroy($transaction->id);

        return redirect('/transaction')->with('success', 'Data transaction has been deleted!');
    }
    public function report(Request $request)
    {
        //sum total income
        $total_income = Transaction::select('categories.name as category_name')
                                    ->join('coas', 'transactions.coa_id', '=', 'coas.id')
                                    ->join('categories', 'coas.category_id', '=', 'categories.id')
                                    ->where('categories.name', 'not like', '%expense%')
                                    ->sum('credit'); 

        //sum total expense
        $total_expense = Transaction::select('categories.name as category_name')
                                    ->join('coas', 'transactions.coa_id', '=', 'coas.id')
                                    ->join('categories', 'coas.category_id', '=', 'categories.id')
                                    ->where('categories.name', 'like', '%expense%')
                                    ->sum('debit');  

        //sum net income
        $net_income = $total_income - $total_expense;        
                                               
        return view('report.index', [
            "title" => "Transactions Report",
            "total_income" => $total_income,
            "total_expense" => $total_expense,
            "net_income" => $net_income,
            // "incomes" => Transaction::select('categories.name as category_name', DB::raw('SUM(transactions.debit+transactions.credit) as amount'))
            //                             ->join('coas', 'transactions.coa_id', '=', 'coas.id')
            //                             ->join('categories', 'coas.category_id', '=', 'categories.id')
            //                             ->where('categories.name', 'not like', '%expense%')
            //                             ->groupBy('categories.name')
            //                             ->get(),
            // "expenses" => Transaction::select('categories.name as category_name', DB::raw('SUM(transactions.debit+transactions.credit) as amount'))
            //                             ->join('coas', 'transactions.coa_id', '=', 'coas.id')
            //                             ->join('categories', 'coas.category_id', '=', 'categories.id')
            //                             ->where('categories.name', 'like', '%expense%')
            //                             ->groupBy('categories.name')
            //                             ->get(),

            
            "incomes" => Transaction::query()
                            ->selectRaw('date_format(transactions.date, "%Y-%m-%d") as transactions_date,
                                categories.name as category_name, 
                                SUM(transactions.credit) as amount')
                            ->join('coas', 'transactions.coa_id', '=', 'coas.id')
                            ->join('categories', 'coas.category_id', '=', 'categories.id')
                            ->where('categories.name', 'not like', '%expense%')
                            ->orderByDesc('categories.name')
                            ->groupByRaw('category_name, transactions_date')
                            ->get(),
            "expenses" => Transaction::query()
                            ->selectRaw('date_format(transactions.date, "%Y-%m-%d") as transactions_date,
                                categories.name as category_name, 
                                SUM(transactions.debit) as amount')
                            ->join('coas', 'transactions.coa_id', '=', 'coas.id')
                            ->join('categories', 'coas.category_id', '=', 'categories.id')
                            ->where('categories.name', 'like', '%expense%')
                            ->orderByDesc('categories.name')
                            ->groupByRaw('transactions_date, category_name')
                            ->get()
                            
        ]);
    }

    
    public function export_excel_all()
    {
        return Excel::download(new TransactionsExport, 'all_report.xlsx');
    }


    public function filterDate(Request $request) 
    {
        $from = $request->from;
        $to = $request->to;

        //sum total income
        $total_income = Transaction::select('categories.name as category_name')
                ->join('coas', 'transactions.coa_id', '=', 'coas.id')
                ->join('categories', 'coas.category_id', '=', 'categories.id')
                ->where('categories.name', 'not like', '%expense%')
                ->where('transactions.date', '>=', $from)
                ->where('transactions.date', '<=', $to)
                ->sum('credit'); 

        //sum total expense
        $total_expense = Transaction::select('categories.name as category_name')
                ->join('coas', 'transactions.coa_id', '=', 'coas.id')
                ->join('categories', 'coas.category_id', '=', 'categories.id')
                ->where('categories.name', 'like', '%expense%')
                ->where('transactions.date', '>=', $from)
                ->where('transactions.date', '<=', $to)
                ->sum('debit');  

        //sum net income
        $net_income = $total_income - $total_expense;   
        return view('report.index', [
            "title" => "Transactions Report",
            "total_income" => $total_income,
            "total_expense" => $total_expense,
            "net_income" => $net_income,

            "expenses" => Transaction::query()
                            ->selectRaw('date_format(transactions.date, "%Y-%m-%d") as transactions_date,
                                categories.name as category_name, 
                                SUM(transactions.debit) as amount')
                            ->join('coas', 'transactions.coa_id', '=', 'coas.id')
                            ->join('categories', 'coas.category_id', '=', 'categories.id')
                            ->where('categories.name', 'like', '%expense%')
                            ->where('transactions.date', '>=', $from)
                            ->where('transactions.date', '<=', $to)
                            ->orderByDesc('categories.name')
                            ->groupByRaw('transactions_date, category_name')
                            ->get(),
            "incomes" => Transaction::query()
                            ->selectRaw('date_format(transactions.date, "%Y-%m-%d") as transactions_date,
                                categories.name as category_name, 
                                SUM(transactions.credit) as amount')
                            ->join('coas', 'transactions.coa_id', '=', 'coas.id')
                            ->join('categories', 'coas.category_id', '=', 'categories.id')
                            ->where('categories.name', 'not like', '%expense%')
                            ->where('transactions.date', '>=', $from)
                            ->where('transactions.date', '<=', $to)
                            ->orderByDesc('categories.name')
                            ->groupByRaw('category_name, transactions_date')
                            ->get(),
        ]);
    }
}
