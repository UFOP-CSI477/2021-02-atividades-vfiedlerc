@extends('base')

@section('conteudo')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="text-center">Cadastro</h1>
    </div>

    <form action="/cadastro" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="name" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-purple">Cadastrar</button>
    </form>
</div>

@endsection
