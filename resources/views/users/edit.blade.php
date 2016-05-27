@extends('layouts.app')

@section('content')
    {!!Form::model($user, ['action'=>['UserController@update', $user->id], 'method' => 'put', 'files' => true])!!}
        {{ Form::label('name', 'Name') }}

        {{ Form::text('name', null, [ 'class'=>"form-control text-center"]) }}
        @if ($errors->has('name'))
            {{ $errors->first('name', '<span class="help-block errorsColor">:message</span>') }}
        @endif

        {{ Form::label('email', 'Email') }}
        {{ Form::textarea('email', null, [ 'class'=>"form-control", 'rows'=>"5"])}}
        @if ($errors->has('email'))
            {{ $errors->first('email', '<span class="help-block errorsColor">:message</span>') }}
        @endif

        {{ Form::label('password', 'Password') }}
        {{ Form::text('password', null, [ 'class'=>"form-control", 'rows'=>"5", 'password'])}}
        @if ($errors->has('password'))
            {{ $errors->first('password', '<span class="help-block errorsColor">:message</span>') }}
        @endif

        <button type="submit" name="button">Save</button>
    {!! Form::close() !!}
@stop
