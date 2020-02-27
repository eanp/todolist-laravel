@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="display-4 text-center my-4">Todo List</h1>

    <div class="card text-center mx-auto" style="width: 20rem;">
        <div class="card-body">
            <h4 class="card-title">Add List</h4>
            <form action="/" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-8">
                        <input type="text" class="p-1" placeholder="your list" name="list" required="required">
                    </div>
                    <div class="col-4 px-1">
                        <input class="btn btn-primary " type="submit" value="Add">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center mx-auto mt-3" style="width: 20rem;">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>List</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                <tr>
                    <th>
                        {{ $todo->list }}
                        <div class="float-right">
                            <a type="submit" class="btn btn-secondary btn-sm mr-1" href="/{{$todo->id}}">
                                <i class="fa fa-btn fa-edit"></i>
                            </a>
                            <a type="submit" class="btn btn-danger btn-sm mr-1" href="/delete/{{ $todo->id }}">
                                <i class="fa fa-btn fa-trash"></i>
                            </a>
                        </div>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
</div>
@endsection