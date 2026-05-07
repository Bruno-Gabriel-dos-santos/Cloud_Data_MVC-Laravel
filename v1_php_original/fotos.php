<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <?php
    include("checkcadastro.php");
    $paginaatual="fotos";
    include("conecxao.php");
    
    ?>
	<head>
		<title>Fotos</title>
		<meta charset="utf-8" />
		
		<link rel="stylesheet" href="css/cs1.css" />
        <script src="js/main.js"></script>
	</head>
	<body id="bd">
        <?php
        
        include("atualizadadosclientesub.php");
       
        ?>
        <div id="botescondido" onclick="funabrir()">
            <div id="botescondidofaix0"></div>
            <div id="botescondidofaix1"></div>
            <div id="botescondidofaix1"></div>
        </div>
    <!-- menu -->
        <div id="telazul">
        <div class="menuprincipal" id="menuprinc">

            <p class="p1"><?php echo $nick;?></p>
            <p class="p2"> Bruno Cloud Data online</p>

            <li id="esp">
                <a href="arquivos.php" style="color:white;text-decoration:none ;">      <ul class="ulmenu"><p class="p3" >Todos os Arquivos </p> </ul></a>
                <a href="fotos.php" style="color:white;text-decoration:none ;">         <ul class="select"><p class="p3"> Fotos </p>             </ul></a>
                <a href="trabalho.php"  style="color:white;text-decoration:none ;">     <ul class="ulmenu"><p class="p3"> Trabalho </p>          </ul></a>
                <a href="jogos.php" style="color:white;text-decoration:none ;">         <ul class="ulmenu"><p class="p3"> Jogos </p>             </ul></a>
                <a href="compartilhados.php" style="color:white;text-decoration:none ;"><ul class="ulmenu"><p class="p3"> Compartilhados </p>    </ul></a>
                <a href="planos.php" style="color:white;text-decoration:none ;">       <ul class="ulmenu"><p class="p3"> Planos </p>            </ul></a>
            
            </li>
            <hr style="width: 80%;margin-top: 15px;">
            
        </div>
    </div>
        


        </div>
    <!-- principal -->

    <div id="principal">
        <p style="font-size:36px ;margin-bottom: 25px;">Fotos </p>
        <p style="display:inline;">Barra de pesquisa </p>
        
        <form name="pesquisa" method="post" enctype="multipart/form-data" action="pesquisa.php" style="display:inline;">
        <input type="text" name="pesc" style="margin-left:15px;">
        <input  type="text" name="nick" value="<?php echo $nick;?>" style="display:none;">
		<input  type="text" name="senha" value="<?php echo $senha;?>" style="display:none;"> 
        <button type="submit">pesquisar</button>
        </form>
    
    
    <hr class="hrprincipal">
    <p style="display:inline;">Arquivos</p>
    
    <button class="botupload" onclick="mostrarenvarqu()">Fazer upload de arquivos</button>

    <div class="enviaarquivos" id="enviaarquivostela">
        <form name="formarquivos" method="post" enctype="multipart/form-data" action="enviaarq.php">
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
                <input  type="text" name="nick" value="<?php echo $nick;?>" style="display:none;">
				<input  type="text" name="senha" value="<?php echo $senha;?>" style="display:none;"> 
                
            <input type="submit" style="margin-left:15px;" name="sub">
        </form>
    </div>
    
    

    <br>
    
       
    <?php
for ($i = 1; $i <= 15; $i++) {
    ?>
    <ul class="ullista" style="display:<?php echo $displayarquivo[$i];?>">
        <div class="divisor">
            <br>
            <p class="plista"><?php echo $nomearquivo[$i];?></p>
            <p style="display:none" id="identificador<?php echo $i;?>"><?php echo $identificador["$i"];?></p>
        </div>

        <form style="display:inline;" action="baixar.php" method="post">
            <button class="botbaixar" type="submit" name="botbaixar" value="baixar">Baixar</button>
            <input  type="text" name="nick" value="<?php echo $nick;?>" style="display:none;">
            <input  type="text" name="senha" value="<?php echo $senha;?>" style="display:none;">
            <input  type="text" name="nomearq" value="<?php echo $nomearquivo[$i];?>" style="display:none;">
        </form>

        <form style="display:inline;" action="delet.php" method="post">
            <button class="botexcluir" type="submit" name="botexcluir" value="excluir">Excluir</button>
            <input  type="text" name="nick" value="<?php echo $nick;?>" style="display:none;">
            <input  type="text" name="senha" value="<?php echo $senha;?>" style="display:none;">
            <input  type="text" name="nomearq" value="<?php echo $nomearquivo[$i];?>" style="display:none;">
        </form>
    </ul>
    <?php
}
?>
    
    
    
    
    
    
    
    <form style="display:inline;" action="" method="post">
        <button class="botpasspagina" type="submit" name="bot0" value="bot0"> Pagina anterior</button>
        </form><form style="display:inline;" action="" method="post">
        <button class="botpasspagina" type="submit" name="bot1" value="bot1"> Proxima pagina</button></form>
        <br><br><br><br><br><p style="text-align:right;margin-right:50%;"><?php echo $valordapagina ?></p>
    </div>
   
	</body>
</html>