<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index(Request $request) {
        
        $search = $request->input('search');
        
          $clients = Client::orderBy('id', 'asc')
                ->where('name','LIKE','%'.$search.'%')
                ->get();
                                    
        return view('templates.clients.clients', compact('clients'));
    }
      
    public function getNewClient() {
        
        return view('templates.clients.new');
    }
    
    public function postNewClient(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'post_code' => 'required|max:5|regex:/^[0-9]+$/',
            'city' => 'required|max:50',
            'adress' => 'required|max:50',
            'nip' => 'required|size:10|regex:/^[0-9]+$/',
            'comments' => 'max:250',
        ]);
    
        if($validator->fails()) {
            return Redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        
        $name = $request->input('name');
        $post_code = $request->input('post_code');
        $city = $request->input('city');
        $adress = $request->input('adress');
        $nip = $request->input('nip');
        $comments = $request->input('comments');
               
        $client = new Client();
        
        $client->name = $name;
        $client->post_code = $post_code; 
        $client->city = $city;
        $client->adress = $adress;
        $client->nip = $nip;
        $client->comments = $comments;
        
        $client->save();

        return Redirect()->Route('home');
    }
    
    public function ClientDelete($id) {
        $client = Client::find($id);
        $client->delete();
        
        return Redirect()->Route('home');
    }
    
    public function clientShow($id) {
    
        $client = Client::find($id);
        return view('templates.clients.client', compact('client'));
        
    }
    
    public function getEdit($id) {
        $client = Client::find($id);
        
        return view('templates.clients.edit', compact('client'));
    }
    
    public function postEdit(Request $request, $id) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'post_code' => 'required|max:5|regex:/^[0-9]+$/',
            'city' => 'required|max:50',
            'adress' => 'required|max:50',
            'nip' => 'required|size:10|regex:/^[0-9]+$/',
            'comments' => 'max:250',
        ]);
    
        if($validator->fails()) {
            return Redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        
        $name = $request->input('name');
        $post_code = $request->input('post_code');
        $city = $request->input('city');
        $adress = $request->input('adress');
        $nip = $request->input('nip');
        $comments = $request->input('comments');
               
        $client = Client::find($id);
        
        $client->name = $name;
        $client->post_code = $post_code; 
        $client->city = $city;
        $client->adress = $adress;
        $client->nip = $nip;
        $client->comments = $comments;
        
        $client->save();
        
        return Redirect()->Route('home');
    }
}
