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

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('password') }}</small>
        </div>

        @if ($user->role == 'Admin')

            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                {!! Form::label('role', 'Input label') !!}
                {!! Form::select('role', ['Admin','user'], 'user', ['class' => 'form-control', 'required' => 'required', 'multiple']) !!}
                <small class="text-danger">{{ $errors->first('role') }}</small>
            </div>
        @endif

        <button type="submit" name="button">Save</button>
    {!! Form::close() !!}
@stop
