@extends('layouts.base')

@section('content')

<div id="content-wrapper">
    <div class="container-fluid">
       <div class="row">
          <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
             <h1><img alt="404" src="{{ asset('assets/img/404.png') }}" class="img-fluid"></h1>
             <h1>Desculpe! A pagina nao foi encontrada.</h1>
             <p class="land">A pagina que esta procurando, ja nao existe, talvez tenha sido removida ou movida para outro sitio.</p>
             <div class="mt-5">
                <a class="btn btn-outline-primary" href="/"><i class="mdi mdi-home"></i> Ir para a pagina inicial</a>
             </div>
          </div>
       </div>
    </div>

    <!-- Sticky Footer -->
@include('layouts.footer')

</div>
@endsection

