<?php
include("conecxao.php");
$nick= isset($_POST  ['nick']) ? $_POST["nick"] : "0";
$senha= isset($_POST  ['senha']) ? $_POST["senha"] : "0";
$nomedoarquivo= isset($_POST  ['nomearq']) ? $_POST["nomearq"] : "0";

$nicklivre=mysqli_real_escape_string($conecxao,$nick);
$senhalivre=mysqli_real_escape_string($conecxao,$senha);
$nomelivre=mysqli_real_escape_string($conecxao,$nomedoarquivo);

$novasenha=hash("sha256",$senhalivre);

$sql="SELECT `nick`, `senha`,`idpasta` FROM `usuarios` WHERE nick='$nicklivre'AND senha='$novasenha';";

if(mysqli_query($conecxao,$sql)){
    $resultado = mysqli_query($conecxao,$sql);
    $dados= mysqli_fetch_array($resultado);
    //var_dump( $dados);
    if($dados==NULL){
       // sem cadastro , retornar a pagina inicial
      
       mysqli_close($conecxao);
       header('Location: /cloud'); 
    }else{
        //usuario existe continuar e verificar senha
        $idpasta=$dados[2];
        
        
        
    } 
}else{
    #BAD SQL 
    echo "0";
    die();
}

$diretorio = "arquivos/$idpasta/";

$patharquivo=$diretorio.$nomelivre;

if(@unlink($patharquivo)){
   $saidaunlink=0;
}else{
    $saidaunlink=1;
}
$sql="SELECT `idarq`,`classe` FROM `dados` WHERE nick='$nicklivre'AND nome='$nomelivre';";
    if(mysqli_query($conecxao,$sql)){
        $resultado = mysqli_query($conecxao,$sql);
        $dados= mysqli_fetch_array($resultado);
        
       if($dados==NULL){
        echo "dado nulo ";echo "<br>";echo "$nicklivre";echo "<br>";echo "$nomelivre";
        $saidaunlink=1;
       }else{
        echo "dado correto ";echo "<br>";
        $idarquivoedelet=$dados[0];
        $nome_classe=$dados[1];
        $saidaunlink=0;
       }
    }else{
        #BAD SQL 
        echo "<br>";
        echo "erro";
        die();
    }
if($saidaunlink==0){

    $sql="DELETE FROM `dados` WHERE idarq='$idarquivoedelet';";
    if(mysqli_query($conecxao,$sql)){
       echo "<br>";echo " sucesso retirar o arquivo";
    }else{
        #BAD SQL 
        echo "<br>";
        echo "erro";
        die();
    }
}












    if($nome_classe=="todos"){
    header('Location: /cloud/arquivos.php');}
    if($nome_classe=="fotos"){
        header('Location: /cloud/fotos.php');}
    if($nome_classe=="trabalho"){
        header('Location: /cloud/trabalho.php');}
    if($nome_classe=="jogos"){
        header('Location: /cloud/jogos.php');}
    if($nome_classe=="compartilhados"){
        header('Location: /cloud/compartilhados.php');}

?>