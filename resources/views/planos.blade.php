


@extends('layout')

@section('title','Seu Plano')

@section('content')
       
        <div id="botescondido" onclick="funabrir()">
            <div id="botescondidofaix0"></div>
            <div id="botescondidofaix1"></div>
            <div id="botescondidofaix1"></div>
        </div>

        <!-- menu -->
        <div id="telazul">
        <div class="menuprincipal" id="menuprinc">

            <p class="p1">@php echo $nick; @endphp</p>
            <p class="p2"> Bruno Cloud Data online</p>

            <li id="esp">
                <a href="arquivos" style="color:white;text-decoration:none ;">      <ul class="ulmenu"><p class="p3" >Todos os Arquivos </p> </ul></a>
                <a href="fotos" style="color:white;text-decoration:none ;">         <ul class="ulmenu"><p class="p3"> Fotos </p>             </ul></a>
                <a href="trabalho"  style="color:white;text-decoration:none ;">     <ul class="ulmenu"><p class="p3"> Trabalho </p>          </ul></a>
                <a href="jogos" style="color:white;text-decoration:none ;">         <ul class="ulmenu"><p class="p3"> Jogos </p>             </ul></a>
                <a href="compartilhados" style="color:white;text-decoration:none ;"><ul class="ulmenu"><p class="p3"> Compartilhados </p>    </ul></a>
                <a href="planos" style="color:white;text-decoration:none ;">        <ul class="select"><p class="p3"> Planos </p>            </ul></a>
                <a href="logout" style="color:white;text-decoration:none ;">        <ul class="ulmenu"><p class="p3"> logout </p>            </ul></a>
            
            </li>
            <hr style="width: 80%;margin-top: 15px;">


            <div class="barramemoria">
                <div class="valormemoria" style="width:{{$porcentagem_grafica}}%;">

                </div>
            </div>

            <p class="usomemoria">
                {{$porcentagem_total}}% Usados
            </p>
            
        </div>
    </div>
        


        </div>
    <!-- principal -->

     
    
    
    <div id="principal" style="margin-top:50px;">
        <p class="intro" style="font-size:40px ;margin-bottom: 25px;padding:10px;background-color:#080f35;color:white;border-radius:5px;width:250px;">Plano Atual</p>
<br><br>
        <p style="font-size:26px ;margin-bottom: 25px;">{{ $msg_inicial }} {{$nick}}</p>

        <p style="font-size:26px ;margin-bottom: 25px;">Gostariamos de agradecer por sua preferencia em utilizar nosso serviço de armazenamento de arquivos em nuvem, caso tenha alguma duvida ou sujestão entre em contato
        conosco e lhe atenderemos de prontidão. No momento seu plano é {{$tipo_plano}} e voce ja consumiu {{$porcentagem_total}}% do total de recursos 
    do seu {{$tipo_plano}}. <br><br> {{$msg_plano}}</p>

    @php
    if($link_plano=="1") {
        echo '<a href="#" class="link-botao"> Clique aqui e adquira uma chave para o plano 2000 megabytes por R$6,99.</a><br><br>';
        


    }
    @endphp


    <form method="POST" action="/cadastrar-plano" style="margin-top: 20px;">
    @csrf <!-- Adiciona o token CSRF -->

    <label for="chave" style="display: block; margin-bottom: 10px;font-size:26px ;">Chave de Cadastro do Plano:</label>
    <input type="text" id="chave" name="chave" style="display: block; padding: 8px; width: 100%; box-sizing: border-box; margin-bottom: 10px;" required>

    <button type="submit" class="link-botao" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;">Cadastrar</button>
</form>

    <p style="font-size:40px ;margin-bottom: 25px;margin-top:50px;">Informações do seu Plano Atual <span style="font-size:50px"> ᪳ </span></p>
    <br><br>

    <p class="text-planos"> Usuario: {{$nick}}</p>
    <p class="text-planos"> Plano Atual: {{$tipo_plano}}</p>
    <p class="text-planos"> Tempo Restante de uso: {{$validade}}</p>
    <p class="text-planos"> Espaço total do Plano: {{$plano}} MB</p>
    <p class="text-planos"> Espaço total utilizado: {{$total_de_dados_utilizados}} MB</p>
    <p class="text-planos"> Porcentagem Total Utilizada: {{$porcentagem_total}}%</p>






    </div>

        
    @endsection


{{-- modelo de dados == {{ $dadosModel[0] }} --}}