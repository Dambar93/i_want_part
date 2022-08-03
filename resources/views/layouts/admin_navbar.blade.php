<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">I WANT PART</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/parts')}}">Parts list</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/category')}}">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/cars')}}">Car</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/manufactures')}}">Manufacture</a>
      </li>
      @auth
          <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>
          </li>
      @else
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
      @endauth
      
    </ul>
    
  </div>
</nav>