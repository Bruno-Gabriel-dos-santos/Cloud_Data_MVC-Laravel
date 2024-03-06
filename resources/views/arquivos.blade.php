@extends('layout')

@section('title','Arquivos')

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
<div class="container-10">
            <li id="esp">
                <a href="arquivos" style="color:white;text-decoration:none ;">      <ul class="select"><p class="p3" >Todos os Arquivos </p> </ul></a>
                <a href="fotos" style="color:white;text-decoration:none ;">         <ul class="ulmenu"><p class="p3"> Fotos </p>             </ul></a>
                <a href="trabalho"  style="color:white;text-decoration:none ;">     <ul class="ulmenu"><p class="p3"> Trabalho </p>          </ul></a>
                <a href="jogos" style="color:white;text-decoration:none ;">         <ul class="ulmenu"><p class="p3"> Jogos </p>             </ul></a>
                <a href="compartilhados" style="color:white;text-decoration:none ;"><ul class="ulmenu"><p class="p3"> Compartilhados </p>    </ul></a>
                <a href="planos" style="color:white;text-decoration:none ;">        <ul class="ulmenu"><p class="p3"> Planos </p>            </ul></a>
                <a href="logout" style="color:white;text-decoration:none ;">        <ul class="ulmenu"><p class="p3"> logout </p>            </ul></a>
            
            </li></div>
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

    <div id="principal">
        <p  class="intro">Todos os Arquivos </p>
        <p  class="pesquisaa">Barra de pesquisa </p>

        <form name="pesquisa" method="post" enctype="multipart/form-data" action="pesquisa" style="display:inline;">
        @csrf
            <input type="text" name="pesc" >
            <button type="submit"> pesquisar </button>
        </form>
    
    <hr class="hrprincipal">
    <p style="display:inline;">Arquivos</p>
    
    <button class="botupload" onclick="mostrarenvarqu()">Fazer upload de arquivos</button>

    <div class="enviaarquivos" id="enviaarquivostela">
        <form name="formarquivos" method="post" enctype="multipart/form-data" action="enviar">
            @csrf
            <p style="position:relative;top:7px;font-size:18px;margin-left:15px;">Escolha o arquivo</p><br>
            <input type="file" name="arq[]" style="margin-left:15px;" required multiple><br>
            <p style="margin-left:15px;" >selecione a classe :</p>
                 <select style="margin-left:15px;" required name="classe">
                        <option value="todos">Todos os arquivos</option>
                        <option value="fotos">Fotos</option>
                        <option value="trabalho">Trabalho</option>
                        <option value="jogos">Jogos</option>
                        <option value="compartilhados">Compartilhados</option>
                </select>
                
            <input type="submit" style="margin-left:15px;" name="sub">
        </form>
    </div>
    
    

    <br>
    
    @for ($i = 1; $i <= 15; $i++)
    <ul class="ullista hov" style="display: {{ $displayarquivo[$i] }}">
        <div class="divisor">
            <br>
            <p class="plista branco">{{ $nomearquivo[$i] }}</p>
            <p style="display:none" id="identificador{{ $i }}">{{ $identificador["$i"] }}</p>
        </div>

        <form style="display:inline;" action="baixar" method="post">
        @csrf
            <button class="botbaixar" type="submit" name="botbaixar" value="baixar">Baixar</button>
           
            <input type="hidden" name="nomearq" value="{{ $nomearquivo[$i] }}">
        </form>

        <form style="display:inline;" action="delet" method="post">
        @csrf
            <button class="botexcluir" type="submit" name="botexcluir" value="excluir">Excluir</button>
          
            <input type="hidden" name="nomearq" value="{{ $nomearquivo[$i] }}">
        </form>
    </ul>
    @endfor


    
    
    
    
    
    
    
        <form style="display:inline;" action="arquivos" method="post">
        @csrf
        <button class="botpasspagina" type="submit" name="bot0" value="bot0"> Pagina anterior</button>
        </form><form style="display:inline;" action="arquivos" method="post">
        @csrf
        <button class="botpasspagina" type="submit" name="bot1" value="bot1"> Proxima pagina</button></form>
        <br><br><br><br><br><p style="text-align:right;margin-right:50%;">@php echo $valordapagina @endphp</p>
    </div>

    @endsection


{{-- modelo de dados == {{ $dadosModel[0] }} --}}