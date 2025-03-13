<?php

namespace App\Policies;

use App\Models\Produto;
use App\Models\User;

class ProdutoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function verProduto(User $user, Produto $produto){
        return $user->id_user == $produto->id_usuario;
    }
}
