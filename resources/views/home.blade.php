@extends('layouts.app')

@section('title', __('Início'))

@section('description', __('Sistema de Consultas de Agendamento para munícipes de Tarumã - SP'))

@section('og_image', asset('assets/img/logo.png'))

@section('content')
    <!-- ======= Inicio ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Seja bem vindo(a) ao sistema de consulta</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Faça a consulta de agendamentos feitos aos postos de
                        saúde da cidade de Tarumã - SP e não perca o horário marcado com seu médico.</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{ route('login') }}"
                               class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Começar Agora Mesmo</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <main id="main">
        <!-- ======= Postos de Saúdes ======= -->
        <section id="postos" class="features">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Fique por dentro</h2>
                    <p>Veja os postos de saúde que exite em Tarumã:</p>
                </header>

                <div class="row">

                    <div class="col-lg-6">
                        <img src="{{ asset('assets/img/features.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                        <div class="row align-self-center gy-4">

                            @php $delay = 0; @endphp
                            @forelse($units as $unit)
                                @php  $delay = $delay + 200; @endphp
                                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="{{ $delay }}">
                                    <div class="feature-box d-flex align-items-center">
                                        <i class="bi bi-check"></i>
                                        <h3>{{ $unit->description }}</h3>
                                    </div>
                                </div>
                            @empty
                                <h3>Faça o cadastro de postos de saúde</h3>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- ======= Sessao de Contato ======= -->
                <section id="contato" style="background: #fafbff;" class="form-group row">
                    <div class="container" data-aos="fade-up">
                        <header class="section-header">
                            <h2>Contato</h2>
                            <p>Contato com o desenvolvedores do Projeto</p>
                        </header>

                        <div class="row gy-4">
                            <div class="col-lg-12">
                                <form action="#" method="post" class="php-email-form">
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control" placeholder="Seu nome"
                                                   required>
                                        </div>

                                        <div class="col-md-6 ">
                                            <input type="email" class="form-control" name="email"
                                                   placeholder="Seu E-mail" required>
                                        </div>

                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="subject" placeholder="Assunto"
                                                   required>
                                        </div>

                                        <div class="col-md-12">
                                            <textarea class="form-control" name="message" rows="6"
                                                      placeholder="Mensagem" required></textarea>
                                        </div>

                                        <div class="text-center">
                                            <button class="btn btn-primary contact" type="submit">Enviar Mensagem
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section><!-- Fim Sessao de Contato -->

    </main>
@endsection

