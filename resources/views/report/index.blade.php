@extends('layouts/main')

@section('container')




<form action="/report/filter" method="GET" class="d-inline">
    <div class="row">
        <div class="col-lg-2 mb-3">
            <input type="date" class="form-control"  name="from" required >            
        </div>
        <div class="col-lg-2 mb-3">
            <input type="date" class="form-control" name="to"  required >
        </div>
        <div class="col-lg-6">
            <button class="btn btn-outline-success" type="submit">Filter</button>
            <a href="/report" class="btn btn-outline-secondary"><i class="fa-solid fa-rotate-left"></i></a>
        </div>
        <div class="col-lg-2">
            <a class="btn btn-outline-success" href="/report/export_excel_all"><i class="fa-solid fa-file-export"></i> Export Report</a>
            {{-- <div class="dropdown mb-3">
                <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-file-export"></i> Export Report
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/report/export_excel_all">Export All</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/report/filter?from='.Request::get('from').'&to='.Request::get('to').'">Export With Range</a></li>
                </ul>
              </div> --}}
        </div>
    </div>
</form>



    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-dark py-3">
            <h6 class="m-0 font-weight-bold text-light">Reports Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-warning text-center">
                            <th>Date</th>
                            <th>Category</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="table-warning">
                            <th colspan="2" class="text-center">Net Income</th>
                            <th class="text-right">@currency($net_income)</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($incomes as $income)
                        <tr class="table-success">
                            <td class="text-center">{{ $income->transactions_date }}</td>
                            <td>{{ $income->category_name }}</td>
                            <td class="text-right">@currency($income->amount)</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tbody>
                        <tr class="table-success">
                          <th colspan="2" class="text-center">Total Income</th>
                          <th class="text-right">@currency($total_income)</th>
                        </tr>
                    </tbody>
                    <tbody>
                        @foreach ($expenses as $expense)
                        <tr class="table-primary">
                            <td class="text-center">{{ $expense->transactions_date }}</td>
                          <td>{{ $expense->category_name }}</td>
                          <td class="text-right">@currency($expense->amount)</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tbody>
                        <tr class="table-primary">
                          <th colspan="2" class="text-center">Total Expense</th>
                          <th class="text-right">@currency($total_expense)</th>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
