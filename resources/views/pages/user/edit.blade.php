@extends('layouts.page_templates.app');

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-note icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Edicion
                <div class="page-title-subheading">
                    This is an example dashboard created using build-in elements and components.
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
        <form method="POST" action="{{ route('users.update', $data->id ) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT')}}

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}"
                        autocomplete="name" autofocus>
                    {{-- <input type="hidden" name="_method" value="PUT"> --}}

                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $data->email }}"
                        autocomplete="email" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $data->phone }}"
                        autocomplete="phone" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control" name="address" value="" autocomplete="address"
                        value="{{ $data->address }} " autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="poscode" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Postal') }}</label>

                <div class="col-md-6">
                    <input id="postcode" type="text" class="form-control" name="postcode" value="{{ $data->postcode }}"
                        autocomplete="postcode" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>

                <div class="col-md-6">
                    <select class="form-control" name="country_id">
                        @foreach ($countries as $key => $value)
                        <option value="{{ $value }}" {{ ( $value == $selectedID) ? 'selected' : '' }}>
                            {{ $key }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if (Auth::user()->role != '2')

            <div class="form-group row">
                <label for="blocked" class="col-md-4 col-form-label text-md-right">{{ __('Bloqueado') }}</label>
                <div class="col-md-6">
                    <select class="form-control" name="blocked">
                        @foreach ($select as $key => $value)
                        <option value="{{ $value }}" {{ ( $value == $data->blocked) ? 'selected' : '' }}>
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
                        <option value="{{ $value }}" {{ ( $value == $data->active) ? 'selected' : '' }}>
                            {{ $key }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif

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
