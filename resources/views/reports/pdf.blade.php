<html>
<head>
    <title>Consulta Impressa</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('assets/reports/css/bootstrap.css') }}">

    <script src="{{ asset('assets/reports/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/reports/js/jquery.min.js') }}"></script>

    <style>
        .logo {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #012970;
            font-family: "Nunito", sans-serif;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 1;
            text-align: right;
            width: 100%;
        }
    </style>

</head>
<body>
<div class="container" style="margin-top: 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="panel" style="border: 1px solid #000000;">
                <div class="panel-body">
                    <div class="logo">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="40">
                        <span style="margin-top: -10px">Consultar<span style="color: #0d6efd !important;">Me</span></span>
                    </div>
                </div>
            </div>
            <div class="panel" style="margin-top: 10px">
                <div class="panel-header bg-info text-center">
                    Dados do Paciente
                </div>
                <div class="panel-body">
                    <b>Nome Completo:</b> {{ $medical_appointments->user()->first()->name }} / <b>Data de Nascimento:</b> {{ \Carbon\Carbon::createFromDate($medical_appointments->user()->first()->birth_date)->format('d/m/Y') }}<br>
                    <b>Endereço:</b> {{ $medical_appointments->user()->first()->address }} <b>Nº: </b> {{ $medical_appointments->user()->first()->number }} <br>
                    <b>Bairro:</b> {{ $medical_appointments->user()->first()->distric }} <br>
                    <b>Cidade:</b> {{ \App\Models\Cities::find($medical_appointments->user()->first()->city_id)->description }}/{{ \App\Models\Cities::find($medical_appointments->user()->first()->city_id)->state }} <br>
                </div>
            </div>
            <div class="panel" style="margin-top: 10px">
                <div class="panel-header bg-info text-center">
                    Dados da Consulta
                </div>
                <div class="panel-body">
                        <b>Guia:</b> {{ $medical_appointments->tab_number }} / <b>Dia da Consulta:</b> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $medical_appointments->schedule_datetime)->format('d/m/Y H:i') }} <br>
                        <b>Exame/Especialidade:</b> {{ $medical_appointments->examSpecialty()->first()->description }} <br>
                        <b>Médico</b> {{ $medical_appointments->doctor()->first()->name }} <br>
                        <b>Endereço:</b> {{ $medical_appointments->address }} <b>Nº: </b> {{ $medical_appointments->number }} <br>
                        <b>Bairro:</b> {{ $medical_appointments->distric }} <br>
                        <b>Cidade:</b> {{ $medical_appointments->city()->first()->description }}/{{ $medical_appointments->city()->first()->state }}<br>
                        <b>Informações Adicionais</b> {{ $medical_appointments->comments }}
                </div>
            </div>
            <div class="panel footer" style="border: 1px solid #000000;">
                <div class="panel-body">
                    <span style="font-size: 11px">Relatório emitido pelo sistema ConsultarMe - Dia {{ \Carbon\Carbon::now()->format('d/m/Y H:m:i') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
