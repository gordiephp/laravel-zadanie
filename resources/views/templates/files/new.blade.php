@extends('templates.default')

@section('content')
@include('templates.nav')
<br>
@if (count($errors) >0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}  
                </li>
            @endforeach
        </ul>
    </div>
@endif
               
<form action="{{ Route('createFile', $client->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-3" for="title">Tytul pliku</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="title" placeholder="tytul pliku" name="title" value="{{old('title')}}">
    </div>
  </div>
    
   <div class="form-group">
    <label class="control-label col-sm-3" for="description">Opis</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="description" placeholder="opis" name="description" value="{{old('description')}}">
    </div>
  </div>
    
   <div class="form-group">
    <label class="control-label col-sm-3" for="file_name">wybierz plik</label> 
      <div class="col-sm-6">
     <label class="btn btn-primary" for="my-file-selector">
        <input id="my-file-selector" type="file" style="display:none;" name="file_name">
        Wybierz plik ...
    </label> 
    </div>
  </div>   
    
    <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-default">Dodaj</button>
    </div>
  </div>
    <input type="hidden" type="text" name="client_id" value="{{ $client->id }}">
    
    {{ csrf_field() }}
</form>

@endsection