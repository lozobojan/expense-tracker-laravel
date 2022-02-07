@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodavanje novog podtipa troška</div>

                    <div class="card-body">

                        @if(auth()->check())
                            <form action="{{route('subtype.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="expenseSubtypeName" class="form-label">Podtip troška</label>
                                    <input type="text" name="name" class="form-control" id="expenseSubtypeName" value="{{ old('name') }}">
                                    @error("name")
                                        <span>{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="expenseTypeOptions" class="form-label">Tip troška</label>
                                    <select class="form-control" name="expense_type_id" id="expenseTypeOptions">
                                        <option>--Izaberi tip troska--</option>
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                    @error("expense_type_id")
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">Dodaj</button>
                                <a class="btn btn-secondary ms-2" href="{{ route("subtype.index") }}" role="button">Povratak</a>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
