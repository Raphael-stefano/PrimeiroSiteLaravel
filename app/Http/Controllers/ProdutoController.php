<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::paginate(3);
        /*$nome = 'Stefano';
        $dataNascimento = '2002-06-24';
        $idade = Carbon::parse($dataNascimento)->age;
        $html = '<p>HTML de teste</p>';
        $nivelProjeto = '3';
        $frutas = ['maça' => 10, 'banana' => 25, 'laranja' => 15];*/

        // outra forma, mais rápida, de fazer
        //return view('site/empresa', compact('nome', 'idade', 'html'));

        return view('site/home', [
            'produtos' => $produtos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = $request->all();

        if($request->imagem){
            $produto['imagem'] = $request->imagem->store('produtos');
        }

        $produto['slug'] = Str::slug($request->nome);

        $produto['id_usuario'] = Auth::user()->id_user;

        $produto = Produto::create($produto);

        return redirect(route('admin.produtos'))->with('create', "O produto \"{$produto->nome}\" foi criado e registrado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produtoAtual = Produto::findOrFail($id);

        $novoProduto = $request->all();

        if($request->imagem){
            $novoProduto['imagem'] = $request->imagem->store('produtos');
        }

        $novoProduto['slug'] = Str::slug($request->nome);

        $produtoAtual->update($novoProduto);

        return redirect(route('admin.produtos'))->with('update', "O produto \"{$produtoAtual->nome}\" foi atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        
        $nome = $produto->nome;

        $produto->delete();

        return redirect(route('admin.produtos'))->with('delete', "Atençao! Voce acabou de apagar o produto \"{$nome}\"!");
    }
}
