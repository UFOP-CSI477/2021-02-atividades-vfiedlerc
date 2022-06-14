@extends('layouts.app')

@section('template_title')
    {{ $equipment->name ?? 'Exibir equipamento' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Exibir equipamento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('equipment.index') }}"> Voltar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nome:</strong>
                            {{ $equipment->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
