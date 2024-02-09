@extends('layouts/main')

@section('container')
<a href="/transaction" class="btn btn-danger btn-icon-split mb-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Back to Transactions</span>
</a>
<div class="card shadow mb-4 border-bottom-dark">
    <div class="card-header bg-gradient-dark py-3">
        <h6 class="m-0 font-weight-bold text-light">Create New Transactions</h6>
    </div>
    <div class="card-body col-lg-8">
        <form action="/transaction" method="post">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control @error ('date') is-invalid @enderror" id="date" name="date" autofocus value="{{ old('date') }}">
                @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="coa" class="form-label">Chart Of Accounts</label>
                <select class="form-select" name="coa_id" required>
                    @foreach ($coas as $coa)
                        @if (old('coa_id') == $coa->id)
                        <option value="{{ $coa->id }}" selected>{{ $coa->code }} - {{ $coa->name }}</option>
                        @else
                        <option value="{{ $coa->id }}">{{ $coa->code }} - {{ $coa->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <input type="text" class="form-control @error ('desc') is-invalid @enderror" id="desc" name="desc" placeholder="Enter description.." required autofocus value="{{ old('desc') }}">
                @error('desc')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="debit" class="form-label">Debit</label>
                <input type="number" class="form-control @error ('debit') is-invalid @enderror" id="debit" name="debit" placeholder="Enter the debit amount.." required autofocus value="{{ old('debit') }}">
                @error('debit')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="credit" class="form-label">Credit</label>
                <input type="number" class="form-control @error ('credit') is-invalid @enderror" id="credit" name="credit" placeholder="Enter the credit amount.." required autofocus value="{{ old('credit') }}">
                @error('credit')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <button type="submit" class="btn btn-outline-success btn-icon-split">    
                <span class="icon text-white-50">
                    <i class="fas fa-paper-plane"></i>
                </span>
                <span class="text">Create Transaction</span>
            </button>
          </form>
    </div>
</div>

@endsection
