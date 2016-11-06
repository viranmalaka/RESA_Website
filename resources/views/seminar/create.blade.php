@extends('layout')

@section('body')

    {!! Form::open(['route' => 'seminar.store', 'files' => true ]) !!}

    {{ Form::label('school', "School :") }}
    {{ Form::text('school', isset($input) ? $input['school'] : null, ['class' => '']) }}
    @if(isset($messages)) @if($messages->has('school'))<p>{{ $messages->first('school') }}</p> @endif @endif
    <br>

    {{ Form::label('date' , 'Date :') }}
    {{ Form::date('date', \Carbon\Carbon::now()) }}
    {{ isset($message) ? $message->has('date') ? $message->first('date'): "" : ""  }}
    <br>

    {{ Form::label('description', 'Description :') }}
    {{ Form::textarea('description', isset($input) ? $input['description'] : null, ['class' => '']) }}
    @if(isset($messages)) @if($messages->has('description'))<p>{{ $messages->first('description') }}</p> @endif @endif
    <br>

    {{ Form::select('users[]', $users,
    isset($input) ? $input['level'] : isset($input) ? input['users'] : null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple' ]
    ) }}
    <br>

    {{ Form::label('pics', 'photos :') }}
    {{ Form::file('pics[]', ['class' => 'field','multiple' => 'multiple' ]) }}
    @if(isset($messages)) @if($messages->has('pics'))<p>{{ $messages->first('pics') }}</p> @endif @endif
    <br>

    {{ Form::submit('Submit', ['class' => '']) }}

    {!! Form::close() !!}

@endsection

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

@endsection