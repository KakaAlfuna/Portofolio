@extends('layouts.admin')

@section('header', 'Transaction Detail')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Transaction Information</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Anggota</th>
                <td>{{ $transaction->member->name }}</td>
            </tr>
            <tr>
                <th>Tanggal Peminjaman</th>
                <td>{{ $transaction->date_start }}</td>
            </tr>
            <tr>
                <th>Tanggal Kembali</th>
                <td>{{ $transaction->date_end }}</td>
            </tr>
            <tr>
                <th>Book</th>
                <td>
                    @foreach($books as $key => $book)
                    {{ $key + 1 }}. {{ $book->title }}<br>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if ($transaction->date_end)
                        Done
                    @else
                        Borrowing
                    @endif
                </td>
            </tr>            
        </table>
    </div>
</div>
@endsection
