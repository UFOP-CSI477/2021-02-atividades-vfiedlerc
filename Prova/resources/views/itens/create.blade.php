@extends('base')

@section('conteudo')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="text-center">Cadastrar Item</h1>
    </div>

    <form action="/itens" method="post">
        @csrf

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="descricao" maxlength="100">
        </div>
        <button type="submit" class="btn btn-purple">Cadastrar</button>
    </form>
</div>

@endsection
