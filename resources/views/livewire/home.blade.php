@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Laravel Livewire Crud') }}</h2>
                </div>
                <div class="card-body">
                    <livewire:users />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



