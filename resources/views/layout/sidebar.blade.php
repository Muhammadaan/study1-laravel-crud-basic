<!-- Sidebar -->
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="position-sticky">
      <ul class="nav flex-column">

        <span style="color: #fff; padding-left: 14px;">{{Auth::user()->name }} </span>
        <span style="color: #fff; font-size: 14px; padding-left: 14px;">{{ Auth::user()->email }} </span>
     
        <hr style="color: #fff;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('product.index')}}">
            Product
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
              Logout
            </a>
          </li>

          <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none">
            @csrf
        </form>
   
      </ul>
    </div>
  </nav>
