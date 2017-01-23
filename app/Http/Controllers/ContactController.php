<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Client;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $client = Client::find($id);
        return view('templates.contacts.new', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
       // 
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        
        return view('templates.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:250',
            'email' => 'required|email|max:250',
            'phone' => 'required|max:250',
        ]);
    
        if($validator->fails()) {
            return Redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
               
        $contact = Contact::find($id);
        
        $contact->client_id = $request->input('client_id');
        $contact->name = $request->input('name');
        $contact->email = $request->input('email'); 
        $contact->phone = $request->input('phone');
        
        $contact->save();
        return Redirect()->Route('contactList', $contact->client_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        
        return Redirect()->back();
    }
    
    public function ContactsIndex($id) {
                
        $contacts = Contact::orderBy('id', 'asc')
                ->where('client_id','=',$id)
                ->get();
        
        return view('templates.contacts.contacts', compact('contacts'));      
    }
    
    public function storeId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:250',
            'email' => 'required|email|max:250',
            'phone' => 'required|max:250',
        ]);
    
        if($validator->fails()) {
            return Redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        
        $contact = new Contact();
        
        $contact->client_id = $request->input('client_id');
        $contact->name = $request->input('name');
        $contact->email = $request->input('email'); 
        $contact->phone = $request->input('phone');
        
        $contact->save();

        return Redirect()->Route('contactList',$contact->client_id);
    }
    
    
    
    
    
    
    
    
    
    
    
    
}
