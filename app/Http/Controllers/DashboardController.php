<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'checkemail'])/*->only(['index', home, ...]) nesse caso seria aplicado apenas aos métodos presentes no array ->except([...]) aqui a todos os métodos menos aos presentes no array*/;
    }

    public function index(){
        return view('admin.home', [
            'user' => Auth::user(),
            'cards' => [
                'produtos' => [
                    'titulo' => 'Produtos',
                    'icone' => 'bi-bag-check-fill',
                    'qty' => Produto::count(),
                ],
                'categorias' => [
                    'titulo' => 'Categorias',
                    'icone' => "bi bi-tags-fill",
                    'qty' => Categoria::count(),
                ],
                'users' => [
                    'titulo' => 'Usuários',
                    'icone' => "bi bi-person-badge",
                    'qty' => User::count(),
                ],
            ],
            'page' => 'index',
        ]);
    }

    public function produtos(){
        return view('admin.produtos', [
            'user' => Auth::user(),
            'page' => 'produtos',
            'produtos' => Produto::paginate(5),
            'categorias' => Categoria::all(),
        ]);
    }

}
