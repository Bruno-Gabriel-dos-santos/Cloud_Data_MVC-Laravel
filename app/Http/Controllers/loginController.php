<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cap;
use App\Models\usuario;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function login(Request $request)
    {
        //
        $request->validate([
            'nick' => 'required',
            'senha' => 'required',
        ]);

        $nick=$request->input('nick');
        $senha=$request->input('senha');
       
        $usuario = (new usuario)->verificarCredenciais($nick, $senha);
        
        
        if ($usuario) {
            
            $idUsuario = $usuario['idpasta'];

            $autentificacao_string=$nick.$senha;

            $autentificacao=hash('sha256',$autentificacao_string);

            
            Auth::loginUsingId($idUsuario);
            session(['nick' => $nick]);
            session(['auth' => $autentificacao]);

            return redirect('/arquivos');
            
        } else {

            $request->validate([
                'erro' => 'required'
            ]);

        }

    }

    public function logout(Request $request){

         
        Auth::logout();
        Session::flush();

        
        return redirect('/');
    }

    public function cadastrar(Request $request)
    {
        //
        
        $dadosModel=array();
        $dadosModel[]="um teste";

        
        return view('cadastrar',['dadosModel' => $dadosModel]);
    }

    public function index()
    {
        //
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
        //
        // Captura os valores do formulário
        $nick = $request->input('nick', '0');
        $senha = $request->input('senha', '0');
        $capcha = $request->input('capcha', '0');

        $autentificacao_string=$nick.$senha;

        $autentificacao=hash('sha256',$autentificacao_string);

        // Define os retornos
        $retorno0 = 0;
        $retorno1 = 1;
        $retorno2 = 2;
        $retorno3 = 3;

        // Verifica se todos os campos foram preenchidos
        if ($nick == '0' || $senha == '0' || $capcha == '0') {
            return 0;
        }

        // Verifica se o CAPTCHA está correto
        $cap = cap::where('valor', $capcha)->first();
        if (!$cap) {
            return 3; // CAPTCHA incorreto
        }

        // Verifica se o nick já existe
        $usuarioExistente = usuario::where('nick', $nick)->first();
        if ($usuarioExistente) {
            return 2; // Usuário já existe
        }

        // Realiza o cadastro
        $novasenha = hash('sha256', $senha);

        


        $usuario = new usuario();
        $usuario->nick = $nick;
        $usuario->senha = $novasenha;
        $usuario->autentificacao=$autentificacao;
        $usuario->idpasta = '0';
        $usuario->dados_utilizados = '0';
        $usuario->plano = '50';//valor do plano em MB
        $usuario->validade = '0';
        $usuario->save();

        // Cria o diretório
        $idpasta = $usuario->id;
        mkdir(storage_path("dados/$idpasta"), 0755, true);

        return 1;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
