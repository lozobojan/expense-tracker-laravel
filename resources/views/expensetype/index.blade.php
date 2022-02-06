@extends("layouts.app")

@section("page-title","Expense Types")

@section("content")
    <div class="row mt-4">
        <div class="col-6 offset-3">
            <h2 class="text-center">Tipovi Troška</h2>
            <table class="table table-hover ">
                <thead>
                    <th>Tip troška</th>
                    <th>Boja</th>
                    <th>Izmjena</th>
                    <th>Obriši</th>
                </thead>
                <tbody>
                    @foreach($expensetypes as $expensetype)

                        <tr>
                            <td><a href="{{route("expensetype.show",['expensetype'=> $expensetype->id])}}" >{{$expensetype->name}}</a></td>
                            <td><div style="height:40px;width:50px;background-color:{{$expensetype->color}} "></div></td>
                            <td><a href="{{ route("expensetype.edit", ['expensetype' => $expensetype->id]) }}" class="btn btn-info">Izmijeni</a></td>
                            <td><form action="{{ route("expensetype.destroy", ['expensetype' => $expensetype->id]) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger">Obriši</button>
                                </form></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="col offset-9">
                <a href="{{route("expensetype.create")}}" class="btn btn-success">Dodaj novi tip troška</a>
            </div>


        </div>
    </div>
@endsection
