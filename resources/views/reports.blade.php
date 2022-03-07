@extends('layouts.app')

@section("content")

    <div class="container pt-5">

        <form action="{{ route("generate-report") }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-2">
                    <input type="date" class="form-control" placeholder="Datum od" name="date_from" id="date_from" value="{{ isset($filters) && $filters != null ? $filters['date_from'] : "" }}" >
                </div>
                <div class="col-2">
                    <input type="date" class="form-control" placeholder="Datum do" name="date_to" id="date_to" value="{{ isset($filters) && $filters != null ? $filters['date_to'] : "" }}">
                </div>
                <div class="col-2">
                    <input type="number" step="0.01" class="form-control" placeholder="Iznos od" name="amount_from" id="amount_from" value="{{ isset($filters) && $filters != null ? $filters['amount_from'] : "" }}">
                </div>
                <div class="col-2">
                    <input type="number" step="0.01" class="form-control" placeholder="Iznos do" name="amount_to" id="amount_to" value="{{ isset($filters) && $filters != null ? $filters['amount_to'] : "" }}">
                </div>
                <div class="col-2">
                    <select name="expense_type_id" class="form-control">
                        <option value=""></option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ isset($filters) && $filters != null && $filters['expense_type_id'] == $type->id ? "selected" : "" }} >{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary w-100">Generiši izvještaj</button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 offset-9 text-end">
                    <input type="checkbox" name="group_by_type" id="group_by_type">
                    <label for="group_by_type"> grupisano po tipu</label>
                </div>
            </div>
        </form>

        @if(isset($data) && $data != null && count($data) > 0)
            <div class="row mt-4" id="result-div">
            <div class="col-12 table-responsive" id="table-wrapper">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Tip troška</th>
                        @if(isset($filters) && !isset($filters['group_by_type']))
                            <th>Datum</th>
                        @endif
                        <th>Iznos</th>
                    </tr>
                    </thead>
                    <tbody id="reportTableBody">
                        @foreach($data as $item)
                            <tr>
                                {{-- Expense type name --}}
                                <td>{{ $item->name }}</td>
                                @if(isset($filters) && !isset($filters['group_by_type']))
                                    <td>{{ $item->date_formatted }}</td>
                                @endif
                                <td>{{ number_format($item->amount, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row mt-3">
                    <div class="col-3">
                        <form action="" method="GET">
                            <input type="hidden" name="grouped" id="groupedChk" value="0">
                            <button class="btn btn-success w-100">Eksportuj u XLSX</button>
                        </form>
                    </div>
                    <div class="col-9">
                        <form action="{{ route('send-email-report') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <input type="email" name="email" class="form-control" placeholder="Email...">
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-primary">Posalji na mail</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

@endsection
