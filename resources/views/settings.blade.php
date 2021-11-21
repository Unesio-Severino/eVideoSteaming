@extends('layouts.base')

@section('content')
    <div id="content-wrapper">
       <div class="container-fluid upload-details" style="min-height:800px">
          <div class="row">
             <div class="col-lg-12">
                <div class="main-title">
                   <h6>Definições</h6>
                </div>
             </div>
          </div>

            @if (session('message'))
               @include('alerts_messages.sucess-messages')
            @endif

          <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
                <div class="col-sm-6">
                  {{-- <!-- <img class="rounded-circle avatar-image" alt="" src="{{ asset('storage'. auth()->user()->avatar) }}" style="heigh:130px; width: 130px"> --> --}}
                  @if(auth()->user()->avatar)
                         <img class="rounded-circle avatar-image" alt="Avatar" src="{{ asset('storage'. auth()->user()->avatar) }}" style="heigh:130px; width: 130px;">
                  @else
                        <img class="rounded-circle avatar-image" alt="Avatar" src="{{ asset('assets/img/User3.png') }}" style="heigh:130px; width:130px;">
                  @endif
                </div>
                <div class="col-sm-12 mt-4">
                   <div class="form-group">
                      <label class="control-label">Carregar a foto de perfil: <span class="required">*</span></label>
                      <input type="file" enctype="multipart/form-data" class="form-control avatar-input border-form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') ? old('avatar') : auth()->user()->avatar }}">

                     @error('avatar')
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
                      <label class="control-label">Nome: <span class="required">*</span></label>
                      <input id="name"  placeholder="Insira seu nome" type="text" class="form-control border-form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : auth()->user()->name }}" required autocomplete="name">

                     @error('name')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                   </div>
                </div>
                <div class="col-sm-6">
                   <div class="form-group">
                      <label class="control-label">Telefone: <span class="required">*</span></label>
                      <input id="telefone"  placeholder="Insira seu telefone" type="number" class="form-control border-form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') ? old('telefone') : auth()->user()->telefone }}" required autocomplete="telefone">

                     @error('name')
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
                      <label class="control-label">Email: <span class="required">*</span></label>
                      <input class="form-control border-form-control " value="" placeholder="{{auth()->user()->email}}" disabled="" type="email">
                   </div>
                </div>
                <div class="col-sm-6">
                   <div class="form-group">
                      <label class="control-label">Sexo: <span class="required">*</span></label>
                      <div>
                        <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" id="gender1" name="gender" value="M" {{ old('gender') === 'M' || auth()->user()->gender === 'M' ? 'checked' : '' }} class="custom-control-input">
                           <label class="custom-control-label" for="gender1">Masculino</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" id="gender2" name="gender" value="F" {{ old('gender') === 'F' || auth()->user()->gender === 'F' ? 'checked' : '' }} class="custom-control-input">
                           <label class="custom-control-label" for="gender2">Feminino</label>
                        </div>
                     </div>
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-12">
                   <div class="form-group">
                      <label class="control-label">Endereço: <span class="required">*</span></label>
                      <textarea name="address" class="form-control border-form-control">{{ old('address') ? old('address') : auth()->user()->address}}</textarea>
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-12 text-right">
                   <button type="button" class="btn btn-danger border-none"> Cancelar </button>
                   <button type="submit" class="btn btn-success border-none"> Actualizar </button>
                </div>
             </div>
          </form>
       </div>
       <!-- /.container-fluid -->           <!-- Sticky Footer -->
            @include('layouts.footer')
         </div>
         <!-- /.content-wrapper -->
@endsection
