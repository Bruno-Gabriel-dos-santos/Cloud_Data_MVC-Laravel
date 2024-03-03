@extends('layout')

@section('title','Compartilhamento')

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

            
        </div>
    </div>
        


        </div>
    <!-- principal -->

    <div id="principal">
        <p class="intro">Pesquisa Publica em {{$nick}}</p>
        <p style="display:inline;font-size:18px;">Barra de pesquisa </p>

        <form name="pesquisa" method="post" enctype="multipart/form-data" action="{{route('pesquisa.publica')}}" style="display:inline;">
        @csrf
            <input type="text" name="pesc" >
            <input type="hidden" name="nick" value="{{ $nick }}">
            <button type="submit"> pesquisar </button>
        </form>

      
    <hr class="hrprincipal">
    <p style="display:inline;">Arquivos</p>
    
    
    

    <br>
    
    @for ($i = 1; $i <= 15; $i++)
    <ul class="ullista2 hov" style="display: {{ $displayarquivo[$i] }}">
        <div class="divisor">
            <br>
            <p class="plista branco">{{ $nomearquivo[$i] }}</p>
            <p style="display:none" id="identificador{{ $i }}">{{ $identificador["$i"] }}</p>
        </div>

        

        <form style="display:inline;" action="{{route('baixar.publico')}}" method="post">
        @csrf
            <button class="botbaixar2" type="submit" name="botbaixar" value="baixar">Baixar</button>
           
            <input type="hidden" name="nomearq" value="{{ $nomearquivo[$i] }}">
            <input type="hidden" name="nick" value="{{ $nick }}">
        </form>

        
        
    </ul>
    @endfor


    
    
    
    
    
    
    
        <form style="display:inline;" action="compartilhados" method="post">
        @csrf
        <button class="botpasspagina" type="submit" name="bot0" value="bot0"> Pagina anterior</button>
        </form><form style="display:inline;" action="compartilhados" method="post">
        @csrf
        <button class="botpasspagina" type="submit" name="bot1" value="bot1"> Proxima pagina</button></form>
        <br><br><br><br><br><p style="text-align:right;margin-right:50%;">@php echo $valordapagina @endphp</p>
    </div>
    
    @endsection


{{-- modelo de dados == {{ $dadosModel[0] }} --}}