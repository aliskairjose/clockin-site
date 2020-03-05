@extends('layouts.page_templates.app');

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Editar Compañia
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
        <form method="POST" action="{{ route('companies.update', $data->id ) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT')}}

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $data->name }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ $data->description }}" required autocomplete="description"
                        autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $data->email }}" required autocomplete="email">

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
                    <input id="phone" type="text" class="form-control"
                        name="phone" value="{{ $data->phone }}" required autocomplete="phone"
                        autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control" name="address" autocomplete="address"
                       value="{{ $data->address }} " autofocus>
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
