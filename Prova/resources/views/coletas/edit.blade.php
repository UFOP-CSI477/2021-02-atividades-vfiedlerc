@extends('base')

@section('conteudo')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="text-center">Cadastrar Entidade</h1>
    </div>

    <form action="/coletas/{{ $coleta->id }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="item" class="form-label">Item</label>
            <select name="item_id" id="item" class="form-control">
                @foreach ($itens as $item)
                    <option
                        value="{{ $item->id }}"
                        {{ $coleta->item_id == $item->id ? 'selected' : '' }}
                    >
                        {{ $item->descricao }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="entidade" class="form-label">Entidade</label>
            <select name="entidade_id" id="entidade" class="form-control">
                @foreach ($entidades as $entidade)
                    <option
                        value="{{ $entidade->id }}"
                        {{ $coleta->entidade_id == $entidade->id ? 'selected' : '' }}
                    >
                        {{ $entidade->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="text" class="form-control" name="quantidade" id="quantidade" value="{{ $coleta->quantidade }}">
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" name="data" id="data" value="{{ $coleta->data }}">
        </div>
        <button type="submit" class="btn btn-purple">Salvar</button>
    </form>
</div>

@endsection
