@extends('layouts/main')

@section('container')
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Income</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($total_income)</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Expense</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($total_expense)</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection








{{-- <div class="card shadow mb-4">
        <div class="card-header bg-gradient-dark py-3">
            <h6 class="m-0 font-weight-bold text-light">Reports Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="categoryTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-gray-700 text-light text-center">
                            <th rowspan="2"  style="vertical-align: middle">Category</th>
                            <th colspan="1">2022-01-13</th>
                            <th colspan="1">2022-02-13</th>
                            <th colspan="1">2022-03-13</th>
                        </tr>
                        <tr class="bg-gray-700 text-light text-center">
                            <th>Amount</th>
                            <th>Amount</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-gray-500 text-light">
                            <th>Net Income</th>
                            <th class="text-right">-</th>
                            <th class="text-right">-</th>
                            <th class="text-right">-</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <tr class="text-dark">
                            <td>Salary</td>
                            <td class="text-right"> @currency('120000') </td>
                            <td class="text-right">120000</td>
                            <td class="text-right">120000</td>
                        </tr>
                        <tr class="text-dark">
                            <td>Other Income</td>
                            <td class="text-right">120000</td>
                            <td class="text-right">120000</td>
                            <td class="text-right">120000</td>
                        </tr>
                        <tr class="text-dark">
                            <td>Total Income</td>
                            <td class="text-right">120000</td>
                            <td class="text-right">120000</td>
                            <td class="text-right">120000</td>
                        </tr>
                        <tr class="text-dark">
                            <td>Family Expense</td>
                            <td class="text-right">120000</td>
                            <td class="text-right">120000</td>
                            <td class="text-right">120000</td>
                        </tr>

                    </tbody>
                </table>
                <div class="d-sm-flex align-items-center justify-content-between mt-2">
                    <p class="h3 mb-0 text-gray-800"></p>
                    <a href="#" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fa-solid fa-file-export"></i>
                        </span>
                        <span class="text">Export Report</span>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
