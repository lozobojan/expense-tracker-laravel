@extends("layout")

@section("page-title", "Expense type - $expense_type->name")

@section("main-content")

    <h1>Expense type: {{ $expense_type->name }}</h1>

    <p>ID: {{ $expense_type->id }}</p>
    <p>Name: {{ $expense_type->name }}</p>
    <p>Color: {{ $expense_type->color }}</p>


    <br>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
@endsection
