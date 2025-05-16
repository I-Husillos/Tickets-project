<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <!-- Botón de menú lateral -->
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('user.tickets.index', ['locale' => app()->getLocale(), 'username' => Auth::user()->id]) }}" class="nav-link">
        {{ __('frontoffice.tickets.list_title') }}
      </a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form action="{{ route('user.tickets.search', app()->getLocale()) }}" method="GET" class="form-inline ml-3">
    <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="query" placeholder="Buscar" aria-label="Search" value="{{ request()->query('query') }}">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item">

</nav>
<!-- /.navbar -->
