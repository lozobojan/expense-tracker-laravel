@extends("layout")

@section("page-title", "Expense subtype - $expense_subtype->name")

@section("main-content")

    <h1>Expense subtype: {{ $expense_subtype->name }}</h1>

    <p>ID: {{ $expense_subtype->id }}</p>
    <p>Name: {{ $expense_subtype->name }}</p>
    <p>Expense type: {{ $expense_subtype->expenseType->name }}</p>


    <br>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
@endsection
