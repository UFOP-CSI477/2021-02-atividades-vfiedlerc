@extends('layouts.app')

@section('template_title')
    Login
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Login') }}
                            </span>

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/auth" method="POST">
                            @csrf

                            <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::text('email', '', ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('password', 'Senha') }}
                                {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Senha']) }}
                                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
