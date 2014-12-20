@extends('layouts.main')

@section('header')
	
	<a href="{{URL::route('logout')}}">Log Out</a><span> | </span><a href="{{URL::route('home')}}">Active</a><span> | </span><a href="{{URL::route('complete')}}"><span id="current" >Complete</span></a><span> | </span><a href="{{URL::route('all')}}">All</a>
	
@stop

@section('content')
	
	<h1>Your Completed Tasks</h1>
	
	
	<div class="tasklist">
	@foreach ($tasks as $task)
		@if($task->done)
		<div class="taskbubble">
		{{Form::open()}}
			
			<span class="tasktext">{{e($task->name)}}</span>
				
			<div class="edlinks">
				<small id="arch"><a  href="{{URL::route('edit',$task->id)}}">(edit)</a></small>
				<small id="arch"><a  href="{{URL::route('delete',$task->id)}}">(delete)</a></small>
			</div>
			<div class="compcheck">
			Mark as Complete
			<input type="checkbox"
				onClick="this.form.submit()"
				{{$task->done?'checked':''}}
			/>
			</div>
			
			<div class="udate">Updated:  {{$task->updated_at}}</div>
			<div class="cdate">Created:  {{$task->created_at}}</div>
			
			
			
			<input type="hidden" name="id" value="{{ $task -> id }}" />
		{{Form::close()}}
		
		
		</div>
		@endif
	@endforeach
	</div>
	
@stop