@extends('templates.default')

@section('content')
@extends('templates.nav')

<link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
        <h2 class="sub-header">{{ $client->name }}</h2>
            <div class="table-responsive">
                @if ($client->count())
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>Kod pocztowy</th>
                            <th>Miasto</th>
                            <th>Adres</th>
                            <th>Nip</th>
                            <th>Uwagi</th>
                            <th>Edytuj</th>
                            <th>Usun</th>
                        </tr>
                      </thead>
                      <tbody> 
                                <tr>
                                    
                                    <td>{{ $client->post_code }}</td>
                                    <td>{{ $client->city }}</td>
                                    <td>{{ $client->adress }}</td>
                                    <td>{{ $client->nip }}</td>
                                    <td>{{ $client->comments }}</td>
                                    <td>
                                         <a class="btn btn-primary" href="{{ Route('clientEdit', $client->id) }}">Edytuj</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('clients/' . $client->id) }}" method="post">
                                        <button type="submit" class="btn btn-danger">Usun</button>
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        </form>
                                    </td>   
                                </tr>
                      </tbody>
                    </table>
                <a class="btn btn-success" href="{{ Route('createContact', $client->id) }}">Dodaj kontakt</a>
                <a class="btn btn-info" href="">Dodaj notatke</a>
                <a class="btn btn-warning" href="">Dodaj plik</a>
                @endif
            </div>
    </div>
</div>

@endsection
@section('buttons')
<ul class="nav navbar-nav navbar-right">
    <li><a href="{{ Route('contactList', $client->id) }}">Kontakty</a></li>
    <li><a href="{{ Route('users') }}">Notatki</a></li>
    <li><a href="{{ Route('signUp') }}">Pliki</a></li>
</ul>
@endsection
