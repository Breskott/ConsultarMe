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
                <li><a href="{{ route('cities.index') }}">Cadastrar Cidade</a></li>
            </ol>
            <h2>Cadastrar Cidade</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page forms-site">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <form action="{{ route('cities.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div style="padding-top: 10px">{{ __('Cidade') }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group float-right">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Form groups used in grid -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Cidade') }}</label>
                                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                                   id="description"
                                                   value="{{ old('description') }}"
                                                   placeholder="{{ __('Cidade') }}">

                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Estado') }}</label>
                                            <select class="form-control @error('state') is-invalid @enderror m-b" name="state">
                                                <option value="AC" @if(old('state') == "AC") selected @endif>Acre
                                                </option>
                                                <option value="AL" @if(old('state') == "AL") selected @endif>Alagoas
                                                </option>
                                                <option value="AP" @if(old('state') == "AP") selected @endif>Amapá
                                                </option>
                                                <option value="AM" @if(old('state') == "AM") selected @endif>Amazonas
                                                </option>
                                                <option value="BA" @if(old('state') == "BA") selected @endif>Bahia
                                                </option>
                                                <option value="CE" @if(old('state') == "CE") selected @endif>Ceará
                                                </option>
                                                <option value="DF" @if(old('state') == "DF") selected @endif>Distrito
                                                    Federal
                                                </option>
                                                <option value="ES" @if(old('state') == "ES") selected @endif>Espírito
                                                    Santo
                                                </option>
                                                <option value="GO" @if(old('state') == "GO") selected @endif>Goiás
                                                </option>
                                                <option value="MA" @if(old('state') == "MA") selected @endif>Maranhão
                                                </option>
                                                <option value="MT" @if(old('state') == "MT") selected @endif>Mato
                                                    Grosso
                                                </option>
                                                <option value="MS" @if(old('state') == "MS") selected @endif>Mato Grosso
                                                    do Sul
                                                </option>
                                                <option value="MG" @if(old('state') == "MG") selected @endif>Minas
                                                    Gerais
                                                </option>
                                                <option value="PA" @if(old('state') == "PA") selected @endif>Pará
                                                </option>
                                                <option value="PB" @if(old('state') == "PB") selected @endif>Paraíba
                                                </option>
                                                <option value="PR" @if(old('state') == "PR") selected @endif>Paraná
                                                </option>
                                                <option value="PE" @if(old('state') == "PE") selected @endif>
                                                    Pernambuco
                                                </option>
                                                <option value="PI" @if(old('state') == "PI") selected @endif>Piauí
                                                </option>
                                                <option value="RJ" @if(old('state') == "RJ") selected @endif>Rio de
                                                    Janeiro
                                                </option>
                                                <option value="RN" @if(old('state') == "RN") selected @endif>Rio Grande
                                                    do Norte
                                                </option>
                                                <option value="RS" @if(old('state') == "RS") selected @endif>Rio Grande
                                                    do Sul
                                                </option>
                                                <option value="RO" @if(old('state') == "RO") selected @endif>Rondônia
                                                </option>
                                                <option value="RR" @if(old('state') == "RR") selected @endif>Roraima
                                                </option>
                                                <option value="SC" @if(old('state') == "SC") selected @endif>Santa
                                                    Catarina
                                                </option>
                                                <option value="SP" @if(old('state') == "SP") selected @endif>São Paulo
                                                </option>
                                                <option value="SE" @if(old('state') == "SE") selected @endif>Sergipe
                                                </option>
                                                <option value="TO" @if(old('state') == "TO") selected @endif>Tocantins
                                                </option>
                                            </select>
                                            @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success">{{ __('Salvar') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

