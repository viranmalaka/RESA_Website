@extends('layout')

@section('title', 'create question')

@section('body')

    {!! Form::open(['route'=> 'questions.store']) !!}

    {{ Form::label('name', "Name:") }}
    {{ Form::text('name', isset($input) ? $input['name'] : null, ['class' => '']) }}
    @if(isset($messages)) @if($messages->has('name'))<p>{{ $messages->first('name') }}</p> @endif @endif
    <br>

    {{ Form::label('email', 'Email:') }}
    {{ Form::email('email', isset($input) ? $input['email'] : null, ['class' => '']) }}
    @if(isset($messages)) @if($messages->has('email'))<p>{{ $messages->first('email') }}</p> @endif @endif
    <br>

    {{ Form::label('title', 'Title :') }}
    {{ Form::text('title', isset($input) ? $input['title'] : null, ['class' => '']) }}
    @if(isset($messages)) @if($messages->has('title'))<p>{{ $messages->first('title') }}</p> @endif @endif
    <br>

    {{ Form::label('body', 'Question :') }}
    {{ Form::textarea('body', isset($input) ? $input['body'] : null, ['class' => '']) }}
    @if(isset($messages)) @if($messages->has('body'))<p>{{ $messages->first('body') }}</p> @endif @endif
    <br>

    {{ Form::select('tag[]', $tags,
    isset($input) ? $input['level'] : null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple' ]
    ) }}

    {{ Form::submit('Submit', ['class' => '']) }}

    {!! Form::close() !!}

@endsection


@section('scripts')

    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

@endsection