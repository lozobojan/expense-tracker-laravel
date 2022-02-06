@extends('layouts.simple_layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel CRUD for Expense type</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('expense-types.create') }}"> Create new type</a>
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
            <th>Color</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($expense_types as $expense_type)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $expense_type->name }}</td>
                <td>{{ $expense_type->color }}</td>
                <td>
                    <form action="{{ route('expense-types.destroy',$expense_type->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('expense-types.show',$expense_type->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('expense-types.edit',$expense_type->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $expense_types->links() !!}

@endsection
