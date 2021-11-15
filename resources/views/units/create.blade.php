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
                <li><a href="{{ route('units.index') }}">Cadastrar Postos de Saúde</a></li>
            </ol>
            <h2>Cadastrar Postos de Saúde</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page forms-site">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <form action="{{ route('units.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div style="padding-top: 10px">{{ __('Postos de Saúde') }}</div>
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Nome do Posto de Saúde') }}</label>
                                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                                   id="description"
                                                   value="{{ old('description') }}"
                                                   placeholder="{{ __('Nome do Posto de Saúde') }}">

                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Telefone') }}</label>
                                            <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone"
                                                   id="phone"
                                                   value="{{ old('phone') }}"
                                                   placeholder="{{ __('Telefone') }}">

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Ramal') }}</label>
                                            <input type="text" class="form-control  @error('extension') is-invalid @enderror" name="extension"
                                                   id="extension"
                                                   value="{{ old('extension') }}"
                                                   placeholder="{{ __('Ramal') }}">

                                            @error('extension')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('CEP') }}</label>
                                            <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" placeholder="{{ __('CEP') }}" >

                                            @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Endereço') }}</label>
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }} " placeholder="{{ __('Endereço') }}">

                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Número') }}</label>
                                            <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" placeholder="{{ __('Número') }}">

                                            @error('number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Bairro') }}</label>
                                            <input id="distric" type="text" class="form-control @error('distric') is-invalid @enderror" name="distric" value="{{ old('distric') }}" placeholder="{{ __('Bairro') }}">

                                            @error('distric')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Complemento') }}</label>
                                            <input id="complement" type="text" class="form-control @error('complement') is-invalid @enderror" name="complement" value="{{ old('complement') }}" placeholder="{{ __('Complemento') }}">

                                            @error('complement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Cidade') }}</label>
                                            <select class="form-control m-b" name="city_id">
                                                @forelse(\App\Models\Cities::all() as $city)
                                                    <option value="{{ $city->id }}" value="{{ $city->id }}" @if(old('city_id') == $city->id) selected @endif>{{ $city->description }}/{{ $city->state }}</option>
                                                @empty
                                                    <option value="0">Não existem cidades para fazer seu cadastro</option>
                                                @endforelse
                                            </select>
                                            @error('city_id')
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

@section('script_inject')
    <script>
        $(document).ready(function ($) {
            $('#phone').mask('(99) 9999-9999');
            $('#zip_code').mask('99999-999');
        });
    </script>
@endsection
