@extends("layouts.app")

@section("page-title","Dodavanje podtipa toška")

@section("content")

    <div class="row">
        <div class="col-4 offset-4">
            <h2>Dodavanje tipa troška</h2>
            <form action="{{route("expensesubtype.store")}}" method="POST">
                @csrf

                <select name="expense_type_id" id="expense_type">
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>


                <input type="text" name="name" placeholder="Naziv troška">
                <button class="btn btn-success ">Dodaj</button>
            </form>
        </div>
    </div>

@endsection
