@extends("layouts.app")

@section("page-title","Tip troška")

@section("content")


    <div class="row text-center">
        <div class="col">
            <h1>{{$expensetype->name}}</h1>
            <div class="btn disabled" style="width:100px;height:100px;background-color: {{$expensetype->color}}"></div>
            <h4>Podtipovi:</h4>
            @if($array)
                @foreach($array as $element)
                    <span class="me-2">{{$element->name }}</span>
                @endforeach
            @else
                    <span>Nema podtipova</span>

            @endif

            </h4>
        </div>
    </div>

@endsection
