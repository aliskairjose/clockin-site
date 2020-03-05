@extends('layouts.page_templates.app')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
            </div>
            <div> Listado de usuarios
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

<div class="row d-flex justify-content-end mb-3">
    <div class="col-md-2">
        <a href="{{ route('companies.create') }}" type="button" data-toggle="tooltip" title="Agregar empresa"
            data-placement="bottom" class="btn-shadow mr-3 btn btn-primary">
            <i class="fas fa-user-plus"></i>
        </a>
    </div>
</div>

<div class="row">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
</div>

<div class="main-card mb-3 card">
    <div class="card-header">
        Lista de usuarios
    </div>
    <div class="table-responsive">
        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    {{-- <th class="text-center">Direccion</th> --}}
                    <th class="text-center">Correo</th>
                    <th class="text-center">Telefono</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $d)
                <tr>
                    <td class="text-center text-muted">{{ $d->id }}</td>
                    <td class="text-center">{{ $d->name }}</td>
                    {{-- <td class="text-center">{{ $d->address }}</td> --}}
                    <td class="text-center">{{ $d->email }}</td>
                    <td class="text-center">{{ $d->phone }}</td>
                    <td class="text-center">
                        <a href="{{ route('companies.edit', $d->id, '/edit' ) }}" data-toggle="tooltip" title="Editar"
                            data-placement="bottom">
                            <span class="btn-icon-wrapper pr-2 opacity-7" style="color: Dodgerblue">
                                <i class="fas fa-user-edit"></i>
                            </span>
                        </a>
                        <a href="{{ route('companies.edit', $d->id, '/edit' ) }}" data-toggle="tooltip" title="Eliminar"
                            data-placement="bottom">
                            <span class="btn-icon-wrapper pr-2 opacity-7" style="color: red">
                                <i class="fas fa-user-minus"></i>
                            </span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
