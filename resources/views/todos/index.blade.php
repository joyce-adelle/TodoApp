@extends('layouts.master')

@section('content')

<h1>Todos</h1>

<div class="row mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Todos
            </div>

            @if (session()->has('msg'))
            <div class="alert alert-success">
                {{session()->get('msg')}}
            </div>

            @endif

            <div class="card-body">
                <h5 class="card-title">Task</h5>
                <form action="{{route('todos.create')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="todo">Enter Task</label>
                        <input id="todo" class="form-control {{$errors->has('todo') ? 'is-invalid' : ''}}" name="todo"
                            type="text" />
                    </div>
                    <div class="invalid-feedback">
                        {{$errors->has('todo') ? $errors->first('todo') : ''}}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                View Todos
            </div>
            <div class="card-body">
                <table class="table table-light table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $todo)

                        <tr>
                            <td>{{$todo->title}}</td>
                            <td>
                                <form action="{{route('todos.delete', $todo->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
