@extends('layouts.page_templates.app')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-stopwatch icon-gradient bg-mean-fruit"></i>
            </div>
            <div> Control de Horario {{ Auth::user()->name }}
                <div class="page-title-subheading">
                    This is an example dashboard created using build-in elements and components.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2" style="background-color: lightgrey">
        </div>
        <div class="col-md-10" style="background-color: lightblue">
            Schedule
        </div>
    </div>
</div>
{{ $employees_id }}
@endsection
