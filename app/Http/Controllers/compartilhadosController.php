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

class compartilhadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

     
        
        $pag= session('pagina');

        $paginaatual="compartilhados";

        if($paginaatual!=$pag){
            session(['nomesdado' => 0]);
            session(['totaldenomessession' => 0]);
            session(['pagina' => 'compartilhados']);

        }

        $nick = session('nick');
        
        $usuario = usuario::where('nick', $nick)
        ->first();
    
        if ($usuario) {
           
            $total_de_dados_utilizados=$usuario->dados_utilizados;

            $plano=$usuario->plano;
            $validade=$usuario->validade;

            if($plano==50){
               

                $val_plano_espnd=50*1000000;

                $porcentagem=$total_de_dados_utilizados/$val_plano_espnd;
                $porcentagem_total=$porcentagem*100;
                $porcentagem_grafica=intval($porcentagem*90);

               

               


            }
            if($plano==2000){
                
                $val_plano_espnd=2000*1000000;

                $porcentagem=$total_de_dados_utilizados/$val_plano_espnd;
                $porcentagem_total=$porcentagem*100;
                $porcentagem_grafica=intval($porcentagem*90);
               
            }
            $total_de_dados_utilizados=$total_de_dados_utilizados/1000000;

        } 
        
        //'total_de_dados_utilizados','porcentagem_total','porcentagem_grafica'

        $saidabot0 = $request->has('bot0') ? $request->input('bot0') : "0";
        $saidabot1 = $request->has('bot1') ? $request->input('bot1') : "0";

        $inicionomes = 0;
        $icontadordearquivos = 1;

        if ($saidabot0 == "bot0") {
            // retrocede a pagina anterior se possivel
            if (session('nomesdado') > 0) {
                session(['nomesdado' => session('nomesdado') - 15]);
            }
        }

        if ($saidabot1 == "bot1") {
            // avança para a proxima pagina se possivel
            session(['nomesdado' => session('nomesdado') + 15]);
        }

        $inicionomes = session('nomesdado', 0);

        if (!session()->has('totaldenomessession')) {
            session(['totaldenomessession' => 0]);
        }

        if (session('totaldenomessession') < session('nomesdado')) {
            if (session('nomesdado') >= 15) {
                session(['nomesdado' => session('nomesdado') - 15]);
            }
            $inicionomes = session('nomesdado');
        }

        $contadordearquivos=1;
       
        $displayarquivo= [1 => "none",2 => "none",3 => "none",4 => "none",5 => "none",6 => "none",7 => "none",8 => "none",
        9 => "none",10 => "none",11 => "none",12 => "none",13 => "none",14 => "none",15 => "none"];

        $nomearquivo= [1 => "none",2 => "none",3 => "none",4 => "none",5 => "none",6 => "none",7 => "none",8 => "none",
        9 => "none",10 => "none",11 => "none",12 => "none",13 => "none",14 => "none",15 => "none"];

        $identificador= ["1" => "none","2" => "none","3" => "none","4" => "none","5" => "none","6" => "none","7" => "none","8" => "none",
        "9" => "none","10" => "none","11" => "none","12" => "none","13" => "none","14" => "none","15" => "none"];

        $linkbaixar= [1 => "#",2 => "#",3 => "#",4 => "#",5 => "#",6 => "#",7 => "#",8 => "#",
        9 => "#",10 => "#",11 => "#",12 => "#",13 => "#",14 => "#",15 => "#"];
        // utilizando o nick pega todos os nomes e ids dos dados arquivos no banco
        $usuario = usuario::where('nick', $nick)
        ->first();
    
        if ($usuario) {
            // Se encontrou um usuário com o nick e senha especificados
            $idpasta = $usuario->idpasta;
        } else {
            // Caso contrário, o usuário não foi encontrado
            $idpasta = null;
        }

        
        $dados = dados::where('nick', $nick)
        ->where('classe','Compartilhados')
        ->pluck('nome');

        foreach ($dados as $dado) {
            if ($contadordearquivos > $inicionomes) {
                if ($icontadordearquivos <= 15) {
                    $displayarquivo[$icontadordearquivos] = "block";
                    $nomearquivo[$icontadordearquivos] = $dado;
                    $diretorio = storage_path("dados/$idpasta/");
                    $linkbaixar[$icontadordearquivos] = $diretorio . $nomearquivo[$icontadordearquivos];
                    $icontadordearquivos++;
                }
            }
            $contadordearquivos++;
        }


            session(['totaldenomessession' => $contadordearquivos]);
            $valortotaldapagina = (int) ($contadordearquivos / 15) + 1;
            $paginaatualizada = session('nomesdado') / 15;
            $valordapaginaatual =  $paginaatualizada+1;
            $valordapagina = "página " . $valordapaginaatual . " de " . $valortotaldapagina;
            $inicionomes = session('nomesdado');
            //$url_publica="https://www.site.com/publica/".$nick;
            $url_publica="/publico"."/".$nick;
            
        return view('compartilhados', compact('nick', 'displayarquivo', 'nomearquivo', 'linkbaixar', 'identificador', 'valordapagina','total_de_dados_utilizados','porcentagem_total','porcentagem_grafica','url_publica'));


    }

    public function publico(Request $request,string $nick){
        
        $pag= session('pagina');

        $paginaatual="compatilhadospublico";

        if($paginaatual!=$pag){
            session(['nomesdado' => 0]);
            session(['totaldenomessession' => 0]);
            session(['pagina' => 'compatilhadospublico']);

        }
        
     
        $saidabot0 = $request->has('bot0') ? $request->input('bot0') : "0";
        $saidabot1 = $request->has('bot1') ? $request->input('bot1') : "0";

        $inicionomes = 0;
        $icontadordearquivos = 1;

        if ($saidabot0 == "bot0") {
            // retrocede a pagina anterior se possivel
            if (session('nomesdado') > 0) {
                session(['nomesdado' => session('nomesdado') - 15]);
            }
        }

        if ($saidabot1 == "bot1") {
            // avança para a proxima pagina se possivel
            session(['nomesdado' => session('nomesdado') + 15]);
        }

        $inicionomes = session('nomesdado', 0);

        if (!session()->has('totaldenomessession')) {
            session(['totaldenomessession' => 0]);
        }

        if (session('totaldenomessession') < session('nomesdado')) {
            if (session('nomesdado') >= 15) {
                session(['nomesdado' => session('nomesdado') - 15]);
            }
            $inicionomes = session('nomesdado');
        }

        $contadordearquivos=1;
       
        $displayarquivo= [1 => "none",2 => "none",3 => "none",4 => "none",5 => "none",6 => "none",7 => "none",8 => "none",
        9 => "none",10 => "none",11 => "none",12 => "none",13 => "none",14 => "none",15 => "none"];

        $nomearquivo= [1 => "none",2 => "none",3 => "none",4 => "none",5 => "none",6 => "none",7 => "none",8 => "none",
        9 => "none",10 => "none",11 => "none",12 => "none",13 => "none",14 => "none",15 => "none"];

        $identificador= ["1" => "none","2" => "none","3" => "none","4" => "none","5" => "none","6" => "none","7" => "none","8" => "none",
        "9" => "none","10" => "none","11" => "none","12" => "none","13" => "none","14" => "none","15" => "none"];

        $linkbaixar= [1 => "#",2 => "#",3 => "#",4 => "#",5 => "#",6 => "#",7 => "#",8 => "#",
        9 => "#",10 => "#",11 => "#",12 => "#",13 => "#",14 => "#",15 => "#"];
        // utilizando o nick pega todos os nomes e ids dos dados arquivos no banco
        $usuario = usuario::where('nick', $nick)
        ->first();
    
        if ($usuario) {
            // Se encontrou um usuário com o nick e senha especificados
            $idpasta = $usuario->idpasta;
        } else {
            // Caso contrário, o usuário não foi encontrado
            $idpasta = null;
        }

        
        $dados = dados::where('nick', $nick)
        ->where('classe','Compartilhados')
        ->pluck('nome');

        foreach ($dados as $dado) {
            if ($contadordearquivos > $inicionomes) {
                if ($icontadordearquivos <= 15) {
                    $displayarquivo[$icontadordearquivos] = "block";
                    $nomearquivo[$icontadordearquivos] = $dado;
                    $diretorio = storage_path("dados/$idpasta/");
                    $linkbaixar[$icontadordearquivos] = $diretorio . $nomearquivo[$icontadordearquivos];
                    $icontadordearquivos++;
                }
            }
            $contadordearquivos++;
        }


            session(['totaldenomessession' => $contadordearquivos]);
            $valortotaldapagina = (int) ($contadordearquivos / 15) + 1;
            $paginaatualizada = session('nomesdado') / 15;
            $valordapaginaatual =  $paginaatualizada+1;
            $valordapagina = "página " . $valordapaginaatual . " de " . $valortotaldapagina;
            $inicionomes = session('nomesdado');
            //$url_publica="https://www.site.com/publica/".$nick;
            $url_publica="/publico"."/".$nick;

        
        return view('publico', compact('nick', 'displayarquivo', 'nomearquivo', 'linkbaixar', 'identificador', 'valordapagina'));

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
    public function destroy(string $id)
    {
        //
    }
}
