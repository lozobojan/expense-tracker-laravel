@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Podtipovi troška</div>

                    <div class="card-body">

                        @if(auth()->check())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subtypes as $subtype)
                                    <tr>
                                        <td>{{$subtype->id}}</td>
                                        <td>{{$subtype->name}}</td>
                                        <td>
                                            <a class="btn btn-outline-primary" href=" {{ route("subtype.show", ['subtype' => $subtype->id]) }}">Prikaži</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route("subtype.edit", ['subtype' => $subtype->id]) }}">Uredi</a>
                                        </td>
                                        <td>
                                            <form action="{{ route("subtype.destroy", ['subtype' => $subtype->id]) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger">Izbriši</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="container">
                                <a class="btn btn-primary col-3 offset-9" href="{{ route("subtype.create") }}" role="button">Dodaj novi podtip troška</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
