@extends("layout")

@section("page-title", "Expense subtypes")

@section("main-content")

    <h1>Expense subtypes</h1>

    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>
        @foreach($expense_subtypes as $expense_subtype)
            <tr>
                <td>{{ $expense_subtype->id }}</td>
                <td>
                    <a href="{{ route("expense_subtype.show", ['expense_subtype' => $expense_subtype->id]) }}">{{ $expense_subtype->name }}</a>
                </td>
                <td>
                    {{ $expense_subtype->expenseType->name }}
                </td>
                <td>
                    <a href="{{ route("expense_subtype.edit", ['expense_subtype' => $expense_subtype->id]) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route("expense_subtype.destroy", ['expense_subtype' => $expense_subtype->id]) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route("expense_subtype.create") }}">
        <button class="button btn-primary">New expense subtype</button>
    </a>

@endsection
