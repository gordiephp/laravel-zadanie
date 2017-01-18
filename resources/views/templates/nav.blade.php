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
          <a class="navbar-brand" href="#">Zadanie</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ Route('users') }}">Konta</a></li>
            <li><a href="{{ Route('signUp') }}">Rejestracja</a></li>
            <li><a href="{{ Route('logout') }}">Wyloguj</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="szukaj...">
          </form>
        </div>
      </div>
    </nav>