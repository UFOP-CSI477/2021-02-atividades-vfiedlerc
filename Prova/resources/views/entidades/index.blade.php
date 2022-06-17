@extends('base')

@section('conteudo')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="text-center">Entidades</h1>
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
            <th>Nome</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($entidades as $entidade)
                <tr>
                    <td>{{ $entidade->id }}</td>
                    <td>{{ $entidade->nome }}</td>
                    <td>{{ $entidade->bairro }}</td>
                    <td>{{ $entidade->cidade }}</td>
                    <td>{{ $entidade->estado }}</td>
                    <td>
                        <form action="/entidades/delete/{{$entidade->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
