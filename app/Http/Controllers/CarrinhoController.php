<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
//use Illuminate\Support\Facades\Session;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        //$items = CartFacade::getContent();

        //$items = app(Cart::class)->getContent();

        // Exemplo de uso da sessão
        /*Session::put('carrinho', $items); 
        $sessionItems = Session::get('carrinho'); */

        /*Session::put('user', 'eu'); 
        $sessionUser = Session::get('user');*/

        /*Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'options' => ['size' => 'large']]);*/

        $items = Cart::content();

        return view('site/carrinho', [
            'items' => $items,
        ]);
    }

    public function adicionarCarrinho(Request $request){
        Cart::add([
            'id' => $request->id,
            'name' => $request->nome,
            'price' => $request->preco,
            'qty' => abs($request->quantidade),
            'options' => [
                'image' => $request->imagem,
            ],
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado ao carrinho com sucesso!');
    }

    public function atualizarCarrinho(Request $request){

        Cart::update($request->rowId, ['qty' => abs($request->qty)]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto atualizado com sucesso!');

    }

    public function removerCarrinho(Request $request){

        Cart::remove($request->rowId);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido do carrinho com sucesso!');

    }

    public function limparCarrinho(Request $request){

        Cart::destroy();

        return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho foi limpo!');

    }

}
