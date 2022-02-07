@extends("layout")

@section("page-title", "New expense subtype")

@section("main-content")

    <form action="{{ route("expense_subtype.store") }}" method="POST">
        @csrf

        <h1>Add new expense subtype</h1>

        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"><br>

        <select name="expense_type_id" class="form-control">
            @foreach ($expense_types as $expense_type)
                <option value="{{ $expense_type->id }}" >{{ $expense_type->name }}</option>
            @endforeach
        </select>

        <button>Save</button>

        <br>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
    </form>

@endsection
