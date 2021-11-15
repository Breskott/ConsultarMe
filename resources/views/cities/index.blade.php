@extends('layouts.app')

@section('title', __('Cidades'))

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
                <li><a href="{{ route('cities.index') }}">Cidades</a></li>
            </ol>
            <h2>Cidades</h2>
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
                                    <div style="padding-top: 10px">{{ __('Cidades') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group float-right">
                                        <a href="{{ route('cities.create') }}"
                                           class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip"
                                           data-original-title="Novo Servidor">
                                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                            <span class="btn-inner--text">Cadastrar Cidade</span>
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
                                    <th>{{ __('Cidade') }}</th>
                                    <th>{{ __('Estado') }}</th>
                                    <th>{{ __('Ações') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($cities as $city)
                                    <tr>
                                        <td>#{{ $city->id }}</td>
                                        <td>{{ ucfirst($city->description) }}</td>
                                        <td>{{ $city->getState($city->state) }}</td>

                                        <td class="table-actions">
                                            <form method="POST" id="destroyCidade-{{$city->id}}"
                                                  action="{{ route('cities.destroy', $city->id)}}">
                                                <a class="table-action table-action-edit" data-toggle="tooltip"
                                                   data-original-title="{{ __('Editar Cidade') }}"
                                                   href="{{ route('cities.edit', $city->id) }}"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a
                                                    href=""
                                                    type="submit"
                                                    onclick="
                                                        event.preventDefault();
                                                        let destroy = confirm('{{ __('Deseja realmente excluir essa cidade?') }}');
                                                        if(destroy){ document.getElementById('destroyCidade-{{$city->id}}').submit(); }
                                                        "
                                                    class="table-action table-action-delete"
                                                    data-toggle="tooltip"
                                                    data-original-title="{{ __('Excluir Cidade') }}"
                                                >
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    {{ __('Não existe cidades cadastradas!') }}
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                @include('components.pagination', ['paginator' => $cities])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

