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

<link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">

<form method="post" action="{{ Route('postEdit', ['id' => $user->id]) }}" class="form-signin">
    <h2 class="form-signin-heading">Edycja</h2>
    
    <label for="username" class="sr-only">Login</label>
    <input type="text" name="username" id="username" class="form-control" placeholder="Login" value="{{$user->username}}">
    
    <label for="password" class="sr-only">Haslo</label>
    <input type="password" name="password" id="Password" class="form-control" placeholder="Haslo">
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Edytuj</button>
    {{ csrf_field() }}
  
@endsection