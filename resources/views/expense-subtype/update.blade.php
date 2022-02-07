@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-9">
            <h5>Dodavanje novog podtipa troška</h5>
            <form action="{{ route('expense-subtype.update', ['expense_subtype' => $expense_subtype]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-3">
                        <label for="amountInput">Naziv:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $expense_subtype->name }}">
                    </div>
                    <div class="col-3">
                        <label for="dateInput">Tip:</label>
                        <select name="expense_type_id" class="form-control" id="selectExpenseType" value="{{ old('expense_type_id') ?? $expense_subtype->expense_type_id }}">
                            @foreach($expense_types as $expenseType)
                                <option value="{{ $expenseType->id }}">{{ $expenseType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-3 offset-9">
                        <button type="submit" class="btn btn-success w-100">Sačuvaj</button>
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
