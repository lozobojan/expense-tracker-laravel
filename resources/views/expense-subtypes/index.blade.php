@extends('layouts.simple_layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel CRUD for Expense subtype</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('expense-subtypes.create') }}"> Create new subtype</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Type id</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($expense_subtypes as $expense_subtype)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $expense_subtype->name }}</td>
                <td>{{ $expense_subtype->expense_type_id }}</td>
                <td>
                    <form action="{{ route('expense-subtypes.destroy',$expense_subtype->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('expense-subtypes.show',$expense_subtype->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('expense-subtypes.edit',$expense_subtype->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $expense_subtypes->links() !!}

@endsection
