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

class planosController extends Controller
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
        $horarioAtual = now();
        $horario = $horarioAtual->format('H:i:s');
        $hora = $horarioAtual->format('H');


        if ($hora >= 6 && $hora < 12) {
           $msg_inicial="Bom dia";
        } elseif ($hora >= 12 && $hora < 18) {
            $msg_inicial="Boa tarde";
        } else {
            $msg_inicial="Boa noite";}

        $usuario = usuario::where('nick', $nick)
        ->first();
    
        if ($usuario) {
           
            $total_de_dados_utilizados=$usuario->dados_utilizados;

            $plano=$usuario->plano;
            $validade=$usuario->validade;

            if($plano==50){
                $tipo_plano="plano gratuito";
                $validade="indefinida";

                $val_plano_espnd=50*1000000;

                $porcentagem=$total_de_dados_utilizados/$val_plano_espnd;
                $porcentagem_total=$porcentagem*100;
                $porcentagem_grafica=intval($porcentagem*90);

               

                $msg_plano="Considere aderir nosso plano de 2000 megabytes por apenas R$6,99 por mes, nosso plano lhe permitira compartilhar diversos arquivos
                com links facilitados lhe oferecendo praticidade e agilidade no seu dia a dia, nossa plataforma é construida para ser pratica e intuitiva onde se pode 
                armazenar e compartilhar dados e informações que necessitamos em nossos trabalhos e afazeres. De tal maneira que um sistema sem complicações ou complexidade 
                exessiva podera melhorar sua produtividade.";

                $link_plano="1";


            }
            if($plano==2000){
                $tipo_plano="plano 2 gigabytes";

                $val_plano_espnd=2000*1000000;

                $porcentagem=$total_de_dados_utilizados/$val_plano_espnd;
                $porcentagem_total=$porcentagem*100;
                $porcentagem_grafica=intval($porcentagem*90);
                $msg_plano="";

                $link_plano="0";
            }
            $total_de_dados_utilizados=$total_de_dados_utilizados/1000000;

        } 
        
        return view('planos', compact('nick','total_de_dados_utilizados','plano','tipo_plano','validade','msg_inicial','porcentagem_total','msg_plano','link_plano','val_plano_espnd','porcentagem_grafica'));

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
