@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Post</h2>
        {!! Form::open(['action' => 'PostsController@store']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title...'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['id' => 'ck','class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
