@extends('layouts.base')

@section('content')

<div id="content-wrapper">
    <div id="content-wrapper">
        <div class="container-fluid upload-details">
          <form action="{{ route('courses.update', ['course' => $course->id]) }}" method="POST" role="form" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                   <div class="row">
                      <div class="col-lg-12 pb-1">
                         <div class="main-title">
                            <h6>Actualizar Curso</h6>
                         </div>
                      </div>
                      <div class="col-lg-2 pb-1">
                               @if($course->image)
                                  <img class="img-fluid" style="height: 120px; width: 200px" src="{{ asset('storage'. $course->image) }}" alt="">
                               @else
                                  <div class="imgplace"></div>
                               @endif

                      </div>
                      <div class="col-lg-10">
                         <div class="osahan-title text-right text-danger">O curso está no Modo Rascunho (A publicação leva entre 5-15 dias):</div>
                            <div class="form-group mt-2">
                               <label for="e1">Adiciona a imagem do Curso:</label>
                               <input type="file" placeholder="Título" id="e1" name="image" class="form-control">
                            </div>
                      </div>
                   </div>

                   @if (session('message'))
                    @include('alerts.success-message')
                   @endif

                      <div class="row">
                         <div class="col-lg-12">
                            <div class="osahan-form">
                               <div class="row">
                                  <div class="col-lg-12">
                                     <div class="form-group">
                                        <label for="title">Título do Curso:</label>
                                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ? old('title') : $course->title }}" placeholder="Título" class="form-control">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                     </div>
                                  </div>
                                  <div class="col-lg-12">
                                     <div class="form-group">
                                        <label for="description">Descrição:</label>
                                        <textarea rows="3" id="description" class="form-control @error('description') is-invalid @enderror" name="description" class="form-control">{{ old('description') ? old('description') : $course->description }}</textarea>
                                      @error('description')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                     </div>
                                  </div>
                                  <div class="col-lg-12">
                                     <div class="form-group">
                                        <label for="objectives">Objectivos do curso:</label>
                                        <textarea rows="3" id="objectives" class="form-control @error('objectives') is-invalid @enderror" name="objectives" class="form-control">{{ old('objectives') ? old('objectives') : $course->objectives }} </textarea>
                                      @error('objectives')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                     </div>
                                  </div>
                               </div>
                               <div class="row">
                                  <div class="col-lg-3">
                                     <div class="form-group">
                                        <label for="price">Preço do Curso:</label>
                                        <input type="text" placeholder="2500 MZN" id="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ? old('price') : $course->price }}" class="form-control">
                                      @error('price')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                     </div>
                                  </div>
                                  <div class="col-lg-3">
                                     <div class="form-group">
                                        <label for="total_videos">Total de vídeos do Curso:</label>
                                        <input type="text" placeholder="55 vídeos" id="total_videos" class="form-control @error('total_videos') is-invalid @enderror" name="total_videos" value="{{ old('total_videos') ? old('total_videos') : $course->total_videos }}" class="form-control">
                                      @error('total_videos')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                     </div>
                                  </div>
                                  <div class="col-lg-3">
                                     <div class="form-group">
                                        <label for="duration">Duração do Curso:</label>
                                        <input type="text" placeholder="1 semana" id="duration" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration') ? old('duration') : $course->duration }}" class="form-control">
                                      @error('duration')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                     </div>
                                  </div>
                                  <div class="col-lg-3">
                                     <div class="form-group">
                                        <label for="channel_id">ID do Canal:</label>
                                        <input type="text" placeholder="10" id="channel_id" class="form-control @error('channel_id') is-invalid @enderror" name="channel_id" value="{{ old('channel_id') ? old('channel_id') : $course->channel_id }}" class="form-control">
                                      @error('channel_id')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                     </div>
                                  </div>
                               </div>
                               <div class="row ">
                                  <div class="col-lg-12">
                                     <div class="main-title">
                                        <h6>Categorias ( Seleccione apenas uma categoria )</h6>
                                     </div>
                                  </div>
                               </div>
                               <div class="row category-checkbox ml-2">
                                  <!-- checkbox 1col -->
                                  @foreach($categories as $category)
                                  <!-- <div class="col-12"> -->
                                     <div class="col-lg-2 col-sm-6 col-4 custom-control-inline custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck{{ $category->id }}" name="category_id" value="{{ $category->id }}" @if ($category->id === $course->category_id ) checked @endif>
                                        <label class="custom-control-label" for="customCheck{{ $category->id }}">{{ $category->name }}</label>
                                     </div>
                                  <!-- </div> -->
                                  @endforeach
                            </div>

                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <div class="osahan-area text-right mt-3">
                                 <!--    style"background: gainsboro"  -->
                               <a href="#" class="btn btn-danger border-none" data-toggle="modal" data-target="#deleteCourseModal{{ $course->id }}">
                                  <i class="fa fa-trash"> </i> Apagar
                               </a>
                                    <button class="btn btn-success text-right">
                                      Gravar e continuar
                                    </button>
                            </div>
                            <hr>
                            <div class="terms text-center">
                               <p class="mb-0">O seu curso vai ficar no modo de rascunho, só depois de avaliado pelos administradores será publicado <a href="#">Terms of Service</a> and <a href="#">para a nossa comunidade</a>.</p>
                               <p class="hidden-xs mb-0"> A avaliação do curso pode levar até 15 dias.</p>
                            </div>
                         </div>
                        </div>



        </div>
        <!-- /.container-fluid -->
        <hr>
           <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-6 col-sm-6">
                    <p class="mt-1 mb-0"><strong class="text-dark">eVidoeSteaming</strong>.
                        <small class="mt-0 mb-0"><a class="text-primary" target="_blank" href="https://github.com/Unesio-Severino/eVideoSteaming">Unesio Mucutueliua Development</a>
                        </small>
                    </p>
                </div>
                <div class="col-lg-6 col-sm-6 text-right">
                    <div class="app">
                        <a href="#"><img alt="" src="{{ asset('assets/img/google.png') }}"></a>
                        <a href="#"><img alt="" src="{{ asset('assets/img/apple.png') }}"></a>
                    </div>
                </div>
            </div>
            </div>
        </footer>


        @include('dialogs.confirm-delete-course-dialog', $course)


    </div>
<!-- /.content-wrapper -->
@endsection
