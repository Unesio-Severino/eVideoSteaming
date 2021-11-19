@extends('layouts.base')

@section('content')

<div id="content-wrapper">
    <div class="container-fluid pt-5 pb-5">
       <div class="row">
          <div class="col-md-8 mx-auto text-center upload-video pt-5 pb-5">
             <h1><i class="fas fa-file-upload text-primary"></i></h1>
             <h4 class="mt-5">Selecione o ficheiro de video para carregar</h4>
             <p class="land">ou arrastra e larga o ficheiro de video</p>
             <div class="mt-4">
                <a class="btn btn-outline-primary" href="/upload-video">Carregar Video</a>
             </div>
          </div>
       </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    @include('layouts.footer')


</div>
 <!-- /.content-wrapper -->
@endsection
