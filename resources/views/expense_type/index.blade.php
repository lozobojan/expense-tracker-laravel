@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tipovi troškova</div>

                    <div class="card-body">

                        @if(auth()->check())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Color</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($types as $type)
                                    <tr>
                                        <td>{{$type->id}}</td>
                                        <td>{{$type->name}}</td>
                                        <td>{{$type->color}}</td>
                                        <td>
                                           <a class="btn btn-outline-primary" href=" {{ route("type.show", ['type' => $type->id]) }}">Prikaži</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route("type.edit", ['type' => $type->id]) }}">Uredi</a>
                                        </td>
                                        <td>
                                            <form action="{{ route("type.destroy", ['type' => $type->id]) }}" method="POST">
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
                                <a class="btn btn-primary col-3 offset-9" href="{{ route("type.create") }}" role="button">Dodaj novi tip troška</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
