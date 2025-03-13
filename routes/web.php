<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('produtos', ProdutoController::class);
Route::resource('users', UserController::class);

/*Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');*/

Route::group([
    'prefix' => '/',   
    'as' => 'site.'    
], function() {
    Route::get('/', [SiteController::class, 'index'])->name('index');
    Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('details');
    Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('categoria');
    Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('carrinho');
    Route::post('/carrinho', [CarrinhoController::class, 'adicionarCarrinho'])->name('addCarrinho');
    Route::post('/atualizarCarrinho', [CarrinhoController::class, 'atualizarCarrinho'])->name('atualizarCarrinho');
    Route::post('/removerCarrinho', [CarrinhoController::class, 'removerCarrinho'])->name('removerCarrinho');
    Route::get('/limparCarrinho', [CarrinhoController::class, 'limparCarrinho'])->name('limparCarrinho');
});

Route::group([
    'prefix' => '/login',   
    'as' => 'login.'    
], function() {
    Route::view('/', 'login.formulario')->name('formulario');
    Route::view('/criar', 'login.criar')->name('registro');
    Route::post('/auth', [LoginController::class, 'auth'])->name('auth');
    //Route::post('/criar', [UserController::class, 'store'])->name('criar');
    Route::get('/sair', [LoginController::class, 'sair'])->name('sair');
});

Route::group([
    'prefix' => '/admin',   
    'as' => 'admin.'    
], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::get('/produtos', [DashboardController::class, 'produtos'])->name('produtos');
    Route::post('/produto/create', [ProdutoController::class, 'store'])->name('produto.create');
    Route::put('/produto/update/{id}', [ProdutoController::class, 'update'])->name('produto.update');
    Route::delete('/produto/delete/{id}', [ProdutoController::class, 'destroy'])->name('produto.delete');
})/*->middleware('auth')*/; //decidi colocar o middleware no construtor

/**Route::group([
    'as' => 'produto.'
], function(){
    Route::get('/', [ProdutoControlador::class, 'index']);
    Route::get('/produto/{id}/{cat?}', [ProdutoControlador::class, 'mostrarProdutos']);
});/

/*Route::get('/', function () {
    return view('app');
});*/

/*Route::group([
    'prefix' => 'site',
    'as' => 'site.'
], function(){
    Route::get('empresa', function () {
        return view('site/empresa');
    })->name('empresa');
    
    Route::get('/news', function () {
        return view('site/news');
    })->name('noticias');
    
    Route::get('/novidades', function () {
        return redirect()->route('noticias');
    })->name('noticias');
});*/

//passando parametros na URL
/*Route::get('/produto/{id}/{cat?}', function ($id, $cat = "") {
    return "O Id do produto é {$id} e a categoria é {$cat}";
});*/

// Redireciona para a rota /empresa quando a rota /sobre é digitada na URL
//Route::redirect('/sobre', 'empresa');

/*Route::get('/empresa', function () {
    return "Permite qualquer método http";
});*/

/*Route::match(['get', 'post'], '/empresa', function () {
    return "Permite os métodos http definidos no parametro";
});*/