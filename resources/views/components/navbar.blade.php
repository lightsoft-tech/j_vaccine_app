<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link @if (Request::segment(1) == '') active fw-bold @endif" href="{{url('/')}}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::segment(1) == 'vaccine') active fw-bold @endif" href="{{url('/vaccine')}}">VACCINE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::segment(1) == 'patient') active fw-bold @endif" href="{{url('/patient')}}">PATIENT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>