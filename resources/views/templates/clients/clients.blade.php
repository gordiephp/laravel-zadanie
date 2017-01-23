@extends('templates.default')

@section('content')
@include('templates.nav')

<link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
        <h2 class="sub-header">Klienci</h2>
            <div class="table-responsive">
                @if ($clients->count())
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th></th>
                            <th>Nazwa</th>
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
                           @foreach($clients as $client)
                                <tr>
                                    <td><a class="btn btn-primary" href="{{ url('clients/' . $client->id) }}">Profil</a></td>
                                    <td>{{ $client->name }}</td>
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
                            @endforeach
                      </tbody>
                    </table>
                @endif
            </div>
    </div>
</div>

@endsection