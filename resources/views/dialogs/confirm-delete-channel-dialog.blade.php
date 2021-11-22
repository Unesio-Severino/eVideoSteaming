<div class="modal fade" id="deleteChannelModal{{ $channel->id }}" tabindex="-1" role="dialog" aria-labelledby="channelModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Deletar canal?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">Selecione "Confirmar" se você estiver pronto para apagar o canal <b> {{ $channel->name }} </b> .</div>
            <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
               <span>
                     <a class="btn btn-primary" href="/channels/{{$channel->id }}"
                           onclick="event.preventDefault();
                                    document.getElementById('delete-channel-form').submit();">
                                    {{ __('Confirmar') }}
                     </a>

                     <form id="delete-channel-form" action="/channels/{{$channel->id }}" method="POST" style="display: none;">
                           @csrf
                           @method('DELETE')
                  </form>
                  <!-- </div> -->
               <!-- <a class="btn btn-primary" href="login.html">Confirmar</a> -->
            </span>
         </div>
   </div>
</div>