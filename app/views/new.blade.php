
@extends('layouts.main')
@section('header')
	
	<a href="{{URL::route('logout')}}">Log Out</a><span> | </span><a href="{{URL::route('home')}}">Active</a><span> | </span><a href="{{URL::route('complete')}}">Complete</a><span> | </span><a href="{{URL::route('all')}}">All</a>
	
@stop
@section('content')
    <h1>Create a Task</h1>
    <div class="cnew">
        @foreach ($errors->all() as $error)
            <p class="error">{{$error}}</p>
        @endforeach
        {{Form::open()}}
            New Task: <input type="text" name="name" size="40"/>
            <input class="sbutton" type="submit" value="Create"/>
            
        {{Form::close()}}
    </div>
@stop