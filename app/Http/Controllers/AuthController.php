<?php

namespace App\Http\Controllers;

use App\LogDeAcesso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getViewLogin(){
        if(Auth::check()){
            return redirect('home');
        }
        return view('auth/login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(!Auth::user()->ativo){
                Auth::logout();
                return redirect()
                    ->back()
                    ->withErrors(['login_message' => 'Usuário Desativado.'])
                    ->withInput();
            }else {
                return redirect()->intended('/candidatos');
            }

        }

        return redirect()
            ->back()
            ->withErrors(['login_message' => 'Email e/ou senha incorretos.'])
            ->withInput();
    }

    public function postLogout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
