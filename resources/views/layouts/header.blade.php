<nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
    &nbsp;&nbsp;
    <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
    <i class="fas fa-bars"></i>
    </button> &nbsp;&nbsp;
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
          <a class="nav-link" href="upload.html">
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
             <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit "></i> &nbsp; Acção</a>
             <a class="dropdown-item" href="#"><i class="fas fa-fw fa-headphones-alt "></i> &nbsp; Outras acções</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star "></i> &nbsp; Alguma coisa aqui</a>
          </div>
       </li>
       <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-success">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
             <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit "></i> &nbsp; Acção</a>
             <a class="dropdown-item" href="#"><i class="fas fa-fw fa-headphones-alt "></i> &nbsp; Outras acções</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star "></i> &nbsp; Alguma coisa aqui</a>
          </div>
       </li>
       <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
          <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img alt="Avatar" src="{{ asset('assets/img/user.png') }}">
          Username
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
             <a class="dropdown-item" href="/account"><i class="fas fa-fw fa-user-circle"></i> &nbsp; Minha Conta</a>
             <a class="dropdown-item" href="/subscriptions"><i class="fas fa-fw fa-video"></i> &nbsp; Subscrições</a>
             <a class="dropdown-item" href="/settings"><i class="fas fa-fw fa-cog"></i> &nbsp; Configurações</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> &nbsp; Sair</a>
          </div>
       </li>
    </ul>
 </nav>




