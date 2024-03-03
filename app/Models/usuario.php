<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $table = 'usuario';


    public function verificarCredenciais($nick, $senha)
    {
        $usuario = usuario::where('nick', $nick)->first();
        
        if ($usuario && hash('sha256', $senha) === $usuario->senha) {
            return $usuario;
        }

        return null;
    }
}
