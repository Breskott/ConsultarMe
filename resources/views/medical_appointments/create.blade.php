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
                <li><a href="{{ route('exams.index') }}">Cadastrar Consultas</a></li>
            </ol>
            <h2>Cadastrar Consultas</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page forms-site">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <form action="{{ route('medical_appointments.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div style="padding-top: 10px">{{ __('Consultas') }}</div>
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
                                            <label class="form-control-label">{{ __('Paciente') }}</label>
                                            <select
                                                class="pacient_id form-control @error('pacient_id') is-invalid @enderror"
                                                name="pacient_id">
                                                @if(old('pacient_id')  != null)
                                                    <option value="{{ old('pacient_id') }}" selected="selected">
                                                        {{ old('pacient_name') }}
                                                    </option>
                                                @endif
                                            </select>
                                            <input type="hidden" id="pacient_name" name="pacient_name"
                                                   value="{{ old('pacient_name') }}"/>

                                            @error('pacient_id')
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
                                            <label class="form-control-label">{{ __('Exame/Especialidade') }}</label>
                                            <select
                                                class="exam_speciality_id form-control @error('exam_speciality_id') is-invalid @enderror"
                                                name="exam_speciality_id">
                                                @if(old('exam_speciality_id')  != null)
                                                    <option value="{{ old('exam_speciality_id') }}" selected="selected">
                                                        {{ old('exam_description') }}
                                                    </option>
                                                @endif
                                            </select>
                                            <input type="hidden" id="exam_description" name="exam_description"
                                                   value="{{ old('exam_description') }}"/>

                                            @error('exam_speciality_id')
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
                                            <label class="form-control-label">{{ __('Médico') }}</label>
                                            <select
                                                class="doctor_id form-control @error('doctor_id') is-invalid @enderror"
                                                name="doctor_id">
                                                @if(old('doctor_id')  != null)
                                                    <option value="{{ old('doctor_id') }}" selected="selected">
                                                        {{ old('doctor_name') }}
                                                    </option>
                                                @endif
                                            </select>
                                            <input type="hidden" id="doctor_name" name="doctor_name"
                                                   value="{{ old('doctor_name') }}"/>

                                            @error('doctor_id')
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
                                            <label class="form-control-label">{{ __('Posto de Saúde') }}</label>
                                            <select
                                                class="units_id form-control @error('units_id') is-invalid @enderror"
                                                name="units_id">
                                                @if(old('units_id')  != null)
                                                    <option value="{{ old('units_id') }}" selected="selected">
                                                        {{ old('units_description') }}
                                                    </option>
                                                @endif
                                            </select>
                                            <input type="hidden" id="units_description" name="units_description"
                                                   value="{{ old('units_description') }}"/>

                                            @error('units_id')
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
    <script type="text/javascript">
        $(document).ready(function () {
            // Pacient =================================================================
            $('.pacient_id').select2({
                placeholder: 'Nome do Paciente',
                ajax: {
                    url: '{{ route('autocompletename') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
            $('.pacient_id').on('change', function (e) {
                var title = $(this).select2('data')[0].text;
                $('#pacient_name').val(title);
            });
            // =========================================================================

            // Exam ====================================================================
            $('.exam_speciality_id').select2({
                placeholder: 'Exame/Especialidade',
                ajax: {
                    url: '{{ route('autocompleteexam') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.description,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
            $('.exam_speciality_id').on('change', function (e) {
                var title = $(this).select2('data')[0].text;
                $('#exam_description').val(title);
            });
            // =========================================================================


            // Doctor ==================================================================
            $('.doctor_id').select2({
                placeholder: 'Médico',
                ajax: {
                    url: '{{ route('autocompletedoctor') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
            $('.doctor_id').on('change', function (e) {
                var title = $(this).select2('data')[0].text;
                $('#doctor_name').val(title);
            });
            // =========================================================================

            // Units ===================================================================
            $('.units_id').select2({
                placeholder: 'Posto de Saúde',
                ajax: {
                    url: '{{ route('autocompleteunits') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.description,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
            $('.units_id').on('change', function (e) {
                var title = $(this).select2('data')[0].text;
                $('#units_description').val(title);
            });
            // ========================================================================
        });
    </script>
@endsection
