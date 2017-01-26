@extends('templates.default')

@section('content')
@extends('templates.nav')

<link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
        <h2 class="sub-header">Pliki</h2>
            <div class="table-responsive">
                @if ($files->count())
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>tytul</th>
                            <th>data</th>
                            <th>nazwa</th>
                            <th>opis</th>
                            <th>Edytuj</th>
                            <th>Usun</th>
                        </tr>
                      </thead>
                      <tbody>
                           @foreach($files as $file)
                                <tr>
                                    <td><a class="btn btn-primary" href="{{ Route('pdf', $file->id) }}">Otworz</a>
                                    </td>
                                    <td>{{ $file->title }}</td>
                                    <td>{{ $file->created_at }}</td>
                                    <td>{{ $file->file_name }}</td>
                                    <td>{{ $file->description }}</td>
                                    <td>
                                         <a class="btn btn-primary" href="{{ Route('files.edit', $file->id) }}">Edytuj</a>
                                    </td>
                                    <td>
                                        <form action="{{ Route('files.destroy', $file->id) }}" method="post">
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
@if ($files->count())
<ul class="nav navbar-nav navbar-right">
    <li><a href="{{ Route('contactList', $file->client_id) }}">Kontakty</a></li>
    <li><a href="{{ Route('noteList', $file->client_id) }}">Notatki</a></li>
    <li><a href="{{ Route('fileList', $file->client_id) }}">Pliki</a></li>
</ul>
@endif
@endsection