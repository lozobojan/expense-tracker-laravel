@extends('layouts.app')

@section("content")

    <div class="container pt-5">

        @can('view', $expense)
            <h3> Iznos: {{ number_format($expense->amount, 2) }} </h3>
            <h3> Tip: {{ $expense->type->name }} </h3>
        @else
            <h1 class="text-center">Nemate pristup trazenom podatku!</h1>
        @endcan
    </div>

@endsection
