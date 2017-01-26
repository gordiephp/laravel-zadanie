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

<form action="{{ Route('notes.update', $note->id) }}" method="POST" class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-3" for="note">Notatka</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="note" placeholder="Notatka" name="note" value="{{ $note->note }}">
    </div>
  </div>
    
    <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-default">Dodaj</button>
    </div>
  </div>
    <input type="hidden" type="text" name="client_id" value="{{ $note->client_id }}">
    
    {{ method_field('PUT') }}
    {{ csrf_field() }}
</form>

@endsection