<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		$tasks = Auth::user()->tasks()
		->orderBy('done', 'asc')
		->orderBy('updated_at', 'desc')
		->get();
		
		return View::make('home', array('tasks'=>$tasks));
	}
	public function getcIndex()
	{
		$tasks = Auth::user()->tasks()
		->orderBy('done', 'asc')
		->orderBy('updated_at', 'desc')
		->get();
		
		return View::make('complete', array('tasks'=>$tasks));
	}
	public function getaIndex()
	{
		$tasks = Auth::user()->tasks()
		->orderBy('done', 'asc')
		->orderBy('updated_at', 'desc')
		->get();
		
		return View::make('all', array('tasks'=>$tasks));
	}
	public function getNew(){
		return View::make('new');
	}
	public function postNew(){
		$rules = array('name' =>'required|min:3|max:1000');
		$validator = Validator::make(Input::all(), $rules);
		$userId=Auth::user()->id;
		
		if($validator->fails()){
			return Redirect::route('new')->withErrors($validator);
		}
		$task = new Task;
		$task -> name = Input::get('name');
		$task -> owner_id = $userId;
		$task -> save();
		return Redirect::route('home');
	}
	public function getEdit($item){
		return View::make('edit', array('item'=>$item));
	}	
	public function postEdit($item){
		$item -> name = Input::get('name');
		$item -> save();
		return Redirect::route('home');
	}	
	public function postIndex(){
		$id = Input::get('id');
		$task = Task::findorFail($id);
		$userId = Auth::user()->id;
		if ($task->owner_id == $userId){
			$task->mark();
		}
		return Redirect::route('home');
	}
		public function postcIndex(){
		$id = Input::get('id');
		$task = Task::findorFail($id);
		$userId = Auth::user()->id;
		if ($task->owner_id == $userId){
			$task->mark();
		}
		return Redirect::route('complete');
	}
		public function postaIndex(){
		$id = Input::get('id');
		$task = Task::findorFail($id);
		$userId = Auth::user()->id;
		if ($task->owner_id == $userId){
			$task->mark();
		}
		return Redirect::route('all');
	}
	public function getDelete($item){
		$userId = Auth::user()->id;
		if($item->owner_id == $userId){
			$item->delete();
		}
		
		
		return Redirect::route('home');
		
	}

}
