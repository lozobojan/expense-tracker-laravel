@extends("layouts.app")


@section("page-title","Dodavanje troška")

@section("content")


    <div class="row">
        <div class="col-4 offset-4">
            <h2>Dodaj tip troška</h2>
            <form action="{{route("expensetype.store")}}" method="POST">
                @csrf
                <input type="text" name="name" required placeholder="Naziv troška">
                <input  type="color" name="color">
                <button class="btn btn-success ">Dodaj</button>
            </form>
        </div>
    </div>





@endsection
