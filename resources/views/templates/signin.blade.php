@extends('templates.default')

@section('content')

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

<form method="post" action="{{ Route('signIn') }}" class="form-signin">
    <h2 class="form-signin-heading">Logowanie</h2>
    
    <label for="username" class="sr-only">Login</label>
    <input type="text" name="username" id="username" class="form-control" placeholder="Login">
    
    <label for="password" class="sr-only">Haslo</label>
    <input type="password" name="password" id="Password" class="form-control" placeholder="Haslo">
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>
    {{ csrf_field() }}
</form>

@endsection
