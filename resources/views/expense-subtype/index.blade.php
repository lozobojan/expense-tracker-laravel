@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <h5>Tipovi podtroskova</h5>

            @foreach($expense_subtypes as $type)
                <ul>
                    <li>
                        {{ $type->name }} - {{ $type->expenseType->name }}
                        <form action="{{ route('expense-subtype.destroy', ['expense_subtype' => $type->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{ route('expense-subtype.edit', ['expense_subtype' => $type->id]) }}">Izmijeni</a>
                    </li>
                </ul>
            @endforeach

        </div>

        <div class="col-9">
            <h5>Dodavanje novog podtipa troška</h5>
            <form action="{{ route('expense-subtype.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <label for="amountInput">Naziv:</label>
                        <input type="text" class="form-control" name="name" id="name" >
                    </div>
                    <div class="col-3">
                        <label for="dateInput">Tip:</label>
                        <select name="expense_type_id" class="form-control" id="selectExpenseType">
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
