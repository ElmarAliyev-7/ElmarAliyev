@extends('back.layouts.master')
@section('title','Show Message')
@section('content')
    <div class="container text-center">
        <h3>Name      : {{$message->name}}</h3><hr>
        <h4>Email     : {{$message->email}}</h4><hr>
        <h4>Subject   : {{$message->subject}}</h4><hr>
        <p><b>Message :</b> {{$message->message}}</p>
    </div>
@endsection
