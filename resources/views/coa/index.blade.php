@extends('layouts/main')

@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="coa/create" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Create COA</span>
        </a>

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-dark py-3">
            <h6 class="m-0 font-weight-bold text-light">Chart Of Accounts Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="categoryTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($coas as $coa)
                            <tr class="table-secondary">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $coa->code }}</td>
                                <td>{{ $coa->name }}</td>
                                <td>{{ $coa->category->name }}</td>
                                <td class="text-center">
                                    <a class="btn btn-circle btn-outline-warning btn-sm"
                                        href="/coa/{{ $coa->id }}/edit"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    <form action="/coa/{{ $coa->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-circle btn-outline-danger btn-sm"
                                            onclick="return confirm('Delete this data COA?')"><i class="fa-solid fa-trash"></i></button>
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
