@extends('layouts.app')

@section('content')
<div class="h-100 bg-plum-plate bg-animation">
    <div class="d-flex h-100 justify-content-center align-items-center">
        <div class="mx-auto app-login-box col-md-6">
            <div class="app-logo-inverse mx-auto mb-3"></div>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="modal-dialog w-100">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="h5 modal-title">
                                Olvido su contraseña?
                                <h6 class="mt-1 mb-0 opacity-8"><span>Use este formulario para recuperarla.</span></h6>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div>
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset class="form-group" id="__BVID__132">
                                                <div tabindex="-1" role="group">
                                                    <label for="exampleEmail">Email</label>
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus placeholder="Ingrese email">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="divider"></div>
                            <h6 class="mb-0">
                                <a href="{{ route('login') }}" class="text-primary">
                                    {{ __('Iniciar sesión en cuenta existente') }}
                                </a>
                            </h6>
                        </div>
                        <div class="modal-footer clearfix">
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Enviar enlace de restablecimiento de contraseña') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center text-white opacity-8 mt-3">
                Copyright © ArchitectUI 2019
            </div>
        </div>
    </div>
</div>

@endsection
