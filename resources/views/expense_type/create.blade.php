@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodavanje novog tipa troška</div>

                    <div class="card-body">

                        @if(auth()->check())
                            <form action="{{route('type.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="expenseTypeName" class="form-label">Naziv</label>
                                    <input type="text" name="name" class="form-control" id="expenseTypeName">
                                    @error("name")
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="expenseTypeColor" class="form-label">Boja</label>
                                    <input type="text" name="color" class="form-control" id="expenseTypeColor">
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-secondary ms-2" href="{{ route("type.index") }}" role="button">Povratak</a>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
