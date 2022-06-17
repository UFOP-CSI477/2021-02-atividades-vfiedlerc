@extends('base')

@section('conteudo')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="text-center">Itens</h1>
        <div>
            <a href="/itens/create" class="btn btn-primary">Cadastrar Novo</a>
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
            <th>Item</th>
        </thead>
        <tbody>
            @foreach ($itens as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->descricao }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
