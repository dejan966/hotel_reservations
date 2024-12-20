@extends('layouts.app')
@php
$rooms = App\Models\Room::all();
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price per night(€)</th>
                            <th>Short description</th>
                            <th>Long description</th>
                            <th>Edit</th>
                        </tr>
                        <tr>
                            @foreach ($rooms as $room)
                                <td>{{ $room->id }}</td>
                                <td>{{ $room->name }}</td>
                                <td>{{ $room->price }}</td>
                                <td>{{ $room->short_description }}</td>
                                <td>{{ $room->long_description }}</td>
                                <td>
                                    edit
                                </td>
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
