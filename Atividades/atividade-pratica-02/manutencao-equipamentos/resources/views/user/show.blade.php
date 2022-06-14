@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'SExibir Usuário' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Exibir usuário</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Voltar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nome:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Grupo:</strong>
                            @if ($user->group == 1)
                                Suporte
                            @elseif ($user->group == 2)
                                Administrador
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
