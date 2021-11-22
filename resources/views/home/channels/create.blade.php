@extends('layouts.base')

@section('content')
    <div id="content-wrapper">
       <div class="container-fluid upload-details" style="min-height:800px">
          <div class="row">
             <div class="col-lg-12">
                <div class="main-title">
                   <h6>Novo Canal</h6>
                </div>
             </div>
          </div>

            @if (session('message'))
               @include('alerts.success-message')
            @endif

          <form method="POST" action="{{ route('channels.store') }}" enctype="multipart/form-data">
            @csrf
          <div class="row">
                <div class="col-sm-6">
                  <img class="rounded-circle avatar-image" src="{{ asset('assets/img/s4.png') }}" style="heigh:130px; width: 130px">
                </div>
                <div class="col-sm-12 mt-4">
                   <div class="form-group">
                      <label class="control-label">Carregar a imagem do canal: <span class="required">*</span></label>
                      <input type="file" enctype="multipart/form-data" class="form-control avatar-input border-form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') ? old('logo') : '' }}">

                     @error('logo')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                   </div>
                </div>
            </div>

             <!-- <div class="row">
                <div class="col-sm-12 bg-dark">
                  <img class="rounded-circle avatar-image" src="{{ asset('assets/img/channel-banner.png') }}">
                </div>
                <div class="col-sm-12 mt-4">
                   <div class="form-group">
                      <label class="control-label">Carregar a imagem de fundo para o canal: <span class="required">*</span></label>
                      <input type="file" enctype="multipart/form-data" class="form-control avatar-input border-form-control @error('background_image') is-invalid @enderror" name="background_image" value="{{ old('background_image') ? old('background_image') : '' }}">

                     @error('background_image')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                   </div>
                </div>
             </div> -->

             <div class="row">
                <div class="col-sm-6">
                   <div class="form-group">
                      <label class="control-label">Nome do canal: <span class="required">*</span></label>
                      <input id="name"  placeholder="Insira o nome do canal" type="text" class="form-control border-form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : '' }}" required autocomplete="name">

                     @error('name')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-12">
                   <div class="form-group">
                      <label class="control-label">Descrição do canal: <span class="required" >*</span></label>
                      <textarea name="description" class="form-control border-form-control" rows="4">{{ old('description') ? old('description') : ''}}</textarea>
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-12 text-right">
                   <a href="/channels" class="btn btn-primary border-none"> Voltar </a>
                   <a href="/channels/create" class="btn btn-danger border-none"> Cancelar </a>
                   <button type="submit" class="btn btn-success border-none"> Adicionar </button>
                </div>
             </div>
          </form>
       </div>
       <!-- /.container-fluid -->           <!-- Sticky Footer -->
            @include('layouts.footer')
         </div>
         <!-- /.content-wrapper -->
@endsection
