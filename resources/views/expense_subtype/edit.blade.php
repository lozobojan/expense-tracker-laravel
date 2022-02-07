@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Uređivanje podtipa troška</div>

                    <div class="card-body">

                        @if(auth()->check())


                            <form action="{{route('subtype.update', ['subtype' => $subtype->id])}}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="mb-3">
                                    <label for="expenseSubtypeName" class="form-label" name="name" >Podtip troška</label>
                                    <input type="text" name="name" class="form-control" id="expenseSubtypeName" value="{{$subtype->name}}">
                                    @error("name")
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="expenseTypeOptions" class="form-label">Tip troška</label>
                                    <select class="form-control" name="type" id="expenseTypeOptions">
                                        <option value="" >--Izaberi tip troska--</option>
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Dodaj</button>
                                <a class="btn btn-secondary ms-2" href="{{ route("subtype.index") }}" role="button">Povratak</a>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
