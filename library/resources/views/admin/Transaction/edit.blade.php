@extends('layouts.admin')

@section('header', 'Edit Transaction')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Transaction</h3>
    </div>
    <form method="POST" action="{{ url('transactions/' . $transaction->id) }}">
        @csrf
        {{ method_field('PUT') }}
        <div class="card-body">
            <div class="form-group">
                <label for="member_id">Nama peminjam</label>
                <select name="member_id" class="form-control" id="member_id">
                    @foreach ($members as $member)
                        <option {{ $transaction->member_id == $member->id ? 'selected' : '' }} value="{{ $member->id }}">{{ $member->name }}</option>
                    @endforeach
                </select>
                @error('member_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="date_start">Tanggal Pinjam</label>
                <input type="date" name="date_start" class="form-control" id="date_start" placeholder="Masukkan Tanggal Pinjam" value="{{ $transaction->date_start }}">
                @error('date_start')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="date_end">Tanggal Kembali</label>
                <input type="date" name="date_end" class="form-control" id="date_end" placeholder="Masukkan Tanggal Kembali" value="{{ $transaction->date_end }}" >
                @error('date_end')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="book_id">Books</label>
                <select class="form-control duallistbox" multiple="multiple" id="book_id" name="book_id[]">
                    @foreach ($books as $book)
                    <option {{ optional($transaction->details)->book_id == $book->id ? 'selected' : '' }} value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
                @error('book_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>    
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.duallistbox').select2();
    });
</script>
@endsection
