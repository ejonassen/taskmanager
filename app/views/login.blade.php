
@extends('layouts.main')

@section('content')
	<h1>Welcome! Please Log In.</h1>
	@foreach($errors->all() as $error)
		<p class="error">{{ $error }}</p>
	@endforeach
	
	<div class="cnew">
	{{ Form::open() }}
		
		Username: <input type="text" name="username"><br/>
		Password: <input type="password" name="password"><br/><br/>
		<input class="sbutton" type="submit" value="Sign In">
		
		
	{{ Form::close() }}
	<br/>
	<div class="signuplink">
		or <a href="signup">Create a new User</a>
	</div>
	</div>
@stop