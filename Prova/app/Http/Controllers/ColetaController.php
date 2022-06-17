<?php

namespace App\Http\Controllers;

use App\Models\Coleta;
use App\Models\Entidade;
use App\Models\Item;
use Illuminate\Http\Request;

class ColetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coletas = Coleta::all();

        return view('coletas.index', ['coletas' => $coletas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itens = Item::all();
        $entidades = Entidade::all();

        return view('coletas.create', [
            'itens' => $itens,
            'entidades' => $entidades,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Coleta::create($request->all());

        return redirect('coletas')->with('success', 'Coleta cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coleta  $coleta
     * @return \Illuminate\Http\Response
     */
    public function show(Coleta $coleta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coleta  $coleta
     * @return \Illuminate\Http\Response
     */
    public function edit(Coleta $coleta, $id)
    {
        $coleta = Coleta::find($id);
        $itens = Item::all();
        $entidades = Entidade::all();

        return view('coletas.edit', [
            'coleta' => $coleta,
            'itens' => $itens,
            'entidades' => $entidades,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coleta  $coleta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coleta = Coleta::find($id);

        $coleta->item_id = $request->input('item_id');
        $coleta->entidade_id = $request->input('entidade_id');
        $coleta->quantidade = $request->input('quantidade');
        $coleta->data = $request->input('data');
        $coleta->save();

        return redirect('/coletas')->with('success', 'Coleta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coleta  $coleta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coleta $coleta, $id)
    {
        Coleta::find($id)->delete();
        return redirect('/coletas')->with('alert', 'Coleta excluída com sucesso!');
    }
}
