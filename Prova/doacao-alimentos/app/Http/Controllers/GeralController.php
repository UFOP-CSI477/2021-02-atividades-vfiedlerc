<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeralController extends Controller
{
    public function index()
    {
        $doacoesPorEntidade = DB::select(
            "SELECT e.nome AS entidade_nome,
                    SUM(c.quantidade) AS quantidade
               FROM coletas c
         INNER JOIN entidades e ON (e.id = c.entidade_id)
           GROUP BY c.entidade_id"
        );

        $itensRecebidos = DB::select(
            "SELECT i.descricao AS item_nome,
                    SUM(c.quantidade) AS quantidade
               FROM coletas c
         INNER JOIN items i ON (i.id = c.item_id)
           GROUP BY i.id"
        );

        // dd($totalItensRecebidos);
        $totalGeralItensRecebidos =array_sum(array_column($itensRecebidos, 'quantidade'));

        return view('geral', [
            'doacoesPorEntidade' => $doacoesPorEntidade,
            'totalGeralDoacoes' => 0,
            'itensRecebidos' => $itensRecebidos,
            'totalGeralPorItens' => 0,
            'totalGeralItensRecebidos' => $totalGeralItensRecebidos
        ]);
    }
}
