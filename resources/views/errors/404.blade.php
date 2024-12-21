@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Error 404') }}</div>

                <div class="card-body">
                    It appears the page you are looking for could not be found.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection