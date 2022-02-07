@extends("layout")

@section("page-title", "Edit expense type")

@section("main-content")

    <form action="{{ route("expense_type.update", ['expense_type' => $expense_type->id]) }}" method="POST">
        @csrf
        @method("PUT")
        <h1>Edit expense type: {{ $expense_type->name }}</h1>
        <input type="text" name="name" placeholder="Name" value="{{ $expense_type->name }}"><br>
        <input type="text" name="color" placeholder="Color (eg. #CB2525, #1C717822)" value="{{ $expense_type->color }}">


        <button>Save</button>

        <br>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
    </form>

@endsection
