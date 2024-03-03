<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;
use App\Models\dados;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

class deletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function destroy(Request $request)
    {
        //
      
        $nick= session('nick');
        $nomedoarquivo= isset($_POST  ['nomearq']) ? $_POST["nomearq"] : "0";

        
        $usuario = usuario::where('nick', $nick)
        ->first();
    
        if ($usuario) {
            // Se encontrou um usuário com o nick e senha especificados
            $idpasta = $usuario->idpasta;
        } else {
            // Caso contrário, o usuário não foi encontrado
            $idpasta = null;
        }

        $diretorio = storage_path("dados/$idpasta/");

        $patharquivo=$diretorio.$nomedoarquivo;

        if(@unlink($patharquivo)){
        $saidaunlink=0;
        }else{
            $saidaunlink=1;
        }
        $dados = dados::where('nick', $nick)
        ->where('nome', $nomedoarquivo)
        ->first();
        
        if ($dados === null) {
            
            $saidaunlink = 1;
        } else {
            
            $idarquivoedelet = $dados->idarq;
            $nome_classe = $dados->classe;
            $tamanho_do_arquivo=$dados->tamanho_do_arquivo;
            $saidaunlink = 0;
        }

        if($saidaunlink==0){

           if (dados::where('idarq', $idarquivoedelet)->delete()) {

            $usuario = usuario::where('nick', $nick)
                    ->first();
                
                    if ($usuario) {
                      
                        $total_de_dados_utilizados=$usuario->dados_utilizados;
                        $total_de_dados_utilizados-=$tamanho_do_arquivo;
                        usuario::where('nick', $nick)->update(['dados_utilizados' => $total_de_dados_utilizados]);}
               
            } else {
               
                die();
            }
        }











        if($nome_classe=="todos"){         return redirect('/arquivos');}
        if($nome_classe=="fotos"){         return redirect('/fotos');}
        if($nome_classe=="trabalho"){      return redirect('/trabalho');}
        if($nome_classe=="jogos"){         return redirect('/jogos');}
        if($nome_classe=="compartilhados"){return redirect('/compartilhados');}
    }
}
