@extends('base')

@section('conteudo')

<div class="container">
    <div class="d-flex justify-content-between align-coletas-center mb-5">
        <h1 class="text-center">Coletas</h1>
        <div>
            <a href="/coletas/create" class="btn btn-purple">Cadastrar Nova</a>
        </div>
    </div>

    @if (session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        <br />
    @endif

    <table class="table table-bordered table-hover table-striped" style="text-align: center;">
        <thead>
            <th>Id</th>
            <th>Entidade</th>
            <th>Item</th>
            <th>Quantidade</th>
            <th>Data</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($coletas as $coleta)
                <tr>
                    <td>{{ $coleta->id }}</td>
                    <td>{{ $coleta->entidade->nome }}</td>
                    <td>{{ $coleta->item->descricao }}</td>
                    <td>{{ $coleta->quantidade }}</td>
                    <td>{{ $coleta->data }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-1">
                            <a href="/coletas/edit/{{ $coleta->id }}" class="btn btn-purple btn-sm">Editar</a>
                            <form action="/coletas/delete/{{$coleta->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
