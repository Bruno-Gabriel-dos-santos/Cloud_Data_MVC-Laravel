<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <?php
    include("checkcadastro.php");
    $paginaatual="trabalho";
    include("conecxao.php");
    
    ?>
	<head>
		<title>Planos</title>
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
                <a href="fotos.php" style="color:white;text-decoration:none ;">         <ul class="ulmenu"><p class="p3"> Fotos </p>             </ul></a>
                <a href="trabalho.php" style="color:white;text-decoration:none ;">      <ul class="ulmenu"><p class="p3"> Trabalho </p>          </ul></a>
                <a href="jogos.php" style="color:white;text-decoration:none ;">         <ul class="ulmenu"><p class="p3"> Jogos </p>             </ul></a>
                <a href="compartilhados.php" style="color:white;text-decoration:none ;"><ul class="ulmenu"><p class="p3"> Compartilhados </p>    </ul></a>
                <a href="planos.php" style="color:white;text-decoration:none ;">       <ul class="select"><p class="p3"> Planos </p>            </ul></a>
            
            </li>
            <hr style="width: 80%;margin-top: 15px;">
            
        </div>
    </div>
        


        </div>
    <!-- principal -->


    
    
    
    
    <div id="principal">
        <p style="font-size:40px ;margin-bottom: 25px;">Planos</p>
<br><br>
        <p style="font-size:26px ;margin-bottom: 25px;">Sem planos no momento</p>
       
    </div>
   
	</body>
</html>