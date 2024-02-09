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
        <h6 class="m-0 font-weight-bold text-light">Update Transactions</h6>
    </div>
    <div class="card-body col-lg-8">
        <form action="/transaction/{{ $transaction->id }}" method="post">
            @method('put')
            @csrf
            {{-- <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control @error ('date') is-invalid @enderror" id="date" name="date" required value="{{ old('date', $transaction->date) }}">
                @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div> --}}
            <div class="mb-3">
                <label for="date" class="form-label">Transaction created on :</label>
                    <input type="text" class="form-control-plaintext @error ('date') is-invalid @enderror" id="date" name="date" required autofocus value="{{ old('date', $transaction->date) }}" readonly>
                @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="coa" class="form-label">Chart Of Accounts</label>
                <select class="form-select" name="coa_id">
                    <option selected>- - -</option>
                    @foreach ($coas as $coa)
                        @if (old('coa_id', $transaction->coa_id) == $coa->id)
                        <option value="{{ $coa->id }}" selected>{{ $coa->code }} - {{ $coa->name }}</option>
                        @else
                        <option value="{{ $coa->id }}">{{ $coa->code }} - {{ $coa->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <input type="text" class="form-control @error ('desc') is-invalid @enderror" id="desc" name="desc" required autofocus value="{{ old('desc', $transaction->desc) }}">
                @error('desc')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="debit" class="form-label">Debit</label>
                <input type="number" class="form-control @error ('debit') is-invalid @enderror" id="debit" name="debit" required autofocus value="{{ old('debit', $transaction->debit) }}">
                @error('debit')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="credit" class="form-label">Credit</label>
                <input type="number" class="form-control @error ('credit') is-invalid @enderror" id="credit" name="credit" required autofocus value="{{ old('credit', $transaction->credit) }}">
                @error('credit')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <button type="submit" class="btn btn-outline-warning btn-icon-split">    
                <span class="icon text-white-50">
                    <i class="fa-solid fa-pen-to-square"></i>
                </span>
                <span class="text">Update Transaction</span>
            </button>
          </form>
    </div>
</div>

@endsection
