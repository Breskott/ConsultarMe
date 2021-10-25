@extends('layouts.app')

@section('title', __('Painel do Sistema'))

@section('description', __('Sistema de Consultas de Agendamento para munícipes de Tarumã - SP'))

@section('og_image', asset('assets/img/logo.png'))

@section('content')
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

                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fas fa-user mr-2"></i></br>Usuários</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fas fa-user mr-2"></i></br>Consultas</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fas fa-user mr-2"></i></br>Agentes</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#" class="btn btn-primary btn-lg btn-block btn-huge"> <i class="fas fa-user mr-2"></i></br>Postos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

