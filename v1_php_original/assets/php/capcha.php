<?php
  include("conecxao.php");
  header('Content-Type: image/jpeg');
  $imagem = imagecreate( 200, 50);
  $valor=rand(0,998);
  
  $sql="SELECT `numero`, `valor` FROM `captcha` WHERE numero=$valor;";

  if(mysqli_query($conecxao,$sql)){
    $resultado = mysqli_query($conecxao,$sql);
    $dados= mysqli_fetch_array($resultado);
    $texto= $dados['valor'];
}else{
    
}

mysqli_close($conecxao);

  $corTexto = imagecolorallocate($imagem, 215, 245, 247);
  // aloca uma cor na imagem, a saber preta.
  $corFundo = imagecolorallocate($imagem, 255, 0, 0);
  imagestring($imagem, 10, 35, 15, $texto, $corFundo);
  imagejpeg($imagem);
  $img=imagepng($imagem);
  echo($img);

  ?>
