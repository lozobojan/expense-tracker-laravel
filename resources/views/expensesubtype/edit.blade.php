@extends("layouts.app")

@section("page-title","Izmjena podtipa")

@section("content")

    <div class="row">
        <div class="row offset-4">
            <h2>Izmjena podtipa troška</h2>
            <form action="{{ route("expensesubtype.update", ['expensesubtype' => $expensesubtype->id]) }}" method="POST">
                @csrf
                @method("PUT")
                <input type="text" name="name" placeholder="Name..." value="{{ $expensesubtype->name }}" >
                <button class="btn btn-success">Potvrdi</button>
            </form>
        </div>

    </div>





@endsection
