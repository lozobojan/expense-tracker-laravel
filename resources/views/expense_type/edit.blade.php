@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Uređivanje tipa troška</div>

                    <div class="card-body">

                        @if(auth()->check())
                            <form action="{{route('type.update', ['type' => $type->id])}}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="mb-3">
                                    <label for="expenseTypeName" class="form-label" >Naziv</label>
                                    <input type="text" name="name" class="form-control" value="{{$type->name}}" id="expenseTypeName">
                                </div>
                                <div class="mb-3">
                                    <label for="expenseTypeColor" class="form-label">Boja</label>
                                    <input type="text" name="color" class="form-control" value="{{$type->color}}" id="expenseTypeColor">
                                </div>
                                <button type="submit" class="btn btn-primary">Sačuvaj</button>
                                <a class="btn btn-secondary ms-2" href="{{ route("type.index") }}" role="button">Povratak</a>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
