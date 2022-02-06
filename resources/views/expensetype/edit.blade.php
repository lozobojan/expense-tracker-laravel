@extends("layouts.app")

@section("page-title","Izmjena troška")

@section("content")


    <div class="row">
        <div class="row offset-4">
            <h2>Izmjena troška:</h2>
            <form action="{{ route("expensetype.update", ['expensetype' => $expensetype->id]) }}" method="POST">
                @csrf
                @method("PUT")
                <input type="text" name="name" placeholder="Name..." value="{{ $expensetype->name }}" >
                <input type="color" name="color" vlaue=""{{$expensetype->color}}>
                <button class="btn btn-success">Potvrdi</button>
            </form>
        </div>

    </div>


@endsection
