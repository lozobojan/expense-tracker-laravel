@extends("layouts.app")


@section("page-title","Expense Subtypes")

@section("content")

    <div class="row mt-4">
        <div class="col-6 offset-3">
            <h2 class="text-center">Podtipovi Troška</h2>
            <table class="table table-hover ">
                <thead>
                <th>Tip troška</th>
                <th>Podvrsta</th>
                <th>Izmjena</th>
                <th>Obriši</th>
                </thead>
                <tbody>
                @foreach($expensesubtypes as $expensesubtype)
                    <tr>
                        <td>
                            <a href="{{route("expensetype.show",['expensetype'=> $expensesubtype->expense_type_id])}}">{{$expensesubtype->expense}}</a>
                        </td>
                        <td>
                            <a href="{{route("expensesubtype.show",['expensesubtype'=> $expensesubtype->id])}}">{{$expensesubtype->name}}</a>
                        </td>
                        <td>
                            <a href="{{ route("expensesubtype.edit", ['expensesubtype' => $expensesubtype->id]) }}" class="btn btn-info">Izmijeni</a>
                        </td>
                        <td>
                            <form action="{{ route("expensesubtype.destroy", ['expensesubtype' => $expensesubtype->id]) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger">Obriši</button>
                            </form></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="col offset-9">
                <a href="{{route("expensesubtype.create")}}" class="btn btn-success">Dodaj novi podtip troška</a>
            </div>
@endsection
