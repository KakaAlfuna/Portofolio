@extends('layouts.admin')

@section('header', 'Catalog')

@section('content')
<a class="btn btn-primary" href="{{ url('catalogs/create') }}">Create New Catalog</a>
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Total Books</th>
                <th class="text-center">Created At</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catalogs as $key => $catalog)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{ $catalog->name }}</td>
                <td class="text-center">{{ COUNT($catalog->books) }}</td>
                <td class="text-center">{{ convertDate($catalog->created_at) }}</td>
                <td class="text-center">
                    <a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-warning">Edit</a>
                </td>
                <td class="text-center" >
                    <form action="{{ url('catalogs', ['id'=> $catalog->id]) }}" method="POST" >
                        <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection