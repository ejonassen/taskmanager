<?php

class LogController extends Controller{
    //login
    public function getLogin(){
        return View::make('login');
    }
    public function postLogin(){
        $logrules = array('username' => 'required', 'password' => 'required');
        $validator = Validator::make(Input::all(), $logrules);
        
        if ($validator->fails()){
            return Redirect::route('login')->withErrors($validator);
        
        }
        
        
        $check = Auth::attempt(array(
            'name' => Input::get('username'),
            'password' => Input::get('password')
            ),false);
        
        if (!$check){
            return Redirect::route('login')->withErrors(array('Username and Password did not match.'));
        }
        
        return Redirect::route('home');
    }
    
    
    //signup/newuser
    public function getSignUp(){
        return View::make('signup');
    }
    
    public function postSignUp(){
        
        $user = new User;
        
        $user->email    = Input::get('email');
        $user->name    = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        
        $logrules = array('email' => 'required|email|unique:users',
                          'password' => 'required|min:3',
                          'username' => 'required|unique:users');
        $validator = Validator::make(Input::all(), $logrules);
        
        if ($validator->fails()){
            return Redirect::to('signup')->withErrors($validator);
        }
        
        $user->save();
        
        Auth::login($user);
        return Redirect::route('home');
        
    }
    
    //logout
    public function getLogout() {
        Auth::logout();
        return Redirect::to('/');
    }
}

?>