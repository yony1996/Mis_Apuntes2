<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
        <h6 class="text-overflow m-0">Bienbenido!</h6>
    </div>

    <div class="dropdown-divider"></div>
     @can('perfil edit')
        <a class="dropdown-item" href="{{route('perfil.edit')}}">
        <i class="ni ni-single-02"></i>
        Mi Perfil
    </a>
    @endcan
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();" class="dropdown-item">
        <i class="ni ni-user-run"></i>
        <span>Logout</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
   
    

</div>
