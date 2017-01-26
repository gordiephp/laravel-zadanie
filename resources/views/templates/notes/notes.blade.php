@extends('templates.default')

@section('content')
@extends('templates.nav')

<link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
        <h2 class="sub-header">Notatki</h2>
            <div class="table-responsive">
                @if ($notes->count())
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>notatka</th>
                            <th>data</th>
                            <th>Edytuj</th>
                            <th>Usun</th>
                        </tr>
                      </thead>
                      <tbody>
                           @foreach($notes as $note)
                                <tr>
                                    <td>{{ $note->note }}</td>
                                    <td>{{ $note->created_at }}</td>
                                   
                                    <td>
                                         <a class="btn btn-primary" href="{{ Route('notes.edit', $note->id) }}">Edytuj</a>
                                    </td>
                                    <td>
                                        <form action="{{ Route('notes.destroy', $note->id) }}" method="post">
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

@section('buttons')
@if ($notes->count())
<ul class="nav navbar-nav navbar-right">
    <li><a href="{{ Route('contactList', $note->client_id) }}">Kontakty</a></li>
    <li><a href="{{ Route('noteList', $note->client_id) }}">Notatki</a></li>
    <li><a href="{{ Route('fileList', $note->client_id) }}">Pliki</a></li>
</ul>
@endif
@endsection