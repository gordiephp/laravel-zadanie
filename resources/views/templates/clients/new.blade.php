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

<form action="{{ Route('newClient') }}" method="POST" class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-3" for="name">nazwa</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="name" placeholder="nazwa" name="name" value="{{old('name')}}">
    </div>
  </div>
    
  <div class="form-group">
    <label class="control-label col-sm-3" for="post_code">kod pocztowy</label>
    <div class="col-sm-6"> 
      <input type="text" class="form-control" id="post_code" placeholder="kod pocztowy" name="post_code" value="{{old('post_code')}}">
    </div>
  </div>
 
   <div class="form-group">
    <label class="control-label col-sm-3" for="city">miasto</label>
    <div class="col-sm-6"> 
      <input type="text" class="form-control" id="city" placeholder="miasto" name="city" value="{{old('city')}}">
    </div>
  </div>   
    
   <div class="form-group">
    <label class="control-label col-sm-3" for="adress">adres</label>
    <div class="col-sm-6"> 
      <input type="text" class="form-control" id="adress" placeholder="adres" name="adress" value="{{old('adress')}}">
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-3" for="nip">nip</label>
    <div class="col-sm-6"> 
      <input type="text" class="form-control" id="nip" placeholder="nip" name="nip" value="{{old('nip')}}">
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-3" for="comments">uwagi</label>
    <div class="col-sm-6"> 
      <input type="text" class="form-control" id="comments" placeholder="uwagi" name="comments" value="{{old('comments')}}">
    </div>
  </div>
    
    <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-default">Dodaj</button>
    </div>
  </div>
    {{ csrf_field() }}
</form>

@endsection