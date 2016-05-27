@extends('layouts.app')

@section('content')
    <div class="container">


    {!!Form::open(['action'=>['UserController@create'], 'method' => 'post', 'files' => true])!!}
        {{ Form::label('name', 'Name') }}

        {{ Form::text('name', null, [ 'class'=>"form-control text-center"]) }}
        @if ($errors->has('name'))
            {{ $errors->first('name', '<span class="help-block errorsColor">:message</span>') }}
        @endif

        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, [ 'class'=>"form-control text-center", 'rows'=>"5"])}}
        @if ($errors->has('email'))
            {{ $errors->first('email', '<span class="help-block errorsColor">:message</span>') }}
        @endif
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('password') }}</small>
        </div>

        @if (Auth::user()->role == 'Admin')

            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                {!! Form::label('role', 'Input label') !!}
                {!! Form::select('role', ['Admin' => 'Admin','user' => 'user'], 'user', ['class' => 'form-control', 'required' => 'required', 'multiple']) !!}
                <small class="text-danger">{{ $errors->first('role') }}</small>
            </div>
        @endif

        <button type="submit" name="button">Save</button>
    {!! Form::close() !!}
</div>
@stop
