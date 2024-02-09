@extends('layouts/main')

@section('container')
<a href="/coa" class="btn btn-danger btn-icon-split mb-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Back to COA</span>
</a>
<div class="card shadow mb-4 border-bottom-dark">
    <div class="card-header bg-gradient-dark py-3">
        <h6 class="m-0 font-weight-bold text-light">Update Chart Of Account data</h6>
    </div>
    <div class="card-body col-lg-8">
        <form action="/coa/{{ $coa->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">COA Code</label>
                <input type="number" class="form-control @error ('code') is-invalid @enderror" id="code" name="code" placeholder="Enter code code.." required autofocus value="{{ old('code', $coa->code) }}">
                @error('code')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">COA Name</label>
                <input type="text" class="form-control @error ('name') is-invalid @enderror" id="name" name="name" placeholder="Enter coa name.." required autofocus value="{{ old('name', $coa->name) }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">COA Category</label>
                <select class="form-select" name="category_id" required>
                    @foreach ($categories as $category)
                        @if (old('category_id', $coa->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-outline-warning btn-icon-split">    
                <span class="icon text-white-50">
                    <i class="fa-solid fa-pen-to-square"></i>
                </span>
                <span class="text">Update Chart Of Account</span>
            </button>
          </form>
    </div>
</div>

@endsection
