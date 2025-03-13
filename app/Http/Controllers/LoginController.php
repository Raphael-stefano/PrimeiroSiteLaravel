<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function auth(Request $request){

        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ], [
            'email.required' => "Preencha o campo E-mail",
            'email.email' => "Esse nao é um endereço de E-mail válido",
            'password' => "Preencha o campo Senha",
        ]);

        if(Auth::attempt($credenciais, $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        } else{
            return redirect()->back()->with('erro', 'Usuário ou senha inválidos');
        }

    }

    public function sair(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('site.index')->with('logout', 'Voce acabou de sair da sua conta');
        /* redirect()->route('site.index') OU redirect(route('site.index')) OU redirect('/') */
    }

}
