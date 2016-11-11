@extends('layout')

@section('title', 'Contact us')

@section('body')

        <div class="row-fluid">
            <div class="span12">
                <div class="page-header">
                    <div class="row-fluid">
                        <div class="span12">
                            <h1> Contact</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid contact">
            <div class="span4">
                <ul class="bordered-list">
                    <li class="img-location"><b>Address:</b> {{ $address }}</li>
                    <li class="img-phone"><b>Phone:</b> {{ $telephone }}</li>
                    <li class="img-skype last"><b>Skype:</b> agency</li>
                </ul>
            </div>
            <div class="span6">
                <div class="wpcf7" id="wpcf7-f75-t1-o1">
                        {!! Form::open() !!}
                        <div id="output" class="alert"> </div>
                        <div class="form-meta clearfix">
                            <div class="formcol">
                                <label for="name"> Name</label>
                                <input type="text" name="name" value="" id="name" size="40">
                                {{ isset($message) ? $message->has('name') ? $message->first('name'): "" : ""  }}
                                <label for="email"> Email Address</label>
                                <input type="text" name="email" id="email" value="" size="40">
                                {{ isset($message) ? $message->has('email') ? $message->first('email'): "" : ""  }}
                                <label for="subject"> Subject</label>
                                <input type="text" name="subject" id="subject" value="" size="40">
                                {{ isset($message) ? $message->has('email') ? $message->first('email'): "" : ""  }}
                            </div>
                        </div>
                        <label for="message"> Message</label>
                        <textarea name="message" id="message" cols="40" rows="10"></textarea>
                    {{ isset($message) ? $message->has('message') ? $message->first('message'): "" : ""  }}
                        <input type="submit" id="send-message" value="Send" class="btn btn-success">
                        {!! Form::close() !!}
                </div>
            </div>
        </div>



@endsection