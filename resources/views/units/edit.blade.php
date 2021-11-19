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
                <li><a href="{{ route('units.index') }}">Editar Postos de Saúde</a></li>
            </ol>
            <h2>Editar Postos de Saúde</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page forms-site">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <form action="{{ route('units.update', $units->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                                   value="{{ old('description') ?? $units->description}}"
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
                                                   value="{{ old('phone') ?? $units->phone }}"
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
                                                   value="{{ old('extension') ?? $units->extension }}"
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
                                            <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') ?? $units->zip_code}}" placeholder="{{ __('CEP') }}">

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
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $units->address}}" placeholder="{{ __('Endereço') }}">

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
                                            <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') ?? $units->number}}" placeholder="{{ __('Número') }}">

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
                                            <input id="distric" type="text" class="form-control @error('distric') is-invalid @enderror" name="distric" value="{{ old('distric') ?? $units->distric}}" placeholder="{{ __('Bairro') }}">

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
                                            <input id="complement" type="text" class="form-control @error('complement') is-invalid @enderror" name="complement" value="{{ old('complement') ?? $units->complement }}" placeholder="{{ __('Complemento') }}">

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
                                                @if(old('city_id', $units->city_id)  != null)
                                                    <option value="{{ old('city_id', $units->city_id) }}" selected="selected">
                                                        {{ old('city_description', \App\Models\Cities::find($units->city_id)->description."/".\App\Models\Cities::find($units->city_id)->state) }}
                                                    </option>
                                                @endif
                                            </select>
                                            <input type="hidden" id="city_description" name="city_description"
                                                   value="{{ old('city_description', \App\Models\Cities::find($units->city_id)->description."/".\App\Models\Cities::find($units->city_id)->state) }}"/>

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
            // ========================================================================
        });
    </script>
@endsection
