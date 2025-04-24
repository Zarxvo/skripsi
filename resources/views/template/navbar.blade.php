<nav class="main-header navbar navbar-expand navbar-light navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    </div>
    <form method="POST" action="{{ route('admin.logout') }}" class="form-inline my-2 my-lg-0">
        @csrf
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Logout</button>
    </form>
</nav>
