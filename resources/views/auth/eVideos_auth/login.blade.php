@extends('layouts.auth-layout')

@section('content')

<div class="container-fluid pl-0 pr-0">
    <div class="row no-gutters">
       <div class="col-md-5 p-5 bg-white full-height">
          <div class="login-main-left">
             <div class="text-center mb-5 login-main-left-header pt-4">
                <img src="{{ asset('assets/img/favicon.png') }}" class="img-fluid" alt="LOGO">
                <h5 class="mt-3 mb-3">Login</h5>
                <p>Plataformas de Videos e cursos online <br> Assista os videos gratuitamente.</p>
             </div>


             {{-- Template predefinido do Laravel --}}
            {{-- <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
            /Template predefinido do Laravel --}}


                {{-- Template form que foi integrado --}}
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="form-group">
                            <label>Email:</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label>Senha:</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <input class="form-check-input" type="hidden" name="remember" id="remember" checked>

                        </div>

                        <div class="mt-4">
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Entrar</button>
                            </div>
                        </div>
                        </div>
                </form>
                {{-- /Template predefinido do Laravel --}}


             <div class="text-center mt-5">
                <p class="light-gray">Ainda nao tem conta? <a href="/register">Criar a sua conta</a></p>
             </div>
          </div>
       </div>

       @include('layouts.auth-slide-show')

    </div>
 </div>


 @endsection