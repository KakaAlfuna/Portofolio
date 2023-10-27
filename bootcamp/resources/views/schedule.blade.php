@extends('layouts.admin')

@section('header', 'Schedule')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $nameClass->name_class }}</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Date Start</th>
                @foreach ($schedules as $schedule)
                <td>{{ $schedule->date_start }}</td>
                @endforeach
            </tr>            
            <tr>
                <th>Date end</th>
                @foreach ($schedules as $schedule)
                <td>{{ $schedule->date_end}}</td>
                @endforeach
            </tr>            
        </table>
    </div>
</div>
@endsection