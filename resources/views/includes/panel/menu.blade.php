 <!-- Navigation -->
 <ul class="navbar-nav">
     <li class="nav-item">
         <a class="nav-link" href="{{route('tareas')}}">
             <i class="ni ni-tv-2 text-primary"></i> Inicio
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{route('asignatura')}}">
             <i class="ni ni-books text-orange"></i> Asignaturas

         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
     document.getElementById('logout-form').submit();">
             <i class="ni ni-user-run"></i> logout
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
     </li>

 </ul>
