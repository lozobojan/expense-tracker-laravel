@extends("layout")

@section("page-title", "Expense types")

@section("main-content")

    <h1>Expense types</h1>

    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Color</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>
        @foreach($expense_types as $expense_type)
            <tr>
                <td>{{ $expense_type->id }}</td>
                <td>
                    <a href="{{ route("expense_type.show", ['expense_type' => $expense_type->id]) }}">{{ $expense_type->name }}</a>
                </td>
                <td>
                    {{ $expense_type->color }}
                </td>
                <td>
                    <a href="{{ route("expense_type.edit", ['expense_type' => $expense_type->id]) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route("expense_type.destroy", ['expense_type' => $expense_type->id]) }}" method="POST">
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
    <a href="{{ route("expense_type.create") }}">
        <button class="button btn-primary">New expense type</button>
    </a>

@endsection
