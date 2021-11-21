<nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">

    <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
    <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand mr-1" href="index.html"><img class="img-fluid" alt="" src="{{ asset('assets/img/logo.png') }}"></a>
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
       <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <div class="input-group-append">
             <button class="btn btn-light" type="button">
             <i class="fas fa-search"></i>
             </button>
          </div>
       </div>
    </form>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
       <li class="nav-item mx-1">
          <a class="nav-link" href="/upload">
          <i class="fas fa-plus-circle fa-fw"></i>
          Enviar Video
          </a>
       </li>
       <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
             <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit "></i>Acção</a>
             <a class="dropdown-item" href="#"><i class="fas fa-fw fa-headphones-alt "></i>Outras acções</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star "></i>Alguma coisa aqui</a>
          </div>
       </li>
       <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-success">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
             <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit "></i>Acção</a>
             <a class="dropdown-item" href="#"><i class="fas fa-fw fa-headphones-alt "></i>Outras acções</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star "></i>Alguma coisa aqui</a>
          </div>
       </li>
       <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
          <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            {{-- condicao para verificar se usuario tem ou nao foto de perfil --}}
            @if (auth()->user()->avatar)
                <img alt="Avatar" src="{{ asset('storage'. auth()->user()->avatar) }}">
            @else
                <img alt="Avatar" src="{{ asset('assets/img/User3.png') }}">
            @endif

            {{-- //para colocar nome do usuario que atualmente autenticado --}}
                 {{ auth()->user()->name }}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown" ml-2>
             <a class="dropdown-item" href="/account" ml-2><i class="fas fa-fw fa-user-circle"></i> Minha Conta</a>
             <a class="dropdown-item" href="/subscriptions" ml-2><i class="fas fa-fw fa-video"></i> Subscrições</a>
             <a class="dropdown-item" href="/settings" ml-2><i class="fas fa-fw fa-cog"></i> Configurações</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" ml-2><i class="fas fa-fw fa-sign-out-alt"></i> Sair</a>
          </div>
       </li>
    </ul>
 </nav>




