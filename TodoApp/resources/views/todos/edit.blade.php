@extends('layouts.app')

@section('title')
    Edit todos
@endsection

@section('content')
<h1 class="text-center my-5">Edit Todos</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Edit todo</div>
            <div class="card-body">
                <form action="/todos/{{$todo->id}}/update-todos" method="POST">
                    @csrf
                    <input type="hidden" name="todo_id" value="{{$todo->id}}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$todo->name}}" id="name" placeholder="Enter name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="des">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter description" id="des" rows="5">{{$todo->description}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Update todo</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
