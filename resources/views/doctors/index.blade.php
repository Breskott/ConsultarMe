@extends('layouts.app')

@section('title', __('Médicos'))

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
                <li><a href="{{ route('doctors.index') }}">Médicos</a></li>
            </ol>
            <h2>Médicos</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page forms-site">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">

                                <div class="col-md-6">
                                    <div style="padding-top: 10px">{{ __('Médicos') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group float-right">
                                        <a href="{{ route('doctors.create') }}"
                                           class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip"
                                           title="Novo Médico">
                                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                            <span class="btn-inner--text">Cadastrar Médico</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-striped">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Nome') }}</th>
                                    <th>{{ __('CRM') }}</th>
                                    <th>{{ __('Ações') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($doctors as $doctor)
                                    <tr>
                                        <td>#{{ $doctor->id }}</td>
                                        <td>{{ ucfirst($doctor->name) }}</td>
                                        <td>{{ $doctor->crm }}</td>

                                        <td class="table-actions">
                                            <form method="POST" id="destroyDoctor-{{$doctor->id}}"
                                                  action="{{ route('doctors.destroy', $doctor->id)}}">
                                                <a class="table-action table-action-edit" data-toggle="tooltip"
                                                   title="{{ __('Editar Médico') }}"
                                                   href="{{ route('doctors.edit', $doctor->id) }}"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                @if(Auth::user()->is_permission == 2)
                                                <a
                                                    href=""
                                                    type="submit"
                                                    onclick="
                                                        event.preventDefault();
                                                        let destroy = confirm('{{ __('Deseja realmente excluir esse médico?') }}');
                                                        if(destroy){ document.getElementById('destroyDoctor-{{$doctor->id}}').submit(); }
                                                        "
                                                    class="table-action table-action-delete"
                                                    data-toggle="tooltip"
                                                    title="{{ __('Excluir Médico') }}"
                                                >
                                                    <i class="fas fa-times"></i>
                                                </a>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="container" style="padding-top: 15px">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger" role="alert">
                                                    {{ __('Não existe médicos cadastrados!') }}
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
                                @include('components.pagination', ['paginator' => $doctors])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

