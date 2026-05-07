<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;


class captchaController extends Controller
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
    public function show()
    {
        // Verifica se existem registros na tabela 'cap'
        $count = cap::count();

        // Se não houver registros
        if ($count == 0) {
            // Caracteres disponíveis para a senha
            $textoAleatorio = "0123456789abcdefghijlmnopqrstuvxyz";
            // String para armazenar a senha
            $senha = "";

            // Loop para gerar 1000 senhas
            for ($l = 0; $l < 1000; $l++) {
                // Gerar senha de 8 caracteres
                for ($i = 0; $i < 8; $i++) {
                    $senha .= $textoAleatorio[rand(0, strlen($textoAleatorio) - 1)];
                }

                // Salvar a senha no banco de dados usando Eloquent
                $cap = new cap();
                $cap->numero = 0;
                $cap->valor = $senha;
                $cap->save();

                // Resetar a senha para a próxima iteração
                $senha = "";
            }
        } 
       

           // Recupera um registro aleatório da tabela 'cap'
           $cap = cap::inRandomOrder()->first();

           // Cria uma nova imagem
           $imagem = imagecreate(150, 50);
   
           // Define a cor do texto
           $corTexto = imagecolorallocate($imagem, 215, 245, 247);
   
           // Define a cor de fundo
           $corFundo = imagecolorallocate($imagem, 255, 0, 0);
   
           // Adiciona o texto à imagem
           imagestring($imagem, 10, 35, 15, $cap->valor, $corFundo);
   
           // Define o cabeçalho como imagem JPEG
           header('Content-Type: image/jpeg');
   
           // Gera a imagem JPEG diretamente para o output
        
           $img= imagejpeg($imagem);

           echo($img);
   
           // Libera a memória
           imagedestroy($imagem);
      
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
