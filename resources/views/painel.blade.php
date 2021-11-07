@extends('layouts.app')

@section('title', __('Painel do Sistema'))

@section('description', __('Sistema de Consultas de Agendamento para munícipes de Tarumã - SP'))

@section('og_image', asset('assets/img/logo.png'))

@section('content')
    <style>
        .btn-huge{
            max-width: 250px !important;
            min-width: 250px !important;
            margin-bottom: 25px !important;
        ;
        }
    </style>
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('home') }}">Início</a></li>
                <li><a href="{{ route('painel') }}">Painel do Sistema</a></li>
            </ol>
            <h2>Painel do Sistema</h2>
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
                                <div style="padding-top: 10px">{{ __('Painel do Sistema') }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group float-right">
                                    <button type="button" class="btn bg-gradient-primary text-white btn-icon" aria-expanded="false">
                                    <span class="btn-inner--icon">
                                        <i class="fas fa-user mr-2"></i>
                                    </span> {{ Auth::user()->name }}
                                    </button>
                                </div>
                            </div>
                            </div>
                        </div>

                        @if(Auth::user()->is_permission == 2)
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fas fa-user mr-2"></i></br>Usuários</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fad fa-book-medical mr-2"></i></br>Consultas</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fas fa-user-md mr-2"></i></br>Agentes</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fas fa-hospital mr-2"></i></br>Postos</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fas fa-stethoscope mr-2"></i></br>Exames/Esp.</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fad fa-city mr-2"></i></br>Cidades</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::user()->is_permission == 1)
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fas fa-user mr-2"></i></br>Pacientes</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fad fa-book-medical mr-2"></i></br>Consultas</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fas fa-stethoscope mr-2"></i></br>Exames/Esp.</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fad fa-book-medical mr-2"></i></br>Consultas</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

