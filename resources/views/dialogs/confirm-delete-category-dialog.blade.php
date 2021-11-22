 <!-- Modal de confirmacao de apagar categoria-->
 <div class="modal fade" id="deleteCategoryModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Deletar Categoria</h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
             </button>
          </div>
          <div class="modal-body">A categoria <strong>{{ $category->name }}</strong> sera apagada!</div>
          <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

             {{-- //funcao responsavel por chamar o dialogo de confirmar saida --}}
             <span>
                <a class="btn btn-primary" href="{{ route('categories.destroy', ['category' => $category->id]) }}"
                   onclick="event.preventDefault();
                    document.getElementById('delete-category-form').submit();"
                    >
                    Confirmo
                </a>

                <form id="delete-category-form" action="{{route('categories.destroy', ['category' => $category->id]) }}" method="POST" class="d-none">
                    @csrf
                    @method('DELETE')
                </form>
            </span>

             {{-- <a class="btn btn-primary" href="login.html">Confirma</a> --}}
          </div>
       </div>
    </div>
 </div>