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
                
<form action="{{ Route('createContact', $client->id) }}" method="POST" class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-3" for="name">Osoba</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="name" placeholder="osoba" name="name" value="{{old('name')}}">
    </div>
  </div>
    
  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Email</label>
    <div class="col-sm-6"> 
      <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{old('email')}}">
    </div>
  </div>
 
   <div class="form-group">
    <label class="control-label col-sm-3" for="phone">telefon</label>
    <div class="col-sm-6"> 
      <input type="text" class="form-control" id="phone" placeholder="telefon" name="phone" value="{{old('phone')}}">
    </div>
  </div>   
    
    <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-default">Dodaj</button>
    </div>
  </div>
    <input type="hidden" type="text" name="client_id" value="{{ $client->id }} ">
    
    {{ csrf_field() }}
</form>

@endsection