<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index(){
        $usuarios = User::where('id', '>', 1)->get();
        return view('usuarios.index')->with(['usuarios' => $usuarios]);
    }

    public function getViewCadastrar(){
        return view('usuarios.cadastrar');
    }

    public function postCadastrar(Request $request){

        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|unique:users|max:255|email',
        ]);

        $usuario = new User;
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = md5(date('d/m/Y H:i:s').$request->email);
        $usuario->save();

        return redirect('/usuarios');
    }

    public function getBloquear($id){
        $usuario = User::find($id);
        if($usuario){
            if($usuario->id != 1){
                $usuario->ativo = 0;
                $usuario->save();
            }
        }
        return redirect('/usuarios');
    }

    public function getDesbloquear($id){
        $usuario = User::find($id);
        if($usuario){
            if($usuario->id != 1){
                $usuario->ativo = 1;
                $usuario->save();
            }
        }
        return redirect('/usuarios');
    }

}
