<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Validator;
use App\File; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
class FileController extends Controller
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
        return view('templates.files.new', compact('client'));
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
        $file = File::find($id);
        
        return view('templates.files.edit', compact('file'));
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
            'title' => 'required|max:50',
            'description' => 'max:250',
        ]);
    
        if($validator->fails()) {
            return Redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
                   
        $file = File::find($id);
        
        $file->client_id = $request->input('client_id');
        $file->title = $request->input('title');
        $file->description = $request->input('description');       
        
        $validatorFile = Validator::make($request->all(), [
            'file_name' => 'required|mimes:pdf',
        ]);
        
        if($validatorFile->fails()) {
            $file->save();
            return Redirect()->Route('fileList', $file->client_id);
        }
        
        //delete file
        Storage::delete("pdf/{$file->file_name}");
        $file->delete();
        
        //upload new file
        $path = Storage::putFile('pdf', $request->file('file_name'));
        $file->file_name = basename($path); 
        
        $file->save();
        return Redirect()->Route('fileList', $file->client_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        
        Storage::delete("pdf/{$file->file_name}");
        $file->delete();
        
        return Redirect()->back();
    }
    
    public function storeId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'file_name' => 'required|mimes:pdf',
            'description' => 'max:250',
        ]);
    
        if($validator->fails()) {
            return Redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        
        $file = new File();
        
        $file->client_id = $request->input('client_id');
        $file->title = $request->input('title');
        $file->description = $request->input('description');
        
        $path = Storage::putFile('pdf', $request->file('file_name'));
        
        $file->file_name = basename($path);     

        $file->save();

        return Redirect()->Route('fileList',$file->client_id);
    }
    
    public function fileIndex($id) {
                
        $files = File::orderBy('id', 'asc')
                ->where('client_id','=',$id)
                ->get();
        
        return view('templates.files.files', compact('files'));      
    }
    
    public function pdf($id) {
        $file = File::find($id);
        $filename = $file->file_name;
        
        $getFile = Storage::get('pdf/'. $filename);
        return response($getFile, 200)->header('Content-Type', 'application/pdf');
        }
    
    
    
    
    
    
    
    
    
    
    
    
}
