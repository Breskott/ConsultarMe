@extends('layouts.app')

@section('title', __('Pacientes'))

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
                <li><a href="{{ route('patients.index') }}">Pacientes</a></li>
            </ol>
            <h2>Pacientes</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page forms-site">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">

                                <div class="col-md-4">
                                    <div style="padding-top: 10px">{{ __('Pacientes') }}</div>
                                </div>
                                <div class="col-md-8">
                                    <form id="search_form" action="{{ route('patients.index') }}" method="GET">
                                    <div class="input-group mb-3">
                                            <input type="text" value="{{ old('filter[name]', request()->has('filter') ? request()->filter['name'] : "") }}" class="form-control" name="filter[name]" id="filter[name]" placeholder="Pesquisar Paciente">
                                            <div class="input-group-append">
                                                <a href="" onclick='document.getElementById("search_form").submit(); return false;'
                                                   class="btn btn-outline-primary btn-round btn-icon" style="margin-left: 15px"  data-toggle="tooltip"
                                                   data-original-title="Pesquisar">
                                                    <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                                                    <span class="btn-inner--text">Pesquisar</span>
                                                </a>

                                                <a href="{{ route('patients.index') }}" class="btn btn-outline-danger btn-round btn-icon" style="margin-left: 5px"  data-toggle="tooltip"
                                                   data-original-title="Limpar">
                                                    <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                                                    <span class="btn-inner--text">Limpar</span>
                                                </a>

                                                <a href="{{ route('patients.create') }}"
                                                class="btn btn-primary btn-round btn-icon" style="margin-left: 5px"  data-toggle="tooltip"
                                                data-original-title="Novo Paciente">
                                                <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
                                                <span class="btn-inner--text">Cadastrar Paciente</span>
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
                                    <th>{{ __('Nome') }}</th>
                                    <th>{{ __('Data Nascimento') }}</th>
                                    <th>{{ __('CPF') }}</th>
                                    <th>{{ __('Celular') }}</th>
                                    <th>{{ __('Tipo de Usuário') }}</th>
                                    <th>{{ __('Ações') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>#{{ $user->id }}</td>
                                        <td>{{ ucfirst($user->name) }}</td>
                                        <td>{{ \Carbon\Carbon::createFromDate($user->birth_date)->format('d/m/Y') }}</td>
                                        <td>{{ $user->cpf }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if($user->is_permission == '1')
                                                <span class="badge badge-success badge-sm badge-pill">{{ __('Agente') }}</span>
                                            @elseif ($user->is_permission == "2")
                                                <span class="badge badge-primary badge-sm badge-pill">{{ __('Administrador') }}</span>
                                            @else
                                                <span class="badge badge-dark badge-sm badge-pill">{{ __('Munícipe') }}</span>
                                            @endif
                                        </td>


                                        <td class="table-actions">
                                            <form method="POST" id="destroyUser-{{$user->id}}"
                                                  action="{{ route('patients.destroy', $user->id)}}">
                                                <a class="table-action table-action-edit" data-toggle="tooltip"
                                                   data-original-title="{{ __('Editar Usuário') }}"
                                                   href="{{ route('patients.edit', $user->id) }}"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="container" style="padding-top: 15px">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger" role="alert">
                                                    {{ __('Não existem pacientes cadastrados, ou sua pesquisa não encontrou nenhum resultado!') }}
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
                                @include('components.pagination', ['paginator' => $users])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

