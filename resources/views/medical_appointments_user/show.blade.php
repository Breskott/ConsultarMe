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
                <li><a href="{{ route('exams.index') }}">Visualizar Consulta</a></li>
            </ol>
            <h2>Visualizar Consulta</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page forms-site">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div style="padding-top: 10px">{{ __('Consulta') }}</div>
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
                                                disabled
                                                class="pacient_id form-control @error('patient_id') is-invalid @enderror"
                                                name="patient_id">
                                                @if(old('pacient_id', $medical_appointments->patient_id)  != null)
                                                    <option value="{{ old('patient_id', $medical_appointments->patient_id) }}" selected="selected">
                                                        {{ old('pacient_name', \App\Models\User::find($medical_appointments->patient_id)->name) }}
                                                    </option>
                                                @endif
                                            </select>
                                            <input type="hidden" id="pacient_name" name="pacient_name"
                                                   value="{{ old('pacient_name', \App\Models\User::find($medical_appointments->patient_id)->name) }}"/>

                                            @error('patient_id')
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
                                                disabled
                                                class="exam_speciality_id form-control @error('exam_speciality_id') is-invalid @enderror"
                                                name="exam_speciality_id">
                                                @if(old('exam_speciality_id', $medical_appointments->exam_speciality_id)  != null)
                                                    <option value="{{ old('exam_speciality_id', $medical_appointments->exam_speciality_id) }}" selected="selected">
                                                        {{ old('exam_description', \App\Models\ExamSpecialty::find($medical_appointments->exam_speciality_id)->description) }}
                                                    </option>
                                                @endif
                                            </select>
                                            <input type="hidden" id="exam_description" name="exam_description"
                                                   value="{{ old('exam_description', \App\Models\ExamSpecialty::find($medical_appointments->exam_speciality_id)->description) }}"/>

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
                                                disabled
                                                class="doctor_id form-control @error('doctor_id') is-invalid @enderror"
                                                name="doctor_id">
                                                @if(old('doctor_id', $medical_appointments->doctor_id)  != null)
                                                    <option value="{{ old('doctor_id', $medical_appointments->doctor_id) }}" selected="selected">
                                                        {{ old('doctor_name', \App\Models\Doctor::find($medical_appointments->doctor_id)->name) }}
                                                    </option>
                                                @endif
                                            </select>
                                            <input type="hidden" id="doctor_name" name="doctor_name"
                                                   value="{{ old('doctor_name', \App\Models\Doctor::find($medical_appointments->doctor_id)->name) }}"/>

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
                                                disabled
                                                class="units_id form-control @error('units_id') is-invalid @enderror"
                                                name="units_id">
                                                @if(old('units_id', $medical_appointments->units_id)  != null)
                                                    <option value="{{ old('units_id', $medical_appointments->units_id) }}" selected="selected">
                                                        {{ old('units_description', \App\Models\Units::find($medical_appointments->units_id)->description) }}
                                                    </option>
                                                @endif
                                            </select>
                                            <input type="hidden" id="units_description" name="units_description"
                                                   value="{{ old('units_description', \App\Models\Units::find($medical_appointments->units_id)->description) }}"/>

                                            @error('units_id')
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
                                            <label class="form-control-label">{{ __('Número da Guia') }}</label>
                                            <input id="tab_number" type="text"
                                                   class="form-control @error('tab_number') is-invalid @enderror"
                                                   name="tab_number" value="{{ old('tab_number', $medical_appointments->tab_number) }}"
                                                   placeholder="{{ __('Número da Guia') }}" disabled>

                                            @error('tab_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                class="form-control-label">{{ __('Data e Hora da Consulta') }}</label>
                                            <input id="schedule_datetime" type="text"
                                                   class="form-control @error('schedule_datetime') is-invalid @enderror"
                                                   name="schedule_datetime" value="{{ old('schedule_datetime', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $medical_appointments->schedule_datetime)->format('d/m/Y H:i')) }}"
                                                   placeholder="{{ __('Data e hora da Consulta') }}" autocomplete="off" disabled>

                                            @error('schedule_datetime')
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
                                            <label class="form-control-label">{{ __('Endereço da Consulta') }}</label>
                                            <input id="address" type="text"
                                                   class="form-control @error('address') is-invalid @enderror"
                                                   name="address" value="{{ old('address', $medical_appointments->address) }}"
                                                   placeholder="{{ __('Endereço') }}" disabled>

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
                                            <input id="number" type="text"
                                                   class="form-control @error('number') is-invalid @enderror"
                                                   name="number" value="{{ old('number', $medical_appointments->number) }}"
                                                   placeholder="{{ __('Número') }}" disabled>

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
                                            <label class="form-control-label">{{ __('Bairro da Consulta') }}</label>
                                            <input id="distric" type="text"
                                                   class="form-control @error('distric') is-invalid @enderror"
                                                   name="distric" value="{{ old('distric', $medical_appointments->distric) }}"
                                                   placeholder="{{ __('Bairro') }}" disabled>

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
                                            <label class="form-control-label">{{ __('Cidade') }}</label>
                                            <select
                                                disabled
                                                class="city_id form-control @error('city_id') is-invalid @enderror"
                                                name="city_id">
                                                @if(old('city_id', $medical_appointments->city_id)  != null)
                                                    <option value="{{ old('city_id', $medical_appointments->city_id) }}" selected="selected">
                                                        {{ old('city_description', \App\Models\Cities::find($medical_appointments->city_id)->description."/".\App\Models\Cities::find($medical_appointments->city_id)->state) }}
                                                    </option>
                                                @endif
                                            </select>
                                            <input type="hidden" id="city_description" name="city_description"
                                                   value="{{ old('city_description', \App\Models\Cities::find($medical_appointments->city_id)->description."/".\App\Models\Cities::find($medical_appointments->city_id)->state) }}"/>

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
                                            <label class="form-control-label">{{ __('Comentários') }}</label>
                                            <textarea disabled class="form-control" name="comments" id="comments" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 115px;">{{ old('comments', $medical_appointments->comments) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @if(!empty($medical_appointments->files))
                                        <label class="form-control-label">{{ __('Clique para baixar os arquivos enviados') }}</label>
                                        <a href="{{ Storage::url("files/$medical_appointments->files") }}" target="_blank" style="width: 150px; margin-left: 10px;" class="btn btn-primary">Baixar arquivo</a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                               <a href="{{ route('medical_patients') }}" class="btn btn-success">{{ __('Voltar') }}</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
