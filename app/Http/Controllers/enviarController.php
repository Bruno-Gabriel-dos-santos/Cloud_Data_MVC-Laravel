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


class enviarController extends Controller
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
      

        $nick=session('nick');        
       
        // carrega o upload e faz o salvamento na pagina correta
        $dadosfurmularioarq= filter_input_array(INPUT_POST,FILTER_DEFAULT);
        if (!empty($dadosfurmularioarq["sub"])) {
        
        $arquivobrutoformulario=$_FILES['arq'];
        
        $num_arquivos = count($arquivobrutoformulario['name']);
        
        for ($i = 0; $i < $num_arquivos; $i++) {
        
                   
                    $nome_arquivo_bruto=$arquivobrutoformulario['name'][$i];
                    $nome_classe=$dadosfurmularioarq['classe'];
                    $tamanho_do_arquivo=$arquivobrutoformulario['size'][$i];

                    // verifica se o plano comporta mais arquivos

                    $usuario = usuario::where('nick', $nick)
                    ->first();

                    $dados_do_plano=$usuario->plano;
                    $dados_do_plano=$dados_do_plano*1000000;
                    $total_de_amostragem_utilizados=$usuario->dados_utilizados;
                    $total_de_amostragem_utilizados+=$tamanho_do_arquivo;



                    if($total_de_amostragem_utilizados>=$dados_do_plano){
                        return redirect('/planos');
                        

                    }


                    // Verifica se o nome já existe
                    $contador=1;

                    $verifica_nome = dados::where('nome', $nome_arquivo_bruto)
                    ->where('nick', $nick)
                    ->get();
                
                    if ($verifica_nome->count() > 0) {
                        $nome_secundario = $nome_arquivo_bruto;
                        $contador = 1;
                        while (true) {
                            $verifica_nome = dados::where('nome', $nome_secundario)
                                ->where('nick', $nick)
                                ->get();
                    
                            if ($verifica_nome->count() > 0) {
                                $nome_secundario = "($contador)$nome_arquivo_bruto";
                            } else {
                                $arquivobrutoformulario['name'][$i] = $nome_secundario;
                                $nome_arquivo_bruto = $nome_secundario;
                                break;
                            }
                            $contador++;
                        }
                    }
                    
                    
                    $dado = new dados();
                    $dado->idarq = 0;
                    $dado->nome = $nome_arquivo_bruto;
                    $dado->formato = 0;
                    $dado->classe = $nome_classe;
                    $dado->nick = $nick;
                    $dado->tamanho_do_arquivo = $tamanho_do_arquivo;

                    if ($dado->save()) {
                       
                        $idarq_max = dados::where('nick', $nick)->max('idarq');

                        if ($idarq_max !== null) {
                            $idnome = $idarq_max;
                            
                        } else {
                            echo "0"; 
                            die();
                        }
                    } else {
                        echo "0"; 
                        die();
                    }

                    $usuario = usuario::where('nick', $nick)
                    ->first();
                
                    if ($usuario) {
                        // Se encontrou um usuário com o nick e senha especificados
                        $idpasta = $usuario->idpasta;
                        $total_de_dados_utilizados=$usuario->dados_utilizados;
                        $total_de_dados_utilizados+=$tamanho_do_arquivo;
                        usuario::where('nick', $nick)->update(['dados_utilizados' => $total_de_dados_utilizados]);

                    } else {
                        // Caso contrário, o usuário não foi encontrado
                        $idpasta = null;
                    }

                    // move o arquivo para a pasta do usuario pelo id do usuario
                    $diretorio = storage_path("dados/$idpasta/");
                    // renomeia o arquivo para o nome numerico correto
                    // Upload do arquivo
                    $nome_arquivo = $arquivobrutoformulario['name'][$i];
                    $saidanome_arq=$diretorio.$nome_arquivo;
    
                    move_uploaded_file($arquivobrutoformulario['tmp_name'][$i], $diretorio.$nome_arquivo );
    
                    
                    
                                    
    
                    }

            
    
        }
        
        if($nome_classe=="todos"){         return redirect('/arquivos');}
        if($nome_classe=="fotos"){         return redirect('/fotos');}
        if($nome_classe=="trabalho"){      return redirect('/trabalho');}
        if($nome_classe=="jogos"){         return redirect('/jogos');}
        if($nome_classe=="compartilhados"){return redirect('/compartilhados');}

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
