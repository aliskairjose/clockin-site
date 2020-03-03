@extends('layouts.page_templates.app');

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Edicion
                <div class="page-title-subheading">
                    This is an example dashboard created using build-in elements and components.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                class="btn-shadow mr-3 btn btn-dark">
                <i class="fa fa-star"></i>
            </button>
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Buttons
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-inbox"></i>
                                <span>
                                    Inbox
                                </span>
                                <div class="ml-auto badge badge-pill badge-secondary">86</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-book"></i>
                                <span>
                                    Book
                                </span>
                                <div class="ml-auto badge badge-pill badge-danger">5</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-picture"></i>
                                <span>
                                    Picture
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a disabled href="javascript:void(0);" class="nav-link disabled">
                                <i class="nav-link-icon lnr-file-empty"></i>
                                <span>
                                    File Disabled
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="card-body">
        {{-- <form method="POST" action="{{ route('users.update', $data->id ) }}" enctype="multipart/form-data"> --}}
        <form method="POST" action="{{ route('users.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" name="phone" value="" autocomplete="phone"
                        autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="poscode" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Postal') }}</label>

                <div class="col-md-6">
                    <input id="postcode" type="text" class="form-control" name="postcode" value=""
                        autocomplete="postcode" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>

                <div class="col-md-6">
                    <select class="form-control" name="country_id">
                        @foreach ($countries as $key => $value)
                        <option value="{{ $value }}" {{ ( $value == 0) ? 'selected' : '' }}>
                            {{ $key }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="blocked" class="col-md-4 col-form-label text-md-right">{{ __('Bloqueado') }}</label>
                <div class="col-md-6">
                    <select class="form-control" name="blocked">
                        @foreach ($select as $key => $value)
                        <option value="{{ $value }}" {{ ( $value == 0) ? 'selected' : '' }}>
                            {{ $key }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="active" class="col-md-4 col-form-label text-md-right">{{ __('Activo') }}</label>
                <div class="col-md-6">
                    <select class="form-control" name="active">
                        @foreach ($select as $key => $value)
                        <option value="{{ $value }}" {{ ( $value == 1) ? 'selected' : '' }}>
                            {{ $key }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>
                <input type="file" name="picture">
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enviar') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Borrar') }}
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection