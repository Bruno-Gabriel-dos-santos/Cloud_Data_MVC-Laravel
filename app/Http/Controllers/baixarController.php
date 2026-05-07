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



class baixarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function donwload()
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

    // faz o download 
    if(file_exists("$patharquivo")){

        $file=$nomedoarquivo;
        $type= filetype("$patharquivo");
        $size=filesize("$patharquivo");
        header("Content-Description: File Transfer");
        header("Content-Type:$type");
        header("Content-Lebgth:$size");
        header("Content-Disposition:attachment; filename=$file");
        readfile("$patharquivo");
        exit;
    }

    exit;


    }

    public function donwloadpublico(Request $request)
    {
        //

            
    $nick= isset($_POST  ['nick']) ? $_POST["nick"] : "0";;

    $nomedoarquivo= isset($_POST  ['nomearq']) ? $_POST["nomearq"] : "0";

    $dado= dados::where('nick',$nick)->
    where('nome',$nomedoarquivo)->first();

    $classe=$dado->classe;

    if($classe!="compartilhados"){
        return view('erro');
    }

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

    // faz o download 
    if(file_exists("$patharquivo")){

        $file=$nomedoarquivo;
        $type= filetype("$patharquivo");
        $size=filesize("$patharquivo");
        header("Content-Description: File Transfer");
        header("Content-Type:$type");
        header("Content-Lebgth:$size");
        header("Content-Disposition:attachment; filename=$file");
        readfile("$patharquivo");
        exit;
    }

    exit;


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
    public function update(Request $request)
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
