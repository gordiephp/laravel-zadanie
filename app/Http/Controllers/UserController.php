<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getSignIn() {
        return view('templates.signin');   
    }
    
    public function postSignIn(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:50',
            'password' => 'required',
        ]);
    
        if($validator->fails()) {
            return Redirect('signin')
                ->withInput()
                ->withErrors($validator);
        }
        
        $username = $request->input('username');
        $password = $request->input('password');
       
        if(Auth::attempt(['username' => $username,'password' =>$password])) {
             return Redirect()->route('home');  
        }
        return Redirect()->back();
    }
    
    public function getSignUp() {
        return view('templates.signup');   
    }
    
    public function postSignUp(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|max:50',
            'password' => 'required',
        ]);
    
        if($validator->fails()) {
            return Redirect('signup')
                ->withInput()
                ->withErrors($validator);
        }
        
        $username = $request->input('username');
        $password = bcrypt($request->input('password'));
        
        $user = new User();
        
        $user->username = $username;
        $user->password = $password; 
        $user->save();

        return Redirect()->Route('home');
    }
    
    public function logout() {
        Auth::logout();  
        return Redirect()->Route('signIn');
    }
    
    public function users() {
        $users = User::orderBy('id', 'asc')->get();
        return view('templates.users',[
            'users' => $users,
        ]);  
    }
    
    public function getDelete($id) {
        $user = User::find($id);
        $user->delete();
        
        return Redirect()->back();
    }
    
    public function getEdit($id) {
        $user = User::find($id);
        
        return view('templates.edit',[
            'user' => $user, 
        ]);    
    }
    
    public function postEdit(Request $request, $id) {
        
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:50',
            'password' => 'required',
        ]);
    
        if($validator->fails()) {
            return Redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        
        $user = User::find($id);
        $username = $request->input('username');
        $password = bcrypt($request->input('password'));
                
        $user->username = $username;
        $user->password = $password; 
        $user->save();
        return Redirect()->Route('home');
    }
    
    
}






















