 <link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            @yield('buttons')
          <a class="navbar-brand" href="#">Zadanie</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ Route('newClient') }}">Nowy klient</a></li>
            <li><a href="{{ Route('users') }}">Konta</a></li>
            <li><a href="{{ Route('signUp') }}">Rejestracja</a></li>
            <li><a href="{{ Route('logout') }}">Wyloguj</a></li>
            
          </ul>
            
          <form action="{{ url('clients/') }}" method="post"class="navbar-form navbar-right">
              <input type="text" class="form-control" placeholder="Nazwa firmy..." name="search">
               <button type="submit" class="btn btn-default">szukaj</button>
              {{ csrf_field() }}
          </form>
        </div>
      </div>
    </nav>