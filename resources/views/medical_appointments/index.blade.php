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
                                    <form id="search_form" action="{{ route('medical_appointments.index') }}" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" value="{{ old('filter[guia]', request()->has('filter') ? request()->filter['guia'] : "") }}" class="form-control" name="filter[guia]" id="filter[guia]" placeholder="Nº da Guia">
                                            <input type="text" value="{{ old('filter[exame]', request()->has('filter') ? request()->filter['exame'] : "") }}" class="form-control" name="filter[exame]" id="filter[exame]" placeholder="Exame">
                                            <input type="text" value="{{ old('filter[paciente]', request()->has('filter') ? request()->filter['paciente'] : "") }}" class="form-control" name="filter[paciente]" id="filter[paciente]" placeholder="Paciente">
                                            <div class="input-group-append">
                                                <a href="" onclick='document.getElementById("search_form").submit(); return false;'
                                                   class="btn btn-outline-primary btn-round btn-icon" style="margin-left: 15px"  data-toggle="tooltip"
                                                   title="Pesquisar">
                                                    <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                                                    <span class="btn-inner--text">Pesquisar</span>
                                                </a>

                                                <a href="{{ route('medical_appointments.index') }}" class="btn btn-outline-danger btn-round btn-icon" style="margin-left: 5px"  data-toggle="tooltip"
                                                   title="Limpar">
                                                    <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                                                    <span class="btn-inner--text">Limpar</span>
                                                </a>

                                                <a href="{{ route('medical_appointments.create') }}"
                                                   class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip"
                                                   title="Nova Consulta">
                                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                                    <span class="btn-inner--text">Cadastrar Consulta</span>
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

                                    @php
                                        // Function button whatsapp
                                        $message_wpp = "Olá *".$medical->user()->first()->name.'*';
                                        $message_wpp .= " você possui uma consulta agendada para a especidade às *".\Carbon\Carbon::createFromDate($medical->schedule_datetime)->format('d/m/Y H:i')."*";
                                        $message_wpp .= " no endereço *{{colocar_endereço}}*"; // Complete
                                        $message_wpp .= " que foi agendada com o médico(a) *".$medical->doctor()->first()->name."*";
                                        $message_wpp .= " da área de *".$medical->examSpecialty()->first()->description."*";
                                        $message_wpp .= " não se esqueça de ir! ";

                                        $button_wpp = "https://api.whatsapp.com/send?phone=+55".preg_replace('/\D+/', '', $medical->user()->first()->phone)."&text=".urlencode($message_wpp);
                                    @endphp
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
                                                <span class="badge badge-success badge-sm badge-pill">{{ \Carbon\Carbon::createFromDate($medical->schedule_datetime)->format('d/m/Y H:i') }}</span>
                                            @endif
                                        </td>
                                        <!--https://api.whatsapp.com/send?phone=5518996930799&text=Ol%C3%A1%20%7B%7B%20%24nome%20%7D%7D%2C%20voc%C3%AA%20possui%20uma%20consulta%20agendada%20para%20a%20especialidade%20%C3%A1s%20%7B%7B%20data%3Ahora%20%7D%7D%2C%20no%20endere%C3%A7o%20%7B%7B%20endere%C3%A7o%2Fnumero%2Fvila%2Fbairro%20%7D%7D%20que%20foi%20agendada%20com%20o%20m%C3%A9dico%20%7B%7B%20m%C3%A9dico%20%7D%7D%20da%20%C3%A1rea%20de%20%7B%7B%20especialidade%20%7D%7D%2C%20n%C3%A3o%20se%20esque%C3%A7a%20de%20ir!%20 -->
                                        <td class="table-actions">
                                            <form method="POST" id="destroyConsult-{{$medical->id}}"
                                                  action="{{ route('medical_appointments.destroy', $medical->id)}}">

                                                <a class="table-action table-action-edit" data-toggle="tooltip"
                                                   title="{{ __('Imprimir Consulta') }}"
                                                   href="{{ route('medical_appointments.edit', $medical->id) }}"><i class="fas fa-print"></i></a>

                                                <a class="table-action table-action-edit" data-toggle="tooltip"
                                                   title="{{ __('Enviar Consulta por WhatsApp') }}"
                                                   href="{{ $button_wpp }}" target="_blank"><i class="fab fa-whatsapp"></i></a>

                                                <a class="table-action table-action-edit" data-toggle="tooltip"
                                                   title="{{ __('Editar Consulta') }}"
                                                   href="{{ route('medical_appointments.edit', $medical->id) }}"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                @if(Auth::user()->is_permission == 2)
                                                    <a href=""
                                                        type="submit"
                                                        onclick="
                                                            event.preventDefault();
                                                            let destroy = confirm('{{ __('Deseja realmente excluir essa consulta?') }}');
                                                            if(destroy){ document.getElementById('destroyConsult-{{$medical->id}}').submit(); }
                                                            "
                                                        class="table-action table-action-delete"
                                                        data-toggle="tooltip"
                                                        title="{{ __('Excluir Consulta') }}">
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

