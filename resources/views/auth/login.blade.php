@extends('layouts.app')

@section('content')

<div class="h-100 bg-plum-plate bg-animation">
    <div class="d-flex h-100 justify-content-center align-items-center">
        <div class="mx-auto app-login-box col-md-8">
            <div class="app-logo-inverse mx-auto mb-3"></div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="modal-dialog w-100 mx-auto">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="h5 modal-title text-center">
                                <h4 class="mt-2">
                                    <div>Bienvenido de vuelta,</div>
                                    <span>Inicie sesión en su cuenta a continuación.</span>
                                </h4>
                            </div>
                            <div id="exampleInputGroup1" role="group"
                                aria-describedby="exampleInputGroup1__BV_description_" class="form-group">
                                <div>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="exampleInputGroup2" role="group" class="form-group">
                                <div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox"><input id="exampleCheck" type="checkbox"
                                    name="check" autocomplete="off" class="custom-control-input" value="true">
                                <label for="exampleCheck" class="custom-control-label">
                                    Keep me logged in
                                </label>
                            </div>
                            <div class="divider"></div>
                            <h6 class="mb-0">
                               {{ __('No tiene cuenta?')}}
                                <a class="text-primary" href="{{ route('register') }}">{{ __('Registrate ahora') }}</a>
                            </h6>
                        </div>
                        <div class="modal-footer clearfix">
                            @if (Route::has('password.request'))
                            <div class="float-left">
                                <a href="{{ route('password.request') }}" class="btn-md btn btn-link">
                                    {{ __('Recuperar contraseña')}}
                                </a>
                            </div>
                            @endif
                            <div class="float-right">
                                <button type="submit"
                                    class="btn btn-primary btn-md">{{ __('Login to Dashboard')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center text-white opacity-8 mt-3">
                    Copyright © ArchitectUI 2019
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
