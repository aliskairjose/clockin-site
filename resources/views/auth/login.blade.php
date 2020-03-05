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
                                    <div>Welcome back,</div>
                                    <span>Please sign in to your account below.</span>
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
                                No account?
                                <a [routerLink]="" class="text-primary">Sign up now</a>
                            </h6>
                        </div>
                        <div class="modal-footer clearfix">
                            @if (Route::has('password.request'))
                            <div class="float-left">
                                <a href="{{ route('password.request') }}" class="btn-lg btn btn-link">Recover Password</a>
                            </div>
                            @endif
                            <div class="float-right">
                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Login to Dashboard')}}</button>
                            </div>
                            {{-- <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif --}}
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
