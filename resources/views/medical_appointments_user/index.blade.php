@extends('layouts.app')

@section('title', __('Consultas'))

@section('description', __('Sistema de Consultas de Agendamento para munícipes de Tarumã - SP'))

@section('og_image', asset('assets/img/logo.png'))

@section('content')
    <style>
        .btn-huge {
            max-width: 250px !important;
            min-width: 250px !important;
            margin-bottom: 25px !important;;
        }
    </style>
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('home') }}">Início</a></li>
                <li><a href="{{ route('medical_appointments.index') }}">Consultas</a></li>
            </ol>
            <h2>Consultas</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page forms-site">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">

                                <div class="col-md-3">
                                    <div style="padding-top: 10px">{{ __('Consultas') }}</div>
                                </div>
                                <div class="col-md-9">
                                    <form id="search_form" action="{{ route('medical_patients') }}" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text"
                                                   value="{{ old('filter[medical_appointment.tab_number]', request()->has('filter') ? request()->filter['medical_appointment.tab_number'] : "") }}"
                                                   class="form-control" name="filter[medical_appointment.tab_number]"
                                                   id="filter[medical_appointment.tab_number]" placeholder="Nº da Guia">
                                            <input type="text"
                                                   value="{{ old('filter[examSpecialty.description]', request()->has('filter') ? request()->filter['examSpecialty.description'] : "") }}"
                                                   class="form-control" name="filter[examSpecialty.description]"
                                                   id="filter[examSpecialty.description]" placeholder="Exame">
                                            <div class="input-group-append">
                                                <a href=""
                                                   onclick='document.getElementById("search_form").submit(); return false;'
                                                   class="btn btn-outline-primary btn-round btn-icon"
                                                   style="margin-left: 15px" data-toggle="tooltip"
                                                   title="Pesquisar">
                                                    <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                                                    <span class="btn-inner--text">Pesquisar</span>
                                                </a>

                                                <a href="{{ route('medical_patients') }}"
                                                   class="btn btn-outline-danger btn-round btn-icon"
                                                   style="margin-left: 5px" data-toggle="tooltip"
                                                   title="Limpar">
                                                    <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                                                    <span class="btn-inner--text">Limpar</span>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-striped">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Número da Guia') }}</th>
                                    <th>{{ __('Paciente') }}</th>
                                    <th>{{ __('Exame') }}</th>
                                    <th>{{ __('Médico') }}</th>
                                    <th>{{ __('Data/Hora') }}</th>
                                    <th>{{ __('Ações') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($medical_appointments as $medical)

                                    <tr>
                                        <td>#{{ $medical->id }}</td>
                                        <td>{{ $medical->tab_number }}</td>
                                        <td>{{ $medical->user()->first()->name }}</td>
                                        <td>{{ $medical->examSpecialty()->first()->description }}</td>
                                        <td>{{ $medical->doctor()->first()->name }}</td>
                                        <td>
                                            @if(\Carbon\Carbon::now() >= $medical->schedule_datetime)
                                                <span class="badge badge-danger badge-sm badge-pill">{{ \Carbon\Carbon::createFromDate($medical->schedule_datetime)->format('d/m/Y H:i') }} (Vencida)</span>
                                            @else
                                                <span
                                                    class="badge badge-success badge-sm badge-pill">{{ \Carbon\Carbon::createFromDate($medical->schedule_datetime)->format('d/m/Y H:i') }}</span>
                                            @endif
                                        </td>

                                        <td class="table-actions">
                                            <a class="table-action table-action-edit" data-toggle="tooltip"
                                                  title="{{ __('Visualizar Consulta') }}"
                                                  href="{{ route('medical_show', $medical->id) }}"><i class="fas fa-eye"></i></a>

                                            <a class="table-action table-action-edit" data-toggle="tooltip"
                                               title="{{ __('Imprimir Consulta') }}"
                                               href="{{ route('generate-pdf', $medical->id) }}" target="_blank"><i
                                                    class="fas fa-print"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="container" style="padding-top: 15px">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger" role="alert">
                                                    {{ __('Não existe consultas cadastradas!') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                @include('components.pagination', ['paginator' => $medical_appointments])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

