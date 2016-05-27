@extends('layouts.app')

@section('content')

<ol>
    @foreach ($users as $user)
        <li>{{{$user->name}}}</li>
            <ul>
                <li>{{{$user->email}}}</li>
                <li>{{{$user->role}}}</li>
            </ul>
            <div class="profile-userbuttons">
                <a href="{{{action('UserController@edit' , $user->id)}}}" class="btn btn-success btn-sm">Edit</a>
                {!! Form::open(['method' => 'DELETE', 'action' => ['UserController@destroy', $user->id], 'class' => 'form-horizontal']) !!}

                {{ Form::submit('Delete', ['class' => "btn btn-danger btn-sm"])}}
                {!! Form::close() !!}

            </div>
            <hr>
    @endforeach
</ol>

@stop
