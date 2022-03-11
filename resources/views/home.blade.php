@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <h5>{{ __("dashboard.Tracked expenses") }}</h5>

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
            <h5>{{ __("dashboard.Add new expense") }}</h5>
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

    <div class="row">
        <div class="col-3 pt-5">
            <canvas id="pieChart" width="400" height="400"></canvas>
            <h6 class="text-end">Ukupno: <span id="expensesTotal"></span> €</h6>
        </div>

        <div class="col-9 table-responsive">
            <h5>
                Poslednjih
                <form action="{{ route('home') }}" method="GET" id="selectLimitForm">
                    <select name="limit" id="selectLimit" onchange="changeLimit()">
                        @foreach($lengths as $key => $l)
                            <option value="{{ $l }}"
                                    @if(request()->has('limit') && request()->get("limit") == $l) selected @endif
                            >{{ $key }}</option>
                        @endforeach
                    </select>
                </form>
                troškova
            </h5>
            <table class="table table-stripped table-hover mt-3" >
                <thead>
                <tr>
                    <th>Detalji</th>
                    <th>Iznos</th>
                    <th>Datum</th>
                    <th>Tip</th>
                    <th>Podtip</th>
                    <th>Broj fajlova</th>
                    <th>Pridruženi fajlovi</th>
                    <th>Dodaj fajl</th>
                </tr>
                </thead>
                <tbody>

                @foreach($expenses as $expense)
                    <tr>
                        <td><a href="{{ route('expense.show', ['expense' => $expense ]) }}" class="btn btn-primary btn-sm">pogledaj</a></td>
                        <td>{{ number_format($expense->amount, 2) }}</td>
                        <td>{{ $expense->date_formatted }}</td>
                        <td>{{ $expense->type->name }}</td>
                        <td>{{ $expense->subtype->name ?? ""}}</td>
                        <td>{{ $expense->attachments_count }}</td>
                        <td><a class="btn btn-primary btn-sm @if($expense->attachments_count == 0) disabled @endif " onclick='showAttachments({{ $expense->id }})' >prikaži</a></td>
                        <td><a class="btn btn-success btn-sm" onclick='addNewAttachment({{ $expense->id }})' >dodaj</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>

@include('partials.new_attachment_modal')
@include('partials.attachments_modal')

@endsection

@section("additional_scripts")
    <script src="{{ asset("js/dashboard_chart.js") }}"></script>
    <script>
        window.addEventListener("load", () => {
            loadTypes();
            displayChart();
        });
    </script>
@endsection
