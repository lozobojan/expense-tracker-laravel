@extends("layout")

@section("page-title", "New expense type")

@section("main-content")

    <form action="{{ route("expense_type.store") }}" method="POST">
        @csrf

        <h1>Add new expense type</h1>

        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"><br>
        <input type="text" name="color" placeholder="Color (eg. #CB2525, #1C717822)" value="{{ old('color') }}" >


        <button>Save</button>

        <br>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
    </form>

@endsection
