@extends('layouts/main')

@section('container')
<a href="/category" class="btn btn-danger btn-icon-split mb-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Back to Category</span>
</a>
<div class="card shadow mb-4 border-bottom-dark">
    <div class="card-header bg-gradient-dark py-3">
        <h6 class="m-0 font-weight-bold text-light">Update Category</h6>
    </div>
    <div class="card-body col-lg-8">
        <form action="/category/{{ $category->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control @error ('name') is-invalid @enderror" id="name" name="name" placeholder="Enter category name.." required autofocus value="{{ old('name', $category->name) }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <button type="submit" class="btn btn-outline-warning btn-icon-split">    
                <span class="icon text-white-50">
                    <i class="fa-solid fa-pen-to-square"></i>
                </span>
                <span class="text">Update Category</span>
            </button>
          </form>
    </div>
</div>

@endsection
