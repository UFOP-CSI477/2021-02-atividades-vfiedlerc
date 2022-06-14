@extends('layouts.app')

@section('template_title')
    {{ $record->name ?? 'Exibir Manutenção' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Exibir Manutenção</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('records.index') }}"> Voltar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Equipamento:</strong>
                            {{ $equipamentos[$record->equipment_id] }}
                        </div>
                        <div class="form-group">
                            <strong>Responsável:</strong>
                            {{ $users[$record->user_id] }}
                        </div>
                        <div class="form-group">
                            <strong>Descrição:</strong>
                            {{ $record->description }}
                        </div>
                        <div class="form-group">
                            <strong>Validade:</strong>
                            {{ $record->due_date }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $tiposManutencao[$record->type] }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
