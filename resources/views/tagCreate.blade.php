@extends('layout')

@section('body')

    {!! Form::open(['route' => 'tags.store']) !!}

    {{ Form::label('name', 'Name :') }}
    {{ Form::text('name', null, ['class' => '']) }}

    {{ Form::submit('Submit', ['class' => '']) }}

    {!! Form::close() !!}

@endsection