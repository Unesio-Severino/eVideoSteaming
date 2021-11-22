@extends('layouts.base')

@section('content')
    <div id="content-wrapper">
       <div class="container-fluid upload-details" style="min-height:800px">
          <div class="row">
             <div class="col-lg-12">
                <div class="main-title">
                   <h6>Editar Categoria</h6>
                </div>
             </div>
          </div>

            @if(session('message'))
               @include('alerts.success-message')
            @endif

          <form method="POST" action="{{ route('categories.update', ['category' => $category->id ]) }}" role="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')

          <div class="row">
                <div class="col-sm-10 mt-4">
                    @if($category->image !== 'assets/img/s2.png')
                    <img class="rounded-circle avatar-image" src="{{ asset('storage'. $category->image) }}" style="heigh:130px; width: 130px">
                    @else
                    <img class="rounded-circle avatar-image" src="{{ asset('assets/img/s2.png') }}" style="heigh:130px; width: 130px">
                    @endif
                </div>
                <div class="col-sm-6 mt-4">
                   <div class="form-group">
                      <label class="control-label">Carregar a imagem da categoria: <span class="required">*</span></label>
                      <input type="file" enctype="multipart/form-data" class="form-control avatar-input border-form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') ? old('image') : $category->image }}">

                     @error('image')
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
                      <label class="control-label">Nome da categoria: <span class="required">*</span></label>
                      <input id="name"  placeholder="Insira o nome da categoria" type="text" class="form-control border-form-control @error('name')
                       is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $category->name }}" required autocomplete="name">

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
                      <label class="control-label">Descrição da categoria: <span class="required" >*</span></label>
                      <textarea name="description" class="form-control border-form-control" rows="4">{{ old('description')
                       ? old('description') : $category->description }}</textarea>
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-6 text-left">
                    <a href="#" class="btn btn-danger border-none" data-toggle="modal" data-target="#deleteCategoryModal{{ $category->id }}">
                    <i class="fa fa-trash"></i> Apagar
                    </a>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="/categories" class="btn btn-info border-none"> Voltar </a>
                    <a href="/categories/create" class="btn btn-warning border-none"> Cancelar </a>
                    <button type="submit" class="btn btn-success border-none"> Actualizar </button>
                </div>
             </div>
          </form>
       </div>
       <!-- /.container-fluid -->
       <!-- Sticky Footer -->
            @include('layouts.footer')
            @include('dialogs.confirm-delete-category-dialog', $category)
         </div>
         <!-- /.content-wrapper -->
@endsection
