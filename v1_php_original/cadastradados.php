<?php
include("conecxao.php");

$nick= isset($_POST  ['nick']) ? $_POST["nick"] : "0";
$senha= isset($_POST  ['senha']) ? $_POST["senha"] : "0";
$capcha= isset($_POST  ['capcha']) ? $_POST["capcha"] : "0";

$retorno0=0;
$retorno1=1;
$retorno2=2;
$retorno3=3;

if($nick==0){die;}
if($senha==0){die;}
if($capcha==0){die;}

$nicklivre=mysqli_real_escape_string($conecxao,$nick);
$senhalivre=mysqli_real_escape_string($conecxao,$senha);
$captchalivre=mysqli_real_escape_string($conecxao,$capcha);

// verifica se o capcha esta certo

    $sql="SELECT `numero`, `valor` FROM `cap` WHERE valor='$captchalivre';";

    
    # O CAPTCHA FOI ENCONTRADO !!! CONTINUAR
    if(mysqli_query($conecxao,$sql)){
      $resultado = mysqli_query($conecxao,$sql);
      $dados= mysqli_fetch_array($resultado);
      if($dados==NULL){
          echo $retorno3;//capcha errado
          mysqli_close($conecxao);
          die();
      }
      
      
  }else{
      #BAD SQL 
      echo $retorno0;
      die();
  }

// verifica se o nick ja existe
$sql1="SELECT  `nick` FROM `usuarios` WHERE nick='$nicklivre';";
if(mysqli_query($conecxao,$sql1)){
    $resultado = mysqli_query($conecxao,$sql1);
    $dados= mysqli_fetch_array($resultado);
    if($dados==NULL){
       // sem cadastro
    }else{
        echo $retorno2;//usuario ja existe 2
        mysqli_close($conecxao);
        die();
    } 
}else{
    #BAD SQL 
    echo $retorno0;
    die();
}
// Realiza o cadastro e da um retorno positivo

$novasenha=hash("sha256",$senhalivre);

$sql="INSERT INTO `usuarios`(
`nick`, 
`senha`, 
`idpasta`) VALUES (
'$nicklivre',
'$novasenha',
'0')";
if(mysqli_query($conecxao,$sql)){
   
   // echo "1";

}else{
    echo $retorno0;
    mysqli_close($conecxao);
    die();
}
// pega o idpasta para fazer uma pasta com o numero do diretorio cadastrado
// pega o id da tabela dados
$sql1="SELECT  `nick`,`idpasta` FROM `usuarios` WHERE nick='$nicklivre';";
if(mysqli_query($conecxao,$sql1)){
    $resultado = mysqli_query($conecxao,$sql1);
    $dados= mysqli_fetch_array($resultado);
    if($dados==NULL){
       // sem cadastro , erro no cadastro
       echo $retorno0;
    }else{
       //usuario existe pegar dado do idarq
       $idpasta=$dados[1];
       mysqli_close($conecxao);
        
    } 
}else{
    #BAD SQL 
    echo $retorno0;
    mysqli_close($conecxao);
    die();
}
// cria o diretorio correto
mkdir(__DIR__."/arquivos/$idpasta/", 0755, true);



echo $retorno1;



?>