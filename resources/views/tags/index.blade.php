@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row float-right">
            {!! Form::open(['action' => 'TagsController@store', 'class' => 'form']) !!}
            <div class="form-inline">
                {{Form::text('tag', '', ['class' => 'form-control', 'placeholder' => 'Create new tag'])}}
                {{Form::submit('Submit', ['class'=> 'form-control btn btn-primary'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="container">
        <h1 class="text-center">Tags</h1>
        <div class="row">
            <div class="col-sm-4 mx-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><span class="glyphicon glyphicon-trash"></span></th>
                        <th scope="col">#</th>
                        <th scope="col">Tag</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <th scope="row">
                                    {{Form::open(['action' => ['TagsController@destroy', $tag->id], 'method' => 'DELETE'])}}
                                    <button type="submit"><i class="fa fa-trash-alt" style="color: red;"></i></button>
                                    {{Form::close()}}
                                </th>
                                <th>{{$tag->id}}</th>
                                <td>{{$tag->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
