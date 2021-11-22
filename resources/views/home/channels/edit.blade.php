@extends('layouts.base')

@section('content')
    <div id="content-wrapper">
       <div class="container-fluid upload-details" style="min-height:800px">
          <div class="row">
             <div class="col-lg-12">
                <div class="main-title">
                   <h6>Editar canal</h6>
                </div>
             </div>
          </div>

                @if(session('message'))
                     @include('alerts.success-message')
                @endif

          <form method="POST" action="{{ route('channels.update', ['channel' => $channel->id ]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-sm-6">
                @if($channel->logo !== 'assets/img/s4.png')
                  <img class="rounded-circle avatar-image" src="{{ asset('storage'. $channel->logo) }}" style="heigh:130px; width: 130px">
                @else
                  <img class="rounded-circle avatar-image" src="{{ asset('assets/img/s4.png') }}" style="heigh:130px; width: 130px">
                @endif
                </div>
                <div class="col-sm-12 mt-4">
                   <div class="form-group">
                      <label class="control-label">Carregar a imagem da canal: <span class="required">*</span></label>
                      <input type="file" enctype="multipart/form-data" class="form-control avatar-input border-form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('image') ? old('logo') : $channel->logo }}">

                     @error('logo')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-6">
                   <div class="form-group">
                      <label class="control-label">Nome da canal: <span class="required">*</span></label>
                      <input id="name"  placeholder="Insira o nome da canal" type="text" class="form-control border-form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $channel->name }}" required autocomplete="name">

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
                      <label class="control-label">Descrição da canal: <span class="required" >*</span></label>
                      <textarea name="description" class="form-control border-form-control" rows="4">{{ old('description') ? old('description') : $channel->description }}</textarea>
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-6 text-right">
                    <a href="#" class="btn btn-primary border-none" data-toggle="modal" data-target="#deleteChannelModal{{ $channel->id }}">

                    <i class="fa fa-trash"> </i> Apagar

                    </a>
                </div>

                <div class="col-sm-6 text-left">
                   <a href="/channels" class="btn btn-primary border-none"> Voltar </a>
                   <a href="/channels/create" class="btn btn-danger border-none"> Cancelar </a>
                   <button type="submit" class="btn btn-success border-none"> Actualizar </button>
                </div>

             </div>
          </form>
       </div>
       <!-- /.container-fluid -->           <!-- Sticky Footer -->
            @include('layouts.footer')
            @include('dialogs.confirm-delete-channel-dialog', $channel)
         </div>
         <!-- /.content-wrapper -->
@endsection
