@extends("layout")

@section("page-title", "Edit expense subtype")

@section("main-content")

    <form action="{{ route("expense_subtype.update", ['expense_subtype' => $expense_subtype->id]) }}" method="POST">
        @csrf
        @method("PUT")

        <h1>Edit expense subtype: {{ $expense_subtype->name }}</h1>

        <input type="text" name="name" placeholder="Name" value="{{ $expense_subtype->name }}" ><br>

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
