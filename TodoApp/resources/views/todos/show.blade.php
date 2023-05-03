@extends('layouts.app')

@section('title')
    Detail
@endsection

@section('content')
<h1 class="text-center my-5">
    {{$todo->name}}
</h1>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header">
                Details
            </div>

            <div class="card-body">
                {{$todo->description}}
            </div>
        </div>
        <a href="/todos/{{$todo->id}}/edit" class="btn btn-info btn-sm my-2">Edit</a>
        @if (!$todo->completed)
            <a href="/todos/{{$todo->id}}/complete" class="btn btn-warning btn-sm my-2">Complete</a>
        @endif
    </div>
</div>
@endsection