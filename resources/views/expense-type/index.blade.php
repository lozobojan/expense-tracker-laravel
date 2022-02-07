@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <h5>Tipovi troskova</h5>

            @foreach($expense_types as $type)
                <ul>
                    <li>
                        {{ $type->name }}
                        <form action="{{ route('expense-type.destroy', ['expense_type' => $type->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{ route('expense-type.edit', ['expense_type' => $type->id]) }}">Izmijeni</a>
                    </li>
                </ul>
            @endforeach

        </div>

        <div class="col-9">
            <h5>Dodavanje novog tipa troška</h5>
            <form action="{{ route('expense-type.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <label for="amountInput">Naziv:</label>
                        <input type="text" class="form-control" name="name" id="name" >
                    </div>
                    <div class="col-3">
                        <label for="dateInput">Boja:</label>
                        <input type="color" class="form-control" name="color" id="color" >
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
