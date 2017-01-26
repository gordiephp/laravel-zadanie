<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Illuminate\Support\Facades\Validator;
use App\Client;

class NoteController extends Controller
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
        return view('templates.notes.new', compact('client'));
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
        $note = Note::find($id);
        
        return view('templates.notes.edit', compact('note'));
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
            'note' => 'required',
        ]);
    
        if($validator->fails()) {
            return Redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
               
        $note = Note::find($id);
        
        $note->client_id = $request->input('client_id');
        $note->note = $request->input('note');
                
        $note->save();
        return Redirect()->Route('noteList', $note->client_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
        
        return Redirect()->back();
    }
    
    public function storeId(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'note' => 'required',
        ]);
    
        if($validator->fails()) {
            return Redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        
        $note = new Note();
        
        $note->client_id = $request->input('client_id');
        $note->note = $request->input('note');
                
        $note->save();

        return Redirect()->Route('noteList',$note->client_id);
    }
    
    public function NoteIndex($id) {
                
        $notes = Note::orderBy('created_at', 'desc')
                ->where('client_id','=',$id)
                ->get();
        
        return view('templates.notes.notes', compact('notes'));      
    }
}
