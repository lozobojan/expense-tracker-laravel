@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Prikazani tip troška</div>

                    <div class="card-body">

                        @if(auth()->check())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tip troška</th>
                                    <th>Boja</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$type->id}}</td>
                                        <td>{{$type->name}}</td>
                                        <td>{{$type->color}}</td>
                                        <td>
                                            <a class="btn btn-secondary" href="{{ route("type.index") }}" role="button">Povratak</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
