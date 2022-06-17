@extends('base')

@section('conteudo')

<div class="container">
    <h1 class="text-center mb-5">Área Geral</h1>

    <div id="tabela1">
        <h2>Doações Recebidas</h2>
        <table class="table table-bordered table-hover table-striped" style="text-align: center;">
            <thead>
                <th>Entidade</th>
                <th>Itens</th>
            </thead>
            <tbody>
                @foreach ($doacoesPorEntidade as $doacao)
                    <tr>
                        <td>{{ $doacao->entidade_nome }}</td>
                        <td>{{ $doacao->quantidade }}</td>
                    </tr>
                    <?php $totalGeralDoacoes += $doacao->quantidade ?>
                @endforeach
                <tr>
                    <td>TOTAL GERAL</td>
                    <td>{{ $totalGeralDoacoes }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="tabela1">
        <h2>Itens Recebidos</h2>

        <table class="table table-bordered table-hover table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantidade</th>
                    <th>Porcentagem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($itensRecebidos as $item)
                    <tr>
                        <td>{{ $item->item_nome }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>{{ round($item->quantidade / $totalGeralItensRecebidos * 100, 2) }}</td>
                    </tr>
                    <?php $totalGeralPorItens += $item->quantidade ?>
                @endforeach
                <tr>
                    <td>TOTAL GERAL</td>
                    <td>{{ $totalGeralPorItens }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
