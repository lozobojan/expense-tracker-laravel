@extends('layouts.app')

@section("page-title","Expense Tracker")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <div class="card-body">

                        @if(auth()->check())
                            <p>{{ auth()->user()->is_admin }}</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
