@extends('templates.default')

@section('content')
@extends('templates.nav')

<link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
        <h2 class="sub-header">Kontakty</h2>
            <div class="table-responsive">
                @if ($contacts->count())
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>Osoba</th>
                            <th>Email</th>
                            <th>Telefon</th>
                            <th>Edytuj</th>
                            <th>Usun</th>
                        </tr>
                      </thead>
                      <tbody>
                           @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>
                                         <a class="btn btn-primary" href="{{ Route('contact.edit', $contact->id) }}">Edytuj</a>
                                    </td>
                                    <td>
                                        <form action="{{ Route('contact.destroy', $contact->id) }}" method="post">
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
<ul class="nav navbar-nav navbar-right">
    <li><a href="">Kontakty</a></li>
    <li><a href="">Notatki</a></li>
    <li><a href="">Pliki</a></li>
</ul>
@endsection