@extends('layouts.app')

@section('title')
    Todos list
@endsection

@section('content')
<div class="container">
    <h1 class="text-center my-5">TODOS PAGE</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Todos list
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($todos as $item)
                            <li class="list-group-item clearfix">
                                {{$item->name}}
                                <a href="/todos/{{$item->id}}/delete" class="btn btn-danger btn-sm float-right">Delete</a>
                                <a href="/todos/{{$item->id}}/edit" class="btn btn-info btn-sm mr-2 float-right">Edit</a>
                                <a href="/todos/{{$item->id}}" class="btn btn-primary btn-sm mr-2 float-right">View</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{ $todos->links() }}
        </div>
    </div>
</div>
@endsection