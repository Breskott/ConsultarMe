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
                <li><a href="{{ route('users.index') }}">Cadastrar Usuários</a></li>
            </ol>
            <h2>Cadastrar Usuários</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page forms-site">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div style="padding-top: 10px">{{ __('Usuários') }}</div>
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
                                            <label class="form-control-label">{{ __('Nome Completo') }}</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                                   id="name"
                                                   value="{{ old('name') }}"
                                                   placeholder="{{ __('Nome Completo') }}">

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- Form groups used in grid -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('CPF') }}</label>
                                            <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                                                   id="cpf"
                                                   value="{{ old('cpf') }}"
                                                   placeholder="{{ __('CPF') }}">

                                            @error('cpf')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Data Nascimento') }}</label>
                                            <input type="date" class="form-control  @error('birth_date') is-invalid @enderror" name="birth_date"
                                                   id="birth_date"
                                                   value="{{ old('birth_date') }}"
                                                   placeholder="{{ __('Data Nascimento') }}">

                                            @error('birth_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Celular') }}</label>
                                            <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone"
                                                   id="phone"
                                                   value="{{ old('phone') }}"
                                                   placeholder="{{ __('Celular') }}">

                                            @error('phone')
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
                                            <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" placeholder="{{ __('CEP') }}">

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
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="{{ __('Endereço') }}">

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
                                            <select
                                                class="city_id form-control @error('city_id') is-invalid @enderror"
                                                name="city_id">
                                                @if(old('city_id')  != null)
                                                    <option value="{{ old('city_id') }}" selected="selected">
                                                        {{ old('city_description') }}
                                                    </option>
                                                @endif
                                            </select>
                                            <input type="hidden" id="city_description" name="city_description"
                                                   value="{{ old('city_description') }}"/>

                                            @error('city_id')
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
                                            <label class="form-control-label">{{ __('E-mail') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-mail') }}">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Senha') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="{{ __('Senha') }}">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Confirmar Senha') }}</label>
                                            <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="{{ __('Confirmar Senha') }}">

                                            @error('password_confirmation')
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
                                            <label class="form-control-label">{{ __('Tipo de Conta') }}</label>
                                            <select class="form-control m-b" name="is_permission">
                                                <option value="1"
                                                        @if(old('is_permission')) selected @endif>{{ __('Agente') }}</option>
                                                <option value="2"
                                                        @if(old('is_permission')) selected @endif>{{ __('Administrador') }}</option>
                                                <option value="0" selected >{{ __('Munícipe') }}</option>
                                            </select>
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
            $('#cpf').mask('999.999.999-99');
            $('#phone').mask('(99) 99999-9999');
            $('#zip_code').mask('99999-999');

            // City ===================================================================
            $('.city_id').select2({
                theme: "bootstrap4",
                placeholder: 'Cidade',
                ajax: {
                    url: '{{ route('autocompletecity') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.description + "/" + item.state,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
            $('.city_id').on('change', function (e) {
                var title = $(this).select2('data')[0].text;
                $('#city_description').val(title);
            });
        });
    </script>
@endsection
