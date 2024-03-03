<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Middleware\AuthRotas;
use App\Http\Middleware\VerificaLogin;
use App\Http\Middleware\VerificaBaixarPublico;
use App\Http\Middleware\VerificaNick;
use App\Http\Middleware\VerificaUsuario;



use App\Http\Controllers\arquivoController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\captchaController;
use App\Http\Controllers\pesquisaController;
use App\Http\Controllers\enviarController;
use App\Http\Controllers\baixarController;
use App\Http\Controllers\deletController;

use App\Http\Controllers\compartilhadosController;

use App\Http\Controllers\jogosController;

use App\Http\Controllers\trabalhoController;

use App\Http\Controllers\fotosController;

use App\Http\Controllers\planosController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [indexController::class, 'index'])->name('index');

Route::post('/login', [loginController::class, 'login'])->middleware(VerificaLogin::class)->name('login');
Route::get('/login', function () {
    return redirect('/');
});


Route::get('/cadastrar', [loginController::class, 'cadastrar'])->name('cadastrar.index');

Route::post('/novocadastro', [loginController::class, 'store'])->name('cadastrar.store'); 
Route::get('/novocadastro', function () {
    return redirect('/');
});

Route::get('/cap', [captchaController::class, 'show'])->name('captcha');

Route::match(['get', 'post'], '/arquivos', [arquivoController::class, 'index'])->middleware(AuthRotas::class)->name('arquivos.index');

Route::match(['get', 'post'], '/compartilhados', [compartilhadosController::class, 'index'])->middleware(AuthRotas::class)->name('compartilhados.index');

Route::match(['get', 'post'], '/jogos', [jogosController::class, 'index'])->middleware(AuthRotas::class)->name('jogos.index');

Route::match(['get', 'post'], '/trabalho', [trabalhoController::class, 'index'])->middleware(AuthRotas::class)->name('trabalho.index');

Route::match(['get', 'post'], '/fotos', [fotosController::class, 'index'])->middleware(AuthRotas::class)->name('fotos.index');

Route::match(['get', 'post'], '/planos', [planosController::class, 'index'])->middleware(AuthRotas::class)->name('planos.index');

Route::post('/pesquisa', [pesquisaController::class, 'index'])->middleware(AuthRotas::class)->name('pesquisa');
Route::get('/pesquisa', function () {
    return redirect('/');
});

Route::post('/enviar', [enviarController::class, 'store'])->middleware(AuthRotas::class)->name('enviar'); // procura post
Route::get('/enviar', function () {
    return redirect('/');
});

Route::post('/baixar', [baixarController::class, 'donwload'])->middleware(AuthRotas::class)->name('baixar');
Route::get('/baixar', function () {
    return redirect('/');
});

Route::post('/baixarpublico', [baixarController::class, 'donwloadpublico'])->middleware(VerificaBaixarPublico::class)->name('baixar.publico');
Route::get('/baixarpublico', function () {
    return redirect('/');
});

Route::post('/pesquisapublica', [pesquisaController::class, 'publico'])->middleware(VerificaNick::class)->name('pesquisa.publica');
Route::get('/pesquisapublica', function () {
    return redirect('/');
});

Route::post('/delet', [deletController::class, 'destroy'])->middleware(AuthRotas::class)->name('delet');
Route::get('/delet', function () {
    return redirect('/');
});


Route::get('/semrota', function () {
    return view('semrota');
})->name('semrota');

Route::get('/semusuario', function () {
    return view('semUsuario');
})->name('semusuario');

Route::match(['get', 'post'], '/publico/{nick}', [compartilhadosController::class, 'publico'])->middleware(VerificaUsuario::class)->name('compartilhados.publico');


Route::get('/logout', [loginController::class, 'logout'])->name('logout');
