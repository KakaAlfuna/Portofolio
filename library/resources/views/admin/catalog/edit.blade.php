@extends('layouts.admin')

@section('header', 'Catalog')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Catalog</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ url('catalogs/'.$catalog->id) }}">
        @csrf
        {{ method_field('PUT') }}
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" value="{{ $catalog->name }}" name="name" class="form-control" placeholder="Enter name" >
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>
@endsection