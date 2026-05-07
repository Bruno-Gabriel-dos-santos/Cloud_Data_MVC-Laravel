<?php
$servidor="localhost";
$usuario="user_cloud";
$senhabancodedados="uma_senha";
$banco="DB_cloud";

$conecxao=mysqli_connect($servidor,$usuario,$senhabancodedados,$banco);

if(!$conecxao){
  echo "morreu";  die;
}else{
    
}




?>