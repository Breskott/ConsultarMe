@extends('layouts.app')

@section('title', __('Usuários'))

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
                <li><a href="{{ route('users.index') }}">Usuários</a></li>
            </ol>
            <h2>Usuários</h2>
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
                                    <div style="padding-top: 10px">{{ __('Usuários') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group float-right">
                                        <a href="{{ route('users.create') }}"
                                           class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip"
                                           data-original-title="Novo Servidor">
                                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                            <span class="btn-inner--text">Cadastrar Usuário</span>
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
                                                  action="{{ route('users.destroy', $user->id)}}">
                                                <a class="table-action table-action-edit" data-toggle="tooltip"
                                                   data-original-title="{{ __('Editar Usuário') }}"
                                                   href="{{ route('users.edit', $user->id) }}"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a
                                                    href=""
                                                    type="submit"
                                                    onclick="
                                                        event.preventDefault();
                                                        let destroy = confirm('{{ __('Deseja realmente excluir esse usuário?') }}');
                                                        if(destroy){ document.getElementById('destroyUser-{{$user->id}}').submit(); }
                                                        "
                                                    class="table-action table-action-delete"
                                                    data-toggle="tooltip"
                                                    data-original-title="{{ __('Excluir Usuário') }}"
                                                >
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    {{ __('Não existem usuários cadastrados!') }}
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

