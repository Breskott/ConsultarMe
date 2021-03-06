@extends('layouts.app')

@section('title', __('Postos de Saúde'))

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
                <li><a href="{{ route('units.index') }}">Postos de Saúde</a></li>
            </ol>
            <h2>Postos de Saúde</h2>
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
                                    <div style="padding-top: 10px">{{ __('Postos de Saúde') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group float-right">
                                        <a href="{{ route('units.create') }}"
                                           class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip"
                                           title="Novo Posto de Saúde">
                                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                            <span class="btn-inner--text">Cadastrar Posto de Saúde</span>
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
                                    <th>{{ __('Posto') }}</th>
                                    <th>{{ __('Endereço') }}</th>
                                    <th>{{ __('Telefone/Ramal') }}</th>
                                    <th>{{ __('Ações') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($units as $unit)
                                    <tr>
                                        <td>#{{ $unit->id }}</td>
                                        <td>{{ ucfirst($unit->description) }}</td>
                                        <td>{{ $unit->address}}, Nº: {{ $unit->number }}, {{ $unit->distric }}, {{ $unit->city()->first()->description }}-{{ $unit->city()->first()->state }}</td>
                                        @if($unit->extension == "")
                                            <td>{{ $unit->phone}} </td>
                                        @else
                                            <td>{{ $unit->phone}} / Ramal: {{ $unit->extension }}</td>
                                        @endif


                                        <td class="table-actions">
                                            <form method="POST" id="destroyUnits-{{$unit->id}}"
                                                  action="{{ route('units.destroy', $unit->id)}}">
                                                <a class="table-action table-action-edit" data-toggle="tooltip"
                                                   title="{{ __('Editar Posto de Saúde') }}"
                                                   href="{{ route('units.edit', $unit->id) }}"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a
                                                    href=""
                                                    type="submit"
                                                    onclick="
                                                        event.preventDefault();
                                                        let destroy = confirm('{{ __('Deseja realmente excluir esse posto de saúde?') }}');
                                                        if(destroy){ document.getElementById('destroyUnits-{{$unit->id}}').submit(); }
                                                        "
                                                    class="table-action table-action-delete"
                                                    data-toggle="tooltip"
                                                    title="{{ __('Excluir Posto de Saúde') }}"
                                                >
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="container" style="padding-top: 15px">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger" role="alert">
                                                    {{ __('Não existem postos de saúdes cadastrados!') }}
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
                                @include('components.pagination', ['paginator' => $units])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

