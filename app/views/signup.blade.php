@extends('layouts.main')

@section('content')
    
    <h1>Sign up</h1>
    @foreach($errors->all() as $error)
	<p class="error">{{ $error }}</p>
    @endforeach
    <div class="cnew">
    {{ Form::open(array('url' => '/signup')) }}
    
        Email: 
        {{ Form::text('email') }}<br/>
        
        Username: <input type="text" name="name"><br/>
         
        Password: <input type="password" name="password"><br/><br/>
        <input class="sbutton" type="submit" value="Sign Up"/>
    {{ Form::close() }}
    </div>
@stop