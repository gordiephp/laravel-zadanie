@extends('templates.default')

@section('content')
@include('templates.nav')

 <link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
        <h2 class="sub-header">Konta</h2>
            <div class="table-responsive">
                @if ($users->count())
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>Id</th>
                            <th>Konto</th>
                            <th>Edycja</th>
                            <th>Usun</th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                         <a class="btn btn-primary" href="{{ Route('edit', $user->id) }}">Edytuj</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('user/' . $user->id) }}" method="post">
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