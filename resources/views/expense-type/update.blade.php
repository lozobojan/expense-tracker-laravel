@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-9">
            <h5>Izmijenite trosak</h5>
            <form action="{{ route('expense-type.update', ['expense_type'=>$expense_type]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-3">
                        <label for="amountInput">Naziv:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $expense_type->name }}">
                    </div>
                    <div class="col-3">
                        <label for="dateInput">Boja:</label>
                        <input type="color" class="form-control" name="color" id="color" value="{{ old('color') ?? $expense_type->color }}">
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


@section("additional_scripts")
    <script>
        window.addEventListener("load", () => {
            loadTypes();
            // displayChart();
        });
    </script>
@endsection
