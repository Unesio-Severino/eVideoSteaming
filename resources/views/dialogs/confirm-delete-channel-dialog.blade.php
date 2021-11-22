

 <!-- Modal de confirmacao de apagar channel-->
 <div class="modal fade" id="deletechannelModal{{ $channel->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Apagar o canal</h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
             </button>
          </div>
          <div class="modal-body">A categoria <strong>{{ $channel->name }}</strong> sera apagada!</div>
          <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

             {{-- //funcao responsavel por chamar o dialogo de confirmar saida --}}
             <span>
                  <a class="btn btn-primary" href="{{ route('channels.destroy', ['channel' => $channel->id]) }}"
                     onclick="event.preventDefault();
                     document.getElementById('delete-channel-form').submit();"
                     >
                     Confirmo
                  </a>

                  <form id="delete-channel-form" action="{{route('channels.destroy', ['channel' => $channel->id]) }}" method="POST" class="d-none">
                     @csrf
                     @method('DELETE')
                  </form>
            </span>

             {{-- <a class="btn btn-primary" href="login.html">Confirma</a> --}}
          </div>
       </div>
    </div>
 </div>