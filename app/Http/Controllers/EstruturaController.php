<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estrutura;
use App\Produto;
use Validator;


class EstruturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estruturas = Estrutura::all();
        return view('estruturas.index', compact(['estruturas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all(['codigo', 'descricao']);
        return view('estruturas.new', compact('produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estruturaData = $request->all();
        $request->validated();

        $retorno = $this->validaPaiFilho($estruturaData['codigo_pai'], $estruturaData['codigo_filho'], $estruturaData);
        if (!is_null($retorno))
            return $retorno;
        $estrutura = new Estrutura();
        $estrutura->create($estruturaData);

        //$produto->estruturas()->create($estruturaData);

        flash('Estrutura criada com sucesso')->success();
        return redirect()->route('estrutura.index');

    }

    private function validaPaiFilho($pai, $filho, $estruturaData){
        if($pai == $filho ) {
            $validator = Validator::make($estruturaData, []);
            $validator->errors()->add("codigos_iguais", 'Código pai e código filho não podem ser iguais.');

            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtos = Produto::all();
        return view('estruturas.edit', compact(['estrutura', 'produtos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $estruturaData = $request->all();
        $request->validated();
        $retorno = $this->validaPaiFilho($estruturaData['codigo_pai'], $estruturaData['codigo_filho'], $estruturaData);
        if (!is_null($retorno))
            return $retorno;

        $estrutura = Estrutura::findOrFail($estrutura);
        $estrutura->update($estruturaData);
        flash('Estrutura atualizada com sucesso')->success();
        return redirect()->route('estrutura.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estrutura = Estrutura::findOrFail($id);
        $estrutura->delete();
        flash('Estrutura removida com sucesso')->success();
        return redirect()->route('estrutura.index');
    }
}
