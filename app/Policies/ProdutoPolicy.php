<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Produto;
Use Illuminate\Auth\Access\HandlesAuthorization;


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
       return $user->id === $produto->id_user;
    }
}