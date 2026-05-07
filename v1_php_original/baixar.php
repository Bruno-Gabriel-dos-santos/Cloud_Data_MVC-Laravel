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

// faz o download 
if(file_exists("$patharquivo")){

    $file=$nomelivre;
    $type= filetype("$patharquivo");
    $size=filesize("$patharquivo");
    header("Content-Description: File Transfer");
    header("Content-Type:$type");
    header("Content-Lebgth:$size");
    header("Content-Disposition:attachment; filename=$file");
    readfile("$patharquivo");
    exit;
}

exit;



?>