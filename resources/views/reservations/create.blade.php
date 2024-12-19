@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('reservations.partials.create-reservation-form')
    </div>
</div>
@endsection
