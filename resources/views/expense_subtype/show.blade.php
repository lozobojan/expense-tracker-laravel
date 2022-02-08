@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        @if(auth()->check())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Podtipa troška</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$subtype->id}}</td>
                                    <td>{{$subtype->name}}</td>
                                    <td>
                                        <a class="btn btn-secondary" href="{{ route("subtype.index") }}" role="button">Povratak</a>
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
