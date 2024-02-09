<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
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
    return view('home', [
        'title' => 'Home',
        "total_income" => $total_income,
        "total_expense" => $total_expense,
    ]);
});

// category route
Route::resource('/category', CategoryController::class);

// coa route
Route::resource('/coa', CoaController::class);

// transaction route
Route::resource('/transaction', TransactionController::class);

// report route
Route::get('/report', [TransactionController::class, 'report']);

Route::get('/report/export_excel_all', [TransactionController::class, 'export_excel_all']);

Route::get('/report/filter', [TransactionController::class, 'filterDate']);




