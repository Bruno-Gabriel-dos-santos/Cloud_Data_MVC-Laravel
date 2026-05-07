<?php
include("conecxao.php");
$nick= isset($_POST  ['nick']) ? $_POST["nick"] : "0";
$senha= isset($_POST  ['senha']) ? $_POST["senha"] : "0";

session_start();
    if($nick!="0"){
        //salva senha
        $_SESSION['nick']=$nick;
        $_SESSION['senha']=$senha;
        
    }
    if($nick=="0"){
    //carrega senha
    if($_SESSION['nick']!=NULL){
        $nick=$_SESSION['nick'];
        $senha=$_SESSION['senha'];
       
    }
    }
   
$nicklivre=mysqli_real_escape_string($conecxao,$nick);
$senhalivre=mysqli_real_escape_string($conecxao,$senha);

$novasenha=hash("sha256",$senhalivre);

$sql="SELECT `nick`, `senha`,`idpasta` FROM `usuarios` WHERE nick='$nicklivre'AND senha='$novasenha';";

if(mysqli_query($conecxao,$sql)){
    $resultado = mysqli_query($conecxao,$sql);
    $dados= mysqli_fetch_array($resultado);
    //var_dump( $dados);
    if($dados==NULL){
       // sem cadastro , retornar a pagina inicial
      
       mysqli_close($conecxao);
       
        $_SESSION["erro"]=1;
       
       header('Location: /cloud');  
    }else{
        //usuario existe continuar e verificar senha
        $_SESSION["erro"]=0;
        $idpasta=$dados[2];
        mysqli_close($conecxao);
        //echo "<br> ";
        //echo $dados[1];
        //echo "<br>";
       // echo $novasenha;
        
    } 
}else{
    #BAD SQL 
    echo "0";
    die();
}
//echo "nick e senha correto"
?>