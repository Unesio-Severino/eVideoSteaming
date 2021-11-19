 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Deseja Sair?</h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
             </button>
          </div>
          <div class="modal-body">Se confirma o encerramento clica em sair.</div>
          <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

             {{-- //funcao responsavel por chamar o dialogo de confirmar saida --}}
             <span>
                <a class="btn btn-primary" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Confirmo
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </span>

             {{-- <a class="btn btn-primary" href="login.html">Confirma</a> --}}
          </div>
       </div>
    </div>
 </div>