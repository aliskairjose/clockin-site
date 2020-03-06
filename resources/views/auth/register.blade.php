@extends('layouts.app')

@section('content')
<div class="h-100 bg-premium-dark">
    <div class="d-flex h-100 justify-content-center align-items-center">
        <div class="mx-auto app-login-box col-md-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="app-logo-inverse mx-auto mb-3"></div>
                <div class="modal-dialog w-100">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h5 class="modal-title">
                                <h4 class="mt-2">
                                    <div>Welcome,</div>
                                    <span>
                                        It only takes a <span class="text-success">few seconds</span> to create your
                                        account
                                    </span>
                                </h4>
                            </h5>
                            <div class="divider"></div>
                            <div id="exampleInputGroup1" role="group"
                                aria-describedby="exampleInputGroup1__BV_description_" class="form-group">
                                <div>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Ingrese nombre">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="exampleInputGroup12" role="group" class="form-group">
                                <div>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Ingerese email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="exampleInputGroup2" role="group" class="form-group">
                                        <div>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password"
                                                placeholder="Ingrese contraseña">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="exampleInputGroup2" role="group" class="form-group">
                                        <div>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Repita contraseña">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="exampleInputGroup12" role="group" class="form-group">
                                <div>
                                    <input id="phone" type="text" class="form-control" name="phone" required
                                        autocomplete="phone" autocomplete="phone"
                                        placeholder="Ingrese número telefónico">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="exampleInputGroup12" role="group" class="form-group">
                                <div>
                                    <input id="postcode" type="text" class="form-control" name="postcode" required
                                        autocomplete="postcode" placeholder="Ingrese códido postal">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="custom-control custom-checkbox"><input id="exampleCheck" type="checkbox"
                                name="check" autocomplete="off" class="custom-control-input" value="true">
                            <label for="exampleCheck" class="custom-control-label">
                                Accept our <a [routerLink]="">Terms and Conditions</a>.
                            </label>
                        </div> --}}
                            <div class="divider"></div>
                            <h6 class="mb-0">
                                Already have an account?
                                <a [routerLink]="" class="text-primary"
                                    href="{{ route('login') }}">{{ __('Sign in') }}</a>
                                |
                                <a href="{{ route('password.request') }}" class="text-primary">
                                    Recover Password
                                </a>
                            </h6>
                        </div>
                        <div class="modal-footer d-block text-center">
                            <button type="submit"
                                class="btn btn-wide btn-pill btn-shadow btn-hover-shine btn-secondary btn-lg">
                                {{ __('Create Account') }}
                            </button>
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
