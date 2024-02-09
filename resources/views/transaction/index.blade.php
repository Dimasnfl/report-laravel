@extends('layouts/main')

@section('container')
    {{-- <a class="btn btn-icon-split btn-warning mb-3" href="">
    <i class="fa-solid fa-pen-to-square"></i>asdasd</a> --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="transaction/create" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Create Transaction</span>
        </a>

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-dark py-3">
            <h6 class="m-0 font-weight-bold text-light">Transactions Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="ListTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>COA Code</th>
                            <th>COA Name</th>
                            <th>Desc</th>
                            <th>Debit</th>
                            <th>Credits</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>COA Code</th>
                            <th>COA Name</th>
                            <th>Desc</th>
                            <th>Debit</th>
                            <th>Credits</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr class="table-secondary">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->date }}</td>
                                <td>{{ $transaction->coa->code }}</td>
                                <td>{{ $transaction->coa->name }}</td>
                                <td>{{ $transaction->desc }}</td>
                                <td>@currency($transaction->debit)</td>
                                <td>@currency($transaction->credit)</td>
                                <td class="text-center">
                                    <a class="btn btn-circle btn-outline-warning btn-sm"
                                        href="/transaction/{{ $transaction->id }}/edit"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    <form action="/transaction/{{ $transaction->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-circle btn-outline-danger btn-sm"
                                            onclick="return confirm('Delete this data transaction?')"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
