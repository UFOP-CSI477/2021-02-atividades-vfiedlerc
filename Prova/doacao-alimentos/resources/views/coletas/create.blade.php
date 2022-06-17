@extends('base')

@section('conteudo')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="text-center">Cadastrar Entidade</h1>
    </div>

    <form action="/coletas" method="post">
        @csrf

        <div class="mb-3">
            <label for="item" class="form-label">Item</label>
            <select name="item_id" id="item" class="form-control">
                @foreach ($itens as $item)
                    <option value="{{ $item->id }}">{{ $item->descricao }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="entidade" class="form-label">Entidade</label>
            <select name="entidade_id" id="entidade" class="form-control">
                @foreach ($entidades as $entidade)
                    <option value="{{ $entidade->id }}">{{ $entidade->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" name="quantidade" id="quantidade">
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" name="data" id="data">
        </div>
        <button type="submit" class="btn btn-purple">Cadastrar</button>
    </form>
</div>

@endsection
