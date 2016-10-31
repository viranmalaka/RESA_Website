@extends('layout')

@section('title', 'register user')

@section('body')

    {!! Form::open(['url'=> url('auth/register'), 'files' => true]) !!}

    {{ Form::label('name', "Name:") }}
    {{ Form::text('name', isset($input) ? $input['name'] : null, ['class' => 'form-control']) }}
    @if($messages->has('name'))<p>{{ $messages->first('name') }}</p> @endif
    <br>

    {{ Form::label('email', 'Email:') }}
    {{ Form::email('email', isset($input) ? $input['email'] : null, ['class' => 'form-control']) }}
    @if($messages->has('email'))<p>{{ $messages->first('email') }}</p> @endif
    <br>

    {{ Form::label('address', 'Address :') }}
    {{ Form::textarea('address', isset($input) ? $input['address'] : null, ['class' => 'form-control']) }}
    @if($messages->has('address'))<p>{{ $messages->first('address') }}</p> @endif
    <br>
    {{ Form::select('field', [
    'CHE' => 'Chemical and Process Engineering',
    'CSE' => 'Computer Science and Engineering',
    'EM' => 'Earth Resources Engineering',
    'CIVIL' => 'Civil Engineering',
    'EE' => 'Electrical Engineering',
    'ENTC' => 'Electronic and Telecommunication Engineering',
    'MAT' => 'Material Science and Engineering',
    'ME' => 'Mechanical Engineering',
    'TM' => 'Textile and Clothing Technology',
    'TLM' => 'Transport and Logistics Management',
    'MPR' => 'MPR'], isset($input) ? $input['field'] : null, ['class' => '']
    ) }}
    @if($messages->has('field'))<p>{{ $messages->first('field') }}</p> @endif
    <br>

    {{ Form::label('telephone', 'Telephone :') }}
    {{ Form::text('telephone', isset($input) ? $input['telephone'] : null, ['class' => 'form-control']) }}
    @if($messages->has('telephone'))<p>{{ $messages->first('telephone') }}</p> @endif
    <br>
    {{ Form::label('school', 'School :') }}
    {{ Form::text('school', isset($input) ? $input['school'] : null, ['class' => 'form-control']) }}
    @if($messages->has('school'))<p>{{ $messages->first('school') }}</p> @endif
    <br>
    {{ Form::select('gender', [
    true => 'Male',
    false => 'Female'], isset($input) ? $input['gender'] : null, ['class' => '']
    ) }}
    @if($messages->has('gender'))<p>{{ $messages->first('gender') }}</p> @endif
    <br>
    {{ Form::select('level', [
    0 => 'Juniors',
    1 => 'Level - 1',
    2 => 'Level - 2',
    3 => 'Level - 3',
    4 => 'Level - 4',
    5 => 'Post Graduate'], isset($input) ? $input['level'] : null, ['class' => '']
    ) }}
    @if($messages->has('level'))<p>{{ $messages->first('level') }}</p> @endif
    <br>

    {{ Form::label('about', 'About You :') }}
    {{ Form::textarea('about', isset($input) ? $input['about'] : null, ['class' => 'form-control']) }}
    @if($messages->has('about'))<p>{{ $messages->first('about') }}</p> @endif
    <br>

    {{ Form::label('p_pic', 'Profile Picture :') }}
    {{ Form::file('p_pic', ['class' => 'field']) }}
    @if($messages->has('p_pic'))<p>{{ $messages->first('p_pic') }}</p> @endif
    <br>

    {{ Form::label('facebook_link', 'facebook :') }}
    {{ Form::url('facebook_link', isset($input) ? $input['facebook_link'] : null, ['class' => '']) }}
    @if($messages->has('facebook_link'))<p>{{ $messages->first('facebook_link') }}</p> @endif
    <br>
    {{ Form::label('linkedin_link', 'linkedin :') }}
    {{ Form::url('linkedin_link', isset($input) ? $input['linkedin_link'] : null, ['class' => '']) }}
    @if($messages->has('linkedin_link'))<p>{{ $messages->first('linkedin_link') }}</p> @endif
    <br>
    {{ Form::label('twitter_link', 'twitter :') }}
    {{ Form::url('twitter_link', isset($input) ? $input['twitter_link'] : null, ['class' => '']) }}
    @if($messages->has('twitter_link'))<p>{{ $messages->first('twitter_link') }}</p> @endif
    <br>
    {{ Form::label('instagram_link', 'instagram :') }}
    {{ Form::url('instagram_link', isset($input) ? $input['instagram_link'] : null, ['class' => '']) }}
    @if($messages->has('instagram_link'))<p>{{ $messages->first('instagram_link') }}</p> @endif
    <br>

    {{ Form::label('password', 'Password:') }}
    {{ Form::password('password', ['class' => 'form-control']) }}
    <br>
    {{ Form::label('password_confirmation', 'Confirm Password:') }}
    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
    @if($messages->has('password'))<p>{{ $messages->first('password') }}</p> @endif
    <br>
    {{ Form::submit('Register', ['class' => '']) }}

    {!! Form::close() !!}

@endsection