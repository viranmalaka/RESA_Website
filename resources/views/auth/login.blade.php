@extends('layout')

@section('title', ' login')

@section('body')

    {!! Form::open() !!}

    {{ Form::label('email', 'Email:') }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
    <br>

    {{ Form::label('password', 'Password:') }}
    {{ Form::password('password', ['class' => 'form-control']) }}
    <br>

    <a href="#Forge_password">Forget your Password?</a>
    <br>
    {{ Form::checkbox('remember',false) }}
    {{ Form::label('remember', 'Remember Me') }}
    <br>

    {{ Form::submit('Login', ['class' => '']) }}

    {!! Form::close() !!}

@endsection