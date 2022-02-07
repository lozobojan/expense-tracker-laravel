@extends('layouts.app')

@section("page-title","Expense Tracker")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <h5>Troškovi koje pratite</h5>

            @foreach($expense_types as $type)
                <div class="row">
                    <div class="col-2">
                        <input type="checkbox" id="chk_type_{{ $type->id }}" @if($type->isLinkedToCurrentUser()) checked @endif onchange="save({{ $type->id }}, '{{ csrf_token() }}' )" />
                    </div>
                    <div class="col-10">
                        <label for="chk_type_{{ $type->id }}">{{ $type->name }}</label>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col-9">
            <h5>Dodavanje novog troška</h5>
            <form action="{{ route("expense.store") }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <label for="amountInput">Iznos:</label>
                        <input type="number" step="0.01" class="form-control" name="amount" id="amountInput" >
                    </div>
                    <div class="col-3">
                        <label for="dateInput">Datum:</label>
                        <input type="date" class="form-control" name="date" id="dateInput" >
                    </div>
                    <div class="col-3">
                        <label for="selectType">Tip troška:</label>
                        <select name="expense_type_id" class="form-control" id="selectType" onchange="getSubtypes()"></select>
                    </div>
                    <div class="col-3">
                        <label for="selectSubtype">Podtip troška:</label>
                        <select name="expense_subtype_id" class="form-control" id="selectSubtype"></select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-3 offset-9">
                        <button class="btn btn-success w-100">Sačuvaj</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

@section("additional_scripts")
    <script>
        window.addEventListener("load", () => {
            loadTypes();
            // displayChart();
        });
    </script>
@endsection
