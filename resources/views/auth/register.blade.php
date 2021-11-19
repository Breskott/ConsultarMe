@extends('layouts.app')

@section('title', __('Cadastrar'))

@section('description', __('Sistema de Consultas de Agendamento para munícipes de Tarumã - SP'))

@section('og_image', asset('assets/img/logo.png'))

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('home') }}">Início</a></li>
                <li><a href="{{ route('register') }}">Cadastro</a></li>
            </ol>
            <h2>Cadastro</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page forms-site">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Cadastrar-se') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nome Completo') }}</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cpf" class="col-md-2 col-form-label text-md-right">{{ __('CPF') }}</label>

                                    <div class="col-md-8">
                                        <input id="cpf" type="cpf" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf">

                                        @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="birth_date" class="col-md-2 col-form-label text-md-right">{{ __('Data Nascimento') }}</label>

                                    <div class="col-md-3">
                                        <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_datess">

                                        @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Celular') }}</label>

                                    <div class="col-md-3">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="zip_code" class="col-md-2 col-form-label text-md-right">{{ __('CEP') }}</label>

                                    <div class="col-md-8">
                                        <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="zip_code">

                                        @error('zip_code')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Endereço') }}</label>

                                    <div class="col-md-4">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="cpf">

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="number" class="col-md-2 col-form-label text-md-right">{{ __('Número') }}</label>

                                    <div class="col-md-2">
                                        <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number">

                                        @error('number')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="distric" class="col-md-2 col-form-label text-md-right">{{ __('Bairro') }}</label>

                                    <div class="col-md-8">
                                        <input id="distric" type="text" class="form-control @error('distric') is-invalid @enderror" name="distric" value="{{ old('distric') }}" required autocomplete="distric">

                                        @error('distric')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="complement" class="col-md-2 col-form-label text-md-right">{{ __('Complemento') }}</label>

                                    <div class="col-md-8">
                                        <input id="complement" type="text" class="form-control @error('complement') is-invalid @enderror" name="complement" value="{{ old('complement') }}" autocomplete="complement">

                                        @error('complement')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="city" class="col-md-2 col-form-label text-md-right">{{ __('Cidade') }}</label>

                                    <div class="col-md-8">
                                        <div class="form-group">
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

                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Cadastrar-se') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
